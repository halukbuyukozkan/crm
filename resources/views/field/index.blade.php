
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
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneicon" aria-expanded="true" aria-controls="collapseOneicon"><i class="ri-award-line mr-2"></i>Ceza İnfaz Kurumları</button>
                                </h2>
                            </div>
                            <div id="collapseOneicon" class="collapse show" aria-labelledby="headingOneicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                    <div class="mb-3">
                                        Goodssol 81 ilde T.C. Adalet Bakanlığı CTE Genel Müdürlüğü’ne bağlı 500'den fazla cezaevi ve İşyurtları’na ek olarak 10 ilde 12 Jandarma birliğine bağlı Javdes satış noktasına Pepsi, Fritolay ve Doğadan ürünleri ile satış ve dağıtım hizmeti vermektedir.
                                        http://goodssol.com.tr/isyurt.html
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwoicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoicon" aria-expanded="false" aria-controls="collapseTwoicon"><i class="ri-calendar-line mr-2"></i>VWGS</button>
                                </h2>
                            </div>
                            <div id="collapseTwoicon" class="collapse" aria-labelledby="headingTwoicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                    <div class="mb-2">
                                        ‘’We Gloriously Serve’’ (WGS) Gloria Jean’s Coffees deneyimini misafirleri ile paylaşmak isteyen Plaza, Hastahane, Okul, Hotel vb. lokasyonlar için, otomatik kahve makineleri veya barista destekli kahve makineleri ile sunan bir platformdur. Bu platformun Türkiye lisans yetkilisi Goodssol Gıda Sanayi A.Ş.’dir.
                                    </div>
                                    <div class="mb-2">
                                        ‘’We Gloriously Serve’’ (WGS) hizmetinin amacı, yok sayılmayacak bir kahve tüketimi ve aynı zamanda kaliteli kahveye talep olan; ancak perakende bir mağaza açacak kadar potansiyeli olmayan ve/veya stratejik olarak Gloria Jean’s Coffees markasının bulunması yönünde anlaşma sağlanmış satış kanallarında iş ortakları ile birlikte karlı ve sürdürülebilir çözümler sunmaktır.
                                    </div>
                                    <div class="mb-2">
                                        Bu kapsamda Goodssol Gıda Sanayi A.Ş. bünyesinde bulunan uzman ekipler tarafından yeni kurulacak olan tüm Gloria Jean’s Coffees platformlarının uçtan uca bütün süreçleri yönetilip denetlenmektedir. Kuruluş için ihtiyaç duyulan ürün, ekipman ve eğitim desteği tarafımızdan ’We Gloriously Serve’’ (WGS) hizmeti ile sunulmaktadır.
                                    </div>
                                    <div class="mb-2">
                                        Yenilikçi We Gloriously Serve çözümü ile Gloria Jean’s Coffees’in tutkunlarına perakende mağaza çözümüyle ulaşılamadığı noktalarda aynı standart ve lezzette bir Gloria Jean’s Coffees deneyimi yaratmak amacıyla; baristalar Americano ve Cafè Latte gibi Espresso bazlı klasiklerden buzlu içeceklere, imzalı ürünlere kadar uzanan mükemmel Gloria Jean’s Coffees içeceklerini sunmaları için ekiplerimizce eğitilmektedir.
                                    </div>
                                    <div class="mb-2">
                                        WGS hizmeti ile Small, Medium ve Large bardak boylarıyla kusursuz reçetelerle hazırlanan geniş kapsamlı sıcak ve soğuk içecek yelpazesine sahip olan Gloria Jean’s Coffees ürünlerinin misafirlere ulaşması sürecindeki bütün lojistik faaliyetler, eğitimler ve süreç yönetimi Goodssol Gıda Sanayi A.Ş. tarafından sağlanmaktadır.
                                    </div>
                                        http://goodssol.com.tr/wgs.html
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThreeicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeicon" aria-expanded="false" aria-controls="collapseThreeicon"><i class="ri-drop-line mr-2"></i>OTG</button>
                                </h2>
                            </div>
                            <div id="collapseThreeicon" class="collapse" aria-labelledby="headingThreeicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                    <div class="mb-2">
                                        ‘’On The Go” (OTG), Gloria Jean’s Coffees deneyimini, yakıt istasyonları, lobiler, market alanları vb. lokasyonlarda, hem tezgah üstü hem de bağımsız olarak kullanabilen otomatik kahve makineleri ile misafirlere sunulmasını sağlayan bir platformdur.
                                        Gloria Jean’s Coffees On The Go (OTG) hizmeti ile kaliteli kahveye talep olan lokasyonlarda birinci sınıf self- servis çözümü ile tam otomatik espresso makineleri sayesinde taze kahve çekirdekleri ve taze süt ile en popüler Gloria Jeans Coffees sıcak içecek yelpazesini misafirlere sunulması sağlanmaktadır.
                                    </div>
                                    <div class="mb-2">
                                        Goodssol Gıda Sanayi A.Ş. olarak bu süreçte; uzman ekiplerimiz tarafından yeni kurulacak olan Gloria Jean’s Coffees On The Go (OTG) platformlarının uçtan uca bütün süreçleri yönetilip denetlenmektedir. Kuruluş için ihtiyaç duyulan ürün, ekipman ve eğitim desteği tarafımızdan sağlanmaktadır.
                                        Bu kapsamda otomatik kahve makinelerini, Americano ve Cafè Latte gibi Espresso bazlı klasik sıcak Gloria Jean’s Coffees içeceklerini sunmaları için ayarlıyoruz. Small ve Medium bardak boylarıyla kusursuz Gloria Jean’s Coffees reçetesiyle hazırlanan bu içecekleri misafirlere sunabilmek için, işletmenin için ihtiyaç duyduğunuz tüm ürün, ekipman ve eğitim desteğini sağlıyoruz.
                                    </div>
                                    <div class="mb-2">
                                        http://goodssol.com.tr/otg.html
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThreeicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFouricon" aria-expanded="false" aria-controls="collapseThreeicon"><i class="ri-drop-line mr-2"></i>RTD</button>
                                </h2>
                            </div>
                            <div id="collapseFouricon" class="collapse" aria-labelledby="headingThreeicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                    <div class="mb-2">
                                        Tüm dünyada tüketicilerin soğuk kahve tercihlerinde önemli bir yerde olan Gloria Jeans Coffees markası taze süt ve gerçek kahve çekirdekleriyle hazırladığı, içerisinde imzalı ürünlerinin de yer aldığı soğuk kahveleri ile birlikte Türkiye pazarına da kendi dokunuşlarını yapmaktadır.
                                        Cafe Latte, Cold Brew, Very Vanilla Latte, White Chocolate Mocha ve Very Vanilla olarak 5 farklı eşsiz lezzete sahip alternatifi misafirlerin damak tadını süslemek için Gloria Jean’s Coffees ile birlikte soğuk içecek çözüm ortağı olarak geliştirdik.
                                        Bu alanda Gloria Jean’s Coffees için Türkiye’deki tek yetkili olan Goodssol Gıda Sanayi A.Ş. soğuk kahve tercih edenlerin çözüm ortağı olmak için çalışmalarını sürdürmekteyiz.
                                    </div>
                                    <div class="mb-2">
                                        http://goodssol.com.tr/otg.html
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFiveicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveicon" aria-expanded="false" aria-controls="collapseThreeicon"><i class="ri-drop-line mr-2"></i>Üretim</button>
                                </h2>
                            </div>
                            <div id="collapseFiveicon" class="collapse" aria-labelledby="headingThreeicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSixicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixicon" aria-expanded="false" aria-controls="collapseSixicon"><i class="ri-drop-line mr-2"></i>Perakende</button>
                                </h2>
                            </div>
                            <div id="collapseSixicon" class="collapse" aria-labelledby="headingThreeicon" data-parent="#accordionwithicon">
                                <div class="card-body">
                                    <div class="mb-2">
                                        Goodssol Gıda Sanayi A.Ş., Gloria Jean’s Coffees “We Gloriously Serve’’ ve ‘’Gloria Jean’s Coffees On The Go” hizmetleri ile elde etmiş olduğu deneyimi, bünyesinde bulundurduğu Gloria Jean’s Coffees Cennet ve Gloria Jean’s Coffees The Land of Legends şubelerinde kendi misafirlerine sunmaktadır.
                                    </div>
                                    <div class="mb-2">
                                        Gloria Jean’s Coffees The Land of Legends şubemiz Antalya’nın en büyük ve en kapsamlı eğlence mekanlarından biri olan The Land of Legends’ın içerisinde gerek konum gerekse atmosferi açısından hem eğlence hem de eşsiz bir kahve deneyimi yaşamak isteyen yerli ve yabancı misafirlerimize hizmet veren şubemizde yazın soğuk içecek çeşitliliği kışın ise sıcak içecek çeşitliliği ile her yaş gurubuna hitap eden özel içecekler ile beraber yiyecek deneyimi yaşatmak için baristalarımız her zaman standart ve hızlı servis vermektedir.
                                    </div>
                                    <div class="mb-2">
                                        Gloria Jean’s Coffees Cennet şubemiz, İstanbul-Küçükçekmece’de Florya metrobüs durağı yanında, E5 yan yolda bulunmaktadır. Şubemiz özellikle yoğun trafik saatlerinde geniş ve rahat bir ortamda vakit geçirip şehrin sakin zamanlarını bekleyen, okul ortamından sıkılan ve farklı alanlarda çalışma ortamı arayan misafirlerimize iyi bir hizmet sunabilmek için günün her saati içecek ve yiyeceklerini alabileceği, kahvelerini yudumlarken güzel vakit geçirebilecekleri bir atmosfere sahiptir.
                                    </div>
                                    <div class="mb-2">
                                        http://goodssol.com.tr/perakende.html
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSevenicon">
                                <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenicon" aria-expanded="false" aria-controls="collapseSevenicon"><i class="ri-drop-line mr-2"></i>E-ticaret</button>
                                </h2>
                            </div>
                            <div id="collapseSevenicon" class="collapse" aria-labelledby="headingSevenicon" data-parent="#accordionwithicon">
                                <div class="card-body">
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

