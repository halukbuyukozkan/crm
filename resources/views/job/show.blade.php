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
                            <h3>Yorumlar</h3>
                        </div>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data"
                action="{{ route('admin.job.comment.store',$job) }}">
                @csrf
                <div class="card-body">
                    @foreach($job->comments as $comment)
                    <div>
                        <h6>{{ $comment->user->name }}:</h6>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                    <div class="form-group mb-4">
                        <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line"></i>
                            {{ __('Gönder') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>

            <div class="card m-b-30">
                <div class="card-header">   
                    <h3>Belgeler</h3>          
                </div>
                <div class="card-body">
                    <div>
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
                    <div class="mt-5">
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.jobaddfile', $job) }}">
                        @csrf
                        <div class="form-group">
                            <label for="filename">{{ __('Dosya Ekle') }}</label>
                            <input id="filename" type="file" class="form-control" name="filename[]" value="{{ $job->filename }}" autocomplete="filename" multiple>
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
                                                <td>Oluşturan</td>
                                                <td style="width: 70%">{{ $job->created_by }}</td>
                                            </tr>  
                                            <tr>
                                                <td>Görevliler</td>
                                                <td style="width: 70%">@foreach ($job->users  as $user)
                                                    {{ $user->name }}
                                                @endforeach</td>
                                            </tr>
                                            <tr>
                                                <td>Durum</td>
                                                <td style="width: 70%">
                                                @if(Auth::user()->name == $job->created_by)    
                                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.completejob',$job) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-8 pr-0">
                                                                <select class="form-control" name="status_id" id="formControlSelect">
                                                                    @foreach ($jobstatuses as $status)
                                                                        <option value="{{ $status->id }}" {{ $job->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="ri-save-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @error('status_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </form>
                                                @else
                                                {{ $job->status->name }}
                                                @endif
                                                </td>
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