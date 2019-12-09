@extends('layouts.master')
@section('content')
    <section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
        <div class="container text-white">
            <h2>Lịch thuê nhà của bạn</h2>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br>
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{Session::get('error')}}</strong>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{Session::get('success')}}</strong>
                    </div>
                @endif
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <button class="btn btn-outline-primary " id="linkHistoryOrder"><b>Đang chờ</b></button>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-outline-primary" id="linkRentedHouse"><b>Đã trả phòng</b>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-outline-primary" id="linkCancelOrder"><b>Đã hủy</b></button>
                            </li>
                        </ul>
                    </div>
                </nav>


                <div class="table-responsive text-nowrap">
                    <table style="margin-top: 20px; margin-bottom: 20px" class="table table-striped"
                           id="historyRentHouseTable">
                        <thead>
                        <tr id="historyRentHouseHeader">
                            <th>#</th>
                            <th>Loại nhà</th>
                            <th>Địa chỉ</th>
                            <th>Email liên hệ</th>
                            <th>Ngày thuê dự kiến</th>
                            <th>Ngày trả dự kiến</th>
                            <th>Tổng số tiền(VNĐ)</th>
                            <th id="clearOrder">Hủy thuê</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="rentedHouse">
                        @if(count($orders) == 0)
                            <tr>
                                <td colspan="9" style="text-align: center">Bạn chưa thuê nhà</td>
                            </tr>
                        @else
                            @foreach($orders as $key => $order)
                                <tr id="historyRentHouse">
                                    <td>{{++$key}}</td>
                                    <td>{{$order->house->category->name}}</td>
                                    <td>{{$order->house->ward->name}} - {{$order->house->district->name}}
                                        - {{$order->house->province->name}}</td>
                                    <td>{{$order->house->user->email}}</td>
                                    <td>{{$order->checkin}}</td>
                                    <td>{{$order->checkout}}</td>
                                    <td>{{number_format($order->totalPrice)}}</td>
                                    <td>
                                        <button class="fa fa-trash btn btn-danger"
                                                data-toggle="modal"
                                                data-target="#clearOrder{{$order->id}}" type="button"></button>
                                    </td>
                                </tr>
                                <div id="clearOrder{{$order->id}}" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 style="text-align: center">Lý do hủy thuê nhà </h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <div class="modal-body" style="overflow: hidden;">
                                                <strong id="alert"></strong>
                                                <div class="col-md-12">
                                                    <form method="POST" id="formCancelOrder">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group has-feedback col-md-12">

                                                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                                                       value="Tôi đặt sai lịch">Tôi đặt sai lịch <br>
                                                            </div>
                                                            <div class="form-group has-feedback col-md-12">
                                                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                                                       value="Tôi đặt sai địa chỉ "> Tôi đặt sai địa chỉ
                                                                <br>
                                                            </div>
                                                            <div class="form-group has-feedback col-md-12">
                                                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                                                       value="Tôi không có nhu cầu thuê nữa"> Tôi không
                                                                có nhu cầu thuê nữa
                                                                <br>
                                                            </div>

                                                            <div class="form-group has-feedback col-md-12">
                                                                <label>Lý do khác </label>
                                                            </div>
                                                            <div class="form-group has-feedback col-md-12">
                                                                <textarea name="reasons[]" style="width: 400px"
                                                                          id="reasons[]"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12" style="text-align: center">
                                                                <button type="button" id="submitCancelOrder"
                                                                        class="btn btn-primary btn-prime white btn-flat"
                                                                        onclick="return confirm('Bạn có thật sự muốn hủy')">
                                                                    Xác nhận
                                                                </button>
                                                                <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Hủy
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/ajaxHistoryRentedHouse.js')}}"></script>
    <script src="{{asset('js/ajaxHistoryCancelOrder.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('body').on('click', '#submitCancelOrder', function () {
                // e.preventDefault();
                let formCancelOrder = $("#formCancelOrder");
                let formData = formCancelOrder.serialize();
                console.log(formData)
                $.ajax({
                    url: "{{route('user.destroyOrder',['id'=>$order->id])}}",
                    type: 'POST',
                    data: formData,
                    success: function (result) {
                        if (result.status == 'success') {
                            alert(result.message);
                            location.reload();
                        }
                    },
                    error: function (error) {
                        let err = JSON.parse(error.responseText);

                    }
                });
            });
                $('#linkHistoryOrder').click(function () {

                    $.ajax({
                        url: 'http://localhost:8000/user/historyOrder',
                        type: 'GET',
                        data: 'JSON',
                        success: function (result) {
                            $('#rentedHouse').empty();
                            if (result.data.length > 0) {
                                for (let i = 0; i <= result.data.length; i++) {
                                    let html = '<tr id="historyRentHouse"><td>' + +(i + 1) + '</td><td>' + result.data[i].house.category.name + '</td><td>' + result.data[i].house.ward.name + '-' +
                                        '' + result.data[i].house.district.name + '-' + result.data[i].house.province.name + '</td><td>' + result.data[i].checkin + '</td><td>' + result.data[i].checkout + '</td>' +
                                        '<td>' + result.data[i].totalPrice + '</td><td><button class="fa fa-trash btn btn-danger"\n' +
                                        '                                                data-toggle="modal"\n' +
                                        '                                                data-target="#clearOrder{{$order->id}}" type="button"></button></td></tr>';
                                    $('#rentedHouse').append(html);
                                }

                            } else {
                                let html = '<tr id="historyRentHouse"><td colspan="6" style="text-align: center">Bạn chưa thuê nhà  </td></tr>';
                                $('#rentedHouse').append(html);
                            }
                        },
                        error: function (err) {

                        }
                    })
                })

        })

    </script>
@endsection
