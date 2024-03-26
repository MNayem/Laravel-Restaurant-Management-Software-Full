<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table =  'carts' ; 
    
public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  public function product()
  {
    return $this->belongsTo(Food::class);
  }
  public static function totalCarts()
  {
    /**if (Auth::check()) {
      $carts = Cart::where('user_id', Auth::id())
      ->orWhere('ip_address', request()->ip())
      ->where('order_id', NULL)
      ->get();
    }else {
    */
      $carts = Cart::where('ip_address', request()->ip())
            ->where('order_id', NULL)
            ->get();
    //}
    return $carts;
  }
  public static function totalItems()
  {
    $carts = Cart::totalCarts();

    $total_item = 0;

    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }
    return $total_item;
  }
}
