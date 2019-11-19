@extends('layouts.master')
@section('content')

    <!-- Page top section -->
    <section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
        <div class="container text-white">
            <h2>Thông tin căn nhà</h2>
        </div>
    </section>
    <!--  Page top end -->

    <!-- Breadcrumb -->
    <div class="site-breadcrumb">
        <div class="container">
            <a href=""><i class="fa fa-home"></i>Home</a>
            <span><i class="fa fa-angle-right"></i>Thông tin căn hộ</span>
        </div>
    </div>

    <!-- Page -->
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 single-list-page">
                    <div class="single-list-slider owl-carousel" id="sl-slider">
                        <div class="sl-item set-bg" data-setbg="{{asset('img/single-list-slider/1.jpg')}}">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="{{asset('img/single-list-slider/2.jpg')}}">
                            <div class="rent-notic">FOR Rent</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="{{asset('img/single-list-slider/3.jpg')}}">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="{{asset('img/single-list-slider/4.jpg')}}">
                            <div class="rent-notic">FOR Rent</div>
                        </div>
                        <div class="sl-item set-bg" data-setbg="{{asset('img/single-list-slider/5.jpg')}}">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                    </div>
                    <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
                        <div class="sl-thumb set-bg" data-setbg="{{asset('img/single-list-slider/1.jpg')}}"></div>
                        <div class="sl-thumb set-bg" data-setbg="{{asset('img/single-list-slider/2.jpg')}}"></div>
                        <div class="sl-thumb set-bg" data-setbg="{{asset('img/single-list-slider/3.jpg')}}"></div>
                        <div class="sl-thumb set-bg" data-setbg="{{asset('img/single-list-slider/4.jpg')}}"></div>
                        <div class="sl-thumb set-bg" data-setbg="{{asset('img/single-list-slider/5.jpg')}}"></div>
                    </div>
                    <div class="single-list-content">
                        <div class="row">
                            <div class="col-sm-8 sl-title">
                                <h2>{{$house->house_number}}-{{$house->name_way}}</h2>
                                <p><i class="fa fa-map-marker"></i>{{$house->ward->name}}, {{$house->district->name}}
                                    , {{$house->province->name}}</p>
                            </div>
                            <div class="col-sm-2 offset-xl-1">
                                <div class="row">
                                    <div class="col-md-12"><a style="width: 180px" href="#" class="btn btn-primary">Đặt phòng</a>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="btn btn-outline-dark" style="margin-top: 10px; width: 180px"> Giá: {{number_format($house->price)}} Đồng</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Chi tiết căn hộ</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-bed"></i>{{$house->totalBedRoom}} Phòng ngủ</p>
                                <p><i class="fa fa-user"></i></p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-building-o"></i>{{$house->category->name}}</p>
                                <p><i class="fa fa-clock-o"></i> 1 days ago</p>
                            </div>
                            <div class="col-md-4">
                                <p><i class="fa fa-bath"></i>{{$house->totalBathroom}} Phòng tắm</p>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Mô tả</h3>
                        <div class="description">
                            <p>{{$house->description}}</p>
                        </div>
                        <h3 class="sl-sp-title">Thông tin thêm</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-check-circle-o"></i>Điều hòa</p>
                                <p><i class="fa fa-check-circle-o"></i>Điện thoại</p>
                                <p><i class="fa fa-check-circle-o"></i>Máy giặt</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-check-circle-o"></i>Máy sưởi</p>
                                <p><i class="fa fa-check-circle-o"></i> Biệt thự Villa</p>
                                <p><i class="fa fa-check-circle-o"></i>Trung tâm</p>
                            </div>
                            <div class="col-md-4">
                                <p><i class="fa fa-check-circle-o"></i>View thành phố</p>
                                <p><i class="fa fa-check-circle-o"></i> Internet</p>
                                <p><i class="fa fa-check-circle-o"></i>Bếp điện</p>
                            </div>
                        </div>
                        <h3 class="sl-sp-title bd-no">Vị trí</h3>
                        <div class="pos-map" id="map-canvas"></div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-4 col-md-7 sidebar">
                    <div class="author-card">
                        <div class="author-img set-bg" data-setbg="{{asset('storage/'.$house->user->image)}}"></div>
                        <div class="author-info">
                            <p>Người đăng</p>
                            <h5>{{$house->user->name}}</h5>
                        </div>
                        <div class="author-contact">
                            <p><i class="fa fa-phone"></i>{{$house->user->phone}}</p>
                            <p><i class="fa fa-envelope"></i>{{$house->user->email}}</p>
                        </div>
                    </div>
                    <div class="related-properties">
                        <h2>Related Property</h2>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="{{asset('img/feature/1.jpg')}}">
                                <div class="sale-notic">FOR SALE</div>
                            </div>
                            <div class="rp-info">
                                <h5>1963 S Crescent Heights Blvd</h5>
                                <p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
                            </div>
                            <a href="#" class="rp-price">$1,200,000</a>
                        </div>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="{{asset('img/feature/2.jpg')}}">
                                <div class="rent-notic">FOR Rent</div>
                            </div>
                            <div class="rp-info">
                                <h5>17 Sturges Road, Wokingham</h5>
                                <p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
                            </div>
                            <a href="#" class="rp-price">$2,500/month</a>
                        </div>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="{{asset('img/feature/4.jpg')}}">
                                <div class="sale-notic">FOR SALE</div>
                            </div>
                            <div class="rp-info">
                                <h5>28 Quaker Ridge Road, Manhasset</h5>
                                <p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
                            </div>
                            <a href="#" class="rp-price">$5,600,000</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Order" class="modal" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center primecolor">Đặt thuê/mua </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body" style="overflow: hidden;">
                            <strong id="alert"></strong>
                            <div class="col-md-offset-1 col-md-10">
                                <form method="POST" id="OrderHouse">
                                    @csrf
                                    <div class="form-group has-feedback">
                                        <label>Tên người thuê: </label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Nhập tên người thuê  ">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label>Email: </label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Nhập email">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <span class="text-danger">
                                <strong id="email-error"></strong>
                            </span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label>Số điện thoại: </label>
                                        <input type="phone" name="phone" class="form-control"
                                               placeholder="Nhập số điện thoại  ">
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                        <span class="text-danger">
                                <strong id="phone-error"></strong>
                                        </span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label>Ngày ở: </label>
                                        <input type="date" name="checkin" class="form-control" id="checkin">
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                        <span class="text-danger">
                                <strong id="checkin-error"></strong>
                                        </span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label>Ngày trả: </label>
                                        <input type="date" name="checkout" class="form-control" id="checkout">
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                        <span class="text-danger">
                                <strong id="checkout-error"></strong>
                                        </span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Tổng số tiền:</label>
                                        <p id="price"></p>
                                        <input id="totalPrice" name="totalPrice" value="" hidden>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <button type="button" id="submitOrderHouse"
                                                    class="btn btn-primary btn-prime white btn-flat">Submit
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
        </div>
    </section>
    <!-- Page end -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('change', '#checkout', function () {
                let dateCheckout = new Date($('#checkout').val());
                let dateCheckin = new Date($('#checkin').val());
                let date = new Date();
                let datePrice = date.setTime((dateCheckout.getTime() - dateCheckin.getTime()) / 1000 / 60 / 60 / 24);
                let priceOneDay = parseInt({{$house->price}});
                totalPrice = priceOneDay * datePrice;
                $('#totalPrice').val(totalPrice);
                $('#price').html(totalPrice);
            });


            $('body').on('click', '#submitOrderHouse', function () {
                // e.preventDefault();

                let orderHouseForm = $("#OrderHouse");
                let formData = orderHouseForm.serialize();
                $('#name-error').html("");
                $('#email-error').html("");
                $('#phone-error').html("");
                $('#checkin-error').html("");
                $('#checkout-error').html("");
                $('#alert').html("");
                $.ajax({
                    url: "{{route('customer.order', $house->id)}}",
                    type: 'POST',
                    data: formData,
                    success: function (result) {

                    },
                    error: function (error) {
                        let err = JSON.parse(error.responseText);
                        if (err.errors.name) {
                            $('#name-error').html(err.errors.name[0]);
                        }
                        if (err.errors.email) {
                            $('#email-error').html(err.errors.email[0]);
                        }
                        if (err.errors.phone) {
                            $('#phone-error').html(err.errors.phone[0]);
                        }
                        if (err.errors.checkin) {
                            $('#checkin-error').html(err.errors.checkin[0]);
                        }
                        if (err.errors.checkout) {
                            $('#checkout-error').html(err.errors.checkout[0]);
                        }
                    }
                });
            })
            ;

        })


    </script>
@endsection

