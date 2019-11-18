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
        <div class="row" >
            <div class="col-md-12">
                <br>
                <h3 style="color: firebrick" align="center">THÔNG TIN CHI TIẾT VỀ NHÀ CỦA BẠN</h3>
                <table style="margin-top: 20px; margin-bottom: 20px" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nhu cầu</th>
                        <th>Loại nhà</th>
                        <th>Address</th>
                        <th>Mô tả</th>
                        <th>Chi tiết nhà</th>
                        <th style="background-color: gold">Giá theo đêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($houses as $key => $house)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$house->demand == 1 ? 'Cho thuê': 'Bán'}}</td>
                            <td>{{$house->category->name}}</td>
                            <td>{{$house->province->name}} <br> {{$house->district->name}}
                                <br> {{$house->ward->name}} <br> Đường: {{$house->name_way}} <br> Số nhà: {{$house->house_number}}</td>
                            <td>{{$house->description}}</td>
                            <td>Số phòng ngủ:{{$house->totalBedRoom}} <br>  Số phòng tắm:{{$house->totalBathroom}}</td>
                            <td style="background-color: gold">{{number_format($house->price)}} đồng</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$houses->links()}}
            </div>
        </div>
    </div>
    @endsection