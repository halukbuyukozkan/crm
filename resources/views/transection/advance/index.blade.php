@section('title') 
Avans Talepleri
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
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('admin.transection.create',['project' => $project,'type' => $transectiontypes[0]]) }}"><button class="btn btn-primary">Avans Talebi Oluştur</button></a> 
                            <a href="{{ route('admin.transection.create',['project' => $project,'type' => $transectiontypes[1]]) }}"><button class="btn btn-primary">Masraf Talebi Oluştur</button></a> 
                            <a href="{{ route('admin.transection.create',['project' => $project,'type' => $transectiontypes[2]]) }}"><button class="btn btn-primary">İade Talebi Oluştur</button></a> 
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>İsim</th>
                                <th>Onaylayan</th>
                                <th>Kategori</th>
                                <th>Tip</th>
                                <th>Talep Eden</th>
                                <th>Miktar</th>
                                <th>Onay Durumu</th>
                                <th>Eylemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if($transections)
                                    @forelse ($transections as $transection)
                                    <tr>
                                        <td><a href="{{ route('admin.project.transection.show',['project' => $project,'transection' => $transection]) }}">{{ $transection->name }}</a></td>
                                        <td style="width: 20%">{{ $transection->payer ? $transection->payer : '-' }}</td>
                                        <td>{{ $transection->transection_category ? $transection->transection_category->name : '-' }}</td>
                                        <td>{{ $transection->type->value }}</td>
                                        <td>{{ $transection->project->user->name }}</td>
                                        <td>{{ $transection->price }}</td>
                                        <td>{{ $transection->status->value }}</td>
                                        <td style="width: 18%">
                                            
                                        <!-- MASRAF VE İADE -->
                                        @if($transection->type->value == $transectiontypes[1]->value || $transection->type->value == $transectiontypes[2]->value || $transection->type->value == $transectiontypes[3]->value)
                                            <!-- BEKLEMEDE -->
                                            @if($transection->status->value == 'beklemede' && $transection->project->user->id != Auth::user()->id)
                                                <!-- Ödeme Gerçekleştirme Yetkisi -->
                                                @if(Auth::user()->hasAnyPermission('Ödeme Talebi Kabul Etme') || Auth::user()->hasAnyPermission('Yetkili Ödeme Talep Kabul Etme' ))
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
                                                    <!-- Ödeme Gerçekleştirme Yetkisi END -->
                                                @elseif($transection->project->user->id == Auth::user()->id)
                                                    <form action="{{ route('admin.project.transection.destroy',['project' => $project,'transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <!-- BEKLEMEDE END -->
                                            <!-- ONAYLANDI -->
                                            @if($transection->status->value == 'onaylandı')
                                                @if(Auth::user()->hasAnyPermission('Muhasebe Ödeme Gerçekleştirme'))
                                                    <form action="{{ route('admin.transectionaccounting',['transection' => $transection,'project' => $project]) }}" method="POST"
                                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="ri-check-double-line"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="ri-arrow-go-back-line"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <!-- ONAYLANDI END -->
                                            <!-- MUHASEBE ONAYI -->
                                            @if($transection->status->value == 'muhasebe onayı')
                                                @if(Auth::user()->hasAnyPermission('Ödeme Gerçekleştirme'))
                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Ödeme Yap</button>
                                                <!-- MODAL -->
                                                <form method="post" action="{{ route('admin.transectionamount',$transection) }}" id="form">
                                                    @csrf
                                                <!-- Modal -->
                                                <div class="modal" tabindex="-1" role="dialog" id="myModal">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger" style="display:none"></div>
                                                        <div class="modal-header">
                                                            
                                                            <h5 class="modal-title">Ödeme miktarı</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                <label for="price">Miktar:</label>
                                                                <input type="number" class="form-control" name="price" id="name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                <!-- MODAL END -->
                                                @endif
                                                @if(Auth::user()->hasAnyPermission('Muhasebe Ödeme Gerçekleştirme'))
                                                <form action="{{ route('admin.transectionreverse',['project' => $project,'transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-arrow-go-back-line"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            @endif
                                            <!-- MUHASEBE ONAYI END -->
                                            <!-- TAMAMLANDI -->
                                            @if($transection->status->value == 'tamamlandı')
                                                @if(Auth::user()->hasAnyPermission('Muhasebe Ödeme Gerçekleştirme'))
                                                    <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-arrow-go-back-line"></i>
                                                    </button>
                                                    </form>
                                                @elseif(Auth::user()->hasAnyPermission('Ödeme Gerçekleştirme'))
                                                    <form action="{{ route('admin.project.transection.destroy',['transection' => $transection,'project' => $project]) }}" method="POST"
                                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <!-- TAMAMLANDI END -->
                                            <!-- İPTAL -->
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
                                            <!-- İPTAL END -->
                                        @endif
                                        <!-- AVANS KAPATMA VE İADE END -->

                                        <!-- AVANS -->
                                        @if($transection->type->value == $transectiontypes[0]->value)
                                            <!-- BEKLEMEDE -->
                                            @if($transection->status->value == 'beklemede')
                                                <!-- Ödeme Gerçekleştirme Yetkisi -->
                                                @if(Auth::user()->hasAnyPermission('Ödeme Talebi Kabul Etme') || Auth::user()->hasAnyPermission('Yetkili Ödeme Talep Kabul Etme' ))
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
                                                    <!-- Ödeme Gerçekleştirme Yetkisi END -->
                                                @elseif($transection->project->user->id == Auth::user()->id)
                                                    <form action="{{ route('admin.project.transection.destroy',['project' => $project,'transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <!-- BEKLEMEDE END -->
                                            <!-- ONAYLANDI -->
                                            @if($transection->status->value == 'onaylandı')
                                                @if(Auth::user()->hasAnyPermission('Ödeme Gerçekleştirme'))
                                                <form action="{{ route('admin.transectioncomplete',['transection' => $transection,'project' => $project]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-check-double-line"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-arrow-go-back-line"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            @endif
                                            <!-- ONAYLANDI END -->
                                            <!-- TAMAMLANDI -->
                                            @if($transection->status->value == 'tamamlandı')
                                                @if(Auth::user()->hasAnyPermission('Ödeme Gerçekleştirme'))
                                                    <form action="{{ route('admin.transectionreverse',['transection' => $transection]) }}" method="POST"
                                                    class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="ri-arrow-go-back-line"></i>
                                                    </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <!-- TAMAMLANDI END -->
                                        @endif
                                        <!-- AVANS END -->
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