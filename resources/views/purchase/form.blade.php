@section('title') 
Satın Alma Oluştur
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
    
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title">Satın Alma Oluştur</h5>
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data"
    action="{{ $purchase->exists ? route('admin.purchase.update', $purchase) : route('admin.purchase.store') }}">
    @csrf
    @if ($purchase->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-body ">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $purchase->name) }}" required>
            </div>
            <h6 class="card-subtitle"><strong>Açıklama</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description', $purchase->description) }}" required>
            </div>
            <h6 class="card-subtitle"><strong>Fiyat</strong></h6>
            <div class="form-group mb-4">
                <input type="number" class="form-control @error('name') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $purchase->price) }}" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="ri-save-line"></i>
                {{ __('Kaydet') }}
            </button>
        </div>
    </div>
    </form>
    
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