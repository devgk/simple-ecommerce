@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">

    {{-- Title --}}
    <div class="col-12 mb-5">
      <h1>Checkout</h1>
    </div>

    <div class="col-md-6 col-12">
      <h4 class="mb-3">Your cart</h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <table>
              <tr>
                <td><img style="height: 50px;" src="{{ Storage::url('public/'.$product->image) }}"></td>
                <td>
                  <div class="pe-3">
                    <h6 class="my-0">{{ $product->name }}</h6>
                    <small class="text-muted">{{ $product->description }}</small>
                  </div>
                </td>
                <td>
                  <div>
                    <p class="mb-0">Quantity</p>
                    <input id="quantity-input" type="number" value="1" min="1" max="{{ $product->quantity }}" data-unit-price="{{ $product->price }}"/>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <span class="text-muted">INR
            <span id="single-unit-price">{{ $product->price }}</span>
          </span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (INR)</span>
          <strong id="total-price-display">INR {{ $product->price }}</strong>
        </li>
      </ul>

      <div>
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
      </div>
    </div>

    <div class="col-md-6 col-12">
      <h4 class="mb-3">Billing address</h4>
      <form method="POST" action="{{ route('order.add', $product) }}">
        @csrf
        <input hidden class="hidden" id="quantity-input-field" name="quantity" value="1" />

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
          <input type="text" id="address" name="address" class="form-control @error('address') border-danger @enderror" placeholder="Enter Phone Number" value="{{ Auth()->user()->address }}">

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

        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input type="radio" id="cod" class="custom-control-input" checked required>
            <label class="custom-control-label" for="cod">Cash On Delivery</label>
          </div>
        </div>

        <hr class="my-4">

        <button class="btn btn-primary" type="submit">Complete Checkout</button>

      </form>
    </div>

  </div>
</div>
@endsection