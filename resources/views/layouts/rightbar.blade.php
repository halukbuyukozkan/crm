<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/dashboard')}}" class="mobile-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                    <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger navbar-toggle bg-transparent" href="javascript:void();" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="true">
                                    <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                    <i class="ri-close-line menu-hamburger-close"></i>
                                </a>
                             </div>
                        </li>                                
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container-fluid">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="logobar">
                                    <a href="{{url('/dashboard')}}" class="logo logo-large"><img src="{{asset('img/logo.png')}}" class="img-fluid" alt="logo"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="notifybar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-notification-line"></i>
                                        <span class="live-icon"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                            <div class="notification-dropdown-title">
                                                <h5>{{ __('Notification') }}<a href="#">{{ __('Clear all') }}</a></h5>                            
                                            </div>
                                            <ul class="list-unstyled">    
                                                @foreach($notifications->take(5) as $notification)                                                
                                                <li class="media dropdown-item">
                                                    <span class="action-icon badge badge-primary">
                                                        @if($notification->data['category'] == 'job')
                                                        <i class="ri-task-line"></i>
                                                        @elseif($notification->data['category'] == "transection")
                                                        <i class="ri-add-circle-line"></i>
                                                        @elseif($notification->data['category'] == "dayoff")
                                                        <i class="ri-calendar-check-line"></i>
                                                        @endif
                                                    </span>
                                                    <div class="media-body">
                                                        @if(request()->routeIs('admin.job.*'))
                                                        <a href="{{ route('admin.job.index') }}">
                                                        @else
                                                        <a href="#">
                                                        @endif                        
                                                        <h5 class="action-title">{{ __($notification->data['category']) }}</h5>
                                                        <p><span class="timing">{{ __($notification->data['name']) }}  {{ __($notification->data['message']) }}</span></p> 
                                                        </a>   
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="notification-dropdown-footer">
                                                <h5><a href="{{ route('admin.notification') }}">See all</a></h5>                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>   
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                      <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="live-icon">{{ Auth::user()->name}}</span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <form action="{{ route('logout')}}" method="POST">
                                            @csrf
                                                <button class="dropdown-item text-danger"><i class="ri-shut-down-line"></i>Çıkış Yap</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>                                   
                            </li>
                            <li class="list-inline-item menubar-toggle">
                                <div class="menubar">
                                    <a class="menu-hamburger navbar-toggle bg-transparent" href="javascript:void();" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="true">
                                        <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                        <i class="ri-close-line menu-hamburger-close"></i>
                                    </a>
                                 </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div> 
            <!-- End row -->
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Navigationbar -->
    <div class="navigationbar">
        <!-- Start container-fluid -->
        <div class="container-fluid">
            <!-- Start Horizontal Nav -->
            <nav class="horizontal-nav mobile-navbar fixed-navbar">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="horizontal-menu">
                        <li>
                            <a href="{{ route('admin.front.index') }}"><i class="ri-file-info-line"></i></i>Anasayfa</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.about.index') }}"><i class="ri-file-info-line"></i></i>Hakkımızda</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.field.index') }}"><i class="ri-building-line"></i></i>Faaliyetlerimiz</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.goodssol') }}"><i class="ri-file-info-line"></i></i>Goodssol Ailesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.department.folder.index',Auth::user()->department) }}"><i class="ri-pages-line"></i>Dosyalar</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.job.index') }}"><i class="ri-checkbox-multiple-line"></i></i>Görevler</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.project.index') }}"><i class="ri-checkbox-multiple-line"></i></i>Talepler</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.user.dayoff.index',Auth::user()) }}"><i class="ri-checkbox-multiple-line"></i></i>İzinler</a>
                        </li>
                        @if(Auth::user()->hasAnyPermission('Sistem Yönetimi'))
                        <li class="scroll dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ri-settings-2-fill"></i>Sistem</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.user.index') }}">Kullanıcılar</a></li>
                                <li><a href="{{ route('admin.role.index') }}">Roller</a></li>
                                <li><a href="{{ route('admin.permission.index') }}">Yetkiler</a></li>
                                <li><a href="{{ route('admin.department.index') }}">Departmanlar</a></li>
                                <li><a href="{{ route('admin.message.index') }}">Sistem Mesajları</a></li>
                                <li><a href="{{ route('admin.information.index') }}">Sistem Haberler</a></li>
                                <li><a href="{{ route('admin.slider.index') }}">Slider</a></li>
                            </ul>
                        </li>  
                        @endif
                    </ul>
                </div>
            </nav>
            <!-- End Horizontal Nav -->
        </div>
        <!-- End container-fluid -->
    </div>
    <!-- End Navigationbar -->
    <!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">

            </div>
        </div>          
    </div>
    <!-- End Breadcrumbbar -->  
    <div class="container">
        <div class="row">
            <div class="col">
                @include('layouts.alerts')
            </div>
        </div>    
    </div> 

    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© 2020 Minaati - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>