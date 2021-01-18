@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-5">Add User</h1>

      <form method="POST" action="{{ route('admin.addUsers') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input id="name" name="name" type="text" class="form-control @error('name') border-danger @enderror" placeholder="Enter name">

          @error('name')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input id="username" name="username" type="text" class="form-control @error('username') border-danger @enderror" placeholder="Enter username">

          @error('username')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" type="email" class="form-control  @error('email') border-danger @enderror" placeholder="Enter email">

          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input id="password" name="password" type="password" class="form-control  @error('password') border-danger @enderror" placeholder="Enter password">

          @error('password')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Select Role</label>
          <select class="form-select" name="role" id="role">
            <option selected value="user">User</option>
            @foreach ($roles as $role)
            <option value="{{ $role }}">@php
              echo ucfirst($role)
            @endphp</option>
            @endforeach
          </select>
        </div>

        <div>
          <button type="sumbit" class="btn btn-primary">Add User</button>
        </div>

      </form>

    </div>
  </div>
</div>
@endsection