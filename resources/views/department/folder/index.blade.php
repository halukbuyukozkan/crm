@section('title') 
Dosyalar
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
                        <div class="col-md-10">
                            <h5 class="card-title">Dosyalar</h5>
                        </div>
                        @if(Auth::user()->hasPermissionTo('Dosya Yönetimi'))
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.department.folder.create',Auth::user()->department) }}"><button class="btn btn-primary">Dosya Oluştur</button></a>    
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Dosya adı</th>
                                <th>Departmanlar</th>
                                @if(Auth::user()->hasPermissionTo('Dosya Yönetimi'))
                                <th>İşlemler</th>
                                @endif
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($department->folders as $folder)
                                <tr>
                                    <td><a href="{{ route('admin.department.folder.show',['department' => $department,'folder' => $folder]) }}">{{ $folder->name }}</a></td>
                                    <td>
                                        @foreach($folder->departments as $department)
                                        {{ $department->name }} @if(!$loop->last) - @endif
                                        @endforeach
                                    </td>
                                    @if(Auth::user()->hasPermissionTo('Dosya Yönetimi'))
                                    <td style="width: 20%">
                                        <a href="{{ route('admin.department.folder.edit',['department' => $department, 'folder' => $folder]) }}"><button class="btn btn-sm btn-primary">
                                            <i class="ri-pencil-line"></i>
                                        </button></a>
                                        <form action="{{ route('admin.department.folder.destroy',['department' => $department, 'folder' => $folder]) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
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