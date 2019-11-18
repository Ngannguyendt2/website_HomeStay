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
                @if ($errors->has('images'))
                    <p class="text text-danger">{{ $errors->first('image')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-9" style="margin-bottom: 50px">
            <form action="{{route('house.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div style="margin-bottom: 30px" class="col-md-12"><h4 align="center">Cho thuê/Đặt thuê nhà </h4>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 5px">
                                <strong>Nhu cầu:</strong>
                            </div>
                            <div class="col-md-8">
                                <select name="demand" class="form-control custom-select">
                                    <option selected> =>Chọn nhu cầu<=</option>
                                    <option value="1">Cho thuê nhà</option>
                                    <option value="0">Muốn thuê nhà</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-3" style="margin-top: 5px">
                                <strong>Loại nhà:</strong>
                            </div>
                            <div class="col-md-8">
                                <select name="category_id" class="form-control custom-select">
                                    <option selected> =>Chọn loại nhà<=</option>
                                    <option value="4">Biệt thự villa</option>
                                    <option value="5">Nhà sàn</option>
                                    <option value="6">Nhà tầng</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-3" style="margin-top: 65px">
                                <strong>Địa chỉ:</strong>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select onchange="javascript:test.filterCity()" name="province_id" id="province"
                                                class="form-control">
                                            <option selected>Thành phố</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select style="margin-top: 15px"
                                                onchange="javascript:test.filterDistrict()"
                                                name="district_id" id="district" class="form-control">
                                            <option selected>Quận huyện</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select onchange="javascript:test.filterWard()" name="ward_id" id="ward"
                                                style="margin-top: 15px" class="form-control">
                                            <option selected>Xã/Phường</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-4">
                                <input style="margin-top: 15px" name="name_way" class="form-control"
                                       placeholder="Tên đường...">
                            </div>
                            <div class="col-md-4">
                                <input style="margin-top: 15px" name="house_number" class="form-control"
                                       placeholder="Số nhà...">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-3" style="margin-top: 5px">
                                <strong>Chi tiết:</strong>
                            </div>
                            <div class="col-md-4">
                                <input name="totalBedRoom" type="number" class="form-control"
                                       placeholder="Số phòng ngủ...">
                            </div>
                            <div class="col-md-4">
                                <input name="totalBathRoom" type="number" class="form-control"
                                       placeholder="Số phòng tắm...">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-3" style="margin-top: 8px">
                                <strong>Giá/đêm:</strong>
                            </div>
                            <div class="col-md-8">
                                <input name="price" type="number" class="form-control" placeholder="Giá theo đêm...">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-3" style="margin-top: 8px">
                                <strong>Trạng thái:</strong>
                            </div>
                            <div class="col-md-8">
                                <select name="status" class="form-control" id="status">
                                    <option selected>=>Trạng thái<=</option>
                                    <option value="1">Cho thuê</option>
                                    <option value="0">Bán</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="file" name="image[]" id="file-input" multiple>
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        <div id="thumb-output"></div>
                    </div>
                    <div class="col-md-2" style="margin-top: 50px">
                        <strong>Mô tả chung:</strong>
                    </div>
                    <div class="col-md-10" style="margin-top: 20px">
                    <textarea name="description" class="form-control" placeholder='Viết mô tả của bạn về ngôi nhà...'
                              style="height: 100px"></textarea>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-9" style="margin-top: 20px"><input style="width: 200px" type="submit"
                                                                          class="btn btn-success" value="Đăng tin">
                    </div>
                </div>
            </form>
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
<script>

    $(document).ready(function () {
        $('#file-input').on('change', function () { //on file input change

                let data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        let fileRead = new FileReader(); //new filereader
                        fileRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                let img = $('<img/>').addClass('thumb').attr('src', e.target.result).css('width','250px'); //create image element
                                $('#thumb-output').append(img); //append image to output element
                            };
                        })(file);
                        fileRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

        });
    });

</script>

</body>
</html>
