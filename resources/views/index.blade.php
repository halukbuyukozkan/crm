@section('title') 
CRM
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
        @if($message)
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title text-center">{{ $message->message }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row my-2">
        <div class="col-md-8">
            <img class="w-100" src="{{ asset('img/nopic.png') }}" alt="">
        </div>
        <div class="col-md-4">
            <img class="w-100" src="{{ asset('img/nopic.png') }}" alt="">
            <img class="w-100 mt-4" src="{{ asset('img/nopic.png') }}" alt="">
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
                @if($birthday)
                <div class="card-body">
                    <div class="row">
                        <div class="text-center">
                            <img src="{{ asset('img/emptyprofile.png') }}" class="rounded-circle w-50" alt="...">
                            <h6 class="card-title text-center">{{ $birthday->name }}</h6>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="accordion" id="accordionwithicon">
                <div class="card">
                    <div class="card-header" id="headingOneicon">
                        <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneicon" aria-expanded="true" aria-controls="collapseOneicon"><i class="ri-award-line mr-2"></i>Hakkımızda</button>
                        </h2>
                    </div>
                    <div id="collapseOneicon" class="collapse show" aria-labelledby="headingOneicon" data-parent="#accordionwithicon">
                        <div class="card-body">
                            <div class="mb-3">
                                Goodssol Gıda Sanayi A.Ş., distribütörü olduğu uluslarası şirketlerin ürünlerini 81 ilde 500’ün üzerinde noktaya satış ve dağıtım hizmeti vermesinin yanısıra, İş Geliştirme Departmanı ile route optimizasyonu ve P&L yönetimine ek olarak Pazarlama Departmanı ile Private Label markası yaratılması, marka konumlandırma stratejisi, pazar endex ve dağıtım kanallarının belirlenmesi, dijital pazarlama ve e-ticaret yönetimi konusunda da hizmet vermektedir.
                            </div>
                            <div class="mb-3">
                                Türkiye'deki lisans satış hakkına sahip olduğu Gloria Jean’s Coffes markasının "We Gloriosly Serve", "Gloria Jean’s Coffees To Go" iş modelleriyle hizmet veren Goodssol; lojistik, danışmanlık ve eğitim alanlarında da edinmiş olduğu tecrübeleri iş ortaklarına aktarmaktadır. Kahve kültürünün günden güne gelişmekte olduğu ülkemiz coğrafyasında, taze çekirdek, taze süt, mükemmel lezzet yol haritasını izleyerek Gloria Jeans Coffees kahve deneyimini perakende mağazaların açılamadığı alanlarda sunabilmek için çalışıyoruz.
                            </div>
                            <div>
                                Ayrıca T.C. Adalet Bakanlığı CTE Genel Müdürlüğü’ne bağlı tüm cezaevi ve İşyurtları’na Pepsi, Fritolay ve Doğadan ürünleri ile satış ve dağıtım hizmetini vermekteyiz.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwoicon">
                        <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoicon" aria-expanded="false" aria-controls="collapseTwoicon"><i class="ri-calendar-line mr-2"></i>Vizyon – Misyon</button>
                        </h2>
                    </div>
                    <div id="collapseTwoicon" class="collapse" aria-labelledby="headingTwoicon" data-parent="#accordionwithicon">
                        <div class="card-body">
                            <div class="mb-3">
                                Fırsatların ortaya çıkmasını beklemeden fırsatları yaratan bir kültüre sahibiz.
                            </div>
                            goods solutions for goodness 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThreeicon">
                        <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeicon" aria-expanded="false" aria-controls="collapseThreeicon"><i class="ri-drop-line mr-2"></i>Üst Yönetim</button>
                        </h2>
                    </div>
                    <div id="collapseThreeicon" class="collapse" aria-labelledby="headingThreeicon" data-parent="#accordionwithicon">
                        <div class="card-body">
                            <div class="mb-2">
                                BAŞKAN - Sercan UYSAL
                            </div>
                            <div class="mb-2">
                                YK ÜYESİ GENEL MÜDÜR - Ersin SANCAK 
                            </div>
                            <div class="mb-2">
                                YK ÜYESİ - Didem UYSAL
                            </div>
                            <div class="mb-2">
                                SATIŞ DİREKTÖRÜ - Bilgin ÖZTÜRK
                            </div>
                            <div class="mb-2">
                                MALİ ve İDARİ İŞLER DİREKTÖRÜ - Serhat KELEŞ
                            </div>
                            <div class="mb-2">
                                ÜRETİM ve PLANLAMA DİREKTÖRÜ
                            </div>
                            <div class="mb-2">
                                WGS DİREKTÖRÜ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-6 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Ödeme Talepleri</h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('admin.moneyrequest.create') }}"><button class="btn btn-primary">Ödeme Talebi Oluştur</button></a>    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>Başlık</th>
                                <th>Kullanıcı</th>
                                <th>İşlemler</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($moneyrequests as $request)
                                <tr>
                                    <td style="width: 40%">{{ $request->name }}</td>
                                    <td>{{ $request->user->name }}</td>
                                    <td style="width: 30%">
                                        @if($request->user->id == Auth::user()->id)
                                        <a href="{{ route('admin.moneyrequest.edit',$request) }}"><button class="btn btn-sm btn-primary">
                                            <i class="ri-pencil-line"></i>
                                        </button></a>
                                        <form action="{{ route('admin.moneyrequest.destroy', $request) }}" method="POST"
                                        class="d-inline-block" onsubmit="return confirm('Emin misiniz ?');">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                        @elseif(Auth::user()->hasRole('Başkan'))
                                        <a href="{{ route('admin.moneyrequest.edit',$request) }}"><button class="btn btn-sm btn-primary">
                                            <i class="ri-check-line"></i>
                                        </button></a>
                                        <a href="{{ route('admin.moneyrequest.edit',$request) }}"><button class="btn btn-sm btn-danger">
                                            <i class="ri-close-line"></i>
                                        </button></a>
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
        <div class="col-lg-6 my-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Ödeme Grafiği</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-bar-chart" class="chartjs-chart"></canvas>
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