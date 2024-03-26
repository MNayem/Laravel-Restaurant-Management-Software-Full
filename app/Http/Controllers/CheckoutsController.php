<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Ingredients;
use App\Models\Stock;
use App\Models\Food;
use Carbon\Carbon;

use Auth;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('cart.checkouts', compact('payments'));
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
      'address'  => 'required',
      'payment_method_id'  => 'required'
    ]);

    $order = new Order();

    // check transaction ID has given or not
    
    if ($request->payment_method_id != 'cash_in') {
      if ($request->transaction_id == NULL || empty($request->transaction_id)) {
        session()->flash('sticky_error', 'Please give transaction ID for your payment');
        return back();
      }
    }
    $order->pname = $request->pname;
    $order->pid = $request->pid;
    $pname= Ingredients::select('*')->where('foodname', $order->pname)->first();
    $order->fname = $pname->productname;
    $order->quantity = $request->quantity;
    $order->vat = 0;
    $amount = Food::select('*')->where('name', $order->pname)->first();
    $order->amount = $amount->sellingprice;
    $order->tamount = ($order->amount * $order->quantity) + $order->vat;
    $order->name = $request->name;
    if(!empty($request->date)){
        $order->date=$request->date;
    }
    else{
        $order->date= Carbon::today();
    }
    $order->phone_no = $request->phone_no;
    $order->address = $request->address;
    $order->message = $request->message;
    $order->ip_address = request()->ip();
    $order->transaction_id = $request->transaction_id;
    if (Auth::check()) {
      $order->user_id = Auth::id();
    }



    $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
    
    
    $order->save();
    
     
    // return view('cart.checkouts',compact('productName'));

    foreach (Cart::totalCarts() as $cart) {
      $cart->order_id = $order->id;
    //   $cart->fname = $order->pname;
    //   $cart->pname = $order->fname;
      $cart->vat = 0;
      $amount = Food::select('*')->where('name', $cart->fname)->first();
      $cart->amount = $amount->sellingprice;
      $cart->tamount = ($cart->amount * $cart->product_quantity) + $cart->vat;
      $cart->cname = $order->name;
      $cart->cphone = $order->phone_no;
      $cart->caddress = $order->address;
      $cart->transaction_id = $order->transaction_id;
      $cart->save();
      
         $remstock = Stock::select('*')
                ->where('productname','=', $cart->pname)
                ->first();
                //echo $remstock->id;
        
        $numberOfOrders = Ingredients::select('*')
                        ->where('foodname','=',$cart->fname)
                        ->first();
        
        $remstock->remainingstock =  $remstock->stock - ($numberOfOrders->quantity * $cart->product_quantity);
        //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
        $data=Stock::find($remstock->id);
        $data->remainingstock = $remstock->remainingstock;
        $data->stock = $remstock->remainingstock;
        
        $data->save();
    }
    
    
    $cart->save();
    
    
    // $OrderID = Cart::find($order->id);
    //     $OrderID->order_id = $order->id;
        
    //     $OrderID->save();
        
    // $foodName = Cart::select('*')
    //           ->where('order_id',$order->id)
    //           ->skip(0)->take('*')
    //           ->get();
    //     foreach ($foodName as $fName)
    //     {
    //         if($fName->product_id != $order->pid){
    //             $fName->fname = $order->pname;
    //         }else{
    //             $fName->fname = $order->pname;
    //         }
    //     }
    //     $fName->save();
    
    // $productName = Cart::find($order->id);
    //         $productName->pname = $order->fname;
        
    //     $productName->save();
        
    // $singleAmount = Cart::find($order->id);
    //         $singleAmount->amount = $order->amount;
        
    //         $singleAmount->save();
        
    //  $customaerInfo = Cart::find($id);
    //  if($customaerInfo->order_id == $order->id){
    //     $customaerInfo->cname = $order->name;
    //     $customaerInfo->cphone = $order->phone_no;
    //     $customaerInfo->caddress = $order->address;
        
    //     $customaerInfo->save();
    //  }
           

    
    //  $orderDate = Cart::find($order->id);
    //          $orderDate->date = $order->date;
        
    //          $orderDate->save();
    
    // $customerPnone = Cart::find($order->id);
    //         $customerPnone->cphone = $order->phone_no;
        
    //         $customerPnone->save();
        
    //  $customerAddress = Cart::find($order->id);
    //         $customerAddress->caddress = $order->address;
        
    //         $customerAddress->save();
        
    
    // $remstock = Stock::select('*')
    //             ->where('productname','=', $order->fname)
    //             ->first();
    //             //echo $remstock->id;
        
    //     $numberOfOrders = Ingredients::select('*')
    //                     ->where('foodname','=',$order->pname)
    //                     ->first();
        
    //     $remstock->remainingstock =  $remstock->stock - ($numberOfOrders->quantity * $order->quantity);
    //     //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
    //     $data=Stock::find($remstock->id);
    //     $data->remainingstock = $remstock->remainingstock;
    //     $data->stock = $remstock->remainingstock;
        
    //     $data->save();
        
    
     return redirect()->to('/')->with('message', 'Order Placed Successfully, Please wait with patience!!');
    //echo    $cart->save()?"Order Placement Success!":"Order Placement fail";

    /*session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
    return redirect()->route('productcart');*/
    }
    
    /* Checkouts Front */
    
    public function cehckoutfront()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        
        return view('cart.cehckoutfront', compact('payments'));
    }
    
    public function frontstore(Request $request)
    {
        $this->validate($request, [
      'name'  => 'required',
      'phone_no'  => 'required',
      'address'  => 'required',
      'payment_method_id'  => 'required'
    ]);

    $order = new Order();

    // check transaction ID has given or not
    if ($request->payment_method_id != 'cash_in') {
      if ($request->transaction_id == NULL || empty($request->transaction_id)) {
        session()->flash('sticky_error', 'Please give transaction ID for your payment');
        return back();
      }
    }
    $order->pname = $request->pname;
    $order->quantity = $request->quantity;
    
    $order->name = $request->name;
    if(!empty($request->date)){
            $order->date=$request->date;
        }
        else{
            $order->date= Carbon::today();
        }
    $order->phone_no = $request->phone_no;
    $order->address = $request->address;
    $order->message = $request->message;
    $order->ip_address = request()->ip();
    $order->transaction_id = $request->transaction_id;
    if (Auth::check()) {
      $order->user_id = Auth::id();
    }



    $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
    
    $productName=Ingredients::select('*')
                ->where('foodname', $order->pname)
                ->get();
    
    $order->save();

    foreach (Cart::totalCarts() as $cart) {
      $cart->order_id = $order->id;
      $cart->save();
    }
    $cart->save();
    
    return redirect()->to('/')->with('message', 'Order Placed Successfully, Please wait with patience!!');

    /*session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
    return redirect()->route('productcart');*/
    }
}
