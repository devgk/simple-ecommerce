<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{
  public function index()
  {
    return view('admin.addProduct');
  }

  function store(Request $request){
    $this->validate($request, [
      'name'          => 'required',
      'quantity'      => 'required',
      'price'         => 'required',
      'description'   => 'required',
      'status'        => 'required',
    ]);

    $product_image_path = '';

    if($request->hasFile('image')){
      $name = strtolower(str_replace(' ', '-', $request->name)).'-'.time();
      $extension = $request->image->extension();

      $product_image_path = $request->image->storeAs(
        'product-images',
        $name.'.'.$extension,
        'public'
      );
    }

    Product::create([
      'name'        => $request->name,
      'quantity'    => $request->quantity,
      'price'       => $request->price,
      'description' => $request->description,
      'status'      => $request->status,
      'image'       => $product_image_path,
    ]);

    // Redirect to home page
    return redirect()->route('home');
  }
}
