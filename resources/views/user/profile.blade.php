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
                    <div class="col-md-4" style="border-radius: 20px; height: 400px">
                        <div class="col-md-12">
                            <img id="img" style="width: 200px; height: 200px; margin-left: 50px"
                                 src="{{($user->image)? asset('storage/'.$user->image) : asset('img/anhdaidien.jpg')}}"
                                 class="img-thumbnail img-circle img-responsive rounded-circle" alt="ahihi"/>
                            @if ($errors->has('images'))
                                <p class="text text-danger">{{ $errors->first('image')}}</p>
                            @endif
                            @if(empty(Auth::user()->google_id) && empty(Auth::user()->provider_id))
                                <div class="col-md-12" style="margin-top: 15px; margin-left: 50px">
                                    <a href="" style="color: green" data-toggle="modal"
                                       data-target="#ChangePassword"><i class="fa fa-key" style="font-size:24px"></i><b>Đổi
                                            mật khẩu</b></a>
                                </div>
                            @endif

                            <div class="col-md-12" style="margin-top: 15px; margin-left: 50px">
                                <a style="color: green" href="{{route('user.edit')}}"><i
                                        class="fa fa-edit" style="font-size:20px"></i><b>Chỉnh sửa thông tin</b>
                                </a>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px; margin-left: 50px">
                                <a style="color: green" href={{route('user.historyRentHouse')}}>
                                    <i class="fa fa-history" aria-hidden="true" style="font-size:20px"></i><b>Lịch sử
                                        thuê nhà</b>
                                </a>
                            </div>
                            @if(count($user->houses)==0)
                            @else
                                <div class="col-md-12" style="margin-top: 15px; margin-left: 50px">
{{--                                    <a href="" style="color: green" data-toggle="modal"--}}
{{--                                       data-target="#monthlyIncome"><i class="fa fa-money"--}}
{{--                                                                       style="font-size:24px"></i><b>Thu nhập của--}}
{{--                                            bạn </b></a>--}}

                                    <a style="color: green" href={{route('user.personalIncome')}}>
                                        <i class="fa fa-history" aria-hidden="true" style="font-size:20px"></i><b>Thu nhập cá nhân </b>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-7" style="border-radius: 20px ; height: 400px">

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
                            <div class="col-md-3"></div>
                            <div class="col-md-1"></div>

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

                        <div class="form-group">
                            <div class="col-md-12" style="text-align: center">
                                <button type="button" id="submitChangePass"
                                        class="btn btn-primary btn-prime white btn-flat">Xác nhận
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--count money owner house--}}

{{--<div id="monthlyIncome" class="modal" role="dialog" tabindex="-1">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h3 class="modal-title text-center primecolor">Kiểm tra thu nhập của bạn </h3>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}

{{--            </div>--}}
{{--            <div class="modal-body" style="overflow: hidden;">--}}
{{--                <strong id="alert"></strong>--}}
{{--                <div class="col-md-offset-1 col-md-10">--}}
{{--                    <form method="POST" id="moneyOfOwnerHouse">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group has-feedback">--}}
{{--                            <label>Chọn tháng bạn muốn kiểm tra : </label>--}}
{{--                            <input type="month" name="month" id="month" class="form-control">--}}
{{--                            <span class="text-danger">--}}
{{--                                <strong id="date-error"></strong>--}}
{{--                                        </span>--}}
{{--                        </div>--}}
{{--                        <div class="form-group has-feedback" style="display: none" id="date">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-9" id="checkout">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-3" id="moneyOfDay">--}}

{{--                                </div>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                        <div class="form-group has-feedback" style="display: none" id="money">--}}
{{--                            <b><label style="color: #17a2b8">Tổng số tiền trong tháng:</label></b>--}}
{{--                            <b><label id="totalMoney" style="color: #00aced"></label><label--}}
{{--                                    style="color: #00aced">VND</label></b>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-12" style="text-align: center">--}}
{{--                                <button type="button" id="submitCalculatorMoney"--}}
{{--                                        class="btn btn-primary btn-prime white btn-flat">Xác nhận--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
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
    $(document).ready(function () {


        {{--$('#month').change(function () {--}}
        {{--    $('#date').css('display', 'block');--}}
        {{--});--}}
        {{--$('body').on('click', '#submitCalculatorMoney', function () {--}}


        {{--    let calculatorMoney = $('#moneyOfOwnerHouse');--}}
        {{--    let formData = calculatorMoney.serialize();--}}
        {{--    $('#totalMoney').html('');--}}
        {{--    $('#checkout').html('');--}}
        {{--    $('#moneyOfDay').html('');--}}
        {{--    $.ajax({--}}
        {{--        url: "{{route('user.monthlyIncome')}}",--}}
        {{--        type: 'POST',--}}
        {{--        data: formData,--}}
        {{--        success: function (result) {--}}

        {{--            $('#totalMoney').html(result.data);--}}
        {{--            $('#money').css('display', 'block');--}}
        {{--            for (let i = 0; i < result.orders.length; i++) {--}}

        {{--                $('#checkout').append('<b>' + result.orders[i].checkout + '<b><br>');--}}
        {{--                $('#moneyOfDay').append('<b>' + result.orders[i].totalPrice + '<b><br>');--}}

        {{--            }--}}
        {{--        },--}}
        {{--        error: function (err) {--}}

        {{--        }--}}
        {{--    })--}}
        {{--});--}}

        $('body').on('click', '#submitChangePass', function () {
            // e.preventDefault();
            let changePasswordForm = $("#Password");
            let formData = changePasswordForm.serialize();
            $('#old_password-error').html("");
            $('#new_password-error').html("");
            $('#alert').html("");
            $.ajax({
                url: "{{ route('user.changePassword') }}",
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data.status == 'errors') {
                        $('#alert').html(data.message).css('color', 'red');
                    }
                    if (data.status == 'success') {
                        $('#alert').html(data.message).css('color', 'green').click(location.reload());
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
        })
    })


</script>
</body>
</html>
