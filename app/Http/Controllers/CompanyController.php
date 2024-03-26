<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Companyorder;
use App\Models\Company;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Ingredients;
use App\Models\Stock;
use App\Models\Table;
use App\Models\Food;
use Carbon\Carbon;

use Auth;

class CompanyController extends Controller
{
   
  public function index()
  {
    $product = Food::select('*')
                  ->where('availability','Yes')
                  ->get();
    $tableNumber = Table::get();
    return view('cart.carts-company', compact('product','tableNumber'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
      $this->validate($request, [
      'product_id' => 'required'
    ],
    [
      'product_id.required' => 'Please give a product'
    ]);

    if (Auth::check()) {
      $cart = Company::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }else {
      $cart = Company::where('ip_address', request()->ip())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }

    if (!is_null($cart)) {
      $cart->increment('product_quantity');
    }else {
      $cart = new Company();
      if (Auth::check()) {
        $cart->user_id = Auth::id();
      }
      $cart->ip_address = request()->ip();
      $cart->product_id = $request->product_id;
      $cart->fname = $cart->product->name;
    //   $pname= Ingredients::select('*')->where('foodname', $cart->fname)->first();
    //   $cart->pname = $pname->productname;
    //   $cart->tablename=$request->tablename;
      if(!empty($request->date)){
            $cart->date=$request->date;
        }
        else{
            $cart->date= Carbon::today();
        }
      $cart->save();
      
    }
    return redirect()->back()->with('message', 'Product has been added to cart!!');
    return back();
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $idindex
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $cart = Company::find($id);
    if (!is_null($cart)) {
      $cart->product_quantity = $request->product_quantity;
      $cart->save();
    }else {
      return redirect()->route('companycarts');
    }
    session()->flash('success', 'Cart item has updated successfully !!');
    return back();
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $cart = Company::find($id);
    if (!is_null($cart)) {
      $cart->delete();
    }else {
      return redirect()->route('carts-return');
    }
    session()->flash('success', 'Cart item has deleted !!');
    return back();
  }
}
