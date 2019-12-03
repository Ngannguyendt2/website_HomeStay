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
                        <strong> {{Session::get('error')}}</strong>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{Session::get('success')}}</strong>
                    </div>
                @endif
                <div class="table-responsive text-nowrap">
                    <table style="margin-top: 20px; margin-bottom: 20px" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Loại nhà</th>
                            <th>Địa chỉ</th>
                            <th>Ngày thuê dự kiến</th>
                            <th>Ngày trả dự kiến</th>
                            <th>Tổng số tiền(VNĐ)</th>
                            <th>Hủy thuê</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($orders) == 0)
                            <tr>
                                <td colspan="9" style="text-align: center">Bạn chưa thuê nhà</td>
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
                                        <button class="fa fa-trash btn btn-danger"
                                           data-toggle="modal"
                                           data-target="#clearOrder"></button>
                                    </td>
                                </tr>
                            @endforeach
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
                                })

                            </script>
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="clearOrder" class="modal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="text-align: center">Lý do hủy thuê nhà </h3>
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
                                       value="Tôi đặt sai lịch">Tôi đặt sai lịch <br>
                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                       value="Tôi đặt sai địa chỉ "> Tôi đặt sai địa chỉ
                                <br>
                                <input type="checkbox" name="reasons[]" id="reasons[]"
                                       value="Tôi không có nhu cầu thuê nữa"> Tôi không có nhu cầu thuê nữa
                                <br>
                                <label>Lý do khác </label>
                                <textarea name="reasons[]" style="width: 400px" id="reasons[]"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center">
                                    <button type="button" id="submitCancelOrder"
                                            class="btn btn-primary btn-prime white btn-flat" onclick="return confirm('Bạn có thật sự muốn hủy')">Xác nhận
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

@endsection
