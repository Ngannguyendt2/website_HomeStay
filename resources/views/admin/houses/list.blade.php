@extends('admin.layout.master')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a> <i class="fa fa-angle-right">Tables</i>
        </li>
    </ol>
    <div class="agile-tables">
        <div class="w3l-table-info">
            <h2 class="text-center">Danh sách nhà</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nhu cầu</th>
                    <th>Loại nhà</th>
                    <th>Address</th>
                    <th>Mô tả</th>
                    <th>Chi tiết nhà</th>
                    <th>Giá/ngày (VNĐ)</th>
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
                            <br> {{$house->ward->name}} <br> Đường: {{$house->name_way}} <br> Số nhà: {{$house->house_number}}</td>
                        <td>{{$house->description}}</td>
                        <td>Số phòng ngủ:{{$house->totalBedRoom}} <br>  Số phòng tắm:{{$house->totalBathroom}}</td>
                        <td>{{number_format($house->price)}} đồng</td>
                        <td>{{$house->status}}</td>
{{--                        <td><a href="{{route('admin.houses.destroy', $house->id)}}" class="text-danger">Delete</a></td>--}}

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="inner-block">

    </div>

@endsection
