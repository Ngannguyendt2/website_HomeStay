{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
    <title>Official Signup Form Flat Responsive widget Template :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon"/>

    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <!-- /fonts -->
    <!-- css -->
    <link href="{{asset('authen/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('authen/css/style.css')}}" rel='stylesheet' type='text/css' media="all"/>
    <!-- /css -->
</head>
<body>
<div class="container">
    <p class="copyright w3l">
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-facebook"></i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-twitter"></i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-instagram"></i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-pinterest"></i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-linkedin"></i></a>
        <a href="{{route('login')}}"><strong style="margin-left: 20px; color: firebrick">Đăng nhập</strong></a>
        <a href="{{route('register')}}"><strong style="margin-left: 20px; color: firebrick ">Đăng kí</strong></a>
    </p>
    <p class="copyright w3l">
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px">Trang chủ</i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px">Danh sách nhà</i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px">Về chúng tôi</i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px">Tin tức</i></a>
        <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px">Hợp tác</i></a>
    </p>
    <hr>
    <h1 class="w3ls">Official Signup Form</h1>
    <div class="content-w3ls">
        <div class="content-agile1">
            <h2 class="agileits1">Official</h2>
            <p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="content-agile2">

            @yield('content')

            <p class="wthree w3l">Fast Signup With Your Favourite Social Profile</p>
            <ul class="social-agileinfo wthree2">
                <li><a href="{{route('web.comingSoon')}}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{route('web.comingSoon')}}"><i class="fa fa-youtube"></i></a></li>
                <li><a href="{{route('web.comingSoon')}}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <p class="copyright w3l">© 2017 Official Signup Form. All Rights Reserved | Design by <a
                href="https://w3layouts.com/"
                target="_blank">W3layouts</a>
    </p>
</div>
</body>
</html>