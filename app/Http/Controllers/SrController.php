<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\Sr;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SrController extends Controller
{
    /*Shop Add */
    public function srstore(Request $request)
    {
        $user_email = Auth::user()->email;
        $sr=new Sr;
        $sr->email= $user_email;
        $sr->name= $request->name;
        $sr->phone= $request->phone;
        $sr->company= $request->company;
    
        $sr->save();
        return redirect()->back()->with('message', 'SR has been added successly!!');
    }

    /*Shop Show */
    public function srshow()
    {
      $srshow= Sr::get();
      return view('sr.allsr',compact('srshow'));
    }
    
    /*Edit and Delete Product */
    public function sredit($id)
    {
        $data=Sr::find($id);
        return view('sr.sredit', compact('data'));
    }
    public function sreditprocess(Request $request, $id)
    {
        $data=Sr::find($id);
        $data->name= $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->company= $request->company;
        
        $data->save();
      	return redirect()->to('/srshow')->with('message1', 'SR has been updated successly!!');  
    }

    /* Delete Shop */
    public function deletesr($id)
    {
        $data=Sr::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'SR has been deleted successly!!');
    }
}
