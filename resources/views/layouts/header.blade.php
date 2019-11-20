<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 header-top-left">
                    <div class="row">
                        <div class="top-info">
                            @if(isset(Auth::user()->name))
                                <i class="fa fa-user-circle-o"></i>
                                {{ Auth::user()->name}}
                            @endif
                        </div>
                        <div class="top-info">
                            @if(isset(Auth::user()->email))
                                <i class="fa fa-envelope"></i>
                                {{Auth::user()->email}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 text-lg-right header-top-right">
                    <div class="top-social">
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-instagram"></i></a>
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-pinterest"></i></a>
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-outline-primary" href="{{route('house.create')}}"><b class="text text-light">Đăng
                                tin</b></a>
                    </div>
                    <div class="user-panel">                         <!-- Authentication Links -->
                        @guest
                            <div class="row">
                                <div class="col-lg-4">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                                <div class="col-lg-4">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   style="color: black">
                                    Đăng xuất
                                </a>
                                <a style="color: black" class="dropdown-item"
                                   href="{{route('user.profile',Auth::user()->id)}}">
                                    Thông tin cá nhân
                                </a>
                                <a style="color: black" class="dropdown-item"
                                   href="{{route('house.list',Auth::user()->id)}}">
                                    Nhà của tôi
                                </a>
                                @if(Auth::user()->admin == 1)
                                    <a style="color: black" class="dropdown-item"
                                       href="{{route('admin.index',Auth::user()->id)}}">
                                        Trang Admin
                                    </a>
                                @endif

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-navbar">
                    <a href="{{route('web.index')}}" class="site-logo"><img src="{{asset('img/logo.png')}}"></a>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                    <ul class="main-menu">
                        <li><a href="{{route('web.index')}}">Trang chủ</a></li>
                        <li><a href="{{route('web.category')}}">Danh sách nhà</a></li>
                        <li><a href="{{route('web.about_us')}}">Về chúng tôi</a></li>
                        <li><a href="{{route('web.comingSoon')}}">Tin tức</a></li>
                        <li><a href="{{route('web.contact')}}">Hợp tác</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
