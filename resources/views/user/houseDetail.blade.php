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
                <h3 style="color: firebrick" align="center">Lịch thuê nhà của bạn</h3>
                <table style="margin-top: 20px; margin-bottom: 20px" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Loại nhà</th>
                        <th>Địa chỉ</th>
                        <th>Ngày thuê dự kiến</th>
                        <th>Ngày trả dự kiến</th>
                        <th>Tổng số tiền(VNĐ)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders) == 0)
                        <tr>
                            <td colspan="6">Bạn chưa thuê nhà</td>
                        </tr>
                    @else
                        @foreach($orders as $key => $order)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$order->house->category->name}}</td>
                                <td>{{$order->house->ward->name}}, {{$order->house->district->name}}
                                    , {{$order->house->province->name}}</td>
                                <td>{{$order->checkin}}</td>
                                <td>{{$order->checkout}}</td>
                                <td>{{number_format($order->totalPrice)}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
