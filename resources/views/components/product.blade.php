@props(['product' => $product])

<div class="col-4">
  <div class="card">
    <img src="@php
      if(empty($product->image)) echo asset('/media/images/product.png');
      else echo Storage::url('public/'.$product->image);
    @endphp" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text m-0">{{ $product->details }}</p>
    </div>
    <div class="card-body bg-light border-top">
      <a href="#" class="btn btn-outline-dark disabled">Peice {{ $product->price }} INR</a>
      <a href="{{ route('checkout', $product) }}" class="btn btn-primary float-end">Buy Now</a>
    </div>
  </div>
</div>