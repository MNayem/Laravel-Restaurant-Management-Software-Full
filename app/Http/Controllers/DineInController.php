<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\KOT;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Food;
use App\Models\Ingredients;
use App\Models\TableCarts;
use App\Models\TableOrders;
use App\Models\Waiter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DineInController extends Controller
{
    
// Table 2 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table2(){
        return view('restaurant.table.table2.table2');
    }
    
    public function searchFood2(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table2.table2result', compact('food'));
    }
    
    public function table2CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 2)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1020001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   //echo "Insert Success!";
	   return redirect()->to('/printCart2');
    }

    

    /* Table 1 Carts Print Show */
    public function printCart2_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 2)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table2.table2CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Delete Product Quantity Table 2
     public function quantityDeleteFront2($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart2');
    }
    
    //Customer Order Store Table 2
    public function customerOrderStore2(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        // $customerOrder->vat= 0;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT2');
    }
    
    //Customer Print Show Table 2
    public function customerPrintShowT2(){
        $customerPrintShowT2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table2.customerPrintShowT2', compact('customerPrintShowT2','customerPrintShowtableNumber2',
        'totalPayableAmount','orderId','waiterName'));
    }
    
    //Customer Print Show T1 Final
    public function customerPrintShowT2Final(){
        $customerPrintShowT2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table2.customerPrintShowT2Final', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName','billid'));
    }
    
    //Customer Print Show T1 Third State
    public function customerPrintState3T2(){
        $customerPrintShowT2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table2.customerPrintState3T2', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate2(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        // $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 2)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        // $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT2Final');
    }
    
    public function customerPrintShowT2updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 2)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart2')->with('messageSuccess','Table_2 Order Successfully Completed.');
    }
    
    public function kotOrderAddT2(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart2')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT2(){
         return redirect()->to('/customerPrintShowT2')->with('messageDanger', 'Customer Print Successfully Done.');
    }
    
    //KOT Order Table 1
    public function kotOrderStore2(){
         $kotPrintShowT2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table2.kotPrintShowT2', compact('kotPrintShowT2','kotTableNumber','kotPrintShowAdd'));
    }















// Table 3 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table3(){
        return view('restaurant.table.table3.table3');
    }
    
    public function searchFood3(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table3.table3result', compact('food'));
    }
    
    public function table3CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 3)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1030001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart3');
    }

    public function printCart3_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 3)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table3.table3CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront3($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart3');
    }

    public function customerOrderStore3(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT3');
    }

    public function customerPrintShowT3(){
        $customerPrintShowT3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table3.customerPrintShowT3', compact('customerPrintShowT3','customerPrintShowtableNumber3',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT3Final(){
        $customerPrintShowT3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table3.customerPrintShowT3Final', compact('customerPrintShowT3','customerPrintShowtableNumber3','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T3(){
        $customerPrintShowT3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table3.customerPrintState3T3', compact('customerPrintShowT3','customerPrintShowtableNumber3','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate3(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 3)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT3Final');
    }
    
    public function customerPrintShowT3updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 3)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart3')->with('messageSuccess','Table_3 Order Successfully Completed.');
    }
    
    public function kotOrderAddT3(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart3')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT3(){
         return redirect()->to('/customerPrintShowT3')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore3(){
         $kotPrintShowT3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table3.kotPrintShowT3', compact('kotPrintShowT3','kotTableNumber','kotPrintShowAdd'));
    } 








// Table 4 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table4(){
        return view('restaurant.table.table4.table4');
    }
    
    public function searchFood4(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table4.table4result', compact('food'));
    }
    
    public function table4CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 4)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1040001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart4');
    }

    public function printCart4_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 4)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table4.table4CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront4($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart4');
    }

    public function customerOrderStore4(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT4');
    }

    public function customerPrintShowT4(){
        $customerPrintShowT4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table4.customerPrintShowT4', compact('customerPrintShowT4','customerPrintShowtableNumber4',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT4Final(){
        $customerPrintShowT4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table4.customerPrintShowT4Final', compact('customerPrintShowT4','customerPrintShowtableNumber4','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T4(){
        $customerPrintShowT4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table4.customerPrintState3T4', compact('customerPrintShowT4','customerPrintShowtableNumber4','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate4(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 4)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT4Final');
    }
    
    public function customerPrintShowT4updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 4)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart4')->with('messageSuccess','Table_4 Order Successfully Completed.');
    }
    
    public function kotOrderAddT4(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart4')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT4(){
         return redirect()->to('/customerPrintShowT4')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore4(){
         $kotPrintShowT4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table4.kotPrintShowT4', compact('kotPrintShowT4','kotTableNumber','kotPrintShowAdd'));
    } 










// Table 5 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table5(){
        return view('restaurant.table.table5.table5');
    }
    
    public function searchFood5(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table5.table5result', compact('food'));
    }
    
    public function table5CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 5)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1050001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart5');
    }

    public function printCart5_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 5)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table5.table5CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront5($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart5');
    }

    public function customerOrderStore5(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT5');
    }

    public function customerPrintShowT5(){
        $customerPrintShowT5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table5.customerPrintShowT5', compact('customerPrintShowT5','customerPrintShowtableNumber5',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT5Final(){
        $customerPrintShowT5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table5.customerPrintShowT5Final', compact('customerPrintShowT5','customerPrintShowtableNumber5','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T5(){
        $customerPrintShowT5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table5.customerPrintState3T5', compact('customerPrintShowT5','customerPrintShowtableNumber5','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate5(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 5)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT5Final');
    }
    
    public function customerPrintShowT5updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 5)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart5')->with('messageSuccess','Table_5 Order Successfully Completed.');
    }
    
    public function kotOrderAddT5(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart5')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT5(){
         return redirect()->to('/customerPrintShowT5')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore5(){
         $kotPrintShowT5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table5.kotPrintShowT5', compact('kotPrintShowT5','kotTableNumber','kotPrintShowAdd'));
    } 

  
  
  
  









// Table 6 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table6(){
        return view('restaurant.table.table6.table6');
    }
    
    public function searchFood6(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table6.table6result', compact('food'));
    }
    
    public function table6CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 6)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1060001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart6');
    }

    public function printCart6_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 6)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table6.table6CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront6($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart6');
    }

    public function customerOrderStore6(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT6');
    }

    public function customerPrintShowT6(){
        $customerPrintShowT6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table6.customerPrintShowT6', compact('customerPrintShowT6','customerPrintShowtableNumber6',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT6Final(){
        $customerPrintShowT6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table6.customerPrintShowT6Final', compact('customerPrintShowT6','customerPrintShowtableNumber6','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T6(){
        $customerPrintShowT6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table6.customerPrintState3T6', compact('customerPrintShowT6','customerPrintShowtableNumber6','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate6(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 6)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT6Final');
    }
    
    public function customerPrintShowT6updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 6)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart6')->with('messageSuccess','Table_6 Order Successfully Completed.');
    }
    
    public function kotOrderAddT6(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart6')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT6(){
         return redirect()->to('/customerPrintShowT6')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore6(){
         $kotPrintShowT6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table6.kotPrintShowT6', compact('kotPrintShowT6','kotTableNumber','kotPrintShowAdd'));
    } 

  
 
 
 
 
 












// Table 7 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table7(){
        return view('restaurant.table.table7.table7');
    }
    
    public function searchFood7(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table7.table7result', compact('food'));
    }
    
    public function table7CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 7)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1070001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart7');
    }

    public function printCart7_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 7)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table7.table7CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront7($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart7');
    }

    public function customerOrderStore7(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT7');
    }

    public function customerPrintShowT7(){
        $customerPrintShowT7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table7.customerPrintShowT7', compact('customerPrintShowT7','customerPrintShowtableNumber7',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT7Final(){
        $customerPrintShowT7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table7.customerPrintShowT7Final', compact('customerPrintShowT7','customerPrintShowtableNumber7','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T7(){
        $customerPrintShowT7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table7.customerPrintState3T7', compact('customerPrintShowT7','customerPrintShowtableNumber7','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate7(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 7)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT7Final');
    }
    
    public function customerPrintShowT7updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 7)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart7')->with('messageSuccess','Table_7 Order Successfully Completed.');
    }
    
    public function kotOrderAddT7(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart7')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT7(){
         return redirect()->to('/customerPrintShowT7')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore7(){
         $kotPrintShowT7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table7.kotPrintShowT7', compact('kotPrintShowT7','kotTableNumber','kotPrintShowAdd'));
    } 























// Table 8 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table8(){
        return view('restaurant.table.table8.table8');
    }
    
    public function searchFood8(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table8.table8result', compact('food'));
    }
    
    public function table8CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 8)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1080001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart8');
    }

    public function printCart8_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 8)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table8.table8CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront8($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart8');
    }

    public function customerOrderStore8(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT8');
    }

    public function customerPrintShowT8(){
        $customerPrintShowT8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table8.customerPrintShowT8', compact('customerPrintShowT8','customerPrintShowtableNumber8',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT8Final(){
        $customerPrintShowT8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table8.customerPrintShowT8Final', compact('customerPrintShowT8','customerPrintShowtableNumber8','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T8(){
        $customerPrintShowT8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table8.customerPrintState3T8', compact('customerPrintShowT8','customerPrintShowtableNumber8','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate8(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 8)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT8Final');
    }
    
    public function customerPrintShowT8updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 8)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart8')->with('messageSuccess','Table_8 Order Successfully Completed.');
    }
    
    public function kotOrderAddT8(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart8')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT8(){
         return redirect()->to('/customerPrintShowT8')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore8(){
         $kotPrintShowT8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table8.kotPrintShowT8', compact('kotPrintShowT8','kotTableNumber','kotPrintShowAdd'));
    } 



  


















// Table 9 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table9(){
        return view('restaurant.table.table9.table9');
    }
    
    public function searchFood9(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table9.table9result', compact('food'));
    }
    
    public function table9CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 9)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1090001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart9');
    }

    public function printCart9_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 9)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table9.table9CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront9($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart9');
    }

    public function customerOrderStore9(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT9');
    }

    public function customerPrintShowT9(){
        $customerPrintShowT9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table9.customerPrintShowT9', compact('customerPrintShowT9','customerPrintShowtableNumber9',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT9Final(){
        $customerPrintShowT9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table9.customerPrintShowT9Final', compact('customerPrintShowT9','customerPrintShowtableNumber9','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T9(){
        $customerPrintShowT9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table9.customerPrintState3T9', compact('customerPrintShowT9','customerPrintShowtableNumber9','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate9(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 9)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT9Final');
    }
    
    public function customerPrintShowT9updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 9)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart9')->with('messageSuccess','Table_9 Order Successfully Completed.');
    }
    
    public function kotOrderAddT9(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart9')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT9(){
         return redirect()->to('/customerPrintShowT9')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore9(){
         $kotPrintShowT9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table9.kotPrintShowT9', compact('kotPrintShowT9','kotTableNumber','kotPrintShowAdd'));
    } 





















// Table 10 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table10(){
        return view('restaurant.table.table10.table10');
    }
    
    public function searchFood10(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table10.table10result', compact('food'));
    }
    
    public function table10CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 10)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1100001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart10');
    }

    public function printCart10_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 10)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table10.table10CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront10($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart10');
    }

    public function customerOrderStore10(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT10');
    }

    public function customerPrintShowT10(){
        $customerPrintShowT10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table10.customerPrintShowT10', compact('customerPrintShowT10','customerPrintShowtableNumber10',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT10Final(){
        $customerPrintShowT10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table10.customerPrintShowT10Final', compact('customerPrintShowT10','customerPrintShowtableNumber10','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T10(){
        $customerPrintShowT10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table10.customerPrintState3T10', compact('customerPrintShowT10','customerPrintShowtableNumber10','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate10(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 10)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT10Final');
    }
    
    public function customerPrintShowT10updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 10)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart10')->with('messageSuccess','Table_10 Order Successfully Completed.');
    }
    
    public function kotOrderAddT10(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart10')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT10(){
         return redirect()->to('/customerPrintShowT10')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore10(){
         $kotPrintShowT10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table10.kotPrintShowT10', compact('kotPrintShowT10','kotTableNumber','kotPrintShowAdd'));
    } 




  
  
  
  
  
  












// Table 11 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table11(){
        return view('restaurant.table.table11.table11');
    }
    
    public function searchFood11(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table11.table11result', compact('food'));
    }
    
    public function table11CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 11)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1110001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart11')->with('message', 'Product has been added to cart!!');
    }

    public function printCart11_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 11)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 11)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table11.table11CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront11($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart11')->with('message', 'Cart Item has been deleted Successfully!!');
    }

    public function customerOrderStore11(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT11')->with('message', 'Order has been placed successfully!!');
    }

    public function customerPrintShowT11(){
        $customerPrintShowT11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 11)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 11)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table11.customerPrintShowT11', compact('customerPrintShowT11','customerPrintShowtableNumber11',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT11Final(){
        $customerPrintShowT11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 11)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table11.customerPrintShowT11Final', compact('customerPrintShowT11','customerPrintShowtableNumber11','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T11(){
        $customerPrintShowT11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 11)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table11.customerPrintState3T11', compact('customerPrintShowT11','customerPrintShowtableNumber11','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate11(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 11)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT11Final')->with('message', 'Info has been Placed Successfully!!');
    }
    
    public function customerPrintShowT11updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 11)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart11')->with('message','Success!!');
    }
    
    public function kotOrderAddT11(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart11')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT11(){
         return redirect()->to('/customerPrintShowT11')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore11(){
         $kotPrintShowT11 = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 11)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table11.kotPrintShowT11', compact('kotPrintShowT11','kotTableNumber','kotPrintShowAdd'));
    } 


  
  
  
  
  
 
 
 












// Table 12 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table12(){
        return view('restaurant.table.table12.table12');
    }
    
    public function searchFood12(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table12.table12result', compact('food'));
    }
    
    public function table12CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 12)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1120001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart12')->with('message', 'Product has been added to cart!!');
    }

    public function printCart12_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 12)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 12)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table12.table12CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront12($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart12')->with('message', 'Cart Item has been deleted Successfully!!');
    }

    public function customerOrderStore12(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT12')->with('message', 'Order has been placed successfully!!');
    }

    public function customerPrintShowT12(){
        $customerPrintShowT12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 12)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 12)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table12.customerPrintShowT12', compact('customerPrintShowT12','customerPrintShowtableNumber12',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT12Final(){
        $customerPrintShowT12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 12)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table12.customerPrintShowT12Final', compact('customerPrintShowT12','customerPrintShowtableNumber12','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T12(){
        $customerPrintShowT12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 12)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table12.customerPrintState3T12', compact('customerPrintShowT12','customerPrintShowtableNumber12','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate12(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 12)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT12Final')->with('message', 'Info has been Placed Successfully!!');
    }
    
    public function customerPrintShowT12updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 12)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart12')->with('message','Success!!');
    }
    
    public function kotOrderAddT12(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart12')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT12(){
         return redirect()->to('/customerPrintShowT12')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore12(){
         $kotPrintShowT12 = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 12)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table12.kotPrintShowT12', compact('kotPrintShowT12','kotTableNumber','kotPrintShowAdd'));
    } 


 






















// Table 13 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table13(){
        return view('restaurant.table.table13.table13');
    }
    
    public function searchFood13(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table13.table13result', compact('food'));
    }
    
    public function table13CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 13)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1130001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart13')->with('message', 'Product has been added to cart!!');
    }

    public function printCart13_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 13)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 13)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table13.table13CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront13($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart13')->with('message', 'Cart Item has been deleted Successfully!!');
    }

    public function customerOrderStore13(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT13')->with('message', 'Order has been placed successfully!!');
    }

    public function customerPrintShowT13(){
        $customerPrintShowT13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 13)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 13)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table13.customerPrintShowT13', compact('customerPrintShowT13','customerPrintShowtableNumber13',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT13Final(){
        $customerPrintShowT13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 13)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table13.customerPrintShowT13Final', compact('customerPrintShowT13','customerPrintShowtableNumber13','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T13(){
        $customerPrintShowT13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 13)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table13.customerPrintState3T13', compact('customerPrintShowT13','customerPrintShowtableNumber13','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate13(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 13)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT13Final')->with('message', 'Info has been Placed Successfully!!');
    }
    
    public function customerPrintShowT13updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 13)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart13')->with('message','Success!!');
    }
    
    public function kotOrderAddT13(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart13')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT13(){
         return redirect()->to('/customerPrintShowT13')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore13(){
         $kotPrintShowT13 = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 13)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table13.kotPrintShowT13', compact('kotPrintShowT13','kotTableNumber','kotPrintShowAdd'));
    } 























// Table 14 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table14(){
        return view('restaurant.table.table14.table14');
    }
    
    public function searchFood14(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table14.table14result', compact('food'));
    }
    
    public function table14CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 14)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1140001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart14')->with('message', 'Product has been added to cart!!');
    }

    public function printCart14_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 14)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 14)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table14.table14CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront14($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart14')->with('message', 'Cart Item has been deleted Successfully!!');
    }

    public function customerOrderStore14(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT14')->with('message', 'Order has been placed successfully!!');
    }

    public function customerPrintShowT14(){
        $customerPrintShowT14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 14)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 14)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table14.customerPrintShowT14', compact('customerPrintShowT14','customerPrintShowtableNumber14',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT14Final(){
        $customerPrintShowT14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 14)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table14.customerPrintShowT14Final', compact('customerPrintShowT14','customerPrintShowtableNumber14','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T14(){
        $customerPrintShowT14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 14)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table14.customerPrintState3T14', compact('customerPrintShowT14','customerPrintShowtableNumber14','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate14(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 14)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT14Final')->with('message', 'Info has been Placed Successfully!!');
    }
    
    public function customerPrintShowT14updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 14)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart14')->with('message','Success!!');
    }
    
    public function kotOrderAddT14(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart14')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT14(){
         return redirect()->to('/customerPrintShowT14')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore14(){
         $kotPrintShowT14 = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 14)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table14.kotPrintShowT14', compact('kotPrintShowT14','kotTableNumber','kotPrintShowAdd'));
    } 















// Table 15 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table15(){
        return view('restaurant.table.table15.table15');
    }
    
    public function searchFood15(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table15.table15result', compact('food'));
    }
    
    public function table15CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 15)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1150001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart15')->with('message', 'Product has been added to cart!!');
    }

    public function printCart15_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 15)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 15)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table15.table15CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront15($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart15')->with('message', 'Cart Item has been deleted Successfully!!');
    }

    public function customerOrderStore15(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT15')->with('message', 'Order has been placed successfully!!');
    }

    public function customerPrintShowT15(){
        $customerPrintShowT15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 15)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 15)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table15.customerPrintShowT15', compact('customerPrintShowT15','customerPrintShowtableNumber15',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT15Final(){
        $customerPrintShowT15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 15)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table15.customerPrintShowT15Final', compact('customerPrintShowT15','customerPrintShowtableNumber15','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T15(){
        $customerPrintShowT15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 15)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table15.customerPrintState3T15', compact('customerPrintShowT15','customerPrintShowtableNumber15','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate15(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 15)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT15Final')->with('message', 'Info has been Placed Successfully!!');
    }
    
    public function customerPrintShowT15updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 15)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart15')->with('message','Success!!');
    }
    
    public function kotOrderAddT15(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart15')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT15(){
         return redirect()->to('/customerPrintShowT15')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore15(){
         $kotPrintShowT15 = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 15)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table15.kotPrintShowT15', compact('kotPrintShowT15','kotTableNumber','kotPrintShowAdd'));
    } 

  
  
  
  

























// Table 16 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table16(){
        return view('restaurant.table.table16.table16');
    }
    
    public function searchFood16(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table16.table16result', compact('food'));
    }
    
    public function table16CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 16)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1160001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart16')->with('message', 'Product has been added to cart!!');
    }

    public function printCart16_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 16)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 16)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table16.table16CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront16($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart16')->with('message', 'Cart Item has been deleted Successfully!!');
    }

    public function customerOrderStore16(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT16')->with('message', 'Order has been placed successfully!!');
    }

    public function customerPrintShowT16(){
        $customerPrintShowT16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 16)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 16)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table16.customerPrintShowT16', compact('customerPrintShowT16','customerPrintShowtableNumber16',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT16Final(){
        $customerPrintShowT16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 16)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table16.customerPrintShowT16Final', compact('customerPrintShowT16','customerPrintShowtableNumber16','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T16(){
        $customerPrintShowT16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 16)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table16.customerPrintState3T16', compact('customerPrintShowT16','customerPrintShowtableNumber16','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate16(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 16)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT16Final')->with('message', 'Info has been Placed Successfully!!');
    }
    
    public function customerPrintShowT16updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 16)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart16')->with('message','Success!!');
    }
    
    public function kotOrderAddT16(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart16')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT16(){
         return redirect()->to('/customerPrintShowT16')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore16(){
         $kotPrintShowT16 = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 16)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table16.kotPrintShowT16', compact('kotPrintShowT16','kotTableNumber','kotPrintShowAdd'));
    } 

  
 
 
 
 
 












// Table 17 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table17(){
        return view('restaurant.table.table17.table17');
    }
    
    public function searchFood17(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table17.table17result', compact('food'));
    }
    
    public function table17CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 17)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1170001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart17');
    }

    public function printCart17_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                          ->where('tablenumber', 17)
                          ->where('status','Incomplete')
                          ->orderBy('id', 'DESC')
                          ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 17)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table17.table17CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront17($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart17');
    }

    public function customerOrderStore17(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT17');
    }

    public function customerPrintShowT17(){
        $customerPrintShowT17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 17)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 17)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table17.customerPrintShowT17', compact('customerPrintShowT17','customerPrintShowtableNumber17',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT17Final(){
        $customerPrintShowT17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 17)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table17.customerPrintShowT17Final', compact('customerPrintShowT17','customerPrintShowtableNumber17','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T17(){
        $customerPrintShowT17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 17)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table17.customerPrintState3T17', compact('customerPrintShowT17','customerPrintShowtableNumber17','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate17(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 17)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT17Final');
    }
    
    public function customerPrintShowT17updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 17)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart17')->with('messageSuccess','Table_17 Order Successfully Completed.');
    }
    
    public function kotOrderAddT17(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart17')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT17(){
         return redirect()->to('/customerPrintShowT17')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore17(){
         $kotPrintShowT17 = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 17)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table17.kotPrintShowT17', compact('kotPrintShowT17','kotTableNumber','kotPrintShowAdd'));
    } 























// Table 18 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table18(){
        return view('restaurant.table.table18.table18');
    }
    
    public function searchFood18(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table18.table18result', compact('food'));
    }
    
    public function table18CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 8)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1180001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart18');
    }

    public function printCart18_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                          ->where('tablenumber', 18)
                          ->where('status','Incomplete')
                          ->orderBy('id', 'DESC')
                          ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 18)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table18.table18CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront18($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart18');
    }

    public function customerOrderStore18(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT18');
    }

    public function customerPrintShowT18(){
        $customerPrintShowT18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 18)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 18)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table18.customerPrintShowT18', compact('customerPrintShowT18','customerPrintShowtableNumber18',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT18Final(){
        $customerPrintShowT18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 18)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table18.customerPrintShowT18Final', compact('customerPrintShowT18','customerPrintShowtableNumber18','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T18(){
        $customerPrintShowT18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 18)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table18.customerPrintState3T18', compact('customerPrintShowT18','customerPrintShowtableNumber18','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate18(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 18)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT18Final');
    }
    
    public function customerPrintShowT18updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 18)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart18')->with('messageSuccess','Table_18 Order Successfully Completed.');
    }
    
    public function kotOrderAddT18(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart18')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT18(){
         return redirect()->to('/customerPrintShowT18')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStore18(){
         $kotPrintShowT18 = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 18)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table18.kotPrintShowT18', compact('kotPrintShowT18','kotTableNumber','kotPrintShowAdd'));
    } 



  


















// Table 19 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table19(){
        return view('restaurant.table.table19.table19');
    }
    
    public function searchFood19(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.table.table19.table19result', compact('food'));
    }
    
    public function table19CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 19)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1190001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCart19');
    }

    public function printCart19_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                          ->where('tablenumber', 19)
                          ->where('status','Incomplete')
                          ->orderBy('id', 'DESC')
                          ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 19)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table19.table19CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFront19($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart19');
    }

    public function customerOrderStore19(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();

        return redirect()->to('/customerPrintShowT19');
    }

    public function customerPrintShowT19(){
        $customerPrintShowT19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 19)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 19)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table19.customerPrintShowT19', compact('customerPrintShowT19','customerPrintShowtableNumber19',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowT19Final(){
        $customerPrintShowT19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 19)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table19.customerPrintShowT19Final', compact('customerPrintShowT19','customerPrintShowtableNumber19','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3T19(){
        $customerPrintShowT19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 19)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table19.customerPrintState3T19', compact('customerPrintShowT19','customerPrintShowtableNumber19','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate19(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 19)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowT19Final');
    }
    
    public function customerPrintShowT19updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 19)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart19')->with('messageSuccess','Table_19 Order Successfully Completed.');
    }
    
    public function kotOrderAddT19(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart19')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT19(){
         return redirect()->to('/customerPrintShowT19')->with('messageDanger', 'Customer Print Successfully Done.');;
    }

    public function kotOrderStore19(){
         $kotPrintShowT19 = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 19)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table19.kotPrintShowT19', compact('kotPrintShowT19','kotTableNumber','kotPrintShowAdd'));
    } 














    
// Table 20 ------------------------------------------------------------------------------------------------------------------------------------------   
    
    public function table20(){
        return view('restaurant.table.table20.table20');
    }
    
    public function searchFood20(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table20.table20result', compact('food'));
    }
    
    public function table20CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 20)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 1200001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   //echo "Insert Success!";
	   return redirect()->to('/printCart20');
    }

    

    /* Table 1 Carts Print Show */
    public function printCart20_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 20)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 20)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table20.table20CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Delete Product Quantity Table 2
     public function quantityDeleteFront20($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart20');
    }
    
    //Customer Order Store Table 2
    public function customerOrderStore20(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        // $customerOrder->vat= 0;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname = $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat=$request->vat;
        $customerOrder->vat_amount= $customerOrder->tamount * ($customerOrder->vat / 100);
        $customerOrder->s_charge=$request->s_charge;
        $customerOrder->s_charge_amount= $customerOrder->tamount * ($customerOrder->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        $customerOrder->final_amount = ($customerOrder->tamount + $customerOrder->vat_amount + $customerOrder->s_charge_amount) - 
            ($customerOrder->discount_amount + $customerOrder->discount_amount_number);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT20');
    }
    
    //Customer Print Show Table 1
    public function customerPrintShowT20(){
        $customerPrintShowT20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 20)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 20)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table20.customerPrintShowT20', compact('customerPrintShowT20','customerPrintShowtableNumber20',
        'totalPayableAmount','orderId','waiterName'));
    }
    
    //Customer Print Show T1 Final
    public function customerPrintShowT20Final(){
        $customerPrintShowT20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 20)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table20.customerPrintShowT20Final', compact('customerPrintShowT20','customerPrintShowtableNumber20','totalPayableAmount','orderID','waiterName','billid'));
    }
    
    //Customer Print Show T1 Third State
    public function customerPrintState3T20(){
        $customerPrintShowT20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 20)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.table.table20.customerPrintState3T20', compact('customerPrintShowT20','customerPrintShowtableNumber20','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdate20(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        // $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 20)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        // $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT20Final');
    }
    
    public function customerPrintShowT20updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 20)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart20')->with('messageSuccess','Table_20 Order Successfully Completed.');
    }
    
    public function kotOrderAddT20(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart20')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackT20(){
         return redirect()->to('/customerPrintShowT20')->with('messageDanger', 'Customer Print Successfully Done.');
    }
    
    //KOT Order Table 1
    public function kotOrderStore20(){
         $kotPrintShowT20 = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 20)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table20.kotPrintShowT20', compact('kotPrintShowT20','kotTableNumber','kotPrintShowAdd'));
    }










   
    
}

    
