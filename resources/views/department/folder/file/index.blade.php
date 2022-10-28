@section('title') 
Belgeler
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
                        <div class="col-md-10">
                            <h5 class="card-title">{{ $folder->name }} Belgeleri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Belge adı</th>
                                <th>İşlemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($folder->files as $file)
                                <tr>
                                    <td><a href="{{ asset('files/department/'.$file->filename) }}" download="{{ $file->filename }}">{{ $file->filename }}</a></td>
                                    <td style="width: 20%">
                                        <form action="{{ route('admin.department.folder.file.destroy',['department' => $department, 'folder' => $folder,'file' => $file]) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr> 
                                @empty
                                <tr>
                                    <td colspan="99" class="text-center text-muted">
                                        {{ __('Belge Bulunamadı') }}
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @if(Auth::user()->hasPermissionTo('Dosya Yönetimi'))
        <div class="col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title text-center">Belge Yükleme</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"
                    action="{{ route('admin.department.folder.file.store',['department' => $department,'folder' => $folder]) }}">
                    @csrf
                    <div class="form-group">
                        <input id="filename" type="file" class="form-control" name="filename[]" value="{{ $folder->filename }}" autocomplete="filename" multiple>
        
                        @if ($folder->filename)
                            @foreach ($folder->filename as $file)
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
                        {{ __('Kaydet') }}
                    </button>
                    </form>
                </div>
            </div>
        </div>
        @endif
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