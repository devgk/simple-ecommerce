<?php

namespace App\Http\Controllers\Shop;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOrderController extends Controller
{
  function index(Request $request)
  {
    $orders = Order::where('user_id', $request->user()->id)->latest()->paginate(10);

    return view('shopPages.orders', [
      'orders' => $orders
    ]);
  }

  private function generate_ids($user_id)
  {
    return mt_rand().time().$user_id;
  }

  function store(Product $product, Request $request)
  {
    $this->validate($request, [
      'quantity'    => 'required|integer',
      'mobile'      => 'required|digits:10',
      'address'     => 'required|max:255',
      'district'    => 'required|max:255',
      'city'        => 'required|max:255',
      'state'       => 'required|max:255',
      'country'     => 'required|max:255',
    ]);

    $order_id = $this->generate_ids($request->user()->id);
    $ref_no = $this->generate_ids($request->user()->id);

    // By Default all the orders created initially will be in complete
    $order_status = 'incomplete';

    $product = Product::select('name', 'quantity', 'image', 'price')->where('id', '=', $product->id)->first();

    $total_price = (int)$request->quantity * (int)$product->price;

    // Full address including country
    $request->address = $request->address.', '.$request->district.', '.$request->city.', '.$request->state.', '.$request->country;

    Order::create([
      'order_id'          => $order_id,
      'ref_no'            => $ref_no,
      'user_id'           => $request->user()->id,
      'user_name'         => $request->user()->name,
      'user_mobile'       => $request->user()->mobile,
      'user_email'        => $request->user()->email,
      'user_address'      => $request->address,
      'product_name'      => $product->name,
      'product_image'     => $product->image,
      'quantity'          => $request->quantity,
      'price'             => $product->price,
      'total_price'       => $total_price,
      'order_status'      => $order_status,
    ]);

    User::where('id', $request->user()->id)->update(array(
      'mobile'    => $request->mobile,
      'district'  => $request->district,
      'city'      => $request->city,
      'state'     => $request->state,
      'country'   => $request->country,
    ));

    // Redirect to thankyou page
    return redirect()->route('checkout.completed');
  }
}
