@section('title') 
CRM
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
        @if($messages)
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Yönetimden Mesajlar</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td style="width: 25%">{{ $message->created_at->format('d/m/Y') }}</td>
                                    <td style="width: 60%">{{ $message->message }}</td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($informations)
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Haberler</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <tbody>
                                @foreach ($informations as $information)
                                <tr>
                                    <td style="width: 25%">{{ $information->created_at->format('d/m/Y') }}</td>
                                    <td style="width: 60%">{{ $information->description }}</td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="ri-check-line"></i>Görevlerim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="ri-check-double-line mr-2"></i>Verilen Görevler</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="defaultTabContentLine">
    
                        <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="edit-btn">
                                    <thead>
                                    <tr>
                                        <th>Görev Adı</th>
                                        <th>Görevi Veren</th>
                                        <th>Görevli</th>
                                        <th>Durum</th>
                                        <th>Başlangıç Tarihi</th>
                                        <th>Bitiş Tarihi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($myjobs->take(5) as $job)
                                        <tr>
                                            <td><a href="{{ route('admin.job.show',$job) }}">{{ $job->name }}</a></td>
                                            <td>{{ $job->created_by }}</td>
                                            <td>@foreach ($job->users  as $user)
                                                {{ $user->name }}
                                            @endforeach</td>
                                            <td>{{ $job->status->name }}</td>
                                            <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                            <td>{{ $job->deadline }}</td>
                                        </tr>  
                                        @empty
                                            <tr>
                                                <td colspan="99" class="text-center text-muted">
                                                    {{ __('Görev Bulunamadı') }}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if($otherjobs)
                                @if($otherjobs->count() > 5)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <a href="{{ route('admin.job.index') }}">Tümünü gör</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                        </div>
    
                        <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="edit-btn">
                                    <thead>
                                    <tr>
                                        <th>Görev Adı</th>
                                        <th>Görevi Veren</th>
                                        <th>Görevli</th>
                                        <th>Durum</th>
                                        <th>Başlangıç Tarihi</th>
                                        <th>Bitiş Tarihi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($otherjobs)
                                            @forelse ($otherjobs->take(5) as $job)
                                                <tr>
                                                    <td><a href="{{ route('admin.job.show',$job) }}">{{ $job->name }}</a></td>
                                                    <td>{{ $job->created_by }}</td>
                                                    <td>@foreach ($job->users  as $user)
                                                        {{ $user->name }}
                                                    @endforeach</td>
                                                    <td>{{ $job->status->name }}</td>
                                                    <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                                    <td>{{ $job->deadline }}</td>
                                                </tr>  
                                            @empty
                                                <tr>
                                                    <td colspan="99" class="text-center text-muted">
                                                        {{ __('Görev Bulunamadı') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if($otherjobs)
                                @if($otherjobs->count() > 5)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <a href="{{ route('admin.job.index') }}">Tümünü gör</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-lg-7 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Kullanıcı Bilgileri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="edit-btn">
                                    <tbody>
                                        <tr>
                                            <td>Ad Soyad</td>
                                            <td style="width: 60%">{{ $user->name }}</td>
                                        </tr>  
                                        <tr>
                                            <td>Email</td>
                                            <td style="width: 60%">{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Avans Bakiyesi</td>
                                            <td style="width: 60%">{{ $user->balance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kalan izin günü</td>
                                            <td style="width: 60%">{{ $user->dayoff }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->hasPermissionTo('Ödeme Talebi Kabul Etme'))
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>{{ Auth::user()->department->name }} Bilgileri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="edit-btn">
                                    <thead>
                                        <tr>
                                          <th>İsim</th>
                                          <th>Bakiye</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Auth::user()->department->users as $user)
                                        <tr>
                                            <td style="width: 50%">{{ $user->name }}</td>
                                            <td>{{ $user->balance }}</td>
                                        </tr>  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-5 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Aylık Masraf Dağılım Grafiği</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <img class="w-100" src="{{ asset('img/nopic.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Onay Bekleyen Avans/Masraf Taleplerim</h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('admin.project.create') }}"><button class="btn btn-primary">Talep Oluştur</button></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Başlık</th>
                                <th>Tür</th>
                                <th>Oluşturan</th>
                                <th>tarih</th>
                                <th>Eylemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects->take(5) as $project)
                                <tr>
                                    <td><a href="{{ route('admin.project.show',$project) }}">{{ $project->name }}</a></td>
                                    <td>{{ $project->type }}</td>
                                    <td>{{ $project->user->name }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>
                                        @if(Auth::user()->hasAnyPermission('Ödeme Talebi Kabul Etme') && !$project->transections->contains('status',config('global.transection.statuses')[1]) && !$project->transections->contains('status',$transectionstatuses[2]))
                                        <form action="{{ route('admin.project.destroy', $project) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                        @elseif($project->user->id == Auth::user()->id && !$project->transections->contains('status',$transectionstatuses[1]) && !$project->transections->contains('status',$transectionstatuses[2]))
                                        <form action="{{ route('admin.project.destroy', $project) }}" method="POST"
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
                                @empty
                                <tr>
                                    <td colspan="99" class="text-center text-muted">
                                        {{ __('Talep Bulunamadı') }}
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($projects)
                        @if($projects->count() > 5)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <a href="{{ route('admin.project.index') }}">Tümünü gör</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>

    <div class="row">
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
                                @forelse ($dayoffs->take(5) as $dayoff)
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
                                @empty
                                <tr>
                                    <td colspan="99" class="text-center text-muted">
                                        {{ __('Talep Bulunamadı') }}
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($dayoffs)
                        @if($dayoffs->count() > 5)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <a href="{{ route('admin.user.dayoff.index',$user) }}">Tümünü gör</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
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