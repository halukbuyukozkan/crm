<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/')}}" class="mobile-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
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
                                    <a href="{{url('/')}}" class="logo logo-large"><img src="{{asset('img/logo.png')}}" class="img-fluid" alt="logo"></a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="searchbar">
                                    <form>
                                        <div class="input-group">
                                          <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                          <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2"><i class="ri-search-2-line"></i></button>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                      <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="live-icon">{{ Auth::user()->name}}</span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <a class="dropdown-item" href="#"><i class="ri-user-6-line"></i>My Profile</a>
                                            <a class="dropdown-item" href="#"><i class="ri-mail-line"></i>Email</a>
                                            <a class="dropdown-item" href="#"><i class="ri-settings-3-line"></i>Settings</a>
                                            <form action="{{ route('logout')}}" method="POST">
                                            @csrf
                                                <button class="dropdown-item text-danger"><i class="ri-shut-down-line"></i>Logout</button>
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
                        <li class="scroll dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ri-settings-2-fill"></i>Sistem</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.user.index') }}">Kullanıcılar</a></li>
                                <li><a href="{{ route('admin.role.index') }}">Roller</a></li>
                                <li><a href="{{ route('admin.permission.index') }}">Yetkiler</a></li>
                                <li><a href="{{ route('admin.department.index') }}">Departmanlar</a></li>
                                <li><a href="{{ route('admin.message.index') }}">Sistem Mesajları</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.about.index') }}"><i class="ri-file-info-line"></i></i>Hakkımızda</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.field.index') }}"><i class="ri-building-line"></i></i>Faaliyet Alanlarımız</a>
                        </li>
                        <li class="scroll dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ri-pages-line"></i>Ödeme Talepleri&Kasa İşlemleri</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.moneyrequest.index') }}">Ödeme Talepleri</a></li>
                                <li><a href="{{ route('admin.permission.index') }}">Kasa İşlemleri</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.about.index') }}"><i class="ri-checkbox-multiple-line"></i></i>Görevler</a>
                        </li>
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
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© 2020 Minaati - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>