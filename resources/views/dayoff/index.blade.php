@section('title') 
İzinler
@endsection 
@extends('layouts.main')
@section('style')
<!-- Apex css -->
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">   
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title">İzinler</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.calendar') }}"><button class="btn btn-primary">İzin Oluştur</button></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Başlık</th>
                                <th>İzin Alan</th>
                                <th>Durum</th>
                                <th>Başlangıç</th>
                                <th>Bitiş</th>
                                <th>Eylemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($dayoffs as $dayoff)
                                <tr>
                                    <td>{{ $dayoff->title }}</td>
                                    <td>{{ $dayoff->user->name }}</td>
                                    <td>@if($dayoff->is_approved==1) Onaylandı @else Beklemede @endif</td>
                                    <td>{{ $dayoff->start_date }}</td>
                                    <td>{{ $dayoff->end_date }}</td>
                                    <td>
                                        @if($dayoff->is_approved != 1)
                                        @if(Auth::user()->hasPermissionTo('İzin Yönetimi'))
                                        <form action="{{ route('admin.dayoffapprove',['user' => $user,'dayoff' => $dayoff]) }}" method="POST"
                                            class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                            @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="ri-check-line"></i>
                                                </button>
                                        </form>
                                        @endif
                                        <form action="{{ route('admin.dayoffdelete',['user' => $user,'dayoff' => $dayoff]) }}" method="POST"
                                            class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- End col -->

    </div>
    
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Apex js -->
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
<!-- Custom Dashboard js -->  
<script src="{{ asset('assets/js/custom/custom-dashboard.js') }}"></script>
@endsection 