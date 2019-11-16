@extends('layouts.app')

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-control w3layouts">
                <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email"
                       placeholder="mail@example.com"
                       title="Please enter a valid email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <p style="color:red; margin-left: 50px; margin-bottom: 10px">{{ $message }}</p>
            </span>
                @enderror
            </div>

            <input type="submit" class="register" value="Send Password Reset Link">

        </form>
    </div>

@endsection
