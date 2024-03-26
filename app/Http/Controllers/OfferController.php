<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\Sr;
use App\Models\Deliveryman;
use App\Models\Expense;
use App\Models\Expensename;
use App\Models\Offer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
     /*Expense Add */

     public function offeradd()
     {
       $productname = Product::get();
        return view('offer.offeradd',compact('productname'));
     }
    public function offerstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $offer=new Offer;
        $offer->email= $user_email;
        $offer->productname= $request->title;
        $offer->amount= $request->amount;
        $offer->date= $request->date;
        $offer->description= $request->description;
    
        $offer->save();
        return redirect()->back()->with('message', 'Offer has been added successly!!');
    }

    /*Expense Show */
    public function offershow()
    {
      $offershow= Offer::get();
      return view('offer.alloffer',compact('offershow'));
    }
    
    /*Edit and Delete Expense */
    public function offeredit($id)
    {
        $data=Offer::find($id);
        return view('offer.offeredit', compact('data'));
    }
    public function offereditprocess(Request $request, $id)
    {
        $data=Offer::find($id);
        $data->productname= $request->productname;
        $data->amount= $request->amount;
        $data->date= $request->date;
        $data->description= $request->description;
        
        $data->save();
      	return redirect()->to('/offershow')->with('message1', 'Offer has been updated successly!!');  
    }

    /* Delete Expense */
    public function deleteoffer($id)
    {
        $data=Offer::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Offer has been deleted successly!!');
    }


}
