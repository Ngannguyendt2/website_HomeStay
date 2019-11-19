@extends('layouts.master')
@section('content')

    <!-- Page top section -->
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
        <div class="container text-white">
            <h2>SINGLE LISTING</h2>
        </div>
    </section>
    <!--  Page top end -->

    <!-- Breadcrumb -->
    <div class="site-breadcrumb">
        <div class="container">
            <a href=""><i class="fa fa-home"></i>Home</a>
            <span><i class="fa fa-angle-right"></i>Single Listing</span>
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
                        <div class="sl-thumb set-bg" data-setbg="img/single-list-slider/1.jpg"></div>
                        <div class="sl-thumb set-bg" data-setbg="img/single-list-slider/2.jpg"></div>
                        <div class="sl-thumb set-bg" data-setbg="img/single-list-slider/3.jpg"></div>
                        <div class="sl-thumb set-bg" data-setbg="img/single-list-slider/4.jpg"></div>
                        <div class="sl-thumb set-bg" data-setbg="img/single-list-slider/5.jpg"></div>
                    </div>
                    <div class="single-list-content">
                        <div class="row">
                            <div class="col-xl-8 sl-title">
                                <h2>305 North Palm Drive</h2>
                                <p><i class="fa fa-map-marker"></i>Beverly Hills, CA 90210</p>
                            </div>
                            <div class="col-xl-4">
                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                   data-target="#Order">$4,500,000</a>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Property Details</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-th-large"></i> 1500 Square foot</p>
                                <p><i class="fa fa-bed"></i> 16 Bedrooms</p>
                                <p><i class="fa fa-user"></i> Gina Wesley</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-car"></i> 2 Garages</p>
                                <p><i class="fa fa-building-o"></i> Family Villa</p>
                                <p><i class="fa fa-clock-o"></i> 1 days ago</p>
                            </div>
                            <div class="col-md-4">
                                <p><i class="fa fa-bath"></i> 8 Bathrooms</p>
                                <p><i class="fa fa-trophy"></i> 5 years age</p>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Description</h3>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum
                                ornareste. Donec index lorem. Vestibulum aliquet odio, eget tempor libero. Cras congue
                                cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut
                                vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus
                                orci luctus et ultrice.</p>
                        </div>
                        <h3 class="sl-sp-title">Property Details</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-check-circle-o"></i> Air conditioning</p>
                                <p><i class="fa fa-check-circle-o"></i> Telephone</p>
                                <p><i class="fa fa-check-circle-o"></i> Laundry Room</p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-check-circle-o"></i> Central Heating</p>
                                <p><i class="fa fa-check-circle-o"></i> Family Villa</p>
                                <p><i class="fa fa-check-circle-o"></i> Metro Central</p>
                            </div>
                            <div class="col-md-4">
                                <p><i class="fa fa-check-circle-o"></i> City views</p>
                                <p><i class="fa fa-check-circle-o"></i> Internet</p>
                                <p><i class="fa fa-check-circle-o"></i> Electric Range</p>
                            </div>
                        </div>
                        <h3 class="sl-sp-title bd-no">Floorplans</h3>
                        <div id="accordion" class="plan-accordion">
                            <div class="panel">
                                <div class="panel-header" id="headingOne">
                                    <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                            aria-expanded="false" aria-controls="collapse1">First Floor:
                                        <span>660 sq ft</span> <i class="fa fa-angle-down"></i></button>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="panel-body">
                                        <img src="../../../../public/img/plan-sketch.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-header" id="headingTwo">
                                    <button class="panel-link" data-toggle="collapse" data-target="#collapse2"
                                            aria-expanded="true" aria-controls="collapse2">Second
                                        Floor:<span>610 sq ft.</span> <i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="panel-body">
                                        <img src="../../../../public/img/plan-sketch.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-header" id="headingThree">
                                    <button class="panel-link" data-toggle="collapse" data-target="#collapse3"
                                            aria-expanded="false" aria-controls="collapse3">Third Floor
                                        :<span>580 sq ft</span> <i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordion">
                                    <div class="panel-body">
                                        <img src="../../../../public/img/plan-sketch.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="sl-sp-title bd-no">Video</h3>
                        <div class="perview-video">
                            <img src="../../../../public/img/video.jpg" alt="">
                            <a href="https://www.youtube.com/watch?v=v13nSVp6m5I" class="video-link"><img
                                    src="../../../../public/img/video-btn.png" alt=""></a>
                        </div>
                        <h3 class="sl-sp-title bd-no">Location</h3>
                        <div class="pos-map" id="map-canvas"></div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-4 col-md-7 sidebar">
                    <div class="author-card">
                        <div class="author-img set-bg" data-setbg="img/author.jpg"></div>
                        <div class="author-info">
                            <h5>Gina Wesley</h5>
                            <p>Real Estate Agent</p>
                        </div>
                        <div class="author-contact">
                            <p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
                            <p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-form-card">
                        <h5>Do you have any question?</h5>
                        <form>
                            <input type="text" placeholder="Your name">
                            <input type="text" placeholder="Your email">
                            <textarea placeholder="Your question"></textarea>
                            <button>SEND</button>
                        </form>
                    </div>
                    <div class="related-properties">
                        <h2>Related Property</h2>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
                                <div class="sale-notic">FOR SALE</div>
                            </div>
                            <div class="rp-info">
                                <h5>1963 S Crescent Heights Blvd</h5>
                                <p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
                            </div>
                            <a href="#" class="rp-price">$1,200,000</a>
                        </div>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="img/feature/2.jpg">
                                <div class="rent-notic">FOR Rent</div>
                            </div>
                            <div class="rp-info">
                                <h5>17 Sturges Road, Wokingham</h5>
                                <p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
                            </div>
                            <a href="#" class="rp-price">$2,500/month</a>
                        </div>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="img/feature/4.jpg">
                                <div class="sale-notic">FOR SALE</div>
                            </div>
                            <div class="rp-info">
                                <h5>28 Quaker Ridge Road, Manhasset</h5>
                                <p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
                            </div>
                            <a href="#" class="rp-price">$5,600,000</a>
                        </div>
                        <div class="rp-item">
                            <div class="rp-pic set-bg" data-setbg="img/feature/5.jpg">
                                <div class="rent-notic">FOR Rent</div>
                            </div>
                            <div class="rp-info">
                                <h5>Sofi Berryessa 750 N King Road</h5>
                                <p><i class="fa fa-map-marker"></i>Sofi Berryessa 750 N King Road</p>
                            </div>
                            <a href="#" class="rp-price">$1,600/month</a>
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


    </script>
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

