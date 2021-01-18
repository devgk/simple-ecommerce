@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 mb-5">
      <h1>Manage Orders</h1>
      <p>Order Id: {{ $order->order_id }} <span class="px-2">|</span> Order Created: {{ $order->created_at->diffForHumans() }}</p>
    </div>

    <div class="col-12 mb-5">
      <form method="POST" action="{{ route('admin.manageOrder', $order) }}">
        @csrf
        
        <div class="form-group">
          <label for="status" class="form-label">Order Status</label>
          <div class="input-group">
            
            <select class="form-select" id="status" name="status">
              <option @php
                  if('incompplete' == $order->order_status) echo 'selected';
              @endphp value="incomplete">Incomplete</option>
              <option @php
                  if('completed' == $order->order_status) echo 'selected';
              @endphp value="completed">Completed</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Update</button>
          </div>
        </div>

      </form>
    </div>

    <div class="col-12 mb-5">
      <h3 class="mb-4">Orders Details</h3>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td style="width:250px">Product Name</td>
            <td>{{ $order->product_name }}</td>
          </tr>
          <tr>
            <td>Product Quantity</td>
            <td>{{ $order->quantity }}</td>
          </tr>
          <tr>
            <td>Product Price</td>
            <td>{{ $order->price }}</td>
          </tr>
          <tr>
            <td>Total Price</td>
            <td>{{ $order->total_price }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-12 mb-5">
      <h3 class="mb-4">Customer Details</h3>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td style="width:250px">Name</td>
            <td>{{ $order->user_name }}</td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td>{{ $order->user_mobile }}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{ $order->user_email }}</td>
          </tr>
          <tr>
            <td>Billing & Shippping Address</td>
            <td>{{ $order->user_address }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection