@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-5">My Orders</h1>

      @if ($orders->count())
      @foreach ($orders as $order)
      <ul class="list-group mb-3">
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
          <table>
            <tr>
              <td><img style="height: 50px;" src="@php
                if(empty($order->product_image)) echo asset('/media/images/product.png');
                else echo Storage::url('public/'.$order->product_image);
              @endphp"></td>
              <td>
                <div class="pe-3">
                  <h6 class="mb-2">{{ $order->product_name }}</h6>
                </div>
                <div>
                  <small class="text-muted">Quantity: {{ $order->product_quantity }}</small>
                </div>
                <div>
                  <small class="text-muted">Total Price: INR {{ $order->total_price }}</small>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div>
          <h6 class="mb-2">Order ID: {{ $order->order_id }}</h6>
          <div>
            <small class="text-muted">Refrence Number: {{ $order->ref_no }}</small>
          </div>
          <div>
            <small class="text-muted">Created: {{ $order->created_at->diffForHumans() }}</small>
          </div>
        </div>
        <div>
          <h6 class="mb-2">Order Total: INR {{ $order->total_price }}</h6>
          <div>
            @if ('incomplete' == $order->order_status)
              <small class="text-muted">Order Status: <span class="text-danger">Incomplete</span></small>
            @else
              <small class="text-muted">Order Status: <span class="text-success">Completed</span></small>
            @endif
          </div>
        </div>
      </li>
      </ul>
      @endforeach
      <div class="py-5">
        {{ $orders->onEachSide(2)->links() }}
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        No orders created so far!
      </div>
      @endif

    </div>
  </div>
</div>
@endsection