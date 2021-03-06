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
                <div class="col-lg-6 text-lg-right header-top-right">
                    <div class="top-social">

                        {{--                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-facebook"></i></a>--}}
                        {{--                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-twitter"></i></a>--}}
                        {{--                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-instagram"></i></a>--}}
                        {{--                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-pinterest"></i></a>--}}
                        {{--                        @if(Auth::check())--}}
                        {{--                            <a id="navbarDropdown" class="" href="#" role="button"--}}
                        {{--                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i--}}
                        {{--                                    class="fa fa-bell"></i><span class="badge badge-danger"--}}
                        {{--                                                                 id="count-notification"><span--}}
                        {{--                                        class="caret"> {{count(\Illuminate\Support\Facades\Auth::user()->unreadNotifications)}}</span></span><span--}}
                        {{--                                    class="caret"></span></a>--}}
                        {{--                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                        {{--                                @if(auth()->user()->unreadNotifications->count())--}}
                        {{--                                    @foreach(auth()->user()->unreadNotifications as $notification)--}}
                        {{--                                        <a class="dropdown-item" href="{{route('house.list')}}">--}}
                        {{--                                            {{$notification->data['name']}} đã thuê phòng có--}}
                        {{--                                            id {{$notification->data['house_id']}}--}}
                        {{--                                        </a>--}}
                        {{--                                    @endforeach--}}
                        {{--                                @else--}}
                        {{--                                    <a class="dropdown-item" href="#">--}}
                        {{--                                        No notification--}}
                        {{--                                    </a>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}

                        {{--                        @endif--}}
                        {{--                        <a class="btn btn-outline-primary" href="{{route('house.create')}}"><b--}}
                        {{--                                class="text text-light">Đăng--}}
                        {{--                                tin</b></a>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="user-panel">--}}
                        {{--                        <!-- Authentication Links -->--}}
                        {{--=======--}}
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{route('web.comingSoon')}}"><i class="fa fa-instagram"></i></a>
                        @if(Auth::check())
                            <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="fa fa-bell"></i>
                                @if(count(Auth::user()->unreadNotifications) > 0)
                                    <span
                                        class="badge badge-primary">{{count(Auth::user()->unreadNotifications)}}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if(count(Auth::user()->unreadNotifications) == 0)
                                    <li class="dropdown-item" style="text-align: center">Bạn không có thông báo mới!</li>
                                @endif
                                @foreach(Auth::user()->unreadNotifications as $notification)
                                    <li class="dropdown-item">
                                            <a style="color:black;"
                                               href="{{route('house.list')}}"><strong>{{$notification->data['customer']}}</strong><br>
                                                đã đặt thuê <strong>{{$notification->data['house']}}</strong>
                                                có giá là <strong>{{number_format($notification->data['price'])}}
                                                    đồng</strong>
                                                {{$notification->markAsRead()}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif <a class="btn btn-outline-primary" href="{{route('house.create')}}"><b
                                class="text text-light">Đăng
                                tin</b></a>
                    </div>
                    <div class="user-panel">
                        @guest
                            <div class="row">

                                <a class="nav-link" href="{{ route('login') }}">Đăng nhập </a>


                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Đăng ký </a>
                                @endif

                            </div>
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a style="color: black" class="dropdown-item"
                                   href="{{route('user.profile')}}">
                                    <i class="fa fa-user-circle-o"></i>
                                    Thông tin cá nhân
                                </a>
                                <a style="color: black" class="dropdown-item"
                                   href="{{route('house.list')}}">
                                    <i class="fa fa-institution"></i>
                                    Nhà của tôi
                                </a>
                                @if(Auth::user()->admin == 1)
                                    <a style="color: black" class="dropdown-item"
                                       href="{{route('admin.index')}}">
                                        <i class="fa fa-drivers-license-o"></i>
                                        Trang Admin
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   style="color: black">
                                    <i class="fa fa-power-off"></i>
                                    Đăng xuất
                                </a>
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
