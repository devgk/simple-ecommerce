@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-5">My Account</h1>

      <form method="POST" action="{{ route('account') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="product-image" class="form-label">Profile Image</label>
          <input class="form-control" type="file" name="image">
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control readonly" value="{{ Auth()->user()->name }}" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control readonly" value="{{ Auth()->user()->email }}" readonly>
          </div>
        </div>

        <div class="mb-3">
          <label for="mobile" class="form-label">Mobile</label>
          <input type="text" id="mobile" name="mobile" class="form-control @error('mobile') border-danger @enderror" placeholder="Enter Phone Number" value="{{ Auth()->user()->mobile }}">

          @error('mobile')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Street Address</label>
          <input type="text" id="address" name="address" class="form-control @error('address') border-danger @enderror" placeholder="Enter Address" value="{{ Auth()->user()->address }}">

          @error('address')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="district" class="form-label">District</label>
            <input type="text" id="district" name="district" class="form-control @error('district') border-danger @enderror" placeholder="Enter District" value="{{ Auth()->user()->district }}">

            @error('district')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" id="city" name="city" class="form-control @error('city') border-danger @enderror" placeholder="Enter City" value="{{ Auth()->user()->city }}">

            @error('city')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" id="state" name="state" class="form-control @error('state') border-danger @enderror" placeholder="Enter State" value="{{ Auth()->user()->state }}">

            @error('state')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" id="country" name="country" class="form-control @error('country') border-danger @enderror" placeholder="Enter Country" value="{{ Auth()->user()->country }}">

            @error('country')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div>
          <button type="sumbit" class="btn btn-primary">Update Account</button>
        </div>

      </form>

    </div>
  </div>
</div>
@endsection