@extends('admin.layout.master')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a> <i class="fa fa-angle-right">Tables</i>
        </li>
    </ol>
    <div class="agile-tables">
        <div class="w3l-table-info">
            <h2 class="text-center">Danh sách người sử dụng</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) == 0)
                    <tr>
                        <td colspan="5">No Data</td>
                    </tr>
                @else
                    @foreach($users as $key => $user)
                        <tr>
                            <th>{{++$key}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td><i class="fa fa-trash btn text-danger" aria-hidden="true"></i></td>
                            <td></td>
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


