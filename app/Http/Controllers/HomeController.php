<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('pages.home', [
            'products' => $products,
        ]);
    }
}
