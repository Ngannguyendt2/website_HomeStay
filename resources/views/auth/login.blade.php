@extends('layouts.app')
@section('title','đăng nhập')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="form-control">
            <input type="email" id="email" class="@error('email') is-invalid @enderror " name="email"
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
                   placeholder="Password" id="password1">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 50px; margin-bottom: 10px">{{ $message }}</p>
            </span>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input style="margin-left: 40px" class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember" style="color: white">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div>
            <input type="submit" class="register" value="Login">
            @if (Route::has('password.request'))
                <a style="margin-left: 120px; color: orange" class="btn btn-link"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>

            @endif
        </div>
    </form>
@endsection

