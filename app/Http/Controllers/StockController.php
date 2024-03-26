<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\DamageProduct;
use App\Models\DueList;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Food;
use App\Models\Ingredients;
use App\Models\Deliveryman;
use App\Models\DailySales;
use App\Models\Collection;
use App\Models\CollectionStatement;
use App\Models\DailysaleRestaurant;
use App\Models\Table;
use App\Models\Waiter;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    /*Stock Add */
    public function stockadd()
     {
       $productname = Product::get();
        return view('stock.stockadd',compact('productname'));
     }
    public function stockstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $stock=new Stock;
        $stock->email= $user_email;
        //$stock->date= $request->date;
        if(!empty($request->date)){
            $stock->date=$request->date;
        }
        else{
            $stock->date= Carbon::today();
        }
        $stock->productname= $request->title;
        $stock->openningstock=$request->openningstock;
        //$stock->needperpiece= $request->needperpiece;
        $stock->remainingstock= $request->openningstock + $request->remainingstock;
        $stock->stock= $stock->remainingstock;

	     $stock->save();
	      return redirect()->back()->with('message', 'Stock has been added successly!!');
	    }
	/*Stock Show */
    public function stockshow()
    {
      $stockshow= Stock::select('*')
                ->orderBy('id', 'DESC')
                ->get();
      return view('stock.stocklist',compact('stockshow'));
    }
	/*Edit and Delete Stock */
    public function stockedit($id)
    {
        $data=Stock::find($id);
        return view('stock.stockedit', compact('data'));
    }
    public function stockeditprocess(Request $request, $id)
    {
        $data=Stock::find($id);
        if(!empty($request->date)){
            $data->date=$request->date;
        }
        else{
            $data->date= Carbon::today();
        }
        $data->productname= $request->productname;
        $data->openningstock= $request->openningstock;
        
        $data->save();
      	return redirect()->to('/stockshow')->with('message1', 'Stock has been updated successly!!');  
    }

    /* Delete Stock */
    public function deletestock($id)
    {
        $data=Stock::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Stock has been deleted successly!!');
    }

    /*Damage Product Add */

    public function damageproductadd()
     {
       $productname = Product::get();
       $deliverymanname = Deliveryman::get();
        return view('stock.damageproductadd',compact('productname','deliverymanname'));
     }
    public function damageproductstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $damageproduct=new DamageProduct;
        $damageproduct->email= $user_email;
        $damageproduct->date= $request->date;
        $damageproduct->productname= $request->title;
        $damageproduct->deliverymanname= $request->name;
        $damageproduct->totalproduct= $request->totalproduct;

	     $damageproduct->save();
	      return redirect()->back()->with('message', 'Damage Product has been added successly!!');
	    }
	/*Stock Show */
    public function damageproductkshow()
    {
      $damageproductshow= DamageProduct::select('*')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('stock.damageproductlist',compact('damageproductshow'));
    }
	/*Edit and Delete Stock */
    public function damageproductedit($id)
    {
        $data=DamageProduct::find($id);
        return view('stock.damageproductedit', compact('data'));
    }
    public function damageproducteditprocess(Request $request, $id)
    {
        $data=DamageProduct::find($id);
        $data->date= $request->date;
        $data->productname= $request->productname;
        $data->deliverymanname= $request->deliverymanname;
        $data->totalproduct= $request->totalproduct;
        
        $data->save();
      	return redirect()->to('/damageproductkshow')->with('message1', 'Damage Product has been updated successly!!');  
    }

    /* Delete Stock */
    public function deletedamageproduct($id)
    {
        $data=DamageProduct::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Damage Product has been deleted successly!!');
    }

     /*Due List Add */
        
     //Delivertyman Due    
     public function dueadd()
     {
       $shopname = Shop::get();
       $deliverymanname = Deliveryman::get();
        return view('stock.dueadd',compact('shopname','deliverymanname'));
     }
    public function duestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $due=new DueList;
        $due->email= $user_email;
        //$due->date= $request->date;
        if(!empty($request->date)){
            $due->date=$request->date;
        }
        else{
            $due->date= Carbon::today();
        }
        $due->deliverymanname=$request->name;
        $due->shopname= $request->shopname;
        $due->amount= $request->amount;

         $due->save();

          return redirect()->back()->with('message', 'Due has been added successly!!');
        }
    
    //Others Due
    public function dueaddothers()
     {
       $shopname = Shop::get();
       //$deliverymanname = Deliveryman::get();
        return view('stock.dueaddothers',compact('shopname'));
     }
    public function othersduestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $due=new DueList;
        $due->email= $user_email;
        //$due->date= $request->date;
        if(!empty($request->date)){
            $due->date=$request->date;
        }
        else{
            $due->date= Carbon::today();
        }
        $due->deliverymanname="Myself";
        $due->shopname= $request->shopname;
        $due->amount= $request->amount;

         $due->save();

          return redirect()->back()->with('message', 'Due has been added successly!!');
        }
        
    /*Due List Show All*/
    public function dueshow()
    {
      $dueshow= DueList::select('*')
                ->orderBy('id', 'DESC')
                ->get();
      return view('stock.duetable',compact('dueshow'));
    }
    
    /* Individual Expense */
    
    //Jahangir
    public function dueshowjahangir()
    {
      $dueshowjahangir= DueList::select('*')
                        ->where('deliverymanname','jahangir')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('stock.dueshowjahangir',compact('dueshowjahangir'));
    }
    //Yeasin
    public function dueshowyeasin()
    {
      $dueshowyeasin= DueList::select('*')
                        ->where('deliverymanname','yeasin')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('stock.dueshowyeasin',compact('dueshowyeasin'));
    }
    //Hridoy
    public function dueshowhridoy()
    {
      $dueshowhridoy= DueList::select('*')
                        ->where('deliverymanname','hridoy')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('stock.dueshowhridoy',compact('dueshowhridoy'));
    }
    //Sajid
    public function dueshowsajid()
    {
      $dueshowsajid= DueList::select('*')
                        ->where('deliverymanname','sajid')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('stock.dueshowsajid',compact('dueshowsajid'));
    }
    //Others
    public function dueshowothers()
    {
      $dueshowothers= DueList::select('*')
                        ->where('deliverymanname','Myself')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('stock.dueshowothers',compact('dueshowothers'));
    }
    /*Edit and Delete Due List */
    public function dueedit($id)
    {
        $data=DueList::find($id);
        return view('stock.dueedit', compact('data'));
    }
    public function dueeditprocess(Request $request, $id)
    {
        $data=DueList::find($id);
        $data->date= $request->date;
        $data->deliverymanname= $request->deliverymanname;
        $data->shopname= $request->shopname;
        $data->amount= $request->amount;
        
        $data->save();
        return redirect()->to('/dueshow')->with('message1', 'Due Information has been updated successly!!');  
    }

    /* Delete Due */
    public function deletedue($id)
    {
        $data=DueList::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Due Information has been deleted successly!!');
    }
    /* Daily Sale Add */
        
    //Restaurant (ADD)
    public function dailysaleadd_restaurant()
     {
        // $productName = Product::get();  
        // $foodItemName = Food::get();
        // $tableName = Table::get();
        // $waiterName = Waiter::get();
        $product = Food::select('*')
                  ->where('availability','Yes')
                  ->get();
        return view('stock.restaurant.dailysaleRestaurant',compact('product'));
     }
    //  public function dailysale_restaurant_store(Request $request)
    //  {
    //     $user_email = Auth::user()->email;
    //     $dailysaleRestaurant=new DailysaleRestaurant;
    //     $dailysaleRestaurant->email= $user_email;
    //     $dailysaleRestaurant->cname=$request->cname;
    //     $dailysaleRestaurant->cphone=$request->cphone;
    //     $dailysaleRestaurant->pname=$request->title;
    //     $dailysaleRestaurant->fname=$request->name;
    //     $dailysaleRestaurant->tablename=$request->tablename;
    //     $dailysaleRestaurant->waitername=$request->waitername;
    //     if(!empty($request->date)){
    //         $dailysaleRestaurant->date=$request->date;
    //     }
    //     else{
    //         $dailysaleRestaurant->date= Carbon::today();
    //     }
    //     $dailysaleRestaurant->orders=$request->orders;
    //     $dailysaleRestaurant->vat = 0;
    //     $amount = Food::select('*')->where('name', $dailysaleRestaurant->fname)->first();
    //     $dailysaleRestaurant->amount = $amount->sellingprice;
    //     $dailysaleRestaurant->tamount = ($dailysaleRestaurant->amount * $dailysaleRestaurant->orders) + $dailysaleRestaurant->vat;
        
    //     $dailysaleRestaurant->save();
        
    //     $remstock = Stock::select('*')
    //             ->where('productname','=', $dailysaleRestaurant->pname)
    //             ->first();
    //             //echo $remstock->id;
        
    //     $numberOfOrders = Ingredients::select('*')
    //                     ->where('foodname','=',$dailysaleRestaurant->fname)
    //                     ->first();
        
    //     $remstock->remainingstock =  $remstock->stock - ($numberOfOrders->quantity * $dailysaleRestaurant->orders);
    //     //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
    //     $data=Stock::find($remstock->id);
    //     $data->remainingstock = $remstock->remainingstock;
    //     $data->stock = $remstock->remainingstock;
        
    //     $data->save();

    //       return redirect()->back()->with('message', 'Daily Sale has been added successly!!');
    //  }
     
    //Show
    public function restauarant_dailysale_show()
    {
      $dailysaleShowRestaurant= DailysaleRestaurant::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('stock.restaurant.dailysaleShowRestaurant',compact('dailysaleShowRestaurant'));
    }
    //Edit
    public function dailysale_edit_restaurant($id)
    {
        $data=DailysaleRestaurant::find($id);
        return view('product.dailysaleEditRestaurant', compact('data'));
    }
    public function dailysale_printView_show($id)
    {
        $printView=DailysaleRestaurant::find($id);
        return view('stock.restaurant.dailysaleShowprintView', compact('printView'));
    }
    public function dailysale_editprocess_restaurant(Request $request, $id)
    {
         $data=DailysaleRestaurant::find($id);
        // $data->productname= $request->productname;
        // $data->foodname= $request->quantity;
        // $data->date= $request->date;
        // $data->quantity= $request->quantity;
        $data->status= $request->status;
        
        $data->save();
      	return redirect()->to('/dailysaleshowRestaurant')->with('message', 'Order Status has been updated successly!!');  
    }
    //Delete
    public function delete_dailysale_restaurant($id)
    {
        $data=DailysaleRestaurant::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Order Information has been deleted successly!!');
    }
    
    //Show and Manage all Order from Online
    public function restauarant_onlineOrder_show()
    {
      $onlineOrder= Order::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('stock.restaurant.allonlineOrder',compact('onlineOrder'));
    }
    public function onlineOrder_printView_show($id)
    {
        $printView=Order::find($id);
        return view('stock.restaurant.onlineOrderShowprintView', compact('printView'));
    }
    //Edit
    public function onlineOrderedit($id)
    {
        $data=Order::find($id);
        return view('stock.restaurant.editOnlineOrderStatus', compact('data'));
    }
    public function onlineOrdereditProcess(Request $request, $id)
    {
        $data=Order::find($id);
        // $data->pname= $request->pname;
        // $data->quantity= $request->quantity;
        // $data->name= $request->name;
        // $data->date= $request->date;
        // $data->phone_no= $request->phone_no;
        // $data->address= $request->address;
        // $data->message= $request->message;
        // $data->transaction_id= $request->transaction_id;
        $data->status= $request->status;
        
        $data->save();
      	return redirect()->to('/allOnlineOrder')->with('message', 'Order status has been updated successly!!');  
    }
    public function onlineOrderdelete($id)
    {
        $data=Order::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Order Information has been deleted successly!!');
    }
    
    //Show and Manage all Order Info from Online
    public function restauarant_allOnlineOrder_info()
    {
      $onlineOrderInfo= Cart::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('stock.restaurant.allonlineOrderInfo',compact('onlineOrderInfo'));
    }
    public function onlineOrder_Info_printView_show($id)
    {
        $printView=Cart::find($id);
        return view('stock.restaurant.onlineOrderInfoShowprintView', compact('printView'));
    }
    //Edit
    public function onlineOrderInfoedit($id)
    {
        $data=Cart::find($id);
        return view('stock.restaurant.editOnlineOrderInfoStatus', compact('data'));
    }
     public function onlineOrderInfoeditProcess(Request $request, $id)
    {
        $data=Cart::find($id);
        // $data->pname= $request->pname;
        // $data->quantity= $request->quantity;
        // $data->name= $request->name;
        // $data->date= $request->date;
        // $data->phone_no= $request->phone_no;
        // $data->address= $request->address;
        // $data->message= $request->message;
        // $data->transaction_id= $request->transaction_id;
        $data->status= $request->status;
        
        $data->save();
      	return redirect()->to('/allOrderInfoOnline')->with('message', 'Order status has been updated successly!!');  
    }
    //Delete
    public function onlineOrderInfodelete($id)
    {
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Order Information has been deleted successly!!');
    }
    //Jahangir
     public function dailysaleadd()
     {
       $productname = Product::get();
       //$deliverymanname = Deliveryman::get();
        $deliverymanname = Deliveryman::select('*')
                         ->where('name', 'jahangir' )
                         ->get();
        return view('stock.adddailaysale',compact('productname','deliverymanname'));
     }
    public function dailysalestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $dailysale=new DailySales;
        $dailysale->email= $user_email;
        //$dailysale->date=$request->date;
        if(!empty($request->date)){
            $dailysale->date=$request->date;
        }
        else{
            $dailysale->date= Carbon::today();
        }
        $dailysale->deliverymanname="Jahangir";
        $dailysale->pname=$request->title;
        //$dailysale->packs= $request->packs;
            if(!empty($request->packs)){
                $dailysale->packs= $request->packs;
            }
            else{
                $pname = Stock::select('pack')
                ->where('productname','=', $request->title)
                ->first();
                
                $dailysale->packs = $pname->pack;
                //echo $pname;
            }
        
        //$dailysale->pricelp= $request->pricelp;
        if(!empty($request->pricelp)){
                $dailysale->pricelp= $request->pricelp;
            }
            else{
                $pricelp = Product::select('buyingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricelp = $pricelp->buyingprice;
                //echo $pricelp;
            }
            
            //$dailysale->pricetp= $request->pricetp;
            if(!empty($request->pricetp)){
                $dailysale->pricetp= $request->pricetp;
            }
            else{
                $pricetp = Product::select('updated_price')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricetp = $pricetp->updated_price;
                //echo $pricetp;
            }
        //$dailysale->sellingprice= $request->sellingprice;
        if(!empty($request->sellingprice)){
                $dailysale->sellingprice= $request->sellingprice;
            }
            else{
                $sellingprice = Product::select('sellingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->sellingprice = $sellingprice->sellingprice;
                //echo $sellingprice;
            }
        $dailysale->unitprice= $dailysale->sellingprice / $dailysale->packs;
        $dailysale->orders= $request->orders;
        //$dailysale->unit= $request->unit;
        if(!empty($request->unit)){
                $dailysale->unit= $request->unit;
            }
            else{
                
                
                $dailysale->unit = 0;
                //echo $pricetp;
            }
        $dailysale->cases= $request->cases;
        $dailysale->pieces= $request->pieces;
        $dailysale->totalpcs= ($request->orders * $request->packs)  + $request->unit;
        $dailysale->salesv= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->totalpcs;
        //$dailysale->returnp= $request->returnp;
         if(!empty($request->returnp)){
                $dailysale->returnp= $request->returnp;
            }
            else{
                
                
                $dailysale->returnp = 0;
                //echo $pricetp;
            }
        //$dailysale->returnc= $request->returnc;
        if(!empty($request->returnc)){
                $dailysale->returnc= $request->returnc;
            }
            else{
                
                
                $dailysale->returnc = 0;
                //echo $pricetp;
            }
        $dailysale->soldc= $dailysale->orders - $dailysale->returnc;
        $dailysale->soldp= $dailysale->unit - $dailysale->returnp;
        $dailysale->tpieces= ($dailysale->packs * $dailysale->soldc) + $dailysale->soldp;
        $dailysale->valuelp= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->tpieces;
        $dailysale->valuetp= ($dailysale->pricetp / $dailysale->packs) * $dailysale->tpieces;
        //$dailysale->damagepcs=$request->damagepcs;
        if(!empty($request->damagepcs)){
                $dailysale->damagepcs= $request->damagepcs;
            }
            else{
                
                
                $dailysale->damagepcs = 0;
                //echo $pricetp;
            }
        $dailysale->damageamount=$dailysale->damagepcs * $dailysale->unitprice;
        $dailysale->due= ($dailysale->pricetp - $dailysale->pricelp) * ($dailysale->tpieces / $dailysale ->packs);
        
        $dailysale->save();
        
        $remstock = Stock::select('*')
                ->where('productname','=', $dailysale->pname)
                ->first();
                //echo $remstock->id;
        
        $remstock->remainingstock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
        //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
        $data=Stock::find($remstock->id);
        $data->stock = $remstock->remainingstock;
        $data->remainingstock = $remstock->remainingstock;
        
        $data->save();

          return redirect()->back()->with('message', 'Daily Sale has been added successly!!');
        }
        
    //Daily Sale Add Yeasin 
    public function dailaysaleaddyeasin()
     {
      $productname = Product::get();
       //$deliverymanname = Deliveryman::get();
        $deliverymanname = Deliveryman::select('*')
                         ->where('name', 'yeasin' )
                         ->get();
        return view('stock.adddailaysaleyeasin',compact('productname','deliverymanname'));
     }
    public function yeasindailysalestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $dailysale=new DailySales;
        $dailysale->email= $user_email;
        //$dailysale->date=$request->date;
        if(!empty($request->date)){
            $dailysale->date=$request->date;
        }
        else{
            $dailysale->date= Carbon::today();
        }
        $dailysale->deliverymanname="Yeasin";
        $dailysale->pname=$request->title;
        //$dailysale->packs= $request->packs;
            if(!empty($request->packs)){
                $dailysale->packs= $request->packs;
            }
            else{
                $pname = Stock::select('pack')
                ->where('productname','=', $request->title)
                ->first();
                
                $dailysale->packs = $pname->pack;
                //echo $pname;
            }
        
        //$dailysale->pricelp= $request->pricelp;
        if(!empty($request->pricelp)){
                $dailysale->pricelp= $request->pricelp;
            }
            else{
                $pricelp = Product::select('buyingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricelp = $pricelp->buyingprice;
                //echo $pricelp;
            }
            
            //$dailysale->pricetp= $request->pricetp;
            if(!empty($request->pricetp)){
                $dailysale->pricetp= $request->pricetp;
            }
            else{
                $pricetp = Product::select('updated_price')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricetp = $pricetp->updated_price;
                //echo $pricetp;
            }
        //$dailysale->sellingprice= $request->sellingprice;
        if(!empty($request->sellingprice)){
                $dailysale->sellingprice= $request->sellingprice;
            }
            else{
                $sellingprice = Product::select('sellingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->sellingprice = $sellingprice->sellingprice;
                //echo $sellingprice;
            }
        $dailysale->unitprice= $dailysale->sellingprice / $dailysale->packs;
        $dailysale->orders= $request->orders;
        //$dailysale->unit= $request->unit;
        if(!empty($request->unit)){
                $dailysale->unit= $request->unit;
            }
            else{
                
                
                $dailysale->unit = 0;
                //echo $pricetp;
            }
        $dailysale->cases= $request->cases;
        $dailysale->pieces= $request->pieces;
        $dailysale->totalpcs= ($request->orders * $request->packs)  + $request->unit;
        $dailysale->salesv= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->totalpcs;
        //$dailysale->returnp= $request->returnp;
         if(!empty($request->returnp)){
                $dailysale->returnp= $request->returnp;
            }
            else{
                
                
                $dailysale->returnp = 0;
                //echo $pricetp;
            }
        //$dailysale->returnc= $request->returnc;
        if(!empty($request->returnc)){
                $dailysale->returnc= $request->returnc;
            }
            else{
                
                
                $dailysale->returnc = 0;
                //echo $pricetp;
            }
        $dailysale->soldc= $dailysale->orders - $dailysale->returnc;
        $dailysale->soldp= $dailysale->unit - $dailysale->returnp;
        $dailysale->tpieces= ($dailysale->packs * $dailysale->soldc) + $dailysale->soldp;
        $dailysale->valuelp= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->tpieces;
        $dailysale->valuetp= ($dailysale->pricetp / $dailysale->packs) * $dailysale->tpieces;
        //$dailysale->damagepcs=$request->damagepcs;
        if(!empty($request->damagepcs)){
                $dailysale->damagepcs= $request->damagepcs;
            }
            else{
                
                
                $dailysale->damagepcs = 0;
                //echo $pricetp;
            }
        $dailysale->damageamount=$dailysale->damagepcs * $dailysale->unitprice;
        $dailysale->due= ($dailysale->pricetp - $dailysale->pricelp) * ($dailysale->tpieces / $dailysale ->packs);
        
        $dailysale->save();
        
        $remstock = Stock::select('*')
                ->where('productname','=', $dailysale->pname)
                ->first();
                //echo $remstock->id;
        
        $remstock->remainingstock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
        //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
        $data=Stock::find($remstock->id);
        $data->stock = $remstock->remainingstock;
        $data->remainingstock = $remstock->remainingstock;
        
        $data->save();

          return redirect()->back()->with('message', 'Daily Sale has been added successly!!');
        }
        
 //Daily Sale Add Hridoy 
    public function dailaysaleaddhridoy()
     {
      $productname = Product::get();
       //$deliverymanname = Deliveryman::get();
        $deliverymanname = Deliveryman::select('*')
                         ->where('name', 'hridoy' )
                         ->get();
        return view('stock.adddailaysalehridoy',compact('productname','deliverymanname'));
     }
    public function hridoydailysalestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $dailysale=new DailySales;
        $dailysale->email= $user_email;
        //$dailysale->date=$request->date;
        if(!empty($request->date)){
            $dailysale->date=$request->date;
        }
        else{
            $dailysale->date= Carbon::today();
        }
        $dailysale->deliverymanname="Hridoy";
        $dailysale->pname=$request->title;
        //$dailysale->packs= $request->packs;
            if(!empty($request->packs)){
                $dailysale->packs= $request->packs;
            }
            else{
                $pname = Stock::select('pack')
                ->where('productname','=', $request->title)
                ->first();
                
                $dailysale->packs = $pname->pack;
                //echo $pname;
            }
        
        //$dailysale->pricelp= $request->pricelp;
        if(!empty($request->pricelp)){
                $dailysale->pricelp= $request->pricelp;
            }
            else{
                $pricelp = Product::select('buyingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricelp = $pricelp->buyingprice;
                //echo $pricelp;
            }
            
            //$dailysale->pricetp= $request->pricetp;
            if(!empty($request->pricetp)){
                $dailysale->pricetp= $request->pricetp;
            }
            else{
                $pricetp = Product::select('updated_price')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricetp = $pricetp->updated_price;
                //echo $pricetp;
            }
        //$dailysale->sellingprice= $request->sellingprice;
        if(!empty($request->sellingprice)){
                $dailysale->sellingprice= $request->sellingprice;
            }
            else{
                $sellingprice = Product::select('sellingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->sellingprice = $sellingprice->sellingprice;
                //echo $sellingprice;
            }
        $dailysale->unitprice= $dailysale->sellingprice / $dailysale->packs;
        $dailysale->orders= $request->orders;
        //$dailysale->unit= $request->unit;
        if(!empty($request->unit)){
                $dailysale->unit= $request->unit;
            }
            else{
                
                
                $dailysale->unit = 0;
                //echo $pricetp;
            }
        $dailysale->cases= $request->cases;
        $dailysale->pieces= $request->pieces;
        $dailysale->totalpcs= ($request->orders * $request->packs)  + $request->unit;
        $dailysale->salesv= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->totalpcs;
        //$dailysale->returnp= $request->returnp;
         if(!empty($request->returnp)){
                $dailysale->returnp= $request->returnp;
            }
            else{
                
                
                $dailysale->returnp = 0;
                //echo $pricetp;
            }
        //$dailysale->returnc= $request->returnc;
        if(!empty($request->returnc)){
                $dailysale->returnc= $request->returnc;
            }
            else{
                
                
                $dailysale->returnc = 0;
                //echo $pricetp;
            }
        $dailysale->soldc= $dailysale->orders - $dailysale->returnc;
        $dailysale->soldp= $dailysale->unit - $dailysale->returnp;
        $dailysale->tpieces= ($dailysale->packs * $dailysale->soldc) + $dailysale->soldp;
        $dailysale->valuelp= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->tpieces;
        $dailysale->valuetp= ($dailysale->pricetp / $dailysale->packs) * $dailysale->tpieces;
        //$dailysale->damagepcs=$request->damagepcs;
        if(!empty($request->damagepcs)){
                $dailysale->damagepcs= $request->damagepcs;
            }
            else{
                
                
                $dailysale->damagepcs = 0;
                //echo $pricetp;
            }
        $dailysale->damageamount=$dailysale->damagepcs * $dailysale->unitprice;
        $dailysale->due= ($dailysale->pricetp - $dailysale->pricelp) * ($dailysale->tpieces / $dailysale ->packs);
        
        $dailysale->save();
        
        $remstock = Stock::select('*')
                ->where('productname','=', $dailysale->pname)
                ->first();
                //echo $remstock->id;
        
        $remstock->remainingstock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
        //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
        $data=Stock::find($remstock->id);
        $data->stock = $remstock->remainingstock;
        $data->remainingstock = $remstock->remainingstock;
        
        $data->save();

          return redirect()->back()->with('message', 'Daily Sale has been added successly!!');
        }
    
    //Daily Sale Add Sajid 
    public function dailaysaleaddsajid()
     {
      $productname = Product::get();
       //$deliverymanname = Deliveryman::get();
        $deliverymanname = Deliveryman::select('*')
                         ->where('name', 'sajid' )
                         ->get();
        return view('stock.adddailaysalesajid',compact('productname','deliverymanname'));
     }
    public function sajiddailysalestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $dailysale=new DailySales;
        $dailysale->email= $user_email;
        //$dailysale->date=$request->date;
        if(!empty($request->date)){
            $dailysale->date=$request->date;
        }
        else{
            $dailysale->date= Carbon::today();
        }
        $dailysale->deliverymanname="Sajid";
        $dailysale->pname=$request->title;
        //$dailysale->packs= $request->packs;
            if(!empty($request->packs)){
                $dailysale->packs= $request->packs;
            }
            else{
                $pname = Stock::select('pack')
                ->where('productname','=', $request->title)
                ->first();
                
                $dailysale->packs = $pname->pack;
                //echo $pname;
            }
        
        //$dailysale->pricelp= $request->pricelp;
        if(!empty($request->pricelp)){
                $dailysale->pricelp= $request->pricelp;
            }
            else{
                $pricelp = Product::select('buyingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricelp = $pricelp->buyingprice;
                //echo $pricelp;
            }
            
            //$dailysale->pricetp= $request->pricetp;
            if(!empty($request->pricetp)){
                $dailysale->pricetp= $request->pricetp;
            }
            else{
                $pricetp = Product::select('updated_price')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->pricetp = $pricetp->updated_price;
                //echo $pricetp;
            }
        //$dailysale->sellingprice= $request->sellingprice;
        if(!empty($request->sellingprice)){
                $dailysale->sellingprice= $request->sellingprice;
            }
            else{
                $sellingprice = Product::select('sellingprice')
                ->where('title','=', $request->title)
                ->first();
                
                $dailysale->sellingprice = $sellingprice->sellingprice;
                //echo $sellingprice;
            }
        $dailysale->unitprice= $dailysale->sellingprice / $dailysale->packs;
        $dailysale->orders= $request->orders;
        //$dailysale->unit= $request->unit;
        if(!empty($request->unit)){
                $dailysale->unit= $request->unit;
            }
            else{
                
                
                $dailysale->unit = 0;
                //echo $pricetp;
            }
        $dailysale->cases= $request->cases;
        $dailysale->pieces= $request->pieces;
        $dailysale->totalpcs= ($request->orders * $request->packs)  + $request->unit;
        $dailysale->salesv= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->totalpcs;
        //$dailysale->returnp= $request->returnp;
         if(!empty($request->returnp)){
                $dailysale->returnp= $request->returnp;
            }
            else{
                
                
                $dailysale->returnp = 0;
                //echo $pricetp;
            }
        //$dailysale->returnc= $request->returnc;
        if(!empty($request->returnc)){
                $dailysale->returnc= $request->returnc;
            }
            else{
                
                
                $dailysale->returnc = 0;
                //echo $pricetp;
            }
        $dailysale->soldc= $dailysale->orders - $dailysale->returnc;
        $dailysale->soldp= $dailysale->unit - $dailysale->returnp;
        $dailysale->tpieces= ($dailysale->packs * $dailysale->soldc) + $dailysale->soldp;
        $dailysale->valuelp= ($dailysale->sellingprice / $dailysale->packs) * $dailysale->tpieces;
        $dailysale->valuetp= ($dailysale->pricetp / $dailysale->packs) * $dailysale->tpieces;
        //$dailysale->damagepcs=$request->damagepcs;
        if(!empty($request->damagepcs)){
                $dailysale->damagepcs= $request->damagepcs;
            }
            else{
                
                
                $dailysale->damagepcs = 0;
                //echo $pricetp;
            }
        $dailysale->damageamount=$dailysale->damagepcs * $dailysale->unitprice;
        $dailysale->due= ($dailysale->pricetp - $dailysale->pricelp) * ($dailysale->tpieces / $dailysale ->packs);
        
        $dailysale->save();
        
       $remstock = Stock::select('*')
                ->where('productname','=', $dailysale->pname)
                ->first();
                //echo $remstock->id;
        
        $remstock->remainingstock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
        //$remstock->stock = ( $remstock->stock + $dailysale->returnc) - $dailysale->orders;
            
        $data=Stock::find($remstock->id);
        $data->stock = $remstock->remainingstock;
        $data->remainingstock = $remstock->remainingstock;
        
        $data->save();

          return redirect()->back()->with('message', 'Daily Sale has been added successly!!');
        }
        
    /* Daily Sale Show All */
    public function dailysaleshow(Request $request)
    {
      $dailysaleshow= DailySales::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      $delname = $request->deliverymanname;
      $dues = DueList::select('amount')
                         ->where('deliverymanname', $delname )
                         ->get();

     return view('stock.dailysales',compact('dailysaleshow','dues'));
    }
    /* Daily Sale Show Individually */
    
    //Jahangir
    public function showjahangirsale()
    {
      $showjahangirsale = DailySales::select('*')
                         ->where('deliverymanname', 'jahangir' )
                         ->orderBy('id', 'DESC')
                         ->get();

     return view('stock.showjahangirsale',compact('showjahangirsale'));
    }
    //Yeasin
    public function showyeasinsale()
    {
      $showyeasinsale = DailySales::select('*')
                         ->where('deliverymanname', 'yeasin' )
                         ->orderBy('id', 'DESC')
                         ->get();

     return view('stock.showyeasinsale',compact('showyeasinsale'));
    }
    //Hridoy
    public function showhridoysale()
    {
      $showhridoysale = DailySales::select('*')
                         ->where('deliverymanname', 'hridoy' )
                         ->orderBy('id', 'DESC')
                         ->get();

     return view('stock.showhridoysale',compact('showhridoysale'));
    }
    //Sajid
    public function showsajidsale()
    {
      $showsajidsale = DailySales::select('*')
                         ->where('deliverymanname', 'sajid' )
                         ->orderBy('id', 'DESC')
                         ->get();

     return view('stock.showsajidsale',compact('showsajidsale'));
    }
    
    /* Show Sale Within Date Range */
     public function datewisesale(Request $request)
    {
        
        $startDate = Carbon::parse($request->start_date)
                             ->toDateTimeString();
        $endDate = Carbon::parse($request->end_date)
                             ->toDateTimeString();
  
        $datewisesale = Dailysales::select('*')
                        ->whereBetween('created_at', [$startDate, $endDate])
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('stock.datewisesale',compact('datewisesale'));
    }
    
    /* Daily Sales Report Show */
    public function dailyreport(Request $request)
    {
        $dailysaleshow= DailySales::get();
        $delname = $request->deliverymanname;
        $dues = DueList:: selectRaw('sum(amount)')
                        
                         ->where('deliverymanname', $delname )
                         ->whereDate('date', Carbon::today())
                         ->get();
        $expenses = Expense:: selectRaw('sum(amount)')
                        
                         ->where('deliverymanname', $delname )
                         
                          ->whereDate('date', Carbon::today())
                         ->get(); 
        $collection = Collection:: selectRaw('sum(collectionamount)')
                        
                         ->where('deliveryman', $delname )
                         
                          ->whereDate('date', Carbon::today())
                         ->get(); 
                         
        $dailysale_totalsellingprice = Dailysales:: selectRaw('sum(valuelp)')
                        
                         ->where('deliverymanname', $delname )
                         
                          ->whereDate('date', Carbon::today())
                         ->get();
                         
        $netpayable = 0;

        return view('stock.dailyreport',compact('dailysaleshow','delname','dues','expenses','collection','dailysale_totalsellingprice','netpayable'));
        /*echo $dues . "</br>"; 
        echo $expenses . "</br>";
        echo $collection . "</br>";
        echo  $dailysale_totalsellingprice;*/
    }
    
    /* Datewise Report */
    public function reportdatewise()
    {
        $dailysaleshow= DailySales::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('stock.reportdatewise',compact('dailysaleshow'));
    }
    
    public function getdatewisereport(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)
                             ->toDateTimeString();
        $endDate = Carbon::parse($request->end_date)
                             ->toDateTimeString();
        
        $dailysaleshow= DailySales::get();
        $delname = $request->deliverymanname;
        $dues = DueList:: selectRaw('sum(amount)')
                        
                         ->where('deliverymanname', $delname )
                         ->whereBetween('created_at', [$startDate, $endDate])
                         ->get();
        $expenses = Expense:: selectRaw('sum(amount)')
                        
                         ->where('deliverymanname', $delname )
                         
                          ->whereBetween('created_at', [$startDate, $endDate])
                         ->get(); 
        $collection = Collection:: selectRaw('sum(collectionamount)')
                        
                         ->where('deliveryman', $delname )
                         
                          ->whereBetween('created_at', [$startDate, $endDate])
                         ->get(); 
                         
        $dailysale_totalsellingprice = Dailysales:: selectRaw('sum(valuelp)')
                        
                         ->where('deliverymanname', $delname )
                         
                          ->whereBetween('created_at', [$startDate, $endDate])
                         ->get();
                         
        $netpayable = 0;

        return view('stock.getdatewisereport',compact('dailysaleshow','delname','dues','expenses','collection','dailysale_totalsellingprice','netpayable'));
        /*echo $dues . "</br>"; 
        echo $expenses . "</br>";
        echo $collection . "</br>";
        echo  $dailysale_totalsellingprice;*/
    }
    
     /* Monthly Report */
    public function reportemonthwise()
    {
        $dailysaleshow= DailySales::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('stock.reportemonthwise',compact('dailysaleshow'));
    }
    
    public function getmonthwisereport(Request $request)
    {
        //$currentMonth = date('m');
        
        $dailysaleshow= DailySales::get();
        $delname = $request->deliverymanname;
        $dues = DueList:: selectRaw('sum(amount)')
                        
                         ->where('deliverymanname', $delname )
                         ->whereMonth('created_at', Carbon::now()->month)
                         //->whereRaw('MONTH(created_at) = ?',[$currentMonth])
                         ->get();
        $expenses = Expense:: selectRaw('sum(amount)')
                        
                         ->where('deliverymanname', $delname )
                         
                          ->whereMonth('created_at', Carbon::now()->month)
                          //->whereRaw('MONTH(created_at) = ?',[$currentMonth])
                         ->get(); 
        $collection = Collection:: selectRaw('sum(collectionamount)')
                        
                         ->where('deliveryman', $delname )
                         
                          ->whereMonth('created_at', Carbon::now()->month)
                          //->whereRaw('MONTH(created_at) = ?',[$currentMonth])
                         ->get(); 
                         
        $dailysale_totalsellingprice = Dailysales:: selectRaw('sum(valuelp)')
                        
                         ->where('deliverymanname', $delname )
                         
                          ->whereMonth('created_at', Carbon::now()->month)
                          //->whereRaw('MONTH(created_at) = ?',[$currentMonth])
                         ->get();
                         
        $netpayable = 0;

        return view('stock.getmonthwisereport',compact('dailysaleshow','delname','dues','expenses','collection','dailysale_totalsellingprice','netpayable'));
        /*echo $dues . "</br>"; 
        echo $expenses . "</br>";
        echo $collection . "</br>";
        echo  $dailysale_totalsellingprice;*/
    }
    
    /*Edit and Delete Daily Sale */
    public function dailysaleedit($id)
    {
        $data=DailySales::find($id);
        return view('stock.dailysaleedit', compact('data'));
    }
    public function dailysaleeditprocess(Request $request, $id)
    {
        $data=DailySales::find($id);
        $data->date=$request->date;
        $data->deliverymanname=$request->deliverymanname;
        $data->pname=$request->pname;
        $data->packs= $request->packs;
        $data->pricelp= $request->pricelp;
        $data->pricetp= $request->pricetp;
        $data->sellingprice= $request->sellingprice;
        
        $data->unitprice= $data->sellingprice / $data->packs;
        $data->orders= $request->orders;
        $data->unit= $request->unit;
        $data->cases= $request->cases;
        $data->pieces= $request->pieces;
        $data->totalpcs= ($data->orders * $data->packs)  + $data->unit;
        $data->salesv= ($data->sellingprice / $data->packs) * $data->totalpcs;
        $data->returnp= $request->returnp;
        $data->returnc= $request->returnc;
        $data->soldc= $data->orders - $data->returnc;
        $data->soldp= $data->unit - $data->returnp;
        $data->tpieces= ($data->packs * $data->soldc) + $data->soldp;
        $data->valuelp= ($data->sellingprice / $data->packs) * $data->tpieces;
        $data->valuetp= ($data->pricetp / $data->packs) * $data->tpieces;
        $data->damagepcs=$request->damagepcs;
        $data->damageamount=$data->damagepcs * $data->unitprice;
        $data->due= ($data->pricetp - $data->pricelp) * ($data->tpieces / $data ->packs);
        
        $data->save();
        return redirect()->to('/dailysaleshow')->with('message1', 'Daily Sale Information has been updated successly!!');  
    }

    /* Delete Stock */
    public function deletedailysale($id)
    {
        $data=DailySales::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Due Information has been deleted successly!!');
    }
    
    /* Collection Add */
    public function collectionadd()
     {
       $shopname = Shop::get();
       $deliverymanname = Deliveryman::get();
        return view('stock.collectionadd',compact('shopname','deliverymanname'));
     }
    public function collectionstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $collection=new Collection;
        $collection->email= $user_email;
        //$collection->date = $request->date;
        if(!empty($request->date)){
            $collection->date=$request->date;
        }
        else{
            $collection->date= Carbon::today();
        }
        $collection->deliveryman=$request->name;
        $collection->shopname= $request->shopname;
        $collection->dueamount = $request->dueamount;
        $collection->collectionamount = $request->collectionamount;
        $collection->amountleft = $request->dueamount - $request->collectionamount;

         $collection->save();

          return redirect()->back()->with('message', 'Collection Details has been added successly!!');
        }
        
    //Collection Add Others
    public function collectionaddothers()
     {
       $shopname = Shop::get();
       //$deliverymanname = Deliveryman::get();
        return view('stock.collectionaddothers',compact('shopname'));
     }
    public function otherscollectionstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $collection=new Collection;
        $collection->email= $user_email;
        //$collection->date = $request->date;
        if(!empty($request->date)){
            $collection->date=$request->date;
        }
        else{
            $collection->date= Carbon::today();
        }
        $collection->deliveryman="Myself";
        $collection->shopname= $request->shopname;
        $collection->dueamount = $request->dueamount;
        $collection->collectionamount = $request->collectionamount;
        $collection->amountleft = $request->dueamount - $request->collectionamount;

         $collection->save();

          return redirect()->back()->with('message', 'Collection Details has been added successly!!');
        }
    
    
    /* Collection List Show */
    public function showcollection()
    {
      $collectionshow= Collection::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('stock.collectionshow',compact('collectionshow'));
    }
    /* Collection Show Individually */
    
    //Jahangir
    public function showcollectionjahangir()
    {
      $showcollectionjahangir= Collection::select('*')
                                ->where('deliveryman','jahangir')
                                ->orderBy('id', 'DESC')
                                ->get();
      return view('stock.showcollectionjahangir',compact('showcollectionjahangir'));
    }
    //Yeasin
    public function showcollectionyeasin()
    {
      $showcollectionyeasin= Collection::select('*')
                                ->where('deliveryman','yeasin')
                                ->orderBy('id', 'DESC')
                                ->get();
      return view('stock.showcollectionyeasin',compact('showcollectionyeasin'));
    }
    //Hridoy
    public function showcollectionhridoy()
    {
      $showcollectionhridoy= Collection::select('*')
                                ->where('deliveryman','hridoy')
                                ->orderBy('id', 'DESC')
                                ->get();
      return view('stock.showcollectionhridoy',compact('showcollectionhridoy'));
    }
    //Sajid
    public function showcollectionsajid()
    {
      $showcollectionsajid= Collection::select('*')
                                ->where('deliveryman','sajid')
                                ->orderBy('id', 'DESC')
                                ->get();
      return view('stock.showcollectionsajid',compact('showcollectionsajid'));
    }
    //Othres
     public function showcollectionothers()
    {
      $showcollectionothers= Collection::select('*')
                                ->where('deliveryman','Myself')
                                ->orderBy('id', 'DESC')
                                ->get();
      return view('stock.showcollectionothers',compact('showcollectionothers'));
    }
    /*Edit and Delete Collection List */
    public function collectionedit($id)
    {
        $data=Collection::find($id);
        return view('stock.collectionedit', compact('data'));
    }
    public function collectioneditprocess(Request $request, $id)
    {
        $data=Collection::find($id);
        $data->date= $request->date;
        $data->deliveryman= $request->deliveryman;
        $data->shopname= $request->shopname;
        $data->dueamount= $request->dueamount;
        $data->collectionamount= $request->collectionamount;
        $data->amountleft= $request->amountleft;
        
        $data->save();
        return redirect()->to('/showcollection')->with('message1', 'Collection Information has been updated successly!!');  
    }

    /* Delete Collection */
    public function deletecollection($id)
    {
        $data=Collection::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Collection Information has been deleted successly!!');
    }
    
    /*Collection Statement List Show */
    public function showcollectionstatement()
    {
      $collectionstatementshow= CollectionStatement::get();
      return view('stock.collectionstatementshow',compact('collectionstatementshow'));
    }
    /*Edit and Delete Collection Statement List */
    public function collectionstatementedit($id)
    {
        $data=CollectionStatement::find($id);
        return view('stock.collectionstatementedit', compact('data'));
    }
    public function collectionstatementeditprocess(Request $request, $id)
    {
        $data=CollectionStatement::find($id);
        $data->date= $request->date;
        $data->shopname= $request->shopname;
        $data->collectionamount= $request->collectionamount;
        
        $data->save();
        return redirect()->to('/collectionstatement')->with('message1', 'Collection Statement Information has been updated successly!!');  
    }

    /* Delete Collection Statement*/
    public function deletecollectionstatement($id)
    {
        $data=CollectionStatement::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Collection Statement Information has been deleted successly!!');
    }
}
