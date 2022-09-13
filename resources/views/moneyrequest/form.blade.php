@section('title') 
Yeni Ödeme Talebi
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
    
    <form method="post" enctype="multipart/form-data"
    action="{{ $moneyRequestItem->exists ? route('admin.moneyrequest.update', $moneyRequestItem) : route('admin.moneyrequest.store') }}">
    @csrf
    @if ($moneyRequestItem->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Ödeme Talebi Formu</h5>
        </div>
        <div class="card-body ">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $moneyRequest->name) }}" required>
            </div>
            <h4 class="card-subtitle my-4 mt-5"><strong>Talep Edilen Tutar</strong></h4>
            @foreach ($types as $type)
            <h6 class="card-subtitle"><strong>{{ $type->name }}</strong></h6>
            <div class="form-group mb-4">
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price[]"
                    value="{{ old('price', $moneyRequestItem->price) }}" required>
            </div>
            <input name="type_id[]" type="hidden" value="{{ $type->id }}">
            @endforeach
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="ri-save-line"></i>
                {{ __('Save') }}
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