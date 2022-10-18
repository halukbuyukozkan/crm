@section('title') 
Yeni Görev
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
    action="{{ $job->exists ? route('admin.job.update', $job) : route('admin.job.store') }}">
    @csrf
    @if ($job->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Yeni Görev</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $job->name) }}" required>
            </div>
            <h6 class="card-subtitle"><strong>Durum seçin</strong></h6>
            <div class="form-group">
                <select class="form-control" name="status_id" id="formControlSelect">
                    @foreach ($jobstatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <h6 class="card-subtitle"><strong>Kişi seçin</strong></h6>
            <div class="form-group">
                <select class="form-control @error('users') is-invalid @enderror" id="users"
                    name="users[]" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ $job->users->contains($user) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('users')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 
            <h6 class="card-subtitle"><strong>Acıklama</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description', $job->description) }}" required>
            </div>
            <h6 class="card-subtitle"><strong>Bitiş Tarihi</strong></h6>
            <div class="form-group mb-4">
                <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline"
                    value="{{ old('deadline', $job->deadline) }}">
            </div>
            <div class="form-group">
                <label for="filename">{{ __('Dosya Ekle') }}</label>
                <input id="filename" type="file" class="form-control" name="filename[]" value="{{ $job->filename }}" autocomplete="filename" multiple>

                @if ($job->filename)
                    @foreach ($job->filename as $file)
                        <img src="{{ asset($file->name) }}" alt="{{ $file->name}}"
                        class="mx-3 my-2" style="max-height: 100px">
                    @endforeach
                @endif

                @error('filename')
                    <div class="alert alert-danger">{{ $message }}</div>
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