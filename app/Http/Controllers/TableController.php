<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
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

class TableController extends Controller
{
    /* Table 2 */
    
    public function table2(){
        return view('restaurant.table.table2');
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
	   return redirect()->to('/table2')->with('message', 'Product has been added to cart!!');
    }
    
    /* Table 2 Carts Print Show */
    public function printCart2_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 2)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
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
        return redirect()->to('/table2')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    //Customer Order Store Table 2
    public function customerOrderStore2(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->vat= $request->tamount * ($request->vat / 100);
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
        
        return redirect()->to('/customerPrintShowT2')->with('message', 'Order has been placed successfully!!');
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
        $orderIdCarts2 = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId2 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts2->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.table.table2.customerPrintShowT2', compact('customerPrintShowT2','customerPrintShowtableNumber2',
        'totalPayableAmount','orderId2','waiterName'));
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
        return redirect()->to('/customerPrintShowT2Final')->with('message', 'Info has been Placed Successfully!!');
    }
    //Customer Print Show T2 Final
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
    //Customer Print Show T2 Third Print
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
        $billid = TableOrders::latest()->first();
        return view('restaurant.table.table2.customerPrintState3T2', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName','billid'));
    }
    public function customerPrintShowT2updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 2)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table2')->with('message','Success!!');
    }
    
    //KOT Order Store Table 2
    public function kotOrderStore2(){
         $kotPrintShowT2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
        $kotTableNumber2 =  TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table2.kotPrintShowT2', compact('kotPrintShowT2','kotTableNumber2'));
    }
    
     /* Table 3 */
    
    public function table3(){
        return view('restaurant.table.table3');
    }
    public function searchFood3(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table3')->with('message', 'Product has been added to cart!!');
    }
    
    /* Table 3 Carts Print Show */
    public function printCart3_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 3)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table3.table3CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    
    //Delete Product Quantity Table 3
    public function quantityDeleteFront3($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table3')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    
    //Customer Order Store Table 3
    public function customerOrderStore3(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount= $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT3')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 3
    public function customerPrintShowT3(){
        $customerPrintShowT3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber3= TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts3 = TableCarts::select('*')
                        ->where('tablenumber', 3)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId3 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts3->order_id)
                 ->first();

        return view('restaurant.table.table3.customerPrintShowT3', compact('customerPrintShowT3','customerPrintShowtableNumber3',
        'totalPayableAmount','orderId3'));
    }
    public function customerPrintOrderUpdate3(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 3)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT3Final')->with('message', 'Info has been Placed Successfully!!');
    }
    //Customer Print Show T3 Final
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
        return view('restaurant.table.table3.customerPrintShowT3Final', compact('customerPrintShowT3','customerPrintShowtableNumber3','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T3 Third
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
     public function customerPrintShowT3updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 3)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table3')->with('message','Success!!');
    }
    
    
    //KOT Order Store Table 3
    public function kotOrderStore3(){
         $kotPrintShowT3 = TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotableNumber3= TableCarts::select('*')
                            ->where('tablenumber', 3)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.table.table3.kotPrintShowT3', compact('kotPrintShowT3','kotableNumber3'));
    }
    
    /* Table 4 */
    
    public function table4(){
        return view('restaurant.table.table4');
    }
    public function searchFood4(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table4.table4result', compact('food'));
    }
    public function table4CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table4')->with('message', 'Product has been added to cart!!');
    }
     /* Table 4 Carts Print Show */
    public function printCart4_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 4)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table4.table4CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    
     //Delete Product Quantity Table 4
    public function quantityDeleteFront4($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table4')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    //Customer Order Store Table 4
    public function customerOrderStore4(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT4')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 4
    public function customerPrintShowT4(){
        $customerPrintShowT4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
         $customerPrintShowtableNumber4= TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts4 = TableCarts::select('*')
                        ->where('tablenumber', 4)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId4 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts4->order_id)
                 ->first();

        return view('restaurant.table.table4.customerPrintShowT4', compact('customerPrintShowT4','customerPrintShowtableNumber4',
        'totalPayableAmount','orderId4'));
    }
     //Customer Print Show T4 Final
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
        return view('restaurant.table.table4.customerPrintShowT4Final', compact('customerPrintShowT4','customerPrintShowtableNumber4','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T4 Third
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
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 4)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT4Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT4updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 4)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table4')->with('message','Success!!');
    }
    
    //KOT Order Store Table 4
    public function kotOrderStore4(){
         $kotPrintShowT4 = TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->get();
         $kotTableNumber4= TableCarts::select('*')
                            ->where('tablenumber', 4)
                            ->where('status', 'Incomplete')
                            ->first();
        return view('restaurant.table.table4.kotPrintShowT4', compact('kotPrintShowT4','kotTableNumber4'));
    }
     /* Table 5 */
    
    public function table5(){
        return view('restaurant.table.table5');
    }
    public function searchFood5(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table5.table5result', compact('food'));
    }
    public function table5CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table5')->with('message', 'Product has been added to cart!!');
    }
    /* Table 5 Carts Print Show */
    public function printCart5_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 5)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table5.table5CartPrintShow',compact('tableCartsPrintShow','orderIdShow',
      'totalAmountShow','waiterName'));
    }
    
    //Delete Product Quantity Table 5
    public function quantityDeleteFront5($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table5')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    //Customer Order Store Table 5
    public function customerOrderStore5(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT5')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 5
    public function customerPrintShowT5(){
       $customerPrintShowT5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();
         $customerPrintShowtableNumber5= TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts5 = TableCarts::select('*')
                        ->where('tablenumber', 5)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId5 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts5->order_id)
                 ->first();

        return view('restaurant.table.table5.customerPrintShowT5', compact('customerPrintShowT5','customerPrintShowtableNumber5',
        'totalPayableAmount','orderId5'));
    }
     //Customer Print Show T5 Final
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
        return view('restaurant.table.table5.customerPrintShowT5Final', compact('customerPrintShowT5','customerPrintShowtableNumber5','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T5 Third
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
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 5)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT5Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT5updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 5)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table5')->with('message','Success!!');
    }
    
    //KOT Order Store Table 5
    public function kotOrderStore5(){
         $kotPrintShowT5 = TableCarts::select('*')
                            ->where('tablenumber', 5)
                            ->where('status', 'Incomplete')
                            ->get();

        return view('restaurant.table.table5.kotPrintShowT5', compact('kotPrintShowT5'));
    }
    
    /* Table 6 */
    
    public function table6(){
        return view('restaurant.table.table6');
    }
    public function searchFood6(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table6.table6result', compact('food'));
    }
     public function table6CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table6')->with('message', 'Product has been added to cart!!');
    }
    
    //Delete Product Quantity Table 6
    public function quantityDeleteFront6($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table5')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    /* Table 6 Carts Print Show */
    public function printCart6_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 6)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table6.table6CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Customer Order Store Table 6
    public function customerOrderStore6(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT6')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 6
    public function customerPrintShowT6(){
        $customerPrintShowT6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber6= TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts6 = TableCarts::select('*')
                        ->where('tablenumber', 6)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId6 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts6->order_id)
                 ->first();

        return view('restaurant.table.table6.customerPrintShowT6', compact('customerPrintShowT6','customerPrintShowtableNumber6',
        'totalPayableAmount','orderId6'));
    }
    //Customer Print Show T6 Final
    public function customerPrintShowT6Final(){
        $customerPrintShow6 = TableCarts::select('*')
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
        return view('restaurant.table.table6.customerPrintShowT6Final', compact('customerPrintShow6','customerPrintShowtableNumber6','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T6 Third
    public function customerPrintState3T6(){
        $customerPrintShow6 = TableCarts::select('*')
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
        return view('restaurant.table.table6.customerPrintState3T6', compact('customerPrintShow6','customerPrintShowtableNumber6','totalPayableAmount','orderID','waiterName'));
    }
    public function customerPrintOrderUpdate6(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 6)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT6Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT6updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 6)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table6')->with('message','Success!!');
    }
    
    //KOT Order Store Table 6
    public function kotOrderStore6(){
         $kotPrintShowT6 = TableCarts::select('*')
                            ->where('tablenumber', 6)
                            ->where('status', 'Incomplete')
                            ->get();

        return view('restaurant.table.table6.kotPrintShowT6', compact('kotPrintShowT6'));
    }
    
    /* Table 7 */
    
    public function table7(){
        return view('restaurant.table.table7');
    }
    public function searchFood7(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table7.table7result', compact('food'));
    }
     public function table7CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table7')->with('message', 'Product has been added to cart!!');
    }
    //Delete Product Quantity Table 7
    public function quantityDeleteFront7($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table7')->with('message', 'Cart Item has been deleted Successfully!!');
    }
   
    /* Table 7 Carts Print Show */
    public function printCart7_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 7)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table7.table7CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Customer Order Store Table 7
    public function customerOrderStore7(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->wname= $request->name;
        $customerOrder->cname= $request->cname;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT7')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 7
     public function customerPrintShowT7(){
        $customerPrintShowT7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber7= TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts7 = TableCarts::select('*')
                        ->where('tablenumber', 7)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId7 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts7->order_id)
                 ->first();

        return view('restaurant.table.table7.customerPrintShowT7', compact('customerPrintShowT7','customerPrintShowtableNumber7',
        'totalPayableAmount','orderId7'));
    }
    //Customer Print Show T7 Final
    public function customerPrintShowT7Final(){
        $customerPrintShow7 = TableCarts::select('*')
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
        return view('restaurant.table.table7.customerPrintShowT7Final', compact('customerPrintShow7','customerPrintShowtableNumber7','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T7 Final
    public function customerPrintState3T7(){
        $customerPrintShow7 = TableCarts::select('*')
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
        return view('restaurant.table.table7.customerPrintState3T7', compact('customerPrintShow7','customerPrintShowtableNumber7','totalPayableAmount','orderID','waiterName'));
    }
    public function customerPrintOrderUpdate7(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 7)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT7Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT7updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 7)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table7')->with('message','Success!!');
    }
    
    //KOT Order Store Table 7
    public function kotOrderStore7(){
         $kotPrintShowT7 = TableCarts::select('*')
                            ->where('tablenumber', 7)
                            ->where('status', 'Incomplete')
                            ->get();

        return view('restaurant.table.table7.kotPrintShowT7', compact('kotPrintShowT7'));
    }
    
   /* Table 8  Customer Who will come for parcel*/
    
    public function table8(){
        return view('restaurant.table.table8');
    }
    public function searchFood8(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table8.table8result', compact('food'));
    }
     public function table8CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table8')->with('message', 'Product has been added to cart!!');
    }
     //Delete Product Quantity Table 8
    public function quantityDeleteFront8($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table8')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    /* Table 8 Carts Print Show */
    public function printCart8_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 8)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table8.table8CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Customer Order Store Table 8
    public function customerOrderStore8(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT8')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 8
    public function customerPrintShowT8(){
        $customerPrintShowT8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber8= TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts8 = TableCarts::select('*')
                        ->where('tablenumber', 8)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId8 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts8->order_id)
                 ->first();

        return view('restaurant.table.table8.customerPrintShowT8', compact('customerPrintShowT8','customerPrintShowtableNumber8',
        'totalPayableAmount','orderId8'));
    }
    //Customer Print Show T8 Final
    public function customerPrintShowT8Final(){
        $customerPrintShow8 = TableCarts::select('*')
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
        return view('restaurant.table.table8.customerPrintShowT8Final', compact('customerPrintShow8','customerPrintShowtableNumber8','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T8 Third
    public function customerPrintState3T8(){
        $customerPrintShow8 = TableCarts::select('*')
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
        return view('restaurant.table.table8.customerPrintState3T8', compact('customerPrintShow8','customerPrintShowtableNumber8','totalPayableAmount','orderID','waiterName'));
    }
    public function customerPrintOrderUpdate8(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 8)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT8Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT8updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 8)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table8')->with('message','Success!!');
    }
    
    //KOT Order Store Table 8
    public function kotOrderStore8(){
         $kotPrintShowT8 = TableCarts::select('*')
                            ->where('tablenumber', 8)
                            ->where('status', 'Incomplete')
                            ->get();

        return view('restaurant.table.table8.kotPrintShowT8', compact('kotPrintShowT8'));
    }
    

     /* Table 9 */
    
    public function table9(){
        return view('restaurant.table.table9');
    }
    public function searchFood9(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table9.table9result', compact('food'));
    }
     public function table9CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
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
	   //echo "Insert Success!";
	   return redirect()->to('/table9')->with('message', 'Product has been added to cart!!');
    }
    //Delete Product Quantity Table 9
    public function quantityDeleteFront9($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table9')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    /* Table 9 Carts Print Show */
    public function printCart9_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 9)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table9.table9CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Customer Order Store Table 9
    public function customerOrderStore9(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT9')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 9
    public function customerPrintShowT9(){
        $customerPrintShowT9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber9= TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts9 = TableCarts::select('*')
                        ->where('tablenumber', 9)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId9 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts9->order_id)
                 ->first();

        return view('restaurant.table.table9.customerPrintShowT9', compact('customerPrintShowT9','customerPrintShowtableNumber9',
        'totalPayableAmount','orderId9'));
    }
    //Customer Print Show T9 Final
    public function customerPrintShowT9Final(){
        $customerPrintShow9 = TableCarts::select('*')
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
        return view('restaurant.table.table9.customerPrintShowT9Final', compact('customerPrintShow9','customerPrintShowtableNumber9','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T9 Third
    public function customerPrintState3T9(){
        $customerPrintShow9 = TableCarts::select('*')
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
        return view('restaurant.table.table9.customerPrintState3T9', compact('customerPrintShow9','customerPrintShowtableNumber9','totalPayableAmount','orderID','waiterName'));
    }
    public function customerPrintOrderUpdate9(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 9)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT9Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT9updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 9)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table9')->with('message','Success!!');
    }
    
    //KOT Order Store Table 9
    public function kotOrderStore9(){
         $kotPrintShowT9 = TableCarts::select('*')
                            ->where('tablenumber', 9)
                            ->where('status', 'Incomplete')
                            ->get();

        return view('restaurant.table.table9.kotPrintShowT9', compact('kotPrintShowT9'));
    }
     /* Table 10 */
    public function table1w(){
        return view('restaurant.table.table1w');
    }
    public function table10(){
        return view('restaurant.table.table10');
    }
    public function searchFood10(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table10.table10result', compact('food'));
    }
     public function table10CartsStore(Request $request){
        $tableCarts=new TableCarts;
        $tableCarts->food_number= $request->food_number;
        $tableCarts->tablenumber= $request->tablenumber;
        $tableCarts->fname= $request->fname;
        $tableCarts->product_quantity= $request->product_quantity;
        $tableCarts->amount = $request->amount;
        $tableCarts->tamount = $tableCarts->amount * $tableCarts->product_quantity;
        $tableCarts->date= Carbon::today();
        
        $idCheck = TableCarts::where('tablenumber', 10)
                 ->orderBy('id', 'DESC')
                 ->first();
        if(empty($idCheck)){
            $tableCarts->order_id = 10100001;
        }
        
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   //echo "Insert Success!";
	   return redirect()->to('/table10')->with('message', 'Product has been added to cart!!');
    }
    //Delete Product Quantity Table 9
    public function quantityDeleteFront10($id)
    {
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/table10')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    /* Table 10 Carts Print Show */
    public function printCart10_show()
    {
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 10)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.table.table10.table10CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    //Customer Order Store Table 10
    public function customerOrderStore10(Request $request){
        $customerOrder = new TableOrders;
        $customerOrder->order_id= $request->order_id;
        $customerOrder->vat= 0;
        $customerOrder->tamount = $request->tamount;
        $customerOrder->cname= $request->cname;
        $customerOrder->wname= $request->name;
        if(!empty($request->date)){
            $customerOrder->date=$request->date;
        }
        else{
            $customerOrder->date= Carbon::today();
        }
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT10')->with('message', 'Order has been placed successfully!!');
    }
    //Customer Print Show Table 10
    public function customerPrintShowT10(){
        $customerPrintShowT10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();
        $customerPrintShowtableNumber10= TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->first();                   
        $totalPayableAmount = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->get();
        $orderIdCarts10 = TableCarts::select('*')
                        ->where('tablenumber', 10)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId10 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts10->order_id)
                 ->first();

        return view('restaurant.table.table10.customerPrintShowT10', compact('customerPrintShowT10','customerPrintShowtableNumber10',
        'totalPayableAmount','orderId10'));
    }
    //Customer Print Show T10 Final
    public function customerPrintShowT10Final(){
        $customerPrintShow10 = TableCarts::select('*')
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
        return view('restaurant.table.table10.customerPrintShowT10Final', compact('customerPrintShow10','customerPrintShowtableNumber10','totalPayableAmount','orderID','waiterName'));
    }
    //Customer Print Show T10 Third
    public function customerPrintState3T10(){
        $customerPrintShow10 = TableCarts::select('*')
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
        return view('restaurant.table.table10.customerPrintState3T10', compact('customerPrintShow10','customerPrintShowtableNumber10','totalPayableAmount','orderID','waiterName'));
    }
    public function customerPrintOrderUpdate10(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 10)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT10Final')->with('message', 'Info has been Placed Successfully!!');
    }
     public function customerPrintShowT10updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 10)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/table10')->with('message','Success!!');
    }
    
    //KOT Order Store Table 10
    public function kotOrderStore10(){
         $kotPrintShowT10 = TableCarts::select('*')
                            ->where('tablenumber', 10)
                            ->where('status', 'Incomplete')
                            ->get();

        return view('restaurant.table.table10.kotPrintShowT10', compact('kotPrintShowT10'));
    }
    
 

    
    /* Table 2 Arman -------------------------------------------------------------------*/
    // restaurant.arman.dine_in.table02.
    // /printCart02
    public function table02(){
        return view('restaurant.arman.dine_in.table02.table02');
    }
    public function searchFood02(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        return view('restaurant.arman.dine_in.table02.table02result', compact('food'));
    }
    public function table02CartsStore(Request $request){
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
	   return redirect()->to('/printCart02')->with('message', 'Product has been added to cart!!');
    }
    public function printCart02_show(){
      $tableCartsPrintShow= TableCarts::select('*')
                           ->where('tablenumber', 2)
                           ->where('status','Incomplete')
                           ->orderBy('id', 'DESC')
                           ->get();
      $orderIdShow = TableCarts::select('*')
                    ->orderBy('id', 'DESC')
                    ->first();
      $totalAmountShow = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->get();
      $waiterName = Waiter::get();
      return view('restaurant.arman.dine_in.table02.table02CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    public function quantityDeleteFront02($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart02')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    public function customerOrderStore02(Request $request){
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
        $customerOrder->vat= $customerOrder->tamount * ($request->vat / 100);
        $customerOrder->s_charge= $customerOrder->tamount * ($request->s_charge / 100);
        $customerOrder->discount_percentage= $request->discount_percentage;
        $customerOrder->discount_amount= $customerOrder->tamount * ($customerOrder->discount_percentage / 100);
        $customerOrder->discount_amount_number= $request->discount_amount_number;
        
        $customerOrder->save();
        
        // $status = TableCarts::select('*')
        //         ->where('tablenumber', 1)
        //         ->where('status', 'Incomplete')
        //         ->update(['status'=>'Complete']);
        
        return redirect()->to('/customerPrintShowT02')->with('message', 'Order has been placed successfully!!');
    }
    public function customerPrintShowT02(){
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
        $orderIdCarts2 = TableCarts::select('*')
                        ->where('tablenumber', 2)
                        ->where('status', 'Incomplete')
                        ->first();
        $orderId2 = TableOrders::select('*')
                 ->where('order_id', $orderIdCarts2->order_id)
                 ->first();
        $O_ID = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();
        $waiterName = TableOrders::select('*')
                     ->where('order_id', $O_ID->order_id)
                     ->first();

        return view('restaurant.arman.dine_in.table02.customerPrintShowT02', compact('customerPrintShowT2','customerPrintShowtableNumber2',
        'totalPayableAmount','orderId2','waiterName'));
    }
    public function customerPrintOrderUpdate02(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 2)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT02Final')->with('message', 'Info has been Placed Successfully!!');
    }
    public function customerPrintShowT02Final(){
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
        return view('restaurant.arman.dine_in.table02.customerPrintShowT02Final', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName','billid'));
    }
    public function customerPrintState3T02(){
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
        return view('restaurant.arman.dine_in.table02.customerPrintState3T02', compact('customerPrintShowT2','customerPrintShowtableNumber2','totalPayableAmount','orderID','waiterName','billid'));
    }
    public function customerPrintShowT02updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 2)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart02')->with('message','Success!!');
    }
    public function kotOrderStore02(){
         $kotPrintShowT2 = TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->get();
        $kotTableNumber2 =  TableCarts::select('*')
                            ->where('tablenumber', 2)
                            ->where('status', 'Incomplete')
                            ->first();

        return view('restaurant.arman.dine_in.table02.kotPrintShowT02', compact('kotPrintShowT2','kotTableNumber2'));
    }    
    
    
}
