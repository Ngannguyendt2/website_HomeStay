@extends('layouts.app')
@section('title','đăng ký')
@section('content')
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="form-control w3layouts">
            <input type="text" id="firstname" name="name" class="@error('name') is-invalid @enderror"
                   placeholder="nhập tên đầy đủ"
                   title="Please enter a full name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 50px; margin-bottom: 10px">{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="form-control w3layouts">
            <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror"
                   placeholder="mail@example.com"
                   title="Please enter a valid email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 50px; margin-bottom: 10px">{{ $message }}</p>
            </span>
            @enderror
        </div>

        <div class="form-control agileinfo">
            <input type="password" class="lock @error('password') is-invalid @enderror" name="password"
                   placeholder="mật khẩu" id="password1">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 50px; margin-bottom: 10px">{{ $message }}</p>
            </span>
            @enderror
        </div>

        <div class="form-control agileinfo">
            <input type="password" class="lock @error('password') is-invalid @enderror" name="password_confirmation"
                   placeholder="xác nhận mật khẩu" id="password2">
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 50px; margin-bottom: 10px">{{ $message }}</p>
            </span>
        @enderror
        <input type="submit" class="register" value="Register">
    </form>
@endsection
