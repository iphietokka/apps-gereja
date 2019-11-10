  <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex flex-wrap align-items-center justify-content-between">
                            <!-- Top Header Meta -->
                            <div class="top-header-meta d-flex flex-wrap">
                                <a href="#" class="open" data-toggle="tooltip" data-placement="bottom" title="10 Am to 6 PM"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>Jam Pelayanan - 10 Am to 6 PM</span></a>
                              
                            </div>
                            <!-- Top Header Meta -->
                            <div class="top-header-meta">
                                @if ($gereja)
                                @foreach ($gereja as $company_social)
                                <a href="mailto:info.deercreative@gmail.com" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span>info.deercreative@gmail.com</span></a>
                                <a href="#" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <span>{{$company_social->no_telp}}</span></a>
                                 @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Top Header Area ***** -->

        <!-- ***** Navbar Area ***** -->
        <div class="crose-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="croseNav">

                        <!-- Nav brand -->
                    <a href="{{url('/')}}" class="nav-brand"><img src="{{ asset('frontend/img/core-img/logo.png') }}" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{ route('home-kegiatan') }}">Kegiatan</a></li>
                                    <li><a href="{{ route('home-berita') }}">Berita</a></li>
                                     <li><a href="{{ route('home-warta') }}">Warta Jemaat</a></li>
                                     @if (Route::has('login'))
                                    @auth
                                    <li><a href="{{url('home')}}">Beranda</a></li>
                                    @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endauth
                                    @endif
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- ***** Navbar Area ***** -->
    </header>