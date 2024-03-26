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


class TakeAwayController extends Controller
{

    
    
    








// Take Away 1 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA1(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway1.takeAway1result', compact('food'));
    }
    
    public function TA1CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 1)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 2010001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA1');
    }

    public function printCartTA1_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 1)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow= TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow= TableCarts::select('*')
                        ->where('tablenumber', 1)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.takeAway.takeAway1.takeAway1CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

    public function quantityDeleteFrontTA1($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA1');
    }

    public function customerOrderStoreTA1(Request $request){
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

        return redirect()->to('/customerPrintShowTA1');
    }

    public function customerPrintShowTA1(){
        $customerPrintShowT1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 1)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts = TableCarts::select('*')
                        ->where('tablenumber', 1)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.takeAway.takeAway1.customerPrintShowTA1', compact('customerPrintShowT1','customerPrintShowtableNumber1',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA1Final(){
        $customerPrintShowT1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 1)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        $billid = TableOrders::latest()->first();
        return view('restaurant.takeAway.takeAway1.customerPrintShowTA1Final', compact('customerPrintShowT1','customerPrintShowtableNumber1','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA1(){
        $customerPrintShowT1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();
                            
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 1)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderID = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $orderID->order_id)
                     ->first();
        return view('restaurant.takeAway.takeAway1.customerPrintState3TA1', compact('customerPrintShowT1','customerPrintShowtableNumber1','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA1(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 1)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowTA1Final');
    }
    
    public function customerPrintShowTA1updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 1)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA1')->with('messageSuccess','Take_Away_1 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA1(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA1')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA1(){
         return redirect()->to('/customerPrintShowTA1')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA1(){
         $kotPrintShowT1 = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotPrintShowAdd = TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber =  TableCarts::select('*')
                            ->where('tablenumber', 1)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.takeAway.takeAway1.kotPrintShowTA1', compact('kotPrintShowT1','kotTableNumber','kotPrintShowAdd'));
    } 






















// Take Away 2 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA2(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway2.takeAway2result', compact('food'));
    }
    
    public function TA2CartsStore(Request $request){
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
            $tableCarts->order_id = 2020001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA2');
    }

    public function printCartTA2_show(){
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
      return view('restaurant.takeAway.takeAway2.takeAway2CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA2($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA2');
    }

    public function customerOrderStoreTA2(Request $request){
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

        return redirect()->to('/customerPrintShowTA2');
    }

    public function customerPrintShowTA2(){
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

        return view('restaurant.takeAway.takeAway2.customerPrintShowTA2', compact('customerPrintShowT2','customerPrintShowtableNumber2',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA2Final(){
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
        return view('restaurant.takeAway.takeAway2.customerPrintShowTA2Final', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA2(){
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
        return view('restaurant.takeAway.takeAway2.customerPrintState3TA2', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA2(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 2)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->save();
        return redirect()->to('/customerPrintShowTA2Final');
    }
    
    public function customerPrintShowTA2updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 2)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA2')->with('messageSuccess','Take_Away_2 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA2(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA2')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA2(){
         return redirect()->to('/customerPrintShowTA2')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA2(){
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

        return view('restaurant.takeAway.takeAway2.kotPrintShowTA2', compact('kotPrintShowT2','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   
   
   
   
   
    
    
    
    






















// Take Away 3 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA3(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway3.takeAway3result', compact('food'));
    }
    
    public function TA3CartsStore(Request $request){
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
            $tableCarts->order_id = 2030001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA3');
    }

    public function printCartTA3_show(){
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
      return view('restaurant.takeAway.takeAway3.takeAway3CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA3($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA3');
    }

    public function customerOrderStoreTA3(Request $request){
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

        return redirect()->to('/customerPrintShowTA3');
    }

    public function customerPrintShowTA3(){
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

        return view('restaurant.takeAway.takeAway3.customerPrintShowTA3', compact('customerPrintShowT3','customerPrintShowtableNumber3',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA3Final(){
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
        return view('restaurant.takeAway.takeAway3.customerPrintShowTA3Final', compact('customerPrintShowT3','customerPrintShowtableNumber3','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA3(){
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
        return view('restaurant.takeAway.takeAway3.customerPrintState3TA3', compact('customerPrintShowT3','customerPrintShowtableNumber3','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA3(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA3Final');
    }
    
    public function customerPrintShowTA3updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 3)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA3')->with('messageSuccess','Take_Away_3 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA3(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA3')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA3(){
         return redirect()->to('/customerPrintShowTA3')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA3(){
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

        return view('restaurant.takeAway.takeAway3.kotPrintShowTA3', compact('kotPrintShowT3','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   
   
   
   
   















// Take Away 4 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA4(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway4.takeAway4result', compact('food'));
    }
    
    public function TA4CartsStore(Request $request){
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
            $tableCarts->order_id = 2040001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA4');
    }

    public function printCartTA4_show(){
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
      return view('restaurant.takeAway.takeAway4.takeAway4CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA4($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA4');
    }

    public function customerOrderStoreTA4(Request $request){
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

        return redirect()->to('/customerPrintShowTA4');
    }

    public function customerPrintShowTA4(){
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

        return view('restaurant.takeAway.takeAway4.customerPrintShowTA4', compact('customerPrintShowT4','customerPrintShowtableNumber4',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA4Final(){
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
        return view('restaurant.takeAway.takeAway4.customerPrintShowTA4Final', compact('customerPrintShowT4','customerPrintShowtableNumber4','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA4(){
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
        return view('restaurant.takeAway.takeAway4.customerPrintState3TA4', compact('customerPrintShowT4','customerPrintShowtableNumber4','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA4(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA4Final');
    }
    
    public function customerPrintShowTA4updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 4)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA4')->with('messageSuccess','Take_Away_4 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA4(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA4')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA4(){
         return redirect()->to('/customerPrintShowTA4')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA4(){
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

        return view('restaurant.takeAway.takeAway4.kotPrintShowTA4', compact('kotPrintShowT4','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   















// Take Away 5 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA5(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway5.takeAway5result', compact('food'));
    }
    
    public function TA5CartsStore(Request $request){
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
            $tableCarts->order_id = 2050001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA5');
    }

    public function printCartTA5_show(){
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
      return view('restaurant.takeAway.takeAway5.takeAway5CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA5($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA5');
    }

    public function customerOrderStoreTA5(Request $request){
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

        return redirect()->to('/customerPrintShowTA5');
    }

    public function customerPrintShowTA5(){
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

        return view('restaurant.takeAway.takeAway5.customerPrintShowTA5', compact('customerPrintShowT5','customerPrintShowtableNumber5',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA5Final(){
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
        return view('restaurant.takeAway.takeAway5.customerPrintShowTA5Final', compact('customerPrintShowT5','customerPrintShowtableNumber5','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA5(){
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
        return view('restaurant.takeAway.takeAway5.customerPrintState3TA5', compact('customerPrintShowT5','customerPrintShowtableNumber5','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA5(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA5Final');
    }
    
    public function customerPrintShowTA5updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 5)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA5')->with('messageSuccess','Take_Away_5 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA5(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA5')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA5(){
         return redirect()->to('/customerPrintShowTA5')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA5(){
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

        return view('restaurant.takeAway.takeAway5.kotPrintShowTA5', compact('kotPrintShowT5','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   















// Take Away 6 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA6(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway6.takeAway6result', compact('food'));
    }
    
    public function TA6CartsStore(Request $request){
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
            $tableCarts->order_id = 2060001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA6');
    }

    public function printCartTA6_show(){
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
      return view('restaurant.takeAway.takeAway6.takeAway6CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA6($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA6');
    }

    public function customerOrderStoreTA6(Request $request){
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

        return redirect()->to('/customerPrintShowTA6');
    }

    public function customerPrintShowTA6(){
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

        return view('restaurant.takeAway.takeAway6.customerPrintShowTA6', compact('customerPrintShowT6','customerPrintShowtableNumber6',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA6Final(){
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
        return view('restaurant.takeAway.takeAway6.customerPrintShowTA6Final', compact('customerPrintShowT6','customerPrintShowtableNumber6','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA6(){
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
        return view('restaurant.takeAway.takeAway6.customerPrintState3TA6', compact('customerPrintShowT6','customerPrintShowtableNumber6','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA6(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA6Final');
    }
    
    public function customerPrintShowTA6updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 6)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA6')->with('messageSuccess','Take_Away_6 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA6(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA6')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA6(){
         return redirect()->to('/customerPrintShowTA6')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA6(){
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

        return view('restaurant.takeAway.takeAway6.kotPrintShowTA6', compact('kotPrintShowT6','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 
 
 
 
 















// Take Away 7 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA7(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway7.takeAway7result', compact('food'));
    }
    
    public function TA7CartsStore(Request $request){
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
            $tableCarts->order_id = 2070001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA7');
    }

    public function printCartTA7_show(){
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
      return view('restaurant.takeAway.takeAway7.takeAway7CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA7($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA7');
    }

    public function customerOrderStoreTA7(Request $request){
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

        return redirect()->to('/customerPrintShowTA7');
    }

    public function customerPrintShowTA7(){
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

        return view('restaurant.takeAway.takeAway7.customerPrintShowTA7', compact('customerPrintShowT7','customerPrintShowtableNumber7',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA7Final(){
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
        return view('restaurant.takeAway.takeAway7.customerPrintShowTA7Final', compact('customerPrintShowT7','customerPrintShowtableNumber7','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA7(){
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
        return view('restaurant.takeAway.takeAway7.customerPrintState3TA7', compact('customerPrintShowT7','customerPrintShowtableNumber7','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA7(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA7Final');
    }
    
    public function customerPrintShowTA7updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 7)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA7')->with('messageSuccess','Take_Away_7 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA7(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA7')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA7(){
         return redirect()->to('/customerPrintShowTA7')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA7(){
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

        return view('restaurant.takeAway.takeAway7.kotPrintShowTA7', compact('kotPrintShowT7','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   
   
   
   
   














// Take Away 8 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA8(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway8.takeAway8result', compact('food'));
    }
    
    public function TA8CartsStore(Request $request){
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
            $tableCarts->order_id = 2080001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA8');
    }

    public function printCartTA8_show(){
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
      return view('restaurant.takeAway.takeAway8.takeAway8CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA8($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA8');
    }

    public function customerOrderStoreTA8(Request $request){
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

        return redirect()->to('/customerPrintShowTA8');
    }

    public function customerPrintShowTA8(){
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

        return view('restaurant.takeAway.takeAway8.customerPrintShowTA8', compact('customerPrintShowT8','customerPrintShowtableNumber8',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA8Final(){
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
        return view('restaurant.takeAway.takeAway8.customerPrintShowTA8Final', compact('customerPrintShowT8','customerPrintShowtableNumber8','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA8(){
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
        return view('restaurant.takeAway.takeAway8.customerPrintState3TA8', compact('customerPrintShowT8','customerPrintShowtableNumber8','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA8(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA8Final');
    }
    
    public function customerPrintShowTA8updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 8)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA8')->with('messageSuccess','Take_Away_8 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA8(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA8')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA8(){
         return redirect()->to('/customerPrintShowTA8')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA8(){
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

        return view('restaurant.takeAway.takeAway8.kotPrintShowTA8', compact('kotPrintShowT8','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
   
   
   
   
   
   
   














// Take Away 9 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA9(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway9.takeAway9result', compact('food'));
    }
    
    public function TA9CartsStore(Request $request){
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
            $tableCarts->order_id = 2090001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA9');
    }

    public function printCartTA9_show(){
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
      return view('restaurant.takeAway.takeAway9.takeAway9CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA9($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA9');
    }

    public function customerOrderStoreTA9(Request $request){
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

        return redirect()->to('/customerPrintShowTA9');
    }

    public function customerPrintShowTA9(){
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

        return view('restaurant.takeAway.takeAway9.customerPrintShowTA9', compact('customerPrintShowT9','customerPrintShowtableNumber9',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA9Final(){
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
        return view('restaurant.takeAway.takeAway9.customerPrintShowTA9Final', compact('customerPrintShowT9','customerPrintShowtableNumber9','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA9(){
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
        return view('restaurant.takeAway.takeAway9.customerPrintState3TA9', compact('customerPrintShowT9','customerPrintShowtableNumber9','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA9(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA9Final');
    }
    
    public function customerPrintShowTA9updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 9)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA9')->with('messageSuccess','Take_Away_9 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA9(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA9')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA9(){
         return redirect()->to('/customerPrintShowTA9')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA9(){
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

        return view('restaurant.takeAway.takeAway9.kotPrintShowTA9', compact('kotPrintShowT9','kotTableNumber','kotPrintShowAdd'));
    } 




   
   
   
   
   
   
 
 




// Take Away 10 ------------------------------------------------------------------------------------------------------------------------------------------   
    

    public function searchFoodTA10(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.takeAway.takeAway10.takeAway10result', compact('food'));
    }
    
    public function TA10CartsStore(Request $request){
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
            $tableCarts->order_id = 2100001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   return redirect()->to('/printCartTA10');
    }

    public function printCartTA10_show(){
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
      return view('restaurant.takeAway.takeAway10.takeAway10CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }

     public function quantityDeleteFrontTA10($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCartTA10');
    }

    public function customerOrderStoreTA10(Request $request){
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

        return redirect()->to('/customerPrintShowTA10');
    }

    public function customerPrintShowTA10(){
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

        return view('restaurant.takeAway.takeAway10.customerPrintShowTA10', compact('customerPrintShowT10','customerPrintShowtableNumber10',
        'totalPayableAmount','orderId','waiterName'));
    }

    public function customerPrintShowTA10Final(){
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
        return view('restaurant.takeAway.takeAway10.customerPrintShowTA10Final', compact('customerPrintShowT10','customerPrintShowtableNumber10','totalPayableAmount','orderID','waiterName','billid'));
    }

    public function customerPrintState3TA10(){
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
        return view('restaurant.takeAway.takeAway10.customerPrintState3TA10', compact('customerPrintShowT10','customerPrintShowtableNumber10','totalPayableAmount','orderID','waiterName'));
    }
    
    public function customerPrintOrderUpdateTA10(Request $request, $id){
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
        return redirect()->to('/customerPrintShowTA10Final');
    }
    
    public function customerPrintShowTA10updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 10)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCartTA10')->with('messageSuccess','Take_Away_10 Order Successfully Completed.');
    }
    
    public function kotOrderAddTA10(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCartTA10')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    public function customerPrintState3BackTA10(){
         return redirect()->to('/customerPrintShowTA10')->with('messageDanger', 'Customer Print Successfully Done.');
    }

    public function kotOrderStoreTA10(){
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

        return view('restaurant.takeAway.takeAway10.kotPrintShowTA10', compact('kotPrintShowT10','kotTableNumber','kotPrintShowAdd'));
    } 





 
    
    
}

    
