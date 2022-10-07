@section('title') 
Ödeme Talepleri
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
                        <div class="col-md-6">
                            <h5 class="card-title">{{ $project->name }} Ödeme Talepleri</h5>
                            <span>Bakiye: {{$project->total}}</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('admin.project.transection.create',$project) }}"><button class="btn btn-primary">Avans Talebi Oluştur</button></a> 
                            <a href="{{ route('admin.costtransection',$project) }}"><button class="btn btn-primary">Masraf Talebi Oluştur</button></a>    
                            <a href="{{ route('admin.returntransection',$project) }}"><button class="btn btn-primary">İade Talebi Oluştur</button></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Onaylayan</th>
                                <th>Kategori</th>
                                <th>Tip</th>
                                <th>Kullanıcı</th>
                                <th>Miktar</th>
                                <th>Onay Durumu</th>
                                <th>Eylemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if($transections)
                                    @forelse ($transections as $transection)
                                    <tr>
                                        <td style="width: 40%">{{ $transection->payer ? $transection->payer : '-' }}</td>
                                        <td>-</td>
                                        <td>{{ $transection->type->value }}</td>
                                        <td>{{ $transection->project->user->name }}</td>
                                        <td>{{ $transection->price }}</td>
                                        <td>{{ $transection->status->value }}</td>
                                        <td>
                                            @if(Auth::user()->hasAnyPermission('Ödeme Talebi Kabul Etme'))
                                            @if($transection->status->value == 'beklemede')
                                            <form action="{{ route('admin.transectionapprove',['transection' => $transection]) }}" method="POST"
                                            class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                            @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="ri-check-line"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.transectionreject',['transection' => $transection]) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </form>                                     
                                            <form action="{{ route('admin.project.transection.destroy',['project' => $project,'transection' => $transection]) }}" method="POST"
                                            class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                            @endif

                                            @if($transection->status->value == 'tamamlandı')
                                            <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="ri-arrow-go-back-line"></i>
                                                </button>
                                            </form>
                                            @endif

                                            @if($transection->status->value == 'iptal edildi')
                                            <form action="{{ route('admin.project.transection.destroy',['transection' => $transection,'project' => $project]) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                            </form>
                                            <form action="{{ route('admin.transectionreverse',['transection' => $transection,'project' => $project]) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="ri-arrow-go-back-line"></i>
                                                </button>
                                            </form>                                          
                                            @endif
                                        @endif

                                        @if(Auth::user()->hasAnyPermission('Ödeme Gerçekleştirme'))
                                            @if($transection->status->value == 'onaylandı')
                                                @if($transection->type->value == 'Masraf Talebi')
                                                <a href="{{ route('admin.transectionPayBack',['project' => $transection->project,'transection' => $transection]) }}">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-check-double-line"></i>
                                                    </button>
                                                </a>
                                                @else
                                                <form action="{{ route('admin.transectioncomplete',['transection' => $transection,'project' => $project]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-check-double-line"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                    
                                            
                                                <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-arrow-go-back-line"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($transection->status->value == 'tamamlandı')
                                            <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="ri-arrow-go-back-line"></i>
                                                </button>
                                            </form>
                                            @endif
                                        @endif
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                @endif
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