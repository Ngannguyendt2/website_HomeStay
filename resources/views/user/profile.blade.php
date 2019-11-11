<!DOCTYPE html>
<html lang="en">
<head>
    <title>LERAMIZ - Landing Page Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="LERAMIZ Landing Page Template">
    <meta name="keywords" content="LERAMIZ, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
@include('layouts.header')
<!-- Header section end -->


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
</section>
<!--  Page top end -->

<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('web.index')}}"><i class="fa fa-home"></i>Trang chủ</a>
        <span><i class="fa fa-angle-right"></i>Thông tin cá nhân</span>
        <div class="col-md-12" style="margin-top: 20px">
            <h3 align="center">Thông tin cá nhân</h3>

            <div class="row" style="margin-top: 30px">

                <div class="col-md-3">
                    <img src="{{asset('storage/'.$user->image)}}" alt="">
                </div>
                <div class="col-md-8">
                    <form>

                        <div class="row">
                            <div class="col-md-12">
                                <strong>Thông tin cá nhân</strong>
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Tên đầy đủ:</label>
                                <input class="form-control" value="{{$user->name}}" name="name">
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Địa chỉ Email:</label>
                                <input class="form-control" value="{{$user->email}}" name="name">
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Số điện thoại:</label>
                                <input placeholder="Thêm số điện thoại..." class="form-control" value="{{$user->phone}}"
                                       name="name">
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Địa chỉ:</label>
                                <input placeholder="Thêm địa chỉ của bạn" class="form-control"
                                       value="{{$user->address}}" name="name">
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <strong>Thêm thông tin liên hệ</strong>
                            </div>
                            <div class="col-md-6" style="margin-top: 20px">
                                <select class="form-control">
                                    <option style="text-shadow: grey">Phương thức</option>
                                    <option>Facebook</option>
                                    <option>Zalo</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="margin-top: 20px">
                                <input class="form-control" placeholder="Tên địa chỉ hoặc số điện thoại..."
                                       name="method">
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <strong>Thay đổi lại mật khẩu</strong>
                            </div>
                            <div style="margin-top: 10px" class='col-md-12'>
                                <input placeholder="Mật khẩu cũ của bạn" class="form-control" name="password">
                            </div>
                            <div style="margin-top: 15px" class='col-md-12'>
                                <input placeholder="Mật khẩu mới của bạn" class="form-control" name="new_password">
                            </div>
                            <div style="margin-top: 15px" class='col-md-12'>
                                <input style="width: 100px" class="btn btn-success" type="submit" name="password"
                                       value="Lưu">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer section -->
@include('layouts.footer')
<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/magnific-popup.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<!-- load for map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
<script src="{{asset('js/map.js')}}"></script>


</body>
</html>
