<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
  function index()
  {
    $orders = Order::latest()->paginate(10);

    return view('admin.allOrders', [
      'orders' => $orders
    ]);
  }

  function store(Request $request)
  {
    return back();
  }
}
