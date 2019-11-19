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
                            <div class="col-xl-6 sl-title">
                                <h2>{{$house->house_number}}-{{$house->name_way}}</h2>
                                <p><i class="fa fa-map-marker"></i>{{$house->ward->name}}, {{$house->district->name}}
                                    , {{$house->province->name}}</p>
                            </div>
                            <div class="col-xl-2">
                               <p class="btn btn-primary">Giá: {{number_format($house->price)}} Đồng</p>
                            </div>
                            <div class="col-xl-2 offset-xl-1">
                                <a href="#" class="btn btn-primary">Đặt phòng</a>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Chi tiết căn hộ</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-bed"></i>{{$house->totalBedRoom}} Phòng ngủ</p>
                                <p><i class="fa fa-user"></i> {{Auth::user()->name}}</p>
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
                        <div class="author-img set-bg" data-setbg="{{asset('img/author.jpg')}}"></div>
                        <div class="author-info">
                            <p>Người đăng</p>
                            <h5>{{Auth::user()->name}}</h5>
                        </div>
                        <div class="author-contact">
                            <p><i class="fa fa-phone"></i>{{Auth::user()->phone}}</p>
                            <p><i class="fa fa-envelope"></i>{{Auth::user()->email}}</p>
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
        </div>
    </section>
    <!-- Page end -->
@endsection
