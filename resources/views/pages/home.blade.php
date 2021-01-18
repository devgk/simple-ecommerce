@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-12">
      <h1 class="mb-5">Product Catalog</h1>
    </div>

    @if($products->count())
    @foreach($products as $product)
    <x-product :product="$product"/>
    @endforeach
    <div class="py-5">
      {{ $products->onEachSide(2)->links() }}
    </div>
    @else
    <div class="alert alert-warning" role="alert">
      Currently there is no products available!
    </div>
    @endif

  </div>
</div>
@endsection