@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-5">Add Product</h1>

      <form method="POST" action="{{ route('admin.product.add') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input id="name" name="name" type="text" class="form-control @error('name') border-danger @enderror" placeholder="Enter product name">

          @error('name')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="quantity" class="form-label">Product Quantity</label>
          <input id="quantity" name="quantity" type="number" class="form-control @error('quantity') border-danger @enderror" placeholder="Enter product quantity">

          @error('quantity')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Product Price</label>
          <input id="price" name="price" type="text" class="form-control  @error('price') border-danger @enderror" placeholder="Enter product price">

          @error('price')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="product-image" class="form-label">Product Image</label>
          <input class="form-control" type="file" name="image">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Product Description</label>
          <textarea id="description" name="description" cols="30" rows="4" class="form-control @error('description') border-danger @enderror" placeholder="Enter Product Description."></textarea>

          @error('description')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="product-status" class="form-label">Product Status</label>
          <select class="form-select" name="status" id="product-status">
            <option selected value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <div>
          <button type="sumbit" class="btn btn-primary">Create Product</button>
        </div>

      </form>

    </div>
  </div>
</div>
@endsection