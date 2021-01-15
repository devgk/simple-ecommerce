@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow">
                <div class="card-header text-center">Login To Your Account</div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-danger mb-3" role="alert">
                        {{ session('status') }}
                      </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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

                        <div>
                            <button type="sumbit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light">
                    <p class="m-0">
                        <a href="{{ route('register') }}" class="text-decoration-none">New User Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection