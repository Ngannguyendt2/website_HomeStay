<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dậu's HomeStay</title>
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
                        <div class="col-md-12">
                            <img id="img" style="width: 200px; height: 200px;"
                                 src="{{($user->image)? asset('storage/'.$user->image) : asset('img/anhdaidien.jpg')}}"
                                 class="img-thumbnail img-circle img-responsive rounded-circle" alt="ahihi"/>
                            @if ($errors->has('images'))
                                <p class="text text-danger">{{ $errors->first('image')}}</p>
                            @endif
                            <div class="col-md-12" style="margin-top: 15px; margin-left: 15px">
                                <a href="" style="color: green" data-toggle="modal"
                                   data-target="#ChangePassword"><i class="fa fa-key" style="font-size:24px"></i><b>Đổi
                                        mật khẩu</b></a>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px; margin-left: 15px">
                                <a style="color: green" href="{{route('user.edit',['id'=>$user->id])}}"><i
                                        class="fa fa-edit" style="font-size:20px"></i><b>Chỉnh sửa thông tin</b> </a>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px; margin-left: 15px">
                                <a style="color: green" href={{route('house.houseDetail', ['id'=>$user->id])}}>
                                    <i class="fa fa-history" aria-hidden="true" style="font-size:20px"></i><b>Lịch sử
                                        thuê nhà</b>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-7">

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

                            <div class="col-md-3"></div>

                            <div style="margin-top: 15px" class='col-md-4'>

                                <a class="btn btn-info" href="{{route('user.edit',['id'=>$user->id])}}"><b>Chỉnh
                                        sửa thông tin cá nhân</b></a>
                            </div>
                            <div class="col-md-3"></div>
                            <div style="margin-top: 15px" class="col-md-3">
                                <a href="" class="btn btn-info" data-toggle="modal"
                                   data-target="#ChangePassword"><b>Đổi mật khẩu</b></a>
                            </div>
                            <div class="col-md-1"></div>
                            @if(empty(Auth::user()->google_id) && empty(Auth::user()->provider_id))
                                <div style="margin-top: 15px" class="col-md-3">
                                    <a href="" class="btn btn-outline-info" data-toggle="modal"
                                       data-target="#ChangePassword"><b>Đổi mật khẩu</b></a>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>
</div>
<div id="ChangePassword" class="modal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center primecolor">Đổi mật khẩu </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" style="overflow: hidden;">
                <strong id="alert"></strong>
                <div class="col-md-offset-1 col-md-10">
                    <form method="POST" id="Password">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="password" name="old_password" class="form-control"
                                   placeholder="Nhập mật khẩu cũ ">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="old_password-error"></strong>
                            </span>

                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="new_password" class="form-control"
                                   placeholder="Nhập mật khẩu mới">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <span class="text-danger">
                                <strong id="new_password-error"></strong>
                            </span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Nhập lại mật khẩu ">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <button type="button" id="submitChangePass"
                                        class="btn btn-primary btn-prime white btn-flat">Xác nhận
                                </button>
                                <a class="btn btn-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   style="color: black">
                                    Ok
                                </a>
                                {{--                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST"
      style="display: none;">
    @csrf
</form>
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

<script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //     }
    // });

    function Redirect() {
        $(document).click(event.preventDefault(),
            document.getElementById('logout-form').submit());

    }

    $('body').on('click', '#submitChangePass', function () {
        // e.preventDefault();
        let changePasswordForm = $("#Password");
        let formData = changePasswordForm.serialize();
        $('#old_password-error').html("");
        $('#new_password-error').html("");
        $('#alert').html("");
        $.ajax({
            url: "{{ route('user.changePassword', $user->id) }}",
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data.status == 'errors') {
                    $('#alert').html(data.message).css('color', 'red');
                }
                if (data.status == 'success') {
                    $('#alert').html(data.message).css('color', 'green').click(Redirect());
                }
            },
            error: function (result) {

                let err = JSON.parse(result.responseText);
                if (err.errors.old_password) {
                    $('#old_password-error').html(err.errors.old_password[0]);
                }

                if (err.errors.new_password) {
                    $('#new_password-error').html(err.errors.new_password[0]);
                }
            }
        });
    });


</script>
</body>
</html>
