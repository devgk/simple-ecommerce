<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
  function index(Product $product)
  {
    $product = Product::select('id', 'name', 'price', 'quantity', 'image', 'description', 'price')->where('id','=', $product->id)->first();

    return view('shopPages.checkout',[
      'product' => $product
    ]);
  }
}
