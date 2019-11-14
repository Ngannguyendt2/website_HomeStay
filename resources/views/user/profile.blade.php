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
    <link rel="stylesheet" href="{{asset('css/uploadFile.css')}}"/>


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
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
</section>
<!--  Page top end -->
<!-- Breadcrumb -->
<div class="site-breadcrumb" style="background-color: lightgoldenrodyellow">
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> {{Session::get('success')}}</strong>
            </div>
        @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {{Session::get('error')}}</strong>
                </div>
            @endif
        <a href="{{route('web.index')}}"><i class="fa fa-home"></i>Trang chủ</a>
        <span><i class="fa fa-angle-right"></i>Thông tin cá nhân</span>
        <form>
            @csrf
            <div class="col-md-12" style="margin-top: 20px">
                <h3 align="center">Thông tin cá nhân</h3>
                <div class="row" style="margin-top: 30px">
                    <div class="col-md-3">
                        <div class="profile-img-container img-circle">
                            <img  src="{{($user->image)? asset('storage/'.$user->image) : asset('img/anhdaidien.jpg')}}"
                                 class="img-thumbnail img-circle img-responsive"/>
                            @if ($errors->has('image'))
                                <p class="text text-danger">{{ $errors->first('image')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-8">

                        <div class="row">
                            <div class="col-md-12">
                                <strong>Thông tin cá nhân</strong>
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Tên đầy đủ:</label>
                                <h5>{{$user->name}}</h5>
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Địa chỉ Email:</label>
                                <h5>{{$user->email}}</h5>
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Số điện thoại:</label>
                                <h5>{{$user->phone}}</h5>
                            </div>
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Địa chỉ:</label>
                                <h5>{{$user->address}}</h5>
                            </div>
                            <div style="margin-top: 15px" class='col-md-12'>
                                <a class="btn btn-outline-info" href="{{route('user.edit',['id'=>$user->id])}}"><b>Chỉnh sửa thông tin cá nhân</b></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>
</div>


<!-- Footer section -->
@include('layouts.footer')
<!-- Footer section end -->
<!--====== Javascripts & Jquery ======-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
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
