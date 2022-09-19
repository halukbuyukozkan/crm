@section('title') 
Goodssol Ailesi
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
    <div class="row my-2">
        <div class="col-md-8">
            <img class="w-100" src="{{ asset('img/nopic.png') }}" alt="">
        </div>
        <div class="col-md-4">
            <img class="w-100" src="{{ asset('img/nopic.png') }}" alt="">
            <img class="w-100 mt-4" src="{{ asset('img/nopic.png') }}" alt="">
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title text-center">Doğum Günü</h6>
                        </div>
                    </div>
                </div>
                @if($birthday)
                <div class="card-body">
                    <div class="row">
                        <div class="text-center">
                            <img src="{{ asset('img/emptyprofile.png') }}" class="rounded-circle w-50" alt="...">
                            <h6 class="card-title text-center">{{ $birthday->name }}</h6>
                        </div>
                    </div>
                </div>
                @endif
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