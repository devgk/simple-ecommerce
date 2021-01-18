<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminManageOrderController extends Controller
{
  function index(Order $order, Request $request)
  {
    $order = Order::where('id', $order->id)->first();

    return view('admin.manageOrder', [
      'order' => $order
    ]);
  }
  
  function store(Order $order, Request $request)
  {
    $order_status = 'incomplete';

    if('completed' == $request->status) $order_status = 'completed';

    Order::where('id', $order->id)->update(array(
      'order_status' => $order_status
    ));

    return back();
  }
}
