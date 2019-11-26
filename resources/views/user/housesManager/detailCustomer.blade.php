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
            <div align="center" class="alert alert-success" role="alert">
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
            <div class="col-md-9 border border-dark" style="border-radius: 20px">
                <table style="margin-top: 20px; margin-bottom: 20px" class="table table-bordered table-hover">
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
                            <td><a href="{{route('houses.customer.checkApprove', $order->id)}}">Xác nhận</a></td>
                            <td><a href="{{route('houses.customer.delete', $order->id)}}">Hủy</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>

@endsection