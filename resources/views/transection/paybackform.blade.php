@section('title') 
Masraf Kapatma
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
                <h5 class="card-title">Masraf Kapatma</h5>
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data"
    action="{{ route('admin.payBack',['project' => $project,'transection' => $transection]) }}">
    @csrf
    <div class="card m-b-30">
        <div class="card-body ">
            <h6 class="card-subtitle"><strong>Açıklama</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description', $transection->description) }}" required>
            </div>
            <h6 class="card-subtitle"><strong>Miktar</strong></h6>
            <div class="form-group mb-4">
                <input type="integer" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required>
            </div>
            <input type="hidden" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                    value="{{ $types[2]->value }}" required>
            <input type="hidden" class="form-control @error('is_income') is-invalid @enderror" id="is_income" name="is_income"
                    value="1" required>
            <input type="hidden" class="form-control @error('is_completed') is-invalid @enderror" id="is_completed" name="is_completed"
                    value="0" required>
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