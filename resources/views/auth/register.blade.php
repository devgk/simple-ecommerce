@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow">
                <div class="card-header text-center">Register Your Account</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name-field" class="form-label">Full Name</label>
                            <input id="name-field" name="name" type="text" class="form-control @error('name') border-danger @enderror" placeholder="Enter your fullname" value="{{ old('name') }}">

                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username-field" class="form-label">Username</label>
                            <input id="username-field" name="username" type="text" class="form-control @error('username') border-danger @enderror" placeholder="Enter your username" value="{{ old('username') }}">

                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Email address</label>
                            <input id="email-field" name="email" type="email" class="form-control @error('email') border-danger @enderror" placeholder="Enter your email" value="{{ old('email') }}">

                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-field" class="form-label">Password</label>
                            <input id="password-field" name="password" type="password" class="form-control @error('password') border-danger @enderror" placeholder="Chose Password">

                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="confirm-password-field" class="form-label">Confirm Password</label>
                            <input id="confirm-password-field" name="password_confirmation" type="password" class="form-control @error('password') border-danger @enderror" placeholder="Confirm Password">

                            @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <button type="sumbit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light">
                    <p class="m-0">
                        <a href="{{ route('login') }}" class="text-decoration-none">Existing User Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
