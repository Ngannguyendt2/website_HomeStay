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
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong > {{Session::get('error')}}</strong>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{Session::get('success')}}</strong>
                    </div>
                @endif

                <table style="margin-top: 20px; margin-bottom: 20px" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Loại nhà</th>
                        <th>Địa chỉ</th>
                        <th>Ngày thuê dự kiến</th>
                        <th>Ngày trả dự kiến</th>
                        <th>Tổng số tiền(VNĐ)</th>
                        <th>Hủy thuê</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders) == 0)
                        <tr>
                            <td colspan="7">Bạn chưa thuê nhà</td>
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
                                <td>
                                    <a class="fa fa-trash btn btn-danger"
                                            id="destroyOrder" onclick="return confirm('Bạn có thật sự muốn hủy thuê nhà ')" href="{{route('user.destroyOrder',['id'=>$order->id])}}"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $('body').on('click', '#destroyOrder', function () {--}}

{{--                $.ajax({--}}
{{--                    url: "{{route('user.destroyOrder',['id'=>$order->id])}}",--}}
{{--                    type: 'GET',--}}
{{--                    success: function (result) {--}}
{{--                        if (result.status == 'errors') {--}}
{{--                            alert('Bạn không thể hủy trong 1 ngày trước thời gian thuê');--}}
{{--                        }--}}
{{--                        if (result.status == 'success') {--}}
{{--                            alert('Bạn đã hủy order thành công ');--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        let err = JSON.parse(error.responseText);--}}
{{--                      console.log(error);--}}
{{--                    }--}}
{{--                });--}}

{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endsection
