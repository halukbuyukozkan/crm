@section('title') 
Yeni Kullanıcı
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
    action="{{ $user->exists ? route('admin.user.update', $user) : route('admin.user.store') }}">
    @csrf
    @if ($user->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Yeni Kullanıcı</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ $user->email }}" required>
                @error('email')
                    <span class="invalid-feedback" user="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="email">{{ __('Doğum Tarihi') }}</label>
                <input type="date" class="form-control" name="birthdate" id="birthdate">
            </div>
            <div class="form-group mb-4">
                <label for="password">{{ __('Şifre') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                @error('password')
                    <span class="invalid-feedback" user="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="password_confirmation">{{ __('Şifre Doğrulama') }}</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <span class="invalid-feedback" user="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="phone">{{ __('Telefon') }}</label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="email"
                    name="phone" value="{{ $user->phone }}">
                @error('phone')
                    <span class="invalid-feedback" user="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password_confirmation">{{ __('Departman') }}</label>
                <select class="form-control" name="department_id" id="department">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="roles">{{ __('Roller') }}</label>
                <select class="form-control @error('roles') is-invalid @enderror" id="roles" name="roles[]"
                    multiple>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ $user->roles->contains($role) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('roles')
                    <span class="invalid-feedback" user="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="permissions">{{ __('Yetkiler') }}</label>
                <select class="form-control @error('permissions') is-invalid @enderror" id="permissions" name="permissions[]"
                    multiple>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}"
                            {{ $user->permissions->contains($permission) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
                @error('permissions')
                    <span class="invalid-feedback" user="alert">
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