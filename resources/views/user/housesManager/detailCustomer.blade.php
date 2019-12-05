@extends('layouts.master')
@section('content')
    <section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
        <div class="container text-white">
            <h2>Nhà của bạn</h2>
        </div>
    </section>

    <div class="site-breadcrumb">

        <img src="{{asset("img/banner.jpg")}}">
        <div style="margin-top: 20px" class="container">
            <a href="{{route('web.index')}}"><i class="fa fa-home"></i>Trang chủ</a>
            <span><i class="fa fa-angle-right"></i>Khách hàng của tôi</span>
        </div>
    </div>

    <div class="container-fluid">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h3 class="text-center">Danh sách khách hàng của tôi</h3>
        <div class="row" style="margin: 30px 0 30px 5px">
            <div class="col-md-3">
                <div class="col-md-12 border border-dark " style="border-radius: 20px ;height: 600px">
                    <p align="center" style="margin: 10px 0 10px 0">Xin chào: <strong>{{Auth::user()->name}}</strong>!
                    </p>

                    <div class="profile-img-container img-circle">
                        <img style=" margin-left: 10px;width: 200px; height: 200px;"
                             src="{{(Auth::user()->image)? asset('storage/'.Auth::user()->image) : asset('img/anhdaidien.jpg')}}"
                             class="img-thumbnail img-circle img-responsive rounded-circle" alt="ahihi"/>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <a href="{{route('house.list', Auth::user()->id)}}" class="btn btn-block"><i
                                class="fa fa-institution"></i> Nhà của tôi</a>
                    </div>
                    <hr>
                    {{--                    <div class="col-md-12">--}}
                    {{--                        <a href="{{route('houses.customer.approve')}}" class="btn btn-block"><i--}}
                    {{--                                    class="fa fa-battery"></i> Khách hàng của tôi</a>--}}
                    {{--                    </div>--}}
                    {{--                    <hr>--}}
                </div>
            </div>
            <div class="col-md-9 table-responsive text-nowrap" style="border-radius: 20px">
                <table style="margin-top: 20px; margin-bottom: 20px" class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khách</th>
                        <th>Địa chỉ Email</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian đặt</th>
                        <th>Thời gian nhận phòng</th>
                        <th>Thời gian trả phòng</th>
                        <th>Tổng tiền <br> (VNĐ)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders)==0)
                        <tr>
                            <td colspan="8">Chưa có ai thuê nhà này của bạn</td>
                        </tr>
                    @else
                        @foreach($orders as $key => $order)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$order->customer->name}}</td>
                                <td>{{$order->customer->email}}</td>
                                <td>{{$order->customer->phone}}</td>
                                <td>{{$order->customer->created_at->diffForHumans()}}</td>
                                <td>{{$order->checkin}}</td>
                                <td>{{$order->checkout}}</td>
                                <td>{{number_format($order->totalPrice)}}</td>
                                <td><a href="{{route('houses.customer.checkApprove',['id'=>$order->id])}}"
                                       class="fa fa-check btn btn-primary"></a></td>
                                <td>
                                    <button type="button"
                                            class="fa fa-trash-o btn btn-danger" data-toggle="modal"
                                            data-target="#clearOrder"></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>

    <div id="clearOrder" class="modal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="text-align: center">Lý do hủy </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <strong id="alert"></strong>
                    <div class="col-md-12">
                        <form method="POST" id="formCancelOrder">
                            @csrf
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                       value="The house is in the process of repairing"> Nhà đang trong quá trình sửa
                                chữa <br>
                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                       value="Has transferred ownership to others"> Đã bàn giao quyền sở hữu cho người
                                khác
                                <br>
                                <label>Lý do khác </label>
                                <textarea name="reasons[]" style="width: 400px" id="reasons[]"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center">
                                    <button type="button" id="submitCancelOrder"
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
    <script type="text/javascript">

        $(document).ready(function () {
            $('body').on('click', '#submitCancelOrder', function () {
                // e.preventDefault();
                let formCancelOrder = $("#formCancelOrder");
                let formData = formCancelOrder.serialize();
                $.ajax({
                    url: "{{route('houses.customer.delete', ['id'=>$order->id])}}",
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
        })

    </script>
@endsection
