@section('title') 
Talep detayları
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
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Talep Detayları</h3>
                        </div>
                        @if(Auth::user()->hasAnyPermission(['Genel Görev Atama']))
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h4>{{ $transection->name }}</h4>
                    </div>
                    <div>
                        <p>{{ $transection->description }}</p>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Belgeler</h3>
                        </div>
                        @if(Auth::user()->hasAnyPermission(['Genel Görev Atama']))
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($transection->transection_items)
                        @foreach ($transection->transection_items as $item)
                        <a href="{{ asset('files/'.$item->filename) }}" download="{{ $item->filename }}">
                            <img src="{{ asset('files/'.$item->filename) }}" alt="{{ $item->filename}}"
                            class="mx-3" style="max-height: 100px">
                        </a>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title text-center">Kalan Gün Sayısı</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>test</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h5>Teslim Tarihi</h5>
                            <span>test</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Kullanıcı Bilgileri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="edit-btn">
                                        <tbody>
                                            <tr>
                                                <td>Görevi Oluşturan</td>
                                                <td style="width: 60%">test</td>
                                            </tr>  
                                            <tr>
                                                <td>Görevliler</td>
                                                <td style="width: 60%">test</td>
                                            </tr>
                                            <tr>
                                                <td>Görev Durumu</td>
                                                <td style="width: 60%">test</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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