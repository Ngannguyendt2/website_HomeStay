@extends('layouts.master')
@section('content')
    <!-- Page top section -->
    <section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
        <div class="container text-white">
            <h2>Nhà của bạn</h2>
        </div>
    </section>
    <!--  Page top end -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h3 align="center">Danh sách chi tiết khách hàng</h3>

                <table style="margin-top: 20px" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên đầy đủ</th>
                        <th>Địa chỉ Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày thuê dự kiến</th>
                        <th>Ngày trả dự kiến</th>
                        <th>Tổng số tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            @foreach($orders as $order)
                                @if($customer->id == $order->customer_id)
                                    <td>{{$order->checkin}}</td>
                                    <td>{{$order->checkout}}</td>
                                    <td>{{number_format($order->totalPrice)}} đồng</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{route('house.list', Auth::user()->id)}}">Back</a>
            </div>
        </div>
    </div>
@endsection
