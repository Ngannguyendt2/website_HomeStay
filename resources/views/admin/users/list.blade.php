@extends('admin.layout.master')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ </a> <i class="fa fa-angle-right">Tables</i>
        </li>
    </ol>
    <div class="agile-tables">
        <div class="w3l-table-info">
            <h2 class="text-center">Danh sách người sử dụng</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Họ tên </th>
                    <th>Địa chỉ thư điện tử </th>
                    <th>Số điện thoại </th>
                    <th>Địa chỉ </th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) == 0)
                    <tr>
                        <td colspan="5" style="text-align: center">Không có dữ liệu </td>
                    </tr>
                @else
                    @foreach($users as $key => $user)
                        <tr>
                            <th>{{++$key}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{($user->admin==1) ? 'admin' : ''}}</td>
                            <td><a href="{{route('admin.users.destroy', $user->id)}}" class=" fa fa-trash btn btn-danger " onclick="return confirm('Bạn chắc chắn muốn xóa?')"></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="inner-block">

    </div>
@endsection


