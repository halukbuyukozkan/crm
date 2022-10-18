@section('title') 
Yeni Mesaj
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
    action="{{ $message->exists ? route('admin.message.update', $message) : route('admin.message.store') }}">
    @csrf
    @if ($message->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Yeni Mesaj</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle"><strong>Mesaj</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                    value="{{ old('message', $message->message) }}" required>
            </div>
            @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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