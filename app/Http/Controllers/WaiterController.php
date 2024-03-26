<?php

namespace App\Http\Controllers;

use App\Models\Waiter;
use App\Models\Table;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WaiterController extends Controller
{
     /* Waiter Add */
    public function waiterStore(Request $request)
    {
        $user_email = Auth::user()->email;
        $waiter=new Waiter;
        $waiter->email= $user_email;
        $waiter->name= $request->name;
        $waiter->phone= $request->phone;
        $waiter->address= $request->address;

        $waiter->save();
      return redirect()->back()->with('message', 'Waiter has been added successly!!');
    }
     /* Waiter Show */
    public function waiterShow()
    {
      $waiterShow= Waiter::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('restaurant.allwaiter', compact('waiterShow'));
    }
    
    /* Edit and Delete Waiter */
    public function waiterEdit($id)
    {
        $data=Waiter::find($id);
        return view('restaurant.editwaiter', compact('data'));
    }
    public function waiterEditProcess(Request $request, $id)
    {
        $data=Waiter::find($id);
        $data->name= $request->name;
        $data->phone= $request->phone;
        $data->address= $request->address;
        
        $data->save();
      	return redirect()->to('/allwaiter')->with('message', 'Waiter Info. has been updated successly!!');  
    }

    /* Delete Waiter */
    public function deleteWaiter($id)
    {
        $data=Waiter::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Waiter has been deleted successly!!');
    }
    
     /* Table Add */
    public function tableStore(Request $request)
    {
        $user_email = Auth::user()->email;
        $table=new Table;
        $table->email= $user_email;
        $table->tname= $request->tname;
        $table->description= $request->description;

        $table->save();
        return redirect()->back()->with('message', 'Table has been added successly!!');
    }
     /* Waiter Show */
    public function tableShow()
    {
      $tableShow= Table::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('restaurant.alltable', compact('tableShow'));
    }
    
    /* Edit and Delete Waiter */
    public function tableEdit($id)
    {
        $data=Table::find($id);
        return view('restaurant.edittable', compact('data'));
    }
    public function tableEditProcess(Request $request, $id)
    {
        $data=Table::find($id);
        $data->tname= $request->tname;
        $data->description= $request->description;
        
        $data->save();
      	return redirect()->to('/alltable')->with('message', 'Table Info. has been updated successly!!');  
    }

    /* Delete Waiter */
    public function deleteTable($id)
    {
        $data=Table::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Table has been deleted successly!!');
    }
}
