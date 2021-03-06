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
<style>
    p {
        margin-left: 15px;
        margin-top: 5px;
    }
</style>
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
        <a href="{{route('web.index')}}"><i class="fa fa-home"></i>Trang chủ</a>
        <span><i class="fa fa-angle-right"></i>Sửa thông tin cá nhân</span>
        <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data" class="dropzone">
            @csrf
            <div class="col-md-12" style="margin-top: 20px">
                <h3 align="center">Chỉnh sửa thông tin cá nhân</h3>
                <div class="row" style="margin-top: 30px">
                    <div class="col-md-3">
                        <span style="margin-left: 6px"> Click vào ảnh để đổi ảnh mới!</span>

                        <div class="profile-img-container img-circle">
                            <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
                            <img id="img" style="width: 200px; height: 200px;"
                                 src="{{($user->image)? asset('storage/'.$user->image) : asset('img/anhdaidien.jpg')}}"
                                 class="rounded-circle img-thumbnail img-circle img-responsive"/>
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
                                <input class="form-control" value="{{$user->name}}" name="name">
                            </div>
                            @if ($errors->has('name'))
                                <p class="text text-danger">{{ $errors->first('name')}}</p>
                            @endif
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Địa chỉ Email:</label>
                                <input class="form-control" value="{{$user->email}}" name="email" disabled>
                            </div>

                            @if ($errors->has('email'))
                                <p class="text text-danger">{{ $errors->first('email')}}</p>
                            @endif
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Số điện thoại:</label>
                                <input placeholder="Thêm số điện thoại..." class="form-control" value="{{$user->phone}}"
                                       name="phone">
                            </div>
                            @if ($errors->has('phone'))
                                <p class="text text-danger">{{ $errors->first('phone')}}</p>
                            @endif
                            <div style="margin-top: 10px" class="col-md-12">
                                <label>Địa chỉ:</label>
                                <input placeholder="Thêm địa chỉ của bạn" class="form-control"
                                       value="{{$user->address}}" name="address">
                            </div>
                            @if ($errors->has('address'))
                                <p class="text text-danger">{{ $errors->first('address')}}</p>
                            @endif
                            <div class="col-md-12" style="margin-top: 20px">
                                <strong>Thêm thông tin liên hệ</strong>
                            </div>
                            <div class="col-md-6" style="margin-top: 20px">
                                <select class="form-control">
                                    <option>Phương thức</option>
                                    <option>Facebook</option>
                                    <option>Zalo</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="margin-top: 20px">
                                <input class="form-control" placeholder="Tên địa chỉ hoặc số điện thoại..."
                                       name="method">
                            </div>
                            <div style="margin-top: 15px" class='col-md-6'>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                <button style="margin-left: 10px" type="submit" onclick="return back()" class="btn btn-danger">Quay lại</button>

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
<script>
    let loadFile = function (event) {
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
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
