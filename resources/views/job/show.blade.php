@section('title') 
Görevler
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
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Görev Detayları</h3>
                        </div>
                        @if(Auth::user()->hasAnyPermission(['Genel Görev Atama']))
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h4>{{ $job->name }}</h4>
                    </div>
                    <div>
                        <p>{{ $job->description }}</p>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Belgeler</h3>
                        </div>
                        <div class="col-md-4">
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.jobaddfile', $job) }}">
                            @csrf
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
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line"></i>
                                {{ __('Save') }}
                            </button>
                            </form>
                        </div>
                        @if(Auth::user()->hasAnyPermission(['Genel Görev Atama']))
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if($job->job_items)
                        @foreach ($job->job_items as $item)
                        <div class="mb-2">
                            <a href="{{ asset('files/job/'.$item->filename) }}" download="{{ $item->filename }}">
                                @if(Str::contains($item->filename,'.jpeg'))
                                <img src="{{ asset('files/job/'.$item->filename) }}" alt="{{ $item->filename}}"
                                class="mx-3" style="max-height: 70px">
                                <span>{{ Str::limit($item->filename, 25) }}</span>               
                                @elseif(Str::contains($item->filename,'.pdf'))
                                <img src="{{ asset('img/PDF.png') }}" alt="{{ $item->filename}}"
                                class="mx-3" style="max-height: 70px">
                                <span>{{ Str::limit($item->filename, 25) }}</span>               
                                @endif
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title text-center">Kalan Gün Sayısı</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>{{ $daysleft }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h5>Teslim Tarihi</h5>
                            <span>{{ $job->deadline }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Durum Bilgisi</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="edit-btn">
                                        <tbody>
                                            <tr>
                                                <td>Görevi Oluşturan</td>
                                                <td style="width: 60%">{{ $job->created_by }}</td>
                                            </tr>  
                                            <tr>
                                                <td>Görevliler</td>
                                                <td style="width: 60%">@foreach ($job->users  as $user)
                                                    {{ $user->name }}
                                                @endforeach</td>
                                            </tr>
                                            <tr>
                                                <td>Görev Durumu</td>
                                                <td style="width: 60%">{{ $job->status->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
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