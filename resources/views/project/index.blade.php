@section('title') 
İş Detayı
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
                            <h5 class="card-title">Talepler</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.project.create') }}"><button class="btn btn-primary">Talep Oluştur</button></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Başlık</th>
                                <th>Oluşturan</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td><a href="{{ route('admin.project.show',$project) }}">{{ $project->name }}</a></td>
                                    <td>{{ $project->user->name }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>
                                        @if(Auth::user()->hasAnyPermission('Ödeme Talebi Kabul Etme') && !$project->transections->contains('status',$transectionstatuses[1]) && !$project->transections->contains('status',$transectionstatuses[2]))
                                        <form action="{{ route('admin.project.destroy', $project) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                        @elseif($project->user->id == Auth::user()->id && !$project->transections->contains('status',$transectionstatuses[1]) && !$project->transections->contains('status',$transectionstatuses[2]))
                                        <form action="{{ route('admin.project.destroy', $project) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
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