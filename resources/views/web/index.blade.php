@extends('layouts.master')
@section('content')


    <!-- Hero section -->
    <script src="{{asset('js/ajaxAddress.js')}}"></script>

    <section class="hero-section set-bg" data-setbg="img/bg.jpg">
        <div class="container hero-text text-white">
            <h2>Dự án cuối module của nhóm Chị Dậu "Dậu homestay"</h2>
            <p>Trang web giúp bạn tìm kiếm, cho thuê homestay nổi tiếng nhất Việt Nam.<br>Cuộc sống hiện tiện nghi nằm
                trong lòng bàn tay của bạn!.</p>
            <a href="{{route('web.comingSoon')}}" class="site-btn">VIEW DETAIL</a>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Filter form section -->
    <div class="filter-search">
        <div class="container">
            <div class="filter-form" style="border-radius: 10px">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" onchange="javascript:test.filterCity()"
                                                name="province_id" id="province_id"
                                                style="border-radius: 5px;height: 46px; width: 100%">
                                            <option value="">Tỉnh/T.phố</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4">
                                        <select class="form-control"
                                                onchange="javascript:test.filterDistrict()"
                                                name="district_id" id="district_id"
                                                style="border-radius: 5px ;height: 46px ;width: 100%;">
                                            <option value="">Quận/Huyện</option>
                                        </select></div>
                                    <div class="col-md-4">
                                        <select class="form-control"
                                                onchange="javascript:test.filterWard()" name="ward_id"
                                                id="ward_id"
                                                style="border-radius: 5px ;width: 100%; height: 46px">
                                            <option value="">Xã/Phường</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div style="margin-top: 10px" class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="number" id="totalBathroom" class="form-control"
                                               style="border-radius: 5px ;width: 100%;" placeholder="Số phòng tắm...">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="totalBedRoom"
                                               style="border-radius: 5px ;width: 100%;"
                                               placeholder="Số phòng ngủ...">
                                    </div>
                                    <div class="col-md-3">
                                        <input style="height: 20px;width: 100%; background-color: grey" type="text"
                                               class="form-control text-center" value="Ngày nhận phòng" readonly>
                                        <input style="height: 25px;width: 100%" type="text" name="checkin"
                                               class="form-control text-center" id="checkin"
                                               data-provide="datepicker">
                                    </div>
                                    <div class="col-md-3">
                                        <input style="height: 20px;width: 100%; background-color: grey" type="text"
                                               class="form-control text-center" value="Ngày trả phòng" readonly>
                                        <input style="height: 25px;width: 100%" type="text" name="checkout"
                                               class="form-control text-center" id="checkout"
                                               data-provide="datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-sm-3">
                        <div class="col-sm-12">
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                                <input name="price" id="price" class="form-control"
                                       type="text" placeholder="Giá tiền...">
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 10px">
                            <button style="border-radius: 5px;width: 92%;height: 46px; padding-bottom: 20px"
                                    id="btn" class="site-btn fs-submit">SEARCH
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter form section end -->



    <!-- Properties section -->
    <section class="properties-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>Căn hộ gần đây</h3>
                <p>Khám phá những căn HomeStay mới nhất hot nhất thị trường đang được cho thuê</p>
            </div>
            {{--            <p class="text-dark">Tìm thấy {{count($houses)}} nhà.</p>--}}
            <div id="table_paginate">
                @include('web.paginate')

            </div>
            <div id="search"></div>
        </div>
    </section>
    <!-- Properties section end -->

    <!-- Services section -->
    <section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="rounded-circle" src="{{asset('img/service.jpg')}}" alt="">
                </div>
                <div class="col-lg-5 offset-lg-1 pl-lg-0">
                    <div class="section-title text-white">
                        <h3>DỊCH VỤ CỦA CHÚNG TÔI</h3>
                        <p>Dịch vụ hoàn hảo mà chúng tôi cung cấp đó là </p>
                    </div>
                    <div class="services">
                        <div class="service-item">
                            <i class="fa fa-comments"></i>
                            <div class="service-text">
                                <h5>Tự vấn online</h5>
                                <p>Với đội ngũ marketing dày dặn kinh nhiệm sẵn sàng tư vấn cho bạn 24/7.</p>
                            </div>
                        </div>
                        <div class="service-item">
                            <i class="fa fa-home"></i>
                            <div class="service-text">
                                <h5>Quản lý Homestay</h5>
                                <p>Đội ngũ quản lý của chúng tôi gồm những thành viên kì cựu và có thâm niên trong ngành
                                    bất động sản.</p>
                            </div>
                        </div>
                        <div class="service-item">
                            <i class="fa fa-briefcase"></i>
                            <div class="service-text">
                                <h5>Cho thuê online</h5>
                                <p>Trang web thuê nhà uy tín hỗ trợ cho thuê trực tuyến và qua hotline của chúng tôi
                                    03.4912.4936.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section end -->

    <!-- feature category section -->
    <section class="feature-category-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>Loại nhà HomeStay</h3>
                <p>Những loại HomeStay bạn đang tìm kiếm? Chúng tôi sẽ giúp bạn</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 f-cata">
                    <img src="{{asset('img/feature-cate/1.jpg')}}" alt="">
                    <h5>Nhà tầng</h5>
                </div>
                <div class="col-lg-3 col-md-6 f-cata">
                    <img src="{{asset('img/feature-cate/2.jpg')}}" alt="">
                    <h5>Biệt thự Villa</h5>
                </div>
                <div class="col-lg-3 col-md-6 f-cata">
                    <img src="{{asset('img/feature-cate/3.jpg')}}" alt="">
                    <h5>Nhà sàn</h5>
                </div>
                <div class="col-lg-3 col-md-6 f-cata">
                    <img src="{{asset('img/feature-cate/4.jpg')}}" alt="">
                    <h5>Nhà ống</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- feature category section end-->


    <!-- Review section -->
    <section class="review-section set-bg" data-setbg="{{asset('img/review-bg.jpg')}}">
        <div class="container">
            <div class="review-slider owl-carousel">
                <div class="review-item text-white">
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>“Chị Ngân sinh năm 1994, học khóa học PHP tại Codegym Việt Nam . Ở project này chị đảm nhiệm back
                        end và front end cùng với kiến thức chuyên sâu chị đã cùng cả nhóm đã hoàn thành dự án một cách
                        xuất sắc”</p>
                    <h5>Nguyễn Thị Ngân</h5>
                    <span>Back end and front end</span>
                    <div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
                </div>
                <div class="review-item text-white">
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>“Bạn Thanh sinh năm 1999 với độ tuổi rất trẻ , bạn đã tìm đến Codegym Việt Nam và hiện tại đang
                        học khóa PHP full time. Với project này bạn ấy đảm nhiệm cả back end và front end với kiên thức
                        đã học của mình đã hoàn thành xuất sắc project. Câu châm ngôn : "Muỗi”</p>
                    <h5>Đỗ Đức Thanh</h5>
                    <span>Back end and front end</span>
                    <div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
                </div>
                <div class="review-item text-white">
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>“Anh Nguyễn Văn Vinh với trách nhiệm cao cả là trưởng nhóm, mặc dù đã có tuổi và khả năng lập
                        trình vượt trội thì anh Vinh đã hoàn thành project với tinh thần trách nhiệm cao nhât. Hiện anh
                        Vinh đang học khóa PHP full time cua Codegym Việt Nam.”</p>
                    <h5>Nguyễn Văn Vinh</h5>
                    <span>Back end and front end</span>
                    <div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Review section end-->

    <!-- Gallery section -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>Khu vực phổ biến</h3>
                <p>Chúng tôi hiểu giá trị và tầm quan trọng của khu vực</p>
            </div>
            <div class="gallery">
                <div class="grid-sizer"></div>
                <a href="#" class="gallery-item grid-long set-bg" data-setbg="img/gallery/1.jpg">
                    <div class="gi-info">
                        <h3>New York</h3>
                        <p>118 Properties</p>
                    </div>
                </a>
                <a href="#" class="gallery-item grid-wide set-bg" data-setbg="img/gallery/2.jpg">
                    <div class="gi-info">
                        <h3>Florida</h3>
                        <p>112 Properties</p>
                    </div>
                </a>
                <a href="#" class="gallery-item set-bg" data-setbg="img/gallery/3.jpg">
                    <div class="gi-info">
                        <h3>San Jose</h3>
                        <p>72 Properties</p>
                    </div>
                </a>
                <a href="#" class="gallery-item set-bg" data-setbg="img/gallery/4.jpg">
                    <div class="gi-info">
                        <h3>St Louis</h3>
                        <p>50 Properties</p>
                    </div>
                </a>

            </div>
        </div>
    </section>
    <!-- Gallery section end -->



    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkin,#checkout').datepicker({
                minDate: new Date()
            });
        })
    </script>
    <script>

        $(document).ready(function () {
            $('#btn').click(function () {
                let html = "";
                let province = $('#province_id').val();
                let district = $('#district_id').val();
                let ward = $('#ward_id').val();
                let bathroom = $('#totalBathroom').val();
                let bedroom = $('#totalBedRoom').val();
                let price = $('#price').val();
                let checkin = $('#checkin').val();
                let checkout = $('#checkout').val();
                let data = {
                    province_id: province,
                    district_id: district,
                    ward_id: ward,
                    totalBathroom: bathroom,
                    totalBedRoom: bedroom,
                    price: price,
                    checkin: checkin,
                    checkout: checkout
                };
                $.ajax({
                    url: "{{route('search')}}",
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        $.each(response.data, function (index, value) {
                            console.log(value);
                            html += '<div class="col-lg-4 col-md-6">';
                            html += '<a href="http://127.0.0.1:8000/' + value.id + '/detail">';
                            html += '<div class="feature-item">';
                            html += '<div class="feature-pic set-bg" style="background-image: url( ' + 'http://127.0.0.1:8000/storage/images/' + JSON.parse(value.image)[0] + ') " ' + '>';
                            html += '<div class="sale-notic">' + "Cho thuê" + '</div>';
                            html += '</div>';
                            html += '<div class="feature-text"">';
                            html += '<div class="text-center feature-title">';
                            html += '<h5>' + value.category + '</h5>';
                            html += '<p><i class="fa fa-map-marker"></i>' +
                                ' ' + value.ward_id + '\n' +
                                ', ' + value.district_id + '\n' + ', ' + value.province_id + '</p>';
                            html += '</div>';
                            html += '<div class="room-info-warp">';
                            html += '<div class="room-info">';
                            html += '<div class="rf-left">';
                            html += '<p><i class="fa fa-bed"></i>' + value.totalBedRoom + ' ' + 'Phòng ngủ' + '</p>';
                            html += '</div>';
                            html += '<div class="rf-right">';
                            html += '<p><i class="fa fa-bath"></i>' + value.totalBathroom + ' ' + 'Phòng tắm' + '</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<a href="http://127.0.0.1:8000/' + value.id + '/detail/"' + value.category_id + ' class="room-price">' + numberFormat(value.price)
                                + ' ' + 'Đồng </a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</a>';
                            html += '</div>';
                        });
                        $('#div').html(html)

                    },
                    error: function (errors) {
                        console.log(errors)
                    }

                })
            });

        });

        function numberFormat(number) {
            return String(number).replace(/(.)(?=(\d{3})+$)/g, '$1,')
        }


    </script>
    <script>
        $(document).ready(function () {

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/fetch_data?page=" + page,
                    success: function (data) {
                        $('#table_paginate').html(data);
                    }
                });
            }
        });
    </script>
@endsection
