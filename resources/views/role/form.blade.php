@section('title') 
Yeni Rol
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
    action="{{ $role->exists ? route('admin.role.update', $role) : route('admin.role.store') }}">
    @csrf
    @if ($role->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Yeni Rol</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $role->name) }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h6 class="card-subtitle"><strong>Sıralama</strong></h6>
            <div class="form-group mb-4">
                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order"
                    value="{{ old('order', $role->order) }}">
                @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h6 class="card-subtitle"><strong>Yetkiler</strong></h6>
            <div class="form-group">
                <select class="form-control @error('permissions') is-invalid @enderror" id="permissions"
                    name="permissions[]" multiple>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}"
                            {{ $role->permissions->contains($permission) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
                @error('permissions')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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