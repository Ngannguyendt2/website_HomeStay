@extends('layouts.app')
@section('title','đăng nhập')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="row">
            <div class="form-control">
                <input type="email" id="email" class="@error('email') is-invalid @enderror " name="email"
                       placeholder="mail@example.com"
                       title="Please enter a valid email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 100px; margin-bottom: 10px">{{ $message }}</p>
            </span>
                @enderror
            </div>
            <div class="form-control">
                <input type="password" class="lock @error('password') is-invalid @enderror" name="password"
                       placeholder="Mật khẩu" id="password1">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 100px; margin-bottom: 10px">{{ $message }}</p>
            </span>
                @enderror
            </div>
            <div class="form-control">
                <input style="margin-left: 100px" class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember" style="color: white">
                    {{ __('Nhớ mật khẩu') }}
                </label>
            </div>

            <div>
                <input type="submit" class="register" value="Đăng nhập">
                @if (Route::has('password.request'))
                    <a style="margin-left: 120px; color: orange" class="btn btn-link"
                       href="{{ route('password.request') }}">
                        {{ __('Bạn quên mật khẩu?') }}
                    </a>

                @endif
            </div>
        </div>

    </form>
@endsection

