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
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection
