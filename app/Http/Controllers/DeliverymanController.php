<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\Sr;
use App\Models\Deliveryman;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeliverymanController extends Controller
{
     /*Shop Add */
    public function deliverymanstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $deliveryman=new Deliveryman;
        $deliveryman->email= $user_email;
        $deliveryman->name= $request->name;
        $deliveryman->phone= $request->phone;
        $deliveryman->description= $request->description;
    
        $deliveryman->save();
        return redirect()->back()->with('message', 'Deliveryman has been added successly!!');
    }

    /*Shop Show */
    public function deliverymanshow()
    {
      $deliverymanshow= Deliveryman::get();
      return view('deliveryman.alldeliveryman',compact('deliverymanshow'));
    }
    
    /*Edit and Delete Product */
    public function deliverymanedit($id)
    {
        $data=Deliveryman::find($id);
        return view('deliveryman.deliverymanedit', compact('data'));
    }
    public function deliverymaneditprocess(Request $request, $id)
    {
        $data=Deliveryman::find($id);
        $data->name= $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->description= $request->description;
        
        $data->save();
      	return redirect()->to('/deliverymanshow')->with('message1', 'Deliveryman has been updated successly!!');  
    }

    /* Delete Shop */
    public function deletedeliverytman($id)
    {
        $data=Deliveryman::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Deliveryman has been deleted successly!!');
    }
}
