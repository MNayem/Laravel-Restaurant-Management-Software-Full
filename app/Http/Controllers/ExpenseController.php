<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\Sr;
use App\Models\Deliveryman;
use App\Models\Expense;
use App\Models\Expensename;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ExpenseController extends Controller
{
      /*Expense Add */

     public function expenseadd()
     {
       $expensename = Expensename::get();
       $deliverymanname = Deliveryman::get();
        return view('expense.expenseadd',compact('expensename','deliverymanname'));
     }
    public function expensestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $expense=new Expense;
        $expense->email= $user_email;
        //$expense->date= $request->date;
        if(!empty($request->date)){
            $expense->date=$request->date;
        }
        else{
            $expense->date= Carbon::today();
        }
        $expense->expname= $request->exname;
        $expense->amount= $request->amount;
        $expense->deliverymanname=$request->name;
        $expense->description= $request->description;
    
        $expense->save();
        return redirect()->back()->with('message', 'Expense has been added successly!!');
    }
    //Expense Add by Others
    
    public function expenseaddothers()
     {
       $expensename = Expensename::get();
       //$deliverymanname = Deliveryman::get();
        return view('expense.expenseaddothers',compact('expensename'));
     }
    public function othersexpensestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $expense=new Expense;
        $expense->email= $user_email;
        //$expense->date= $request->date;
         if(!empty($request->date)){
            $expense->date=$request->date;
        }
        else{
            $expense->date= Carbon::today();
        }
        $expense->expname= $request->exname;
        $expense->amount= $request->amount;
        $expense->deliverymanname="Myself";
        $expense->description= $request->description;
    
        $expense->save();
        return redirect()->back()->with('message', 'Expense has been added successly!!');
    }
    /*Expense Show All*/
    public function expenseshow()
    {
      $expenseshow= Expense::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('expense.allexpense',compact('expenseshow'));
    }
    
    /*Expense Show Individually */
    
    //Jahangir
    public function expenseshowjahangir()
    {
      $expenseshowjahangir= Expense::select('*')
                            ->where('deliverymanname','jahangir')
                            ->orderBy('id', 'DESC')
                            ->get();
      return view('expense.expenseshowjahangir',compact('expenseshowjahangir'));
    }
    //Yeasin
    public function expenseshowyeasin()
    {
      $expenseshowyeasin= Expense::select('*')
                            ->where('deliverymanname','yeasin')
                            ->orderBy('id', 'DESC')
                            ->get();
      return view('expense.expenseshowyeasin',compact('expenseshowyeasin'));
    }
    //Hridoy
    public function expenseshowhridoy()
    {
      $expenseshowhridoy= Expense::select('*')
                            ->where('deliverymanname','hridoy')
                            ->orderBy('id', 'DESC')
                            ->get();
      return view('expense.expenseshowhridoy',compact('expenseshowhridoy'));
    }
    //Sajid
    public function expenseshowsajid()
    {
      $expenseshowsajid= Expense::select('*')
                            ->where('deliverymanname','sajid')
                            ->orderBy('id', 'DESC')
                            ->get();
      return view('expense.expenseshowsajid',compact('expenseshowsajid'));
    }
    //Others
    public function expenseshowothers()
    {
      $expenseshowothers= Expense::select('*')
                            ->where('deliverymanname','Myself')
                            ->orderBy('id', 'DESC')
                            ->get();
      return view('expense.expenseshowothers',compact('expenseshowothers'));
    }
    
    /*Edit and Delete Expense */
    public function expenseedit($id)
    {
        $data=Expense::find($id);
        return view('expense.expenseedit', compact('data'));
    }
    public function expenseeditprocess(Request $request, $id)
    {
        $data=Expense::find($id);
        $data->date= $request->date;
        $data->expname= $request->expname;
        $data->amount= $request->amount;
        $data->deliverymanname= $request->deliverymanname;
        $data->description= $request->description;
        
        $data->save();
      	return redirect()->to('/expenseshow')->with('message1', 'Expense has been updated successly!!');  
    }

    /* Delete Expense */
    public function deleteexpense($id)
    {
        $data=Expense::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Expense has been deleted successly!!');
    }




    /*Expensename Add */
    public function expensenamestore(Request $request)
    {
        $user_email = Auth::user()->email;
        $expensename=new Expensename;
        $expensename->email= $user_email;
        $expensename->exname= $request->exname;
    
        $expensename->save();
        return redirect()->back()->with('message', 'Expense Name has been added successly!!');
    }

    /*Expense Show */
    public function expensenameshow()
    {
      $expensenameshow= Expensename::select('*')
                        ->orderBy('id', 'DESC')
                        ->get();
      return view('expense.allexpensename',compact('expensenameshow'));
    }
    
    /*Edit and Delete Expense */
    public function expensenameedit($id)
    {
        $data=Expensename::find($id);
        return view('expense.expensenameedit', compact('data'));
    }
    public function expensenameeditprocess(Request $request, $id)
    {
        $data=Expensename::find($id);
        $data->exname= $request->exname;
        
        $data->save();
      	return redirect()->to('/expensenameshow')->with('message1', 'Expense name has been updated successly!!');  
    }

    /* Delete Expense Name*/
    public function deleteexpensename($id)
    {
        $data=Expensename::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Expense Name has been deleted successly!!');
    }
}
