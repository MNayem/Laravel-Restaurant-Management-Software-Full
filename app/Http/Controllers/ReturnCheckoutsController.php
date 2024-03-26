<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Returnorder;
use App\Models\Returnback;

use Auth;

class ReturnCheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('cart.checkouts-return', compact('payments'));
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
      'name'  => 'required',
      'phone_no'  => 'required',
      'shop'  => 'required',
      'sr'  => 'required',
      'deliveryman'  => 'required',
      'payment_method_id'  => 'required'
    ]);

    $order = new Returnorder();

    // check transaction ID has given or not
    if ($request->payment_method_id != 'cash_in') {
      if ($request->transaction_id == NULL || empty($request->transaction_id)) {
        session()->flash('sticky_error', 'Please give transaction ID for your payment');
        return back();
      }
    }

    $order->name = $request->name;
    $order->email = $request->email;
    $order->phone_no = $request->phone_no;
    $order->shop = $request->shop;
    $order->sr = $request->sr;
    $order->deliveryman = $request->deliveryman;
    $order->message = $request->message;
    $order->ip_address = request()->ip();
    $order->transaction_id = $request->transaction_id;
    if (Auth::check()) {
      $order->user_id = Auth::id();
    }



    $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
    $order->save();

    foreach (Returnback::totalCarts() as $cart) {
      $cart->order_id = $order->id;
      $cart->save();
    }
    echo    $cart->save()?"Order Placement Success!":"Order Placement fail";

    /*session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
    return redirect()->route('productcart');*/
    }

    
}
