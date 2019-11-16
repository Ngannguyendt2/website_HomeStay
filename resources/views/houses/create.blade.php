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
<script src="{{asset('js/ajaxAddress.js')}}"></script>
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

<div class="site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i>Trang chủ</a>
        <span><i class="fa fa-angle-right"></i>Đăng tin</span>
    </div>
    <img src="{{asset("img/banner.jpg")}}">

</div>
<!-- Breadcrumb -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p align="center" style="margin-left: 2px">Xin chào: <strong>{{Auth::user()->name}}</strong>!</p>
            <div style="margin-top: 30px" class="profile-img-container img-circle">
                <img style="width: 210px; height: 210px;"
                     src="{{(Auth::user()->image)? asset('storage/'.Auth::user()->image) : asset('img/anhdaidien.jpg')}}"
                     class="img-thumbnail img-circle img-responsive rounded-circle"/>
                @if ($errors->has('image'))
                    <p class="text text-danger">{{ $errors->first('image')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-9" style="margin-bottom: 50px">
            <div class="row">
                <div style="margin-bottom: 30px" class="col-md-12"><h4 align="center">Cho thuê/Đặt thuê nhà </h4></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 5px">
                            <strong>Nhu cầu:</strong>
                        </div>
                        <div class="col-md-6">
                            <select name="" class="form-control custom-select">
                                <option selected> =>Chọn nhu cầu<=</option>
                                <option>Cho thuê nhà</option>
                                <option>Muốn bán nhà</option>
                                <option>Muốn thuê nhà</option>
                                <option>Muốn mua nhà</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-3" style="margin-top: 5px">
                            <strong>Loại nhà:</strong>
                        </div>
                        <div class="col-md-6">
                            <select name="" class="form-control custom-select">
                                <option selected> =>Chọn loại nhà<=</option>
                                <option>Biệt thự villa</option>
                                <option>Nhà sàn gỗ</option>
                                <option>Nhà tầng</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-3" style="margin-top: 40px">
                            <strong>Địa chỉ:</strong>
                        </div>
                        <div class="col-md-9">
                            <select onchange="javascript:test.filterCity()" name="province" id="province" class="form-control-sm">
                                <option selected>Thành phố</option>
{{--                                @foreach($provinces as $province)--}}
{{--                                    <option value="{{$province->id}}">{{$province->name}}</option>--}}
{{--                                    @endforeach--}}
                            </select>
                            <select onchange="javascript:test.filterDistrict()" name="district" id="district" class="form-control-sm">
                                <option selected>Quận huyện</option>
                            </select>
                            <select onchange="javascript:test.filterWard()" name="ward" id="ward" style="margin-top: 10px" class="form-control-sm">
                                <option selected>Xã/Phường</option>
                            </select>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <input name="" class="form-control" placeholder="Tên đường...">
                        </div>
                        <div class="col-md-4">
                            <input name="" class="form-control" placeholder="Số nhà...">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-3" style="margin-top: 5px">
                            <strong>Chi tiết:</strong>
                        </div>
                        <div class="col-md-4">
                            <input name="" type="number" class="form-control" placeholder="Số phòng ngủ...">
                        </div>
                        <div class="col-md-4">
                            <input name="" type="number" class="form-control" placeholder="Số phòng tắm...">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-3" style="margin-top: 8px">
                            <strong>Giá/đêm:</strong>
                        </div>
                        <div class="col-md-8">
                            <input name="" type="number" class="form-control" placeholder="Giá theo đêm...">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <textarea  class="form-control" readonly style="height: 336px">Ảnh thì làm ở đây</textarea>
                </div>
                <div class="col-md-2" style="margin-top: 50px">
                    <strong>Mô tả chung:</strong>
                </div>
                <div class="col-md-10" style="margin-top: 20px">
                    <textarea name="" class="form-control" placeholder='Viết mô tả của bạn về ngôi nhà...' style="height: 100px"></textarea>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-9" style="margin-top: 20px"><input style="width: 200px" type="submit" class="btn btn-success" value="Đăng tin"></div>
            </div>
        </div>
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
