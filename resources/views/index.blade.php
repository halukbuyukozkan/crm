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
            <div class="card">
                <div class="card-header">
                    <div>
                        <h6 class="card-title">Yönetimden Mesajlar</h6>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($messages as $message)
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div>
                                <p><strong>{{ $message->created_at->format('d/m/Y') }} {{ $message->message }}</strong></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @if($informations)
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h6 class="card-title">Haberler</h6>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($informations as $information)
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div>
                                <p><strong>{{ $information->created_at->format('d/m/Y') }} {{ $information->description }}</strong></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Görevler</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Görev Adı</th>
                                <th>Açıklama</th>
                                <th>İşlemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs->take(5) as $job)
                                <tr>
                                    <td style="width: 25%">{{ $job->name }}</td>
                                    <td style="width: 60%">{{ $job->description }}</td>
                                    <td style="width: 15%">
                                        <a href="{{ route('admin.job.edit',$job) }}"><button class="btn btn-sm btn-primary">
                                            <i class="ri-pencil-line"></i>
                                        </button></a>
                                        <form action="{{ route('admin.job.destroy', $job) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="{{ route('admin.job.index') }}">Tümünü gör</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Kullanıcı Bilgileri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-text">Ad Soyad : {{ $user->name }}</h6>
                    <h6 class="card-text">Email : {{ $user->email }}</h6>
                    <h6 class="card-text">Avans Bakiyesi : {{ $user->balance }} TL</h6>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title">İzinler</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-text"><a href="#">>İzin Yönetim Sistemi</a></h5>
                    <h5 class="card-text"><a href="#">>Ücretisiz İzin Talebi</a></h5>
                    <h5 class="card-text"><a href="#">>Yıllık İzin Talebi</a></h5>
                    <h6 class="card-text">Yıllık izin hakkı : 7 gün</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-6 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Aylık Masraf Dağılım Grafiği</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-bar-chart" class="chartjs-chart"></canvas>
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
                            <a href="{{ route('admin.moneyrequest.create') }}"><button class="btn btn-primary">Ödeme Talebi Oluştur</button></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Başlık</th>
                                <th>Kullanıcı</th>
                                <th>İşlemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($moneyrequests as $request)
                                <tr>
                                    <td style="width: 40%">{{ $request->name }}</td>
                                    <td>{{ $request->user->name }}</td>
                                    <td style="width: 30%">
                                        @if($request->user->id == Auth::user()->id)
                                        <a href="{{ route('admin.moneyrequest.edit',$request) }}"><button class="btn btn-sm btn-primary">
                                            <i class="ri-pencil-line"></i>
                                        </button></a>
                                        <form action="{{ route('admin.moneyrequest.destroy', $request) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                        @elseif(Auth::user()->hasRole('Başkan'))
                                        <a href="{{ route('admin.moneyrequest.edit',$request) }}"><button class="btn btn-sm btn-primary">
                                            <i class="ri-check-line"></i>
                                        </button></a>
                                        <a href="{{ route('admin.moneyrequest.edit',$request) }}"><button class="btn btn-sm btn-danger">
                                            <i class="ri-close-line"></i>
                                        </button></a>
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