@extends('admin.layout.master')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a> <i class="fa fa-angle-right">Tables</i>
        </li>
    </ol>
    <div class="agile-tables">
        <div class="w3l-table-info">
            <div class="card-body">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nhu cầu</th>
                        <th>Loại nhà</th>
                        <th>Address</th>
                        <th>Mô tả</th>
                        <th>Chi tiết nhà</th>
                        <th>Giá theo đêm</th>
                        <th>Accept</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($houses as $key => $house)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$house->demand == 0 ? 'Cho Thuê': 'Bán'}}</td>
                            <td>{{$house->category->name}}</td>
                            <td>{{$house->province->name}} <br> {{$house->district->name}}
                                <br> {{$house->ward->name}} <br> {{$house->name_way}} <br> {{$house->house_number}}</td>
                            <td>{{$house->description}}</td>
                            <td>Số phòng ngủ:{{$house->totalBedroom}}, Số phòng tắm:{{$house->totalBathroom}}</td>
                            <td>{{$house->price}}</td>
                            <td><a href="{{ route('admin.houses.checkApprove', $house->id) }}"
                                   class="btn btn-primary btn-sm">Approve</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$houses->links()}}
            </div>
        </div>
    </div>
    <div class="inner-block">

    </div>
@endsection


