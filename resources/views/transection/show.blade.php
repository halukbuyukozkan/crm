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
                            <h4>Talep Detayları</h4>
                        </div>
                        @if(Auth::user()->hasAnyPermission(['Genel Görev Atama']))
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h5>Talep Adı</h5>
                        <p>{{ $transection->project->name }}</p>
                    </div>
                    <div>
                        <h5>Açıklama</h5>
                        <p>{{ $transection->description }}</p>
                    </div>
                    <div>
                        <h5>Kategori</h5>
                        <p>{{ $transection->transection_category ? $transection->transection_category->name : '' }} {{ $transection->type->value}} </p>
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
                        <div class="mb-2">
                            <a href="{{ asset('files/'.$item->filename) }}" download="{{ $item->filename }}">
                                @if(Str::contains($item->filename,'.jpeg'))
                                    <img src="{{ asset('files/'.$item->filename) }}" alt="{{ $item->filename}}"
                                    class="mx-3" style="max-height: 70px">
                                    <span>{{ Str::limit($item->filename, 25) }}</span>
                                @elseif(Str::contains($item->filename,'.pdf'))
                                    <img src="{{ asset('img/PDF.png') }}" alt="{{ $item->filename}}"
                                    class="mx-3" style="max-height: 70px">
                                    <span>{{ Str::limit($item->filename, 25) }}</span>               
                                @endif
                            </a>
                        </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Tarihler</h5>
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
                                                <td>Talep Tarihi</td>
                                                <td style="width: 60%">{{ $transection->created_at->format('d.m.Y') }}</td>
                                            </tr>  
                                            <tr>
                                                <td>Onaylanma Tarihi</td>
                                                <td style="width: 60%">@if($transection->approved_at) {{ $transection->approved_at->format('d.m.Y') }} @else - @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Ödeme Tarihi</td>
                                                <td style="width: 60%">@if($transection->completed_at) {{ $transection->completed_at->format('d.m.Y') }} @else - @endif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Görevliler</h5>
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
                                                <td>Talep Eden</td>
                                                <td style="width: 60%">{{ $transection->project->user->name }}</td>
                                            </tr>  
                                            <tr>
                                                <td>Talebi Onaylayan</td>
                                                <td style="width: 60%">{{ $transection->payer ? $transection->payer : '-' }}</td>
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