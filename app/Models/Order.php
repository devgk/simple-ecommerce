<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'order_id',
    'ref_no',
    'user_id',
    'user_name',
    'user_mobile',
    'user_email',
    'user_address',
    'product_name',
    'product_image',
    'quantity',
    'price',
    'total_price',
    'order_status',
    'discount',
  ];
}
