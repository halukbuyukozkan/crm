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
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-title">Görevler</h5>
                        </div>
                        <div class="col-md-8">
                            @if(Auth::user()->hasAnyPermission('Genel Görev Atama'))
                            <div class="text-right">
                                <a href="{{ route('admin.job.create') }}"><button class="btn btn-primary">Görev Oluştur</button></a> 
                                <a href="{{ route('admin.status.index') }}"><button class="btn btn-primary">Durumlar</button></a>    
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs custom-tab-line mb-3" id="defaultTabLine" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="ri-check-line"></i>Görevlerim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="ri-check-double-line mr-2"></i>Tamamlanan Görevlerim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#contact-line" role="tab" aria-controls="contact-line" aria-selected="false"><i class="ri-checkbox-multiple-blank-line mr-2"></i>Verilen Görevler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-line" data-toggle="tab" href="#given-completed" role="tab" aria-controls="given-completed" aria-selected="false"><i class="ri-checkbox-multiple-line mr-2"></i>Verilen Tamamlanan Görevler</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="defaultTabContentLine">

                        <div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
                            <table class="table table-striped table-bordered" id="edit-btn">
                                <thead>
                                  <tr>
                                    <th>İsim</th>
                                    <th>Görevi Veren</th>
                                    <th>Görevli</th>
                                    <th>Durum</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>İşlemler</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($myjobs as $job)
                                        @if($job->status->is_completed != 1)
                                        <tr>
                                            <td><a href="{{ route('admin.job.show',$job) }}">{{ $job->name }}</a></td>
                                            <td>{{ $job->created_by }}</td>
                                            <td>@foreach ($job->users  as $user)
                                                {{ $user->name }}
                                            @endforeach
                                            </td>
                                            <td>{{ $job->status->name }}</td>
                                            <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                            <td>{{ $job->deadline }}</td>
                                            <td>
                                                @if(Auth::user()->hasAnyPermission('Görevde Değişiklik Yapma'))
                                                <a href="{{ route('admin.job.edit',$job) }}"><button class="btn btn-sm btn-primary">
                                                    <i class="ri-pencil-line"></i>
                                                </button></a>
                                                <form action="{{ route('admin.job.destroy', $job) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.completejob',$job) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-8 pr-0">
                                                                <select class="form-control" name="status_id" id="formControlSelect">
                                                                    @foreach ($statuses as $status)
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
                                                @endif
                                            </td>
                                        </tr>  
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="99" class="text-center text-muted">
                                                {{ __('Görev Bulunamadı') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
                            <table class="table table-striped table-bordered" id="edit-btn">
                                <thead>
                                  <tr>
                                    <th>İsim</th>
                                    <th>Görevi Veren</th>
                                    <th>Görevli</th>
                                    <th>Durum</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>İşlemler</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($myjobs as $job)
                                        @if($job->status->is_completed == 1)
                                        <tr>
                                            <td><a href="{{ route('admin.job.show',$job) }}">{{ $job->name }}</a></td>
                                            <td>{{ $job->created_by }}</td>
                                            <td>@foreach ($job->users  as $user)
                                                {{ $user->name }}
                                            @endforeach
                                            </td>
                                            <td>{{ $job->status->name }}</td>
                                            <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                            <td>{{ $job->deadline }}</td>
                                            <td>
                                                @if(Auth::user()->hasAnyPermission('Görevde Değişiklik Yapma'))
                                                <a href="{{ route('admin.job.edit',$job) }}"><button class="btn btn-sm btn-primary">
                                                    <i class="ri-pencil-line"></i>
                                                </button></a>
                                                <form action="{{ route('admin.job.destroy', $job) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.completejob',$job) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-8 pr-0">
                                                                <select class="form-control" name="status_id" id="formControlSelect">
                                                                    @foreach ($statuses as $status)
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
                                                @endif
                                            </td>
                                        </tr>  
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="99" class="text-center text-muted">
                                                {{ __('Görev Bulunamadı') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="contact-line" role="tabpanel" aria-labelledby="contact-tab-line">
                            <table class="table table-striped table-bordered" id="edit-btn">
                                <thead>
                                  <tr>
                                    <th>İsim</th>
                                    <th>Görevi Veren</th>
                                    <th>Görevli</th>
                                    <th>Durum</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>İşlemler</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($otherjobs as $job)
                                        @if($job->status->is_completed != 1)
                                        <tr>
                                            <td><a href="{{ route('admin.job.show',$job) }}">{{ $job->name }}</a></td>
                                            <td>{{ $job->created_by }}</td>
                                            <td>@foreach ($job->users  as $user)
                                                {{ $user->name }}
                                            @endforeach</td>
                                            <td>{{ $job->status->name }}</td>
                                            <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                            <td>{{ $job->deadline }}</td>
                                            <td>
                                                @if(Auth::user()->hasAnyPermission('Görevde Değişiklik Yapma'))
                                                <a href="{{ route('admin.job.edit',$job) }}"><button class="btn btn-sm btn-primary">
                                                    <i class="ri-pencil-line"></i>
                                                </button></a>
                                                <form action="{{ route('admin.job.destroy', $job) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.completejob',$job) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <select class="form-control" name="status_id" id="formControlSelect">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('status_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="ri-save-line"></i>
                                                        {{ __('Kaydet') }}
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>  
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="99" class="text-center text-muted">
                                                {{ __('Görev Bulunamadı') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="given-completed" role="tabpanel" aria-labelledby="contact-tab-line">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="edit-btn">
                                    <thead>
                                      <tr>
                                        <th>İsim</th>
                                        <th>Görevi Veren</th>
                                        <th>Görevli</th>
                                        <th>Durum</th>
                                        <th>Başlangıç Tarihi</th>
                                        <th>Bitiş Tarihi</th>
                                        <th>İşlemler</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($otherjobs as $job)
                                            @if($job->status->is_completed == 1)
                                            <tr>
                                                <td><a href="{{ route('admin.job.show',$job) }}">{{ $job->name }}</a></td>
                                                <td>{{ $job->created_by }}</td>
                                                <td>@foreach ($job->users  as $user)
                                                    {{ $user->name }}
                                                @endforeach</td>
                                                <td>{{ $job->status->name }}</td>
                                                <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                                <td>{{ $job->deadline }}</td>
                                                <td>
                                                    @if(Auth::user()->hasAnyPermission('Görevde Değişiklik Yapma'))
                                                    <a href="{{ route('admin.job.edit',$job) }}"><button class="btn btn-sm btn-primary">
                                                        <i class="ri-pencil-line"></i>
                                                    </button></a>
                                                    <form action="{{ route('admin.job.destroy', $job) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.completejob',$job) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <select class="form-control" name="status_id" id="formControlSelect">
                                                                @foreach ($statuses as $status)
                                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('status_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="ri-save-line"></i>
                                                            {{ __('Kaydet') }}
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>  
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="99" class="text-center text-muted">
                                                    {{ __('Görev Bulunamadı') }}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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