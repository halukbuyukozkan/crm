@section('title') 
Goodssol Ailesi
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
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($sliders as $slider)
                                @if($loop->first)
                                <div class="carousel-item active">
                                @else
                                <div class="carousel-item">
                                @endif
                                    <img src="{{ asset('files/slider/' . $slider->image) }}" class="d-block w-100" alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title text-center">Doğum Günü</h6>
                        </div>
                    </div>
                </div>
                @if($users)
                <div class="card-body">
                    <div class="row">
                        <div class="text-center">
                            <img src="{{ asset('img/emptyprofile.png') }}" class="rounded-circle w-50" alt="...">
                            <h6 class="card-title text-center">{{ $users->first()->name }}</h6>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title">Doğum günleri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>İsim</th>
                                <th>Doğum günü</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users->take(4) as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}</td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
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