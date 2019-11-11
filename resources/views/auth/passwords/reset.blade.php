@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-control w3layouts">

            <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email"
                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                   title="Please enter a valid email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-control agileinfo">
            <input id="password1" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   required
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-control agileinfo">
            <input id="password2" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                   required
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <input type="submit" class="register" value="Reset Password">

    </form>

@endsection
