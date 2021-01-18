<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOutConfirmController extends Controller
{
  function index()
  {
    return view('shopPages.confirm');
  }
}
