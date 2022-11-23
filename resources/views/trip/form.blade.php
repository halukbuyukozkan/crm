@section('title') 
Yeni Seyahat
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
    action="{{ $trip->exists ? route('admin.trip.update', $trip) : route('admin.trip.store') }}">
    @csrf
    @if ($trip->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Yeni Seyahat</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $trip->name) }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h6 class="card-subtitle"><strong>Açıklama</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description', $trip->description) }}" required>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h6 class="card-subtitle"><strong>Konum</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"
                    value="{{ old('location', $trip->location) }}" required>
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="card-subtitle"><strong>Başlangıç Tarihi</strong></h6>
                    <div class="form-group mb-4">
                        <input type="date" class="form-control @error('start_at') is-invalid @enderror" id="start_at" name="start_at"
                            value="{{ old('start_at', $trip->start_at) }}">
                        @error('start_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="card-subtitle"><strong>Bitiş Tarihi</strong></h6>
                    <div class="form-group mb-4">
                        <input type="date" class="form-control @error('end_at') is-invalid @enderror" id="end_at" name="end_at"
                            value="{{ old('end_at', $trip->end_at) }}">
                        @error('end_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
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