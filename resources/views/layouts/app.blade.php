<!doctype html>
<html>
<head>
    <title></title>
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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=vietnamese' rel='stylesheet' type='text/css'>
{{--    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">--}}
{{--    <link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">--}}
    <!-- /fonts -->
    <!-- css -->
    <link href="{{asset('authen/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('authen/css/style.css')}}" rel='stylesheet' type='text/css' media="all"/>
    <!-- /css -->
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <p class="copyright w3l">
            <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-facebook"></i></a>
            <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-twitter"></i></a>
            <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-instagram"></i></a>
            <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-pinterest"></i></a>
            <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px" class="fa fa-linkedin"></i></a>
            <a href="{{route('login')}}"><strong style="margin-left: 20px">Đăng nhập</strong></a>
            <a href="{{route('register')}}"><strong style="margin-left: 20px">Đăng kí</strong></a>
        </p>
        <p class="copyright w3l">
            <a href="{{route('web.index')}}"><i style="margin-left: 20px">Trang chủ</i></a>
            <a href="{{route('web.category')}}"><i style="margin-left: 20px">Danh sách nhà</i></a>
            <a href="{{route('web.about_us')}}"><i style="margin-left: 20px">Về chúng tôi</i></a>
            <a href="{{route('web.comingSoon')}}"><i style="margin-left: 20px">Tin tức</i></a>
            <a href="{{route('web.contact')}}"><i style="margin-left: 20px">Hợp tác</i></a>
        </p>
        <hr>
    </div>
    <div class="col-md-12">
        <h1 class="w3ls">@yield('title')</h1>
        <div class="content-w3ls">
            <div class="content-agile1">
                <h2 class="agileits1">HomeStay</h2>
                <p class="agileits2">Sống theo phong cách của bạn</p>
            </div>
            <div class="content-agile2">
                @yield('content')
                <p class="wthree w3l">Đăng nhập nhanh với trang mạng xã hội của bạn</p>
                <ul class="social-agileinfo wthree2">
                    <li><a href="{{ url('/auth/redirect/facebook') }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{route('web.comingSoon')}}"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="{{route('web.comingSoon')}}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ url('auth/google') }}"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <p class="copyright w3l">© 2019 Được tạo ra bởi nhóm chị Dậu</p>

    </div>
</div>
</body>
</html>
