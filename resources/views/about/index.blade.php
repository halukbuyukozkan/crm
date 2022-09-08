
@section('title') 
Yetkiler
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
                <div class="card-body">
                    <div class="accordion" id="accordionwithicon">
                        <div class="card">
                            <div class="card-header" id="headingOneicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneicon" aria-expanded="true" aria-controls="collapseOneicon"><i class="ri-award-line mr-2"></i>Hakkımızda</button>
                                </h2>
                            </div>
                            <div id="collapseOneicon" class="collapse show" aria-labelledby="headingOneicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                    <div class="my-3">
                                        Goodssol Gıda Sanayi A.Ş., distribütörü olduğu uluslarası şirketlerin ürünlerini 81 ilde 500’ün üzerinde noktasına satış ve dağıtım hizmeti vermesinin yanısıra, İş Geliştirme Departmanı ile route optimizasyonu ve P&L yönetimine ek olarak Pazarlama Departmanı ile Private Label markası yaratılması , konumlandırma stratejisi, pazar endex ve dağıtım kanallarının belirlenmesi, dijital pazarlama ve e-ticaret yönetimi konusunda da hizmet vermektedir. <br>
                                    </div>
                                    <div class="my-3">
                                        Türkiye'deki lisans satış hakkına sahip olduğu Gloria Jean’s Coffes markasının "We Gloriosly Serve", "Gloria Jean’s Coffees To Go" iş modelleriyle hizmet veren Goodssol, lojistik, danışmanlık ve eğitim alanlarında da edinmiş olduğu tecrübeleri sizlere aktarmaktadır. Kahve kültürünün günden güne gelişmekte olduğu ülkemiz coğrafyasında, taze çekirdek, taze süt, mükemmel lezzet yol haritasını izleyerek Gloria Jeans Coffees kahve deneyimini perakende mağazaların açılamadığı alanlarda sunabilmek için çalışıyoruz. <br>
                                    </div>
                                    Ayrıca T.C. Adalet Bakanlığı CTE Genel Müdürlüğü’ne bağlı tüm cezaevi ve İşyurtları’na Pepsi, Fritolay ve Doğadan ürünleri ile satış ve dağıtım hizmetini vermekteyiz.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwoicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoicon" aria-expanded="false" aria-controls="collapseTwoicon"><i class="ri-calendar-line mr-2"></i>Second title goes here</button>
                                </h2>
                            </div>
                            <div id="collapseTwoicon" class="collapse" aria-labelledby="headingTwoicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThreeicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeicon" aria-expanded="false" aria-controls="collapseThreeicon"><i class="ri-drop-line mr-2"></i>Third title goes here</button>
                                </h2>
                            </div>
                            <div id="collapseThreeicon" class="collapse" aria-labelledby="headingThreeicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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

