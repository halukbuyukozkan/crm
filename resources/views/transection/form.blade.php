@section('title') 
@if($type == $types[0]->value)
Avans Talebi Oluştur
@elseif($type == $types[1]->value)
Avans Kapatma Talebi Oluştur
@elseif($type == $types[2]->value)
Masraf Talebi Oluştur
@elseif($type == $types[2]->value)
İade Talebi Oluştur
@endif
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
                @if($type == $types[0]->value)
                <h5 class="card-title">Avans Talebi Oluştur</h5>
                @elseif($type == $types[1]->value)
                <h5 class="card-title">Avans Kapatma Talebi Oluştur</h5>
                @elseif($type == $types[2]->value)
                <h5 class="card-title">Masraf Talebi Oluştur</h5>
                @elseif($type == $types[3]->value)
                <h5 class="card-title">İade Talebi Oluştur</h5>
                @endif
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data"
    action="{{ $transection->exists ? route('admin.project.transection.update',['project' => $project,'transection' => $transection]) : route('admin.project.transection.store',$project) }}">
    @csrf
    @if ($transection->exists)
        @method('PUT')
    @endif
    <div class="card m-b-30">
        <div class="card-body ">
            <h6 class="card-subtitle"><strong>İsim</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name"
                    value="{{ old('project_name', $transection->project_name) }}" required>
                @error('project_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h6 class="card-subtitle"><strong>Açıklama</strong></h6>
            <div class="form-group mb-4">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description', $transection->description) }}" required>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if($type == $types[2]->value || $type == $types[1]->value)
            <h6 class="card-subtitle"><strong>Kategori</strong></h6>
            <div class="form-group">
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                    name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($transection->transection_category) {{ $transection->transection_category->contains($category) ? 'selected' : '' }}@endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 
            @endif
            <h6 class="card-subtitle"><strong>Miktar</strong></h6>
            <div class="form-group mb-4">
                <input type="integer" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $transection->price) }}" required>
            </div>
            @if($type == $types[1]->value || $type == $types[2]->value)
            <div class="form-group">
                <label for="filename">{{ __('Dosya Ekle') }}</label>
                <input id="filename" type="file" class="form-control" name="filename[]" value="{{ $transection->files }}" autocomplete="filename" multiple>

                @if ($transection->files)
                    @foreach ($transection->files as $file)
                        <img src="{{ asset($file->name) }}" alt="{{ $file->name}}"
                        class="mx-3 my-2" style="max-height: 100px">
                    @endforeach
                @endif

                @error('filename')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @endif
            <input type="hidden" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                    @if($type == $types[0]->value) value="{{ $types[0]->value }}" @elseif($type == $types[2]->value) value="{{ $types[2]->value }}" @elseif($type == $types[1]->value) value="{{ $types[1]->value }}" @elseif($type == $types[3]->value) value="{{ $types[3]->value }}" @endif required>
            <input type="hidden" class="form-control @error('is_income') is-invalid @enderror" id="is_income" name="is_income"
                    @if($type == $types[0]->value || $type == $types[2]->value) value="1" @elseif($type == $types[1]->value || $type == $types[3]->value) value="0" @endif  required>
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