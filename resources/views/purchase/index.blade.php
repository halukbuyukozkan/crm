@section('title') 
Satın Alma
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
                            <h5 class="card-title">Satın Alma</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.purchase.create') }}"><button class="btn btn-primary">Satın Alma Oluştur</button></a>    
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
                                <th>Fiyat</th>
                                <th>Onay durumu</th>
                                <th>İşlemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->name }}</td>
                                    <td>{{ $purchase->user->name }}</td>
                                    <td>{{ $purchase->price }}</td>
                                    <td>{{ $purchase->is_approved == 0 ? 'Beklemede' : 'Onaylandı' }}</td>
                                    <td>
                                        @if(Auth::user()->hasPermissionTo('Satın Alma'))
                                        <form action="{{ route('admin.purchaseapprove',['purchase' => $purchase]) }}" method="POST"
                                            class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                            @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    @if($purchase->is_approved != 1)<i class="ri-check-line"></i>@else<i class="ri-arrow-go-back-line"></i>@endif
                                                </button>
                                        </form>
                                        @endif
                                        @if(Auth::user()->hasPermissionTo('Satın Alma') || Auth::user()->id == $purchase->user_id)
                                            @if(($purchase->is_approved != 1 && $purchase->is_approved != 1))
                                                <form action="{{ route('admin.purchase.destroy', $purchase) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                            @endif
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
        {{ $purchases->links() }}
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