@extends('layouts.master')

@section('content')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <style></style>
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
                        <?php foreach (json_decode($house->image)as $picture) { ?>
                        <div class="sl-item set-bg">
                            <img src="{{asset('storage/images/'.$picture)}}">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
                        <?php foreach (json_decode($house->image)as $picture) { ?>
                        <div class="sl-thumb set-bg"><img src="{{asset('storage/images/'.$picture)}}"
                                                          style="height:120px; width:200px"></div>
                        <?php } ?>
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
                                    <div class="col-md-12">
                                        <p class="text text-black-50"
                                           style="margin-top: 10px; width: 180px; font-weight: bold">
                                            Giá: {{number_format($house->price)}} Đồng/ngày</p>

                                    </div>
                                    <div class="col-md-12">
                                        @if($house->status == 1 && (Auth::user()->id!=$house->user_id))
                                            <a style="width: 150px; margin-right: 15px" href="#" class="btn btn-primary"
                                               data-toggle="modal"
                                               data-target="#Order">Đặt phòng</a>
                                        @else
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Chi tiết căn hộ</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-user"></i>{{$house->user->name}}</p>
                                <p><i class="fa fa-bed"></i>{{$house->totalBedRoom}} Phòng ngủ</p>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-building-o"></i>{{$house->category->name}}</p>
                                <p><i class="fa fa-clock-o"></i>{{date('d/m/Y', strtotime($house->approved_at))}}</p>
                            </div>
                            <div class="col-md-4">
                                <p><i class="fa fa-bath"></i>{{$house->totalBathroom}} Phòng tắm</p>
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Mô tả</h3>
                        <div class="description">
                            {{$house->description}}
                        </div>

                        <h3 class="sl-sp-title">Nhận xét </h3>
                        <div class="row property-details-list">

                            <div class="container">
                                @if((Auth::user()->id)!=$house->user_id)
                                    <form method="POST" id="comment_form">
                                        <input type="hidden" id="house_id" name="house_id" value="{{$house->id}}">
                                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">

                                        <div class="form-group">
                                            <div class="rating">
                                                <input id="input-1" name="rate" class="rating rating-loading"
                                                       data-min="0"
                                                       data-max="5" data-step="1" data-size="xs"
                                                       value="{{ $house->userAverageRating }}">
                                                <input type="hidden" id="id-house-rating" name="id" required=""
                                                       value="{{ $house->id }}">
                                            </div>
                                            <textarea name="body" id="body" class="form-control"
                                                      placeholder="Enter Comment"
                                                      rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="comment_id" id="comment_id" value="0"/>
                                            <input type="submit" name="submit" id="submit" class="btn btn-info"
                                                   value="Bình luận"/>
                                        </div>
                                    </form>
                                @endif
                                <span id="comment_message"></span>
                                <br/>
                                {{ csrf_field() }}
                                <div id="display_comment"></div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="sl-sp-title bd-no">Vị trí</h3>
                        <div>
                            <iframe src="{{$house->map}}" width="690" height="550" frameborder="0" style="border:0"
                                    allowfullscreen></iframe>
                        </div>

                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-4 col-md-7 sidebar">
                    <div class="author-card">
                        <div class="author-img set-bg"
                             data-setbg="{{($house->user->image) ? asset('storage/'.$house->user->image) : asset('img/anhdaidien.jpg')}}"></div>
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
                        <h2>Căn hộ tương tự</h2>
                        @foreach($categories as $category)
                            <div class="rp-item">
                                <div class="rp-pic set-bg"
                                     style="background-image: url('{{asset('storage/images/'.(json_decode($house->image))[0])}}');"
                                     data-setbg="{{asset('storage/images/'.(json_decode($house->image))[0])}}">
                                    <div
                                        class="sale-notic">{{($category->status == 1 ? 'Cho thuê' : 'Đang sửa chữa' )}}</div>
                                </div>
                                <div class="rp-info">
                                    <h5>{{$category->category->name}}</h5>
                                    <p><i class="fa fa-map-marker"></i>{{$category->ward->name}}
                                        ,{{$category->district->name}}, {{$category->province->name}}</p>
                                </div>
                                <a href="{{route('web.detail', ['id'=>$house->id, 'category_id' => $house->category_id])}}"
                                   class="rp-price">{{number_format($category->price)}} Đồng/ngày</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div id="Order" class="modal" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center primecolor">Đặt thuê </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body" style="overflow: hidden;">
                            <strong style="margin-left: 50px" id="alert"></strong>
                            <div class="col-md-offset-1 col-md-10">
                                <form method="POST" id="OrderHouse">
                                    @csrf
                                    @if(Auth::user()->phone)
                                        <div class="form-group has-feedback" style="display: none">
                                            <label>Số điện thoại: </label>
                                            <input type="phone" name="phone" class="form-control"
                                                   placeholder="Nhập số điện thoại  " value="{{Auth::user()->phone}}">
                                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                            <span class="text-danger">
                                <strong id="phone-error"></strong>
                                        </span>
                                        </div>
                                    @else
                                        <div class="form-group has-feedback">
                                            <label>Số điện thoại: </label>
                                            <input type="phone" name="phone" class="form-control"
                                                   placeholder="Nhập số điện thoại  ">
                                            <span class="text-danger">
                                <strong id="phone-error"></strong>
                                        </span>
                                        </div>
                                    @endif
                                    <div class="form-group has-feedback">
                                        <label>Ngày ở: </label>
                                        <input type="text" name="checkin" id="checkin"
                                               data-provide="datepicker" class="form-control">
                                        <span class="text-danger">
                                <strong id="checkin-error"></strong>
                                        </span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label>Ngày trả: </label>
                                        <input type="hidden" value="{{$house->id}}" id="house_id">
                                        <input type="text" name="checkout" class="form-control" id="checkout">
                                        <span class="text-danger">
                                <strong id="checkout-error"></strong>
                                        </span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Tổng số tiền:</label>
                                        <strong id="price"></strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <button type="button" id="submitOrderHouse"

                                                    class="btn btn-primary btn-prime white btn-flat">Đặt Ngay
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

            $("#checkout").prop("disabled", true);
            $('#checkin,#checkout').datepicker({
                minDate: new Date()
            });

            $('#checkin').change(function () {
                let dateCheckin = new Date($('#checkin').val()).getTime();
                if (dateCheckin) {
                    $("#checkout").prop("disabled", false);
                }
                $('body').on('change', '#checkout', function () {
                    let dateCheckout = new Date($('#checkout').val()).getTime();

                    let date = new Date();
                    let datePrice = date.setTime((dateCheckout - dateCheckin) / 1000 / 60 / 60 / 24);
                    let priceOneDay = parseInt({{$house->price}});
                    totalPrice = priceOneDay * datePrice;
                    $('#price').html(numberFormat(totalPrice) + ' Đồng');
                });
            });

            $('#submitComment').click(function () {
                $('#body').css('display', 'block');
                $('#comment').css('display', 'block');
            });
            $('#comment').click(function () {
                let formComment = $('#formComment');
                let formData = formComment.serialize();

                console.log(formData);
                $.ajax({
                    url: "{{route('post.comment')}}",
                    type: 'POST',
                    data: formData,
                    success: function (result) {

                    },
                    error: function (err) {

                    }
                })
            });
            $('body').on('click', '#submitOrderHouse', function () {
                // e.preventDefault();

                let orderHouseForm = $("#OrderHouse");
                let formData = orderHouseForm.serialize();
                $('#phone-error').html("");
                $('#checkin-error').html("");
                $('#checkout-error').html("");
                $('#alert').html("");
                $.ajax({
                    url: "{{route('customer.order', $house->id)}}",
                    type: 'POST',
                    data: formData,
                    success: function (result) {
                        if (result.status == 'errors') {
                            $('#alert').html(result.message).css('color', 'red');
                        }
                        if (result.status == 'success') {
                            $('#alert').html(result.message).css('color', 'green');
                        }
                    },
                    error: function (error) {
                        let err = JSON.parse(error.responseText);
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
            });
        });

        function numberFormat(number) {
            return String(number).replace(/(.)(?=(\d{3})+$)/g, '$1,')
        }


    </script>
    <script>
        $(document).ready(function () {
            $('#comment_form').on('submit', function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();

                var data = {
                    form_data: form_data,
                    _token: "{{ csrf_token() }}",

                };
                $.ajax({
                    url: '{{route('post')}}',
                    data: data,
                    method: 'POST',
                    dataType: "JSON",
                    success: function (data) {
                        if (data.error !== '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            load_data('', _token, false);

                        } else {
                            alert('Đã đăng nhận xét thành công');
                            $('#comment_message').html(data.error);
                            load_data('', _tokenm, false);

                        }
                    }
                })
            });
            $(document).on('click', '.reply', function () {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#body').focus();
                load_data('', _token, false);
            });
        });


        var _token = $('input[name="_token"]').val();

        load_data('', _token);

        function load_data(id = "", _token, load_more) {
            $.ajax({
                url: "{{ route('getAll', $house->id) }}",
                method: "POST",
                data: {id: id, _token: _token},
                success: function (data) {
                    $('#load_more_button').remove();
                    if (load_more) {
                        $('#display_comment').append(data);
                    } else {
                        $('#display_comment').html(data);
                    }


                }
            })
        }

        $(document).on('click', '#load_more_button', function () {
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_data(id, _token, true);
        });


    </script>

@endsection

