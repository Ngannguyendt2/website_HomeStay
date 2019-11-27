@extends('layouts.master')
@section('content')
    <!-- Page top section -->
    <section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg.jpg')}}">
        <div class="container text-white">
            <h2>Nhà của tôi</h2>
        </div>
    </section>
    <!--  Page top end -->

    <div class="site-breadcrumb">

        <img src="{{asset("img/banner.jpg")}}">
        <div style="margin-top: 20px" class="container">
            <a href="{{route('web.index')}}"><i class="fa fa-home"></i>Trang chủ</a>
            <span><i class="fa fa-angle-right"></i>Nhà của tôi</span>
        </div>
    </div>
    <div class="container-fluid">
        <h3 class="text-center">Danh sách nhà của tôi</h3>
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
{{--                    @if(count($houses) > 0)--}}
{{--                        <hr>--}}
{{--                        <div class="col-md-12">--}}
{{--                            <a href="{{route('houses.customer.approve')}}" class="btn btn-block"><i--}}
{{--                                        class="fa fa-battery"></i> Khách hàng của tôi</a>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                    @endif--}}
                </div>
            </div>
            <div class="col-md-9 border border-dark" style="border-radius: 20px">
                @if(count($houses) == 0)
                    <h3 style="color: blueviolet; margin-top: 250px" align="center">Bạn không có nhà đăng</h3>
                @else
                    <table style="margin-top: 20px; margin-bottom: 20px" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nhu cầu</th>
                            <th>Loại nhà</th>
                            <th>Địa chỉ</th>
                            <th>Mô tả</th>
                            <th>Chi tiết nhà</th>
                            <th style="background-color: burlywood">Giá/ngày (VNĐ)</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($houses as $key => $house)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$house->demand == 1 ? 'Cho thuê': 'Bán'}}</td>
                                <td>{{$house->category->name}}</td>
                                <td>{{$house->province->name}} <br> {{$house->district->name}}
                                    <br> {{$house->ward->name}} <br> Đường: {{$house->name_way}} <br> Số
                                    nhà: {{$house->house_number}}</td>
                                <td>{{$house->description}}</td>
                                <td>Số phòng ngủ:{{$house->totalBedRoom}} <br> Số phòng tắm:{{$house->totalBathroom}}
                                </td>
                                <td style="background-color: burlywood">{{number_format($house->price)}}</td>
                                <td style="{{count($house->customers) == 0 ? 'background-color: red' : 'background-color: green'}}">
                                    <a style="color: black" href="{{route('houses.customer.approve', $house->id)}}">Chi
                                        tiết</a><br>Có {{count($house->customers)}} khách đặt
                                </td>
                                <td><a style="color: red" href="#">Hủy Đăng</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
                {{$houses->links()}}
            </div>
        </div>
    </div>

@endsection

