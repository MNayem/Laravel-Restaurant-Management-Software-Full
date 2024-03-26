<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\Deliveryman;
use App\Models\Dailysales;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /*Shop Add */

     public function shopadd()
     {
       $deliverymanname = Deliveryman::get();
        return view('shop.shopadd',compact('deliverymanname'));
     }
    public function shopstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $shop=new Shop;
        $shop->email= $user_email;
        $shop->shopname= $request->shopname;
        $shop->mobile= $request->mobile;
        $shop->accountno= $request->accountno;
        $shop->bkash= $request->bkash;
        $shop->address= $request->address;
        $shop->deliverymanname= $request->name;
        $shop->description= $request->description ;
    
        $shop->save();
        return redirect()->back()->with('message', 'Shop has been added successly!!');
    }

    /*Shop Show */
    public function shopshow()
    {
      $shopshow= Shop::get();
      return view('shop.allshop',compact('shopshow'));
    }
    
    /*Edit and Delete Product */
    public function shopedit($id)
    {
        $data=Shop::find($id);
        return view('shop.shopedit', compact('data'));
    }
    public function shopeditprocess(Request $request, $id)
    {
        $data=Shop::find($id);
        $data->shopname= $request->shopname;
        $data->email= $request->email;
        $data->mobile= $request->mobile;
        $data->accountno= $request->accountno;
        $data->bkash= $request->bkash;
        $data->address= $request->address;
        $data->deliverymanname= $request->deliverymanname;
        $data->description= $request->description ;
       
        
        $data->save();
      	return redirect()->to('/shopshow')->with('message1', 'Shop has been updated successly!!');  
    }

    /* Delete Shop */
    public function deleteshop($id)
    {
        $data=Shop::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Shop has been deleted successly!!');
    }
}
