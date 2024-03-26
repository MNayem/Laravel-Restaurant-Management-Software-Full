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
use App\Models\KOT;
use App\Models\Waiter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /* Search by Bill ID */
    public function search_by_bill_id(Request $request){
        $searchByBillId = $request->id;
        $billId = TableOrders::select('*')
                ->where('id', $searchByBillId)
                ->get();
         $totalAmount = $billId->sum('final_amount');
        // echo  $billId;
        return view('restaurant.table.searchByBillId', compact('billId','totalAmount'));
    }
    
    /*Produts Add */
    public function productStore(Request $request){
        $user_email = Auth::user()->email;
        $product=new Product;
        $product->email= $user_email;
        $product->title= $request->title;
        $product->description= $request->description;
        $product->buyingprice= $request->buyingprice;
        $product->sellingprice= $request->sellingprice;
        $product->updated_price= $request->sellingprice - $request->buyingprice;

        $files=$request->file('image');
        $name=$request->file('image')->getClientOriginalName();


        if($request->hasFile('image')) {
          $name=$request->file('image')->getClientOriginalName();
          $request->file('image')->storeAs('images/',$name);
          $request->image->move(public_path('images'), $name);

        // $path = $file->storeAs('public/', $originalname);


        }

      $product->image="images/".$name;
      $product->save();
      return redirect()->back()->with('message', 'Product has been added successly!!');
    }

    /*Products Show */
    public function productshow(){
      $productshow= Product::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('product.allproduct',compact('productshow'));
    }
    
    /*Edit and Delete Product */
    public function productedit($id){
        $data=Product::find($id);
        return view('product.productedit', compact('data'));
    }
    public function producteditprocess(Request $request, $id){
        $data=Product::find($id);
        $data->title= $request->title;
        $data->description= $request->description;
        $data->buyingprice= $request->buyingprice;
        $data->sellingprice= $request->sellingprice;
        $data->updated_price= $request->sellingprice - $request->buyingprice;
        
        $file=$request->file('image');
        $name=$request->file('image')->getClientOriginalName();


        if($request->hasFile('image')) {
          $name=$request->file('image')->getClientOriginalName();
          $request->file('image')->storeAs('images/',$name);
          $request->image->move(public_path('images'), $name);

        // $path = $file->storeAs('public/', $originalname);


        }

        $data->image="images/".$name;
        
        $data->save();
      	return redirect()->to('/productshow')->with('message', 'Product has been updated successly!!');  
    }

    /* Delete Product */
    public function deleteproduct($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product has been deleted successly!!');
    }
    
    /*Food Add */
    public function foodStore(Request $request){
        $user_email = Auth::user()->email;
        $food=new Food;
        $food->email= $user_email;
        $food->name= $request->name;
        $food->description= $request->description;
        $food->category= $request->category;
        $food->fnumber= $request->fnumber;
        $food->makingcost= $request->makingcost;
        $food->sellingprice= $request->sellingprice;
        $food->estimatedprofit	= $request->sellingprice - $request->makingcost;

        $files=$request->file('image');
        $name=$request->file('image')->getClientOriginalName();
        //return $name;


        if($request->hasFile('image')) {
          $name=$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images/',$name);
        $request->image->move(public_path('images'), $name);

        // $path = $file->storeAs('public/', $originalname);


    }

     $food->image="images/".$name;
      $food->save();
      return redirect()->back()->with('message', 'Food Item has been added successly!!');
    }

    /*Food Item Show */
    public function foodShow(){
      $foodshow= Food::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('food.allfood',compact('foodshow'));
    }
    
    /*Edit and Delete Product */
    public function food_edit($id){
        $data=Food::find($id);
        return view('food.foodedit', compact('data'));
    }
    
    public function food_edit_process(Request $request, $id){
        $data=Food::find($id);
        $data->name= $request->name;
        $data->fnumber= $request->fnumber;
        $data->description= $request->description;
        $data->category= $request->category;
        $data->makingcost= $request->makingcost;
        $data->sellingprice= $request->sellingprice;
        $data->estimatedprofit= $request->sellingprice - $request->makingcost;
        $data->availability= $request->availability;
        
        $file=$request->file('image');
        $name=$request->file('image')->getClientOriginalName();


        if($request->hasFile('image')) {
          $name=$request->file('image')->getClientOriginalName();
          $request->file('image')->storeAs('images/',$name);
          $request->image->move(public_path('images'), $name);

        // $path = $file->storeAs('public/', $originalname);


        }

        $data->image="images/".$name;
        
        $data->save();
      	return redirect()->to('/foodshow')->with('message', 'Food has been updated successly!!');  
    }
    
    /* Delete Food */
    public function delete_food($id){
        $data=Food::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product has been deleted successly!!');
    }
    
    /*Ingredients Add */
    public function add_ingredients(){
        $productName = Product::get();
        $foodItemName = Food::get();
        return view('food.ingredientsAdd',compact('productName','foodItemName'));
     }
     
    public function ingredients_store(Request $request){
        $user_email = Auth::user()->email;
        $ingredients=new Ingredients;
        $ingredients->email= $user_email;
        $ingredients->productname= $request->title;
        $ingredients->foodname= $request->name;
        $ingredients->quantity= $request->quantity;

	     $ingredients->save();
	      return redirect()->back()->with('message', 'Ingedients has been added successly!!');
	    }
        
    /*Ingredients Show */
    public function ingredientsShow(){
      $ingredientsShow= Ingredients::select('*')
                ->orderBy('id', 'DESC')
                ->get();
      return view('food.ingredientslist',compact('ingredientsShow'));
    }
	/*Edit and Delete Stock */
    public function ingredients_edit($id){
        $data=Ingredients::find($id);
        return view('food.ingredientsedit', compact('data'));
    }
    public function ingredients_edit_process(Request $request, $id){
        $data=Ingredients::find($id);
        $data->productname= $request->productname;
        $data->foodname= $request->foodname;
        $data->quantity = $request->quantity;
        
        $data->save();
      	return redirect()->to('/ingredientsShow')->with('message1', 'Ingredients has been updated successly!!');  
    }

    /* Delete Stock */
    public function delete_ingredients($id){
        $data=Ingredients::find($id);
        $data->delete();
        return redirect()->back()->with('message2', 'Ingredients has been deleted successly!!');
    }

    
    /* Product Cart */
    public function productcart(){
        $product = Food::select('*')
                  ->get();
        return view('product.productcart', compact('product'));
    }
    
    /* Product Cart Front */
    public function productcartfront(){
        $product = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Party')
                  ->orWhere('category','Launch')
                  ->orWhere('category','Dinner')
                  ->orWhere('category','Chinese Cuisine')
                  ->orWhere('category','Thai Cuisine')
                  ->orWhere('category','Barista')
                  ->orWhere('category','Indian')
                  ->get();
        $productL = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Launch')
                  ->orWhere('category','Dinner')
                  ->get(); 
        $productD = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Dinner')
                  ->orWhere('category','Dinner')
                  ->get(); 
        $productBandD = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Beverage and Dessert')
                  ->get();
        $productBr = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Breakfast')
                  ->get();
        return view('welcome', compact('product','productL','productD','productBandD','productBr'));
    }
    
    public function productcartmenu(){
        $product = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Party')
                  ->orWhere('category','Launch')
                  ->orWhere('category','Dinner')
                  ->orWhere('category','Chinese Cuisine')
                  ->orWhere('category','Thai Cuisine')
                  ->orWhere('category','Barista')
                  ->orWhere('category','Indian')
                  ->get();
        $productL = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Launch')
                  ->orWhere('category','Dinner')
                  ->get(); 
        $productD = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Dinner')
                  ->orWhere('category','Dinner')
                  ->get(); 
        $productBandD = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Beverage and Dessert')
                  ->get();
        $productBr = Food::select('*')
                  ->where('availability','Yes')
                  ->where('category','Breakfast')
                  ->get();
        return view('pages.menu', compact('product','productL','productD','productBandD','productBr'));
    }    
    
    
    /* Return Cart*/
    public function returncart(){
        $product = Product::select('*')
                   ->get();
        return view('product.returncart', compact('product'));
    }

    /* Company Cart*/
    public function companycart(){
        $product = Product::select('*')
                  ->get();
        return view('product.companycart', compact('product'));
    }
    
    /* Search Food */
    
// COPY-------------------------------------------------------------------------   
    
    public function table1(){
        return view('restaurant.table.table1.table1');
    }
    
    public function searchFood1(Request $request){
        $search_number = $request->foodNumber;
        $food = Food::where('fnumber', $search_number)->get();
        
        // echo  $food;
        return view('restaurant.table.table1.table1result', compact('food'));
    }
    
    public function tableCartsStore(Request $request){
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
            $tableCarts->order_id = 1010001;
        }
        else if($idCheck->status == 'Incomplete'){
            $tableCarts->order_id = $idCheck->order_id;
        }else{
            $tableCarts->order_id = $idCheck->order_id + 1;
        }
	    $tableCarts->save();
	   //echo "Insert Success!";
	   return redirect()->to('/printCart')->with('message', 'Product has been added to cart!!');
    }
     /* Table 1 Carts Print Show */
    public function printCart_show(){
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
      return view('restaurant.table.table1.table1CartPrintShow',compact('tableCartsPrintShow','orderIdShow','totalAmountShow','waiterName'));
    }
    
    //Delete Product Quantity Table 1
     public function quantityDeleteFront($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->to('/printCart')->with('message', 'Cart Item has been deleted Successfully!!');
    }
    //Customer Print Show T1 Third State
    public function customerPrintState3(){
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
        return view('restaurant.table.table1.customerPrintState3T1', compact('customerPrintShowT1','customerPrintShowtableNumber1','totalPayableAmount','orderID','waiterName'));
    }
    public function customerPrintState3Back(){
         return redirect()->to('/customerPrintShowT1')->with('messageDanger', 'Customer Print Successfully Done.');
    }
    //Customer Order Store Table 1
    public function customerOrderStore(Request $request){
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
        
        return redirect()->to('/customerPrintShowT1')->with('message', 'Order has been placed successfully!!');
    }
     public function customerPrintOrderUpdate(Request $request, $id){
        $data= TableOrders::find($id);
        $data->cname = $request->cname;
        $data->phone_no = $request->phone_no;
        // $data->discount_percentage= $request->discount_percentage;
        // $data->discount_amount= $data->tamount * ($data->discount_percentage / 100);
        // $data->discount_amount_number= $request->discount_amount_number;
        $data->payment_type = $request->payment_type;
        $data->given_amount = $request->given_amount;
        // $data->discount_percentage = $request->discount_percentage;
        $discountAmount = TableCarts::select('*')
                         ->where('tablenumber', 1)
                         ->where('status', 'Incomplete')
                         ->first();
        $finalDiscount = TableOrders::select('*')
                        ->where('order_id', $discountAmount->order_id)
                        ->first();
        // $data->discount_amount = $finalDiscount->tamount * ($data->discount_percentage / 100);
        
        $data->save();
        return redirect()->to('/customerPrintShowT1Final')->with('message', 'Info has been Placed Successfully!!');
    }
     //Customer Print Show Table 1
    public function customerPrintShowT1(){
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

        return view('restaurant.table.table1.customerPrintShowT1', compact('customerPrintShowT1','customerPrintShowtableNumber1',
        'totalPayableAmount','orderId','waiterName'));
    }
    //Customer Print Show T1 Final
    public function customerPrintShowT1Final(){
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
        return view('restaurant.table.table1.customerPrintShowT1Final', compact('customerPrintShowT1','customerPrintShowtableNumber1','totalPayableAmount','orderID','waiterName','billid'));
    }
    public function customerPrintShowT1updateStatus(){
        $status = TableCarts::select('*')
                ->where('tablenumber', 1)
                ->where('status', 'Incomplete')
                ->update(['status'=>'Complete']);
                
        return redirect()->to('/printCart')->with('messageSuccess','Table_1 Order Successfully Completed.');
    }
    //Kot
    public function kotOrderAdd(Request $request){
        $kotOrderAdd=new KOT;
        $kotOrderAdd->food_number= $request->food_number;
        $kotOrderAdd->food_name= $request->fname;
        $kotOrderAdd->quantity= $request->product_quantity;
        
        $kotOrderAdd->save();
        return redirect()->to('/printCart')->with('messageSuccess', 'KOT Print Successfully Done.');
    }
    
    
    //KOT Order Table 1
    public function kotOrderStore(){
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

        return view('restaurant.table.table1.kotPrintShowT1', compact('kotPrintShowT1','kotTableNumber','kotPrintShowAdd'));
    }
    
    //Update Product Quantity Customer
    public function quantityEditFront(Request $request, $id){
        $data= TableCarts::find($id);
        $data->product_quantity	= $request->product_quantity;
        
        $data->save();
        return redirect()->back()->with('message1', 'Product Quantity has been Updated Successfully!!');
    }
     //Update Discount Customer
    public function discount_edit(Request $request, $id){
        $data= TableOrders::find($id);
        $data->discount_percentage= $request->discount_percentage;
        $data->discount_amount= $data->tamount * ($data->discount_percentage / 100);
        
        $data->final_amount = ($data->tamount + $data->vat_amount + $data->s_charge_amount) - 
            ($data->discount_amount + $data->discount_amount_number);
        
        $data->save();
        return redirect()->back()->with('messageInfo1', 'Discount has been Updated Successfully!!');
    }    
     //Update Discount  Amount Extra Customer
    public function discount_amount_extra_edit(Request $request, $id){
        $data= TableOrders::find($id);
        $data->discount_amount_number= $request->discount_amount_number;
        
        $data->final_amount = ($data->tamount + $data->vat_amount + $data->s_charge_amount) - 
            ($data->discount_amount + $data->discount_amount_number);
        $data->save();
        return redirect()->back()->with('messageInfo1', 'Discount Amount Extra has been Updated Successfully!!');
    }
     //Update Vat Customer
    public function vat_edit(Request $request, $id){
        $data= TableOrders::find($id);
        $data->vat= $request->vat;
        $data->vat_amount= $data->tamount * ($data->vat / 100);
        
        $data->final_amount = ($data->tamount + $data->vat_amount + $data->s_charge_amount) - 
            ($data->discount_amount + $data->discount_amount_number);
        
        $data->save();
        return redirect()->back()->with('messageInfo1', 'Vat has been Updated Successfully!!');
    } 
     //Update Service Charge Customer
    public function service_charge_edit(Request $request, $id){
        $data= TableOrders::find($id);
        $data->s_charge= $request->s_charge;
        $data->s_charge_amount= $data->tamount * ($data->s_charge / 100);
        
        $data->final_amount = ($data->tamount + $data->vat_amount + $data->s_charge_amount) - 
            ($data->discount_amount + $data->discount_amount_number);
        
        $data->save();
        return redirect()->back()->with('messageInfo1', 'Service Charge has been Updated Successfully!!');
    } 
    
    /*Table Carts Show */
    public function tableCarts_show(){
      $tableCartsShow= TableCarts::select('*')
                ->orderBy('id', 'DESC')
                ->get();
      return view('restaurant.table.tableCartShow',compact('tableCartsShow'));
    }
    
     /* Edit and Delete Cart */
    public function tableCartEdit($id){
        $data=TableCarts::find($id);
        return view('restaurant.table.order.cartedit', compact('data'));
    }
    
    public function tableCartEditProcess(Request $request, $id){
        $data=TableCarts::find($id);
        $data->fname= $request->fname;
        $data->tablenumber= $request->tablenumber;
        $data->amount= $request->amount;
        $data->product_quantity	= $request->product_quantity;
        $data->tamount= $request->amount * $request->product_quantity;
        $data->date= $request->date;
        
        $data->save();
      	return redirect()->to('/tableCarts')->with('message', 'Cart Item has been updated successly!!');  
    }

    /* Delete Cart Item */
    public function deletetableCart($id){
        $data=TableCarts::find($id);
        $data->delete();
        return redirect()->back();
    }
    
   
    
    
    
    /*Table Orders Show */
    public function tableOrders_show(){
      $tableOrdersShow= TableOrders::select('*')
                ->orderBy('id', 'DESC')
                ->get();
      return view('restaurant.table.tableOrderShow',compact('tableOrdersShow'));
    }
    
    /* Edit and Delete Order */
    public function tableOrderEdit($id){
        $data=TableOrders::find($id);
        return view('restaurant.table.order.orderedit', compact('data'));
    }
    
    public function tableOrderEditProcess(Request $request, $id){
        $data=TableOrders::find($id);
        $data->vat= $request->vat;
        $data->tamount= $request->tamount;
        $data->cname= $request->cname;
        $data->phone_no= $request->phone_no;
        $data->payment_type= $request->payment_type;
        $data->date= $request->date;
        
        $data->save();
      	return redirect()->to('/tableOrders')->with('message', 'Order Info has been updated successly!!');  
    }

    /* Delete Order */
    public function deleteTableOrder($id){
        $data=TableOrders::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Order Info been deleted successly!!');
    }
    
    /* KOT Order Show */
     public function kotOrders(){
      $kotOrdersShow= KOT::select('*')
                ->orderBy('id', 'DESC')
                ->get();
      return view('restaurant.table.kot.kotOrderShow',compact('kotOrdersShow'));
    }
    
    /* Edit and Delete KOT */
    public function kotOrderedit($id){
        $data=KOT::find($id);
        return view('restaurant.table.kot.kotedit', compact('data'));
    }
    
    public function kotOrdereditprocess(Request $request, $id){
        $data=KOT::find($id);
        $data->food_number= $request->food_number;
        $data->food_name= $request->food_name;
        $data->quantity= $request->quantity;
        
        $data->save();
      	return redirect()->to('/kotOrders')->with('message', 'KOT Info has been updated successly!!');  
    }

    /* Delete Order */
    public function deletetableKot($id){
        $data=KOT::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'KOT order Info been deleted successly!!');
    }
    
//------------------------------------------------------------------------------    
    
    public function dine_in(){
        return view('restaurant.dine_in');
    }
    
    public function take_away(){
        return view('restaurant.take_away');
    }
    
    /* Sales Report */
    
    //Daily Sales
    public function daily_sales_report(){
        $dailySalesReport = TableOrders::select('*')
                        ->where('date', Carbon::today())
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('restaurant.report.dailySalesReport', compact('dailySalesReport')); 
    }
    //Daily Sales Priont
    public function daily_sales_print(){
        $dailySalesReportPrint = TableOrders::select('*')
                        ->where('date', Carbon::today())
                        ->orderBy('id', 'DESC')
                        ->get();
        $totalAmount = $dailySalesReportPrint->sum('final_amount');
        return view('restaurant.report.print.dailySalesReportPrint', compact('dailySalesReportPrint','totalAmount'));
    }
    
     //Monthly Sales
    public function monthly_sales_report(){
        $monthlySalesReport = TableOrders::select('*')
                            ->whereMonth('created_at', date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->orderBy('id', 'DESC')
                            ->get();
        return view('restaurant.report.monthlySalesReport', compact('monthlySalesReport')); 
    }
    //Monthly Sales Print
    public function monthly_sales_print(){
        $monthlySalesReportPrint = TableOrders::select('*')
                            ->whereMonth('created_at', date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->orderBy('id', 'DESC')
                            ->get();
        $totalAmount = $monthlySalesReportPrint->sum('final_amount');
        return view('restaurant.report.print.monthlySalesReportPrint', compact('monthlySalesReportPrint','totalAmount')); 
    }
    
    //Datewise Report
    public function datewise_sales_report(Request $request){
        $start_date = Carbon::parse($request->start_date)
                             ->toDateTimeString();

        $end_date = Carbon::parse($request->end_date)
                             ->toDateTimeString();
        
        $dateWiseReport = TableOrders::select('*')
                        ->whereBetween('created_at',[$start_date,$end_date])
                        ->orderBy('id', 'DESC')
                        ->get();
         $totalAmount = $dateWiseReport->sum('final_amount');
        return view('restaurant.report.dateWiseReport', compact('dateWiseReport','totalAmount'));
        
    }
    public function dateWise_sales_print(Request $request){
        $start_date = Carbon::parse($request->start_date)
                             ->toDateTimeString();

        $end_date = Carbon::parse($request->end_date)
                             ->toDateTimeString();
        
        $dateWiseReportPrint = TableOrders::select('*')
                        ->whereBetween('created_at',[$start_date,$end_date])
                        ->orderBy('id', 'DESC')
                        ->get();
        $totalAmount = $dateWiseReportPrint->sum('final_amount');
        return view('restaurant.report.print.dateWiseReportPrint', compact('dateWiseReportPrint','totalAmount'));
    }
}
