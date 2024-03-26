<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Ingredients;
use App\Models\Stock;
use App\Models\Food;
use App\Models\Table;
use Carbon\Carbon;


use Auth;

class CartsController extends Controller
{
   
  public function index(){
    return view('cart.carts');
  }

  public function cartshome(){
    return view('cart.cartshome');
  }

  public function store(Request $request){
     $this->validate($request, [
      'product_id' => 'required'
    ],
    [
      'product_id.required' => 'Please give a product'
    ]);

    if (Auth::check()) {
      $cart = Cart::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }else {
      $cart = Cart::where('ip_address', request()->ip())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }

    if (!is_null($cart)) {
      $cart->increment('product_quantity');
    }else {
      $cart = new Cart();
      if (Auth::check()) {
        $cart->user_id = Auth::id();
      }
      $cart->ip_address = request()->ip();
      $cart->product_id = $request->product_id;
      $cart->fname = $cart->product->name;
      $pname= Ingredients::select('*')->where('foodname', $cart->fname)->first();
    //   $cart->pname = $pname->productname;
    //   $cart->vat = 0;
    // //   $amount = Food::select('*')->where('name', $cart->fname)->first();
    // //   $cart->amount = $amount->sellingprice;
    //   $cart->amount = $cart->product->sellingprice;
    //   $cart->tamount= $cart->amount * $cart->product_quantity ; 
          
    //   //$cart->tamount= $cart->amount * $cart->product_quantity ; 
    //   //$cart->tamount = ($cart->amount * $request->product_quantity) + $cart->vat;
      if(!empty($request->date)){
            $cart->date=$request->date;
        }
        else{
            $cart->date= Carbon::today();
        }
      $cart->save();
      
    }
    //   $remstock = Stock::select('*')
    //             ->where('productname','=', $cart->pname)
    //             ->first();
    //             //echo $remstock->id;
        
    //     $numberOfOrders = Ingredients::select('*')
    //                     ->where('foodname','=',$cart->fname)
    //                     ->first();
        
    //     $remstock->remainingstock =  $remstock->stock - ($numberOfOrders->quantity * $cart->product_quantity);
    //     //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
    //     $data=Stock::find($remstock->id);
    //     $data->remainingstock = $remstock->remainingstock;
    //     $data->stock = $remstock->remainingstock;
        
    //     $data->save();
    return redirect()->to('/')->with('message', 'Product has been added to cart!!');
    // session()->flash('success', 'Product has added to cart !!');
    return back();
  }

  public function update(Request $request, $id){
    $cart = Cart::find($id);
    if (!is_null($cart)) {
      $cart->product_quantity = $request->product_quantity;
      $cart->save();
    }else {
      return redirect()->route('carts');
    }
    return redirect()->back()->with('message', 'Cart item has updated successfully !!');
    // session()->flash('success', 'Cart item has updated successfully !!');
    return back();
  }

  public function destroy($id){
    $cart = Cart::find($id);
    if (!is_null($cart)) {
      $cart->delete();
    }else {
      return redirect()->route('carts');
    }
    session()->flash('success', 'Cart item has deleted !!');
    return back();
  }
}
