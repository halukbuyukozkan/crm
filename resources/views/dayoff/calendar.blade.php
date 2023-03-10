@section('title') 
İzin Takvimi
@endsection 
@extends('layouts.main')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

@endsection 
@section('rightbar-content')

  <!-- Modal -->
    <div class="modal fade" id="dayoffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">İzin Oluştur</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="password_confirmation">{{ __('İzin Başlığı') }}</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="form-group mb-4">
                    <label for="password_confirmation">{{ __('İzin Türü') }}</label>
                    <select class="form-control" name="type" id="type">
                        @foreach ($types as $type)
                            <option value="{{ $type->value }}">{{ $type->value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="password_confirmation">{{ __('İzin Türü') }}</label>
                    <select class="form-control" name="is_allday" id="is_allday">
                            <option value="1">Tam gün</option>
                            <option value="0">Yarım gün</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
            <button type="button" id="saveBtn" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
        </div>
    </div>

    <div class="col-12">
        <h3 class="text-center mt-5">İzin Günleri</h3>
        <div class="col-md-10 my-5 offset-1">
            <div id="calendar">
            </div>
        </div>
    </div>

@endsection 
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/tr.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dayoffs = @json($dayoffs);
            var holidays = @json($holidays);
            var today = @json($today);

            $('#calendar').fullCalendar({
                locale: 'tr',
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                buttonText: {
                    today:    'Bugün',
                    month:    'Ay',
                    week:     'Hafta',
                    day:      'Gün',
                    list:     'Liste'
                },
                validRange: {
                    start: today,
                },
                events: dayoffs,
                selectable: true,
                selectHelper: true,
                displayEventTime: false,
                weekends: false,
                timezone:"local",

                select: function(start, end, allDays) {
                    $('#dayoffModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var type = $('#type').val();
                        var is_allday = $('#is_allday').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');

                        console.log(moment(start),moment(end));

                        const result = holidays.filter(holiday => holiday.tarih === start_date);

                        if(result.length == 0) {
                            $.ajax({
                            url:"{{ route('admin.user.dayoff.store',$user) }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title, type, is_allday, start_date, end_date },
                            success:function(response)
                            {
                            $('#dayoffModal').modal('hide')
                            $('#calendar').fullCalendar('renderEvent', {
                                'id': response.id,
                                'title': response.title,
                                'type': response.type,
                                'is_allday': response.is_allday,
                                'start' : response.start_date,
                                'color': response.color,
                                'end'  : response.end_date,
                            })
                            swal("İzin Başarıyla Oluşturuldu", "", "success");   
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                            });
                        }else {
                            swal("Resmi Tatiller Seçilemez", "", "error");
                        }
                    });
                },
                editable: true,


                eventDrop: function(event) {
                    if(event.color != 'green') {
                        var id = event.id;
                        var start_date = moment(event.start).format('YYYY-MM-DD');
                        var end_date = moment(event.end).format('YYYY-MM-DD');

                        console.log(event.end);

                        $.ajax({
                            url:"{{ route('admin.user.dayoff.update',['user' => $user, '' ]) }}" + '/'  + id,
                                type:"PATCH",
                                dataType:'json',
                                data:{ start_date, end_date },
                                success:function(response)
                                {
                                    if(event.color != 'green') {
                                        swal("İzin Güncellendi", "", "success");
                                    }
                                },
                                error:function(error)
                                {
                                    console.log(error)
                                },
                            });
                    }else{
                        swal("Onaylanmış İzin Değiştirilemez", "", "error").then(function(){ 
                        location.reload();
                        });
                    }
                },

                eventClick: function(event){
                    var id = event.id;
                    if(event.color != 'green') {
                        if(confirm('Silmek istediğinize emin misiniz?')){
                        $.ajax({
                            url:"{{ route('admin.user.dayoff.destroy',['user' => $user, '' ]) }}" + '/'  + id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {  
                                $('#calendar').fullCalendar('removeEvents', response.id);
                                swal("İzin Başarıyla Silindi", "", "success");
                            },
                            error:function(error) 
                            {
                                console.log(error)
                            },
                        });
                        }
                    }else {
                        swal("Onaylanmış İzin Silinemez", "", "error");
                    }
                },

                
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },

            });

            $("#dayoffModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            }); 


        });
    </script>
      
@endsection 
