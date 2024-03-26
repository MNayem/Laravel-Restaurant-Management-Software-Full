<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SrController;
use App\Http\Controllers\DeliverymanController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutsController;
use App\Http\Controllers\ReturnCheckoutsController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\CompanyCheckoutsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\DineInController;
use App\Http\Controllers\TakeAwayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Table List */
// Route::get('/table1', function () {
//     return view('restaurant.table.table1');
// });
/* Search by Bill ID */
Route::get('/searchByBilId',[ProductController::class, 'search_by_bill_id']);
Route::get('/searchByBillIdPrint', [ProductController::class, 'search_by_bill_id_print']);


/* Sales Report */

//Daily
Route::get('/dailySalesReport', [ProductController::class, 'daily_sales_report']);
Route::get('/dailySalePrint', [ProductController::class, 'daily_sales_print']);

//Monthly
Route::get('/monthlySalesReport', [ProductController::class, 'monthly_sales_report']);
Route::get('/monthlySalePrint', [ProductController::class, 'monthly_sales_print']);

//DateWise
Route::get('/dateWiseSearch', [ProductController::class, 'datewise_sales_report']);
Route::get('/dateWiseSalePrint', [ProductController::class, 'dateWise_sales_print']);

//Table Info 

//Table 1
Route::get('/table1', [ProductController::class,'table1' ])->name('table1');
Route::post('/search',[ProductController::class, 'searchFood1']);
Route::post('/addtablecarts', [ProductController::class, 'tableCartsStore']);
Route::get('/printCart', [ProductController::class, 'printCart_show']);
Route::get('/quantityDeleteFront/{id}', [ProductController::class, 'quantityDeleteFront']);
Route::get('/customerPrintState3',[ProductController::class, 'customerPrintState3']);
Route::post('/customerPrintState3Back', [ProductController::class, 'customerPrintState3Back']);
Route::post('/customerPrint', [ProductController::class, 'customerOrderStore']);
Route::post('/customerPrintOrderUpdate/{id}', [ProductController::class, 'customerPrintOrderUpdate']);
Route::get('/customerPrintShowT1',[ProductController::class, 'customerPrintShowT1']);
Route::get('/customerPrintShowT1Final',[ProductController::class, 'customerPrintShowT1Final']);
Route::post('/customerPrintShowT1updateStatus', [ProductController::class, 'customerPrintShowT1updateStatus']);
Route::post('/kotOrderAdd', [ProductController::class, 'kotOrderAdd']);
Route::post('/kotPrint', [ProductController::class, 'kotOrderStore']);




//Table 2-----------------------------------------------------------------------------------------------------------------------------
Route::get('/table2', [DineInController::class,'table2'])->name('table2');
Route::post('/searchT2',[DineInController::class, 'searchFood2']);
Route::post('/addtable2carts', [DineInController::class, 'table2CartsStore']);
Route::get('/printCart2', [DineInController::class, 'printCart2_show']);
Route::get('/quantityDeleteFront2/{id}', [DineInController::class, 'quantityDeleteFront2']);
Route::get('/customerPrintShowT2',[DineInController::class, 'customerPrintShowT2']);
Route::get('/customerPrintShowT2Final',[DineInController::class, 'customerPrintShowT2Final']);
Route::post('/customerPrintShowT2updateStatus', [DineInController::class, 'customerPrintShowT2updateStatus']);
Route::get('/customerPrintState3T2', [DineInController::class, 'customerPrintState3T2']);
Route::post('/customerPrint2', [DineInController::class, 'customerOrderStore2']);
Route::post('/customerPrintOrderUpdate2/{id}', [DineInController::class, 'customerPrintOrderUpdate2']);
Route::post('/kotOrderAddT2', [DineInController::class, 'kotOrderAddT2']);
Route::post('/kotPrintT2', [DineInController::class, 'kotOrderStore2']);
Route::post('/customerPrintState3BackT2', [DineInController::class, 'customerPrintState3BackT2']);
//------------------------------------------------------------------------------------------------------------------------------------



//Table 3-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT3',[DineInController::class, 'searchFood3']);
Route::post('/addtable3carts', [DineInController::class, 'table3CartsStore']);
Route::get('/printCart3', [DineInController::class, 'printCart3_show']);
Route::get('/quantityDeleteFront3/{id}', [DineInController::class, 'quantityDeleteFront3']);
Route::get('/customerPrintShowT3',[DineInController::class, 'customerPrintShowT3']);
Route::get('/customerPrintShowT3Final',[DineInController::class, 'customerPrintShowT3Final']);
Route::post('/customerPrintShowT3updateStatus', [DineInController::class, 'customerPrintShowT3updateStatus']);
Route::get('/customerPrintState3T3', [DineInController::class, 'customerPrintState3T3']);
Route::post('/customerPrint3', [DineInController::class, 'customerOrderStore3']);
Route::post('/customerPrintOrderUpdate3/{id}', [DineInController::class, 'customerPrintOrderUpdate3']);
Route::post('/kotOrderAddT3', [DineInController::class, 'kotOrderAddT3']);
Route::post('/kotPrintT3', [DineInController::class, 'kotOrderStore3']);
Route::post('/customerPrintState3BackT3', [DineInController::class, 'customerPrintState3BackT3']);



//Table 4-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT4',[DineInController::class, 'searchFood4']);
Route::post('/addtable4carts', [DineInController::class, 'table4CartsStore']);
Route::get('/printCart4', [DineInController::class, 'printCart4_show']);
Route::get('/quantityDeleteFront4/{id}', [DineInController::class, 'quantityDeleteFront4']);
Route::get('/customerPrintShowT4',[DineInController::class, 'customerPrintShowT4']);
Route::get('/customerPrintShowT4Final',[DineInController::class, 'customerPrintShowT4Final']);
Route::post('/customerPrintShowT4updateStatus', [DineInController::class, 'customerPrintShowT4updateStatus']);
Route::get('/customerPrintState3T4', [DineInController::class, 'customerPrintState3T4']);
Route::post('/customerPrint4', [DineInController::class, 'customerOrderStore4']);
Route::post('/customerPrintOrderUpdate4/{id}', [DineInController::class, 'customerPrintOrderUpdate4']);
Route::post('/kotOrderAddT4', [DineInController::class, 'kotOrderAddT4']);
Route::post('/kotPrintT4', [DineInController::class, 'kotOrderStore4']);
Route::post('/customerPrintState3BackT4', [DineInController::class, 'customerPrintState3BackT4']);


//Table 5-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT5',[DineInController::class, 'searchFood5']);
Route::post('/addtable5carts', [DineInController::class, 'table5CartsStore']);
Route::get('/printCart5', [DineInController::class, 'printCart5_show']);
Route::get('/quantityDeleteFront5/{id}', [DineInController::class, 'quantityDeleteFront5']);
Route::get('/customerPrintShowT5',[DineInController::class, 'customerPrintShowT5']);
Route::get('/customerPrintShowT5Final',[DineInController::class, 'customerPrintShowT5Final']);
Route::post('/customerPrintShowT5updateStatus', [DineInController::class, 'customerPrintShowT5updateStatus']);
Route::get('/customerPrintState3T5', [DineInController::class, 'customerPrintState3T5']);
Route::post('/customerPrint5', [DineInController::class, 'customerOrderStore5']);
Route::post('/customerPrintOrderUpdate5/{id}', [DineInController::class, 'customerPrintOrderUpdate5']);
Route::post('/kotOrderAddT5', [DineInController::class, 'kotOrderAddT5']);
Route::post('/kotPrintT5', [DineInController::class, 'kotOrderStore5']);
Route::post('/customerPrintState3BackT5', [DineInController::class, 'customerPrintState3BackT5']);


//Table 6-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT6',[DineInController::class, 'searchFood6']);
Route::post('/addtable6carts', [DineInController::class, 'table6CartsStore']);
Route::get('/printCart6', [DineInController::class, 'printCart6_show']);
Route::get('/quantityDeleteFront6/{id}', [DineInController::class, 'quantityDeleteFront6']);
Route::get('/customerPrintShowT6',[DineInController::class, 'customerPrintShowT6']);
Route::get('/customerPrintShowT6Final',[DineInController::class, 'customerPrintShowT6Final']);
Route::post('/customerPrintShowT6updateStatus', [DineInController::class, 'customerPrintShowT6updateStatus']);
Route::get('/customerPrintState3T6', [DineInController::class, 'customerPrintState3T6']);
Route::post('/customerPrint6', [DineInController::class, 'customerOrderStore6']);
Route::post('/customerPrintOrderUpdate6/{id}', [DineInController::class, 'customerPrintOrderUpdate6']);
Route::post('/kotOrderAddT6', [DineInController::class, 'kotOrderAddT6']);
Route::post('/kotPrintT6', [DineInController::class, 'kotOrderStore6']);
Route::post('/customerPrintState3BackT6', [DineInController::class, 'customerPrintState3BackT6']);







//Table 7-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT7',[DineInController::class, 'searchFood7']);
Route::post('/addtable7carts', [DineInController::class, 'table7CartsStore']);
Route::get('/printCart7', [DineInController::class, 'printCart7_show']);
Route::get('/quantityDeleteFront7/{id}', [DineInController::class, 'quantityDeleteFront7']);
Route::get('/customerPrintShowT7',[DineInController::class, 'customerPrintShowT7']);
Route::get('/customerPrintShowT7Final',[DineInController::class, 'customerPrintShowT7Final']);
Route::post('/customerPrintShowT7updateStatus', [DineInController::class, 'customerPrintShowT7updateStatus']);
Route::get('/customerPrintState3T7', [DineInController::class, 'customerPrintState3T7']);
Route::post('/customerPrint7', [DineInController::class, 'customerOrderStore7']);
Route::post('/customerPrintOrderUpdate7/{id}', [DineInController::class, 'customerPrintOrderUpdate7']);
Route::post('/kotOrderAddT7', [DineInController::class, 'kotOrderAddT7']);
Route::post('/kotPrintT7', [DineInController::class, 'kotOrderStore7']);
Route::post('/customerPrintState3BackT7', [DineInController::class, 'customerPrintState3BackT7']);


//Table 8-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT8',[DineInController::class, 'searchFood8']);
Route::post('/addtable8carts', [DineInController::class, 'table8CartsStore']);
Route::get('/printCart8', [DineInController::class, 'printCart8_show']);
Route::get('/quantityDeleteFront8/{id}', [DineInController::class, 'quantityDeleteFront8']);
Route::get('/customerPrintShowT8',[DineInController::class, 'customerPrintShowT8']);
Route::get('/customerPrintShowT8Final',[DineInController::class, 'customerPrintShowT8Final']);
Route::post('/customerPrintShowT8updateStatus', [DineInController::class, 'customerPrintShowT8updateStatus']);
Route::get('/customerPrintState3T8', [DineInController::class, 'customerPrintState3T8']);
Route::post('/customerPrint8', [DineInController::class, 'customerOrderStore8']);
Route::post('/customerPrintOrderUpdate8/{id}', [DineInController::class, 'customerPrintOrderUpdate8']);
Route::post('/kotOrderAddT8', [DineInController::class, 'kotOrderAddT8']);
Route::post('/kotPrintT8', [DineInController::class, 'kotOrderStore8']);
Route::post('/customerPrintState3BackT8', [DineInController::class, 'customerPrintState3BackT8']);



//Table 9-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT9',[DineInController::class, 'searchFood9']);
Route::post('/addtable9carts', [DineInController::class, 'table9CartsStore']);
Route::get('/printCart9', [DineInController::class, 'printCart9_show']);
Route::get('/quantityDeleteFront9/{id}', [DineInController::class, 'quantityDeleteFront9']);
Route::get('/customerPrintShowT9',[DineInController::class, 'customerPrintShowT9']);
Route::get('/customerPrintShowT9Final',[DineInController::class, 'customerPrintShowT9Final']);
Route::post('/customerPrintShowT9updateStatus', [DineInController::class, 'customerPrintShowT9updateStatus']);
Route::get('/customerPrintState3T9', [DineInController::class, 'customerPrintState3T9']);
Route::post('/customerPrint9', [DineInController::class, 'customerOrderStore9']);
Route::post('/customerPrintOrderUpdate9/{id}', [DineInController::class, 'customerPrintOrderUpdate9']);
Route::post('/kotOrderAddT9', [DineInController::class, 'kotOrderAddT9']);
Route::post('/kotPrintT9', [DineInController::class, 'kotOrderStore9']);
Route::post('/customerPrintState3BackT9', [DineInController::class, 'customerPrintState3BackT9']);




//Table 10-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT10',[DineInController::class, 'searchFood10']);
Route::post('/addtable10carts', [DineInController::class, 'table10CartsStore']);
Route::get('/printCart10', [DineInController::class, 'printCart10_show']);
Route::get('/quantityDeleteFront10/{id}', [DineInController::class, 'quantityDeleteFront10']);
Route::get('/customerPrintShowT10',[DineInController::class, 'customerPrintShowT10']);
Route::get('/customerPrintShowT10Final',[DineInController::class, 'customerPrintShowT10Final']);
Route::post('/customerPrintShowT10updateStatus', [DineInController::class, 'customerPrintShowT10updateStatus']);
Route::get('/customerPrintState3T10', [DineInController::class, 'customerPrintState3T10']);
Route::post('/customerPrint10', [DineInController::class, 'customerOrderStore10']);
Route::post('/customerPrintOrderUpdate10/{id}', [DineInController::class, 'customerPrintOrderUpdate10']);
Route::post('/kotOrderAddT10', [DineInController::class, 'kotOrderAddT10']);
Route::post('/kotPrintT10', [DineInController::class, 'kotOrderStore10']);
Route::post('/customerPrintState3BackT10', [DineInController::class, 'customerPrintState3BackT10']);




//Table 11-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT11',[DineInController::class, 'searchFood11']);
Route::post('/addtable11carts', [DineInController::class, 'table11CartsStore']);
Route::get('/printCart11', [DineInController::class, 'printCart11_show']);
Route::get('/quantityDeleteFront11/{id}', [DineInController::class, 'quantityDeleteFront11']);
Route::get('/customerPrintShowT11',[DineInController::class, 'customerPrintShowT11']);
Route::get('/customerPrintShowT11Final',[DineInController::class, 'customerPrintShowT11Final']);
Route::post('/customerPrintShowT11updateStatus', [DineInController::class, 'customerPrintShowT11updateStatus']);
Route::get('/customerPrintState3T11', [DineInController::class, 'customerPrintState3T11']);
Route::post('/customerPrint11', [DineInController::class, 'customerOrderStore11']);
Route::post('/customerPrintOrderUpdate11/{id}', [DineInController::class, 'customerPrintOrderUpdate11']);
Route::post('/kotOrderAddT11', [DineInController::class, 'kotOrderAddT11']);
Route::post('/kotPrintT11', [DineInController::class, 'kotOrderStore11']);
Route::post('/customerPrintState3BackT11', [DineInController::class, 'customerPrintState3BackT11']);



//Table 12-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT12',[DineInController::class, 'searchFood12']);
Route::post('/addtable12carts', [DineInController::class, 'table12CartsStore']);
Route::get('/printCart12', [DineInController::class, 'printCart12_show']);
Route::get('/quantityDeleteFront12/{id}', [DineInController::class, 'quantityDeleteFront12']);
Route::get('/customerPrintShowT12',[DineInController::class, 'customerPrintShowT12']);
Route::get('/customerPrintShowT12Final',[DineInController::class, 'customerPrintShowT12Final']);
Route::post('/customerPrintShowT12updateStatus', [DineInController::class, 'customerPrintShowT12updateStatus']);
Route::get('/customerPrintState3T12', [DineInController::class, 'customerPrintState3T12']);
Route::post('/customerPrint12', [DineInController::class, 'customerOrderStore12']);
Route::post('/customerPrintOrderUpdate12/{id}', [DineInController::class, 'customerPrintOrderUpdate12']);
Route::post('/kotOrderAddT12', [DineInController::class, 'kotOrderAddT12']);
Route::post('/kotPrintT12', [DineInController::class, 'kotOrderStore12']);
Route::post('/customerPrintState3BackT12', [DineInController::class, 'customerPrintState3BackT12']);


//Table 13-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT13',[DineInController::class, 'searchFood13']);
Route::post('/addtable13carts', [DineInController::class, 'table13CartsStore']);
Route::get('/printCart13', [DineInController::class, 'printCart13_show']);
Route::get('/quantityDeleteFront13/{id}', [DineInController::class, 'quantityDeleteFront13']);
Route::get('/customerPrintShowT13',[DineInController::class, 'customerPrintShowT13']);
Route::get('/customerPrintShowT13Final',[DineInController::class, 'customerPrintShowT13Final']);
Route::post('/customerPrintShowT13updateStatus', [DineInController::class, 'customerPrintShowT13updateStatus']);
Route::get('/customerPrintState3T13', [DineInController::class, 'customerPrintState3T13']);
Route::post('/customerPrint13', [DineInController::class, 'customerOrderStore13']);
Route::post('/customerPrintOrderUpdate13/{id}', [DineInController::class, 'customerPrintOrderUpdate13']);
Route::post('/kotOrderAddT13', [DineInController::class, 'kotOrderAddT13']);
Route::post('/kotPrintT13', [DineInController::class, 'kotOrderStore13']);
Route::post('/customerPrintState3BackT13', [DineInController::class, 'customerPrintState3BackT13']);



//Table 14-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT14',[DineInController::class, 'searchFood14']);
Route::post('/addtable14carts', [DineInController::class, 'table14CartsStore']);
Route::get('/printCart14', [DineInController::class, 'printCart14_show']);
Route::get('/quantityDeleteFront14/{id}', [DineInController::class, 'quantityDeleteFront14']);
Route::get('/customerPrintShowT14',[DineInController::class, 'customerPrintShowT14']);
Route::get('/customerPrintShowT14Final',[DineInController::class, 'customerPrintShowT14Final']);
Route::post('/customerPrintShowT14updateStatus', [DineInController::class, 'customerPrintShowT14updateStatus']);
Route::get('/customerPrintState3T14', [DineInController::class, 'customerPrintState3T14']);
Route::post('/customerPrint14', [DineInController::class, 'customerOrderStore14']);
Route::post('/customerPrintOrderUpdate14/{id}', [DineInController::class, 'customerPrintOrderUpdate14']);
Route::post('/kotOrderAddT14', [DineInController::class, 'kotOrderAddT14']);
Route::post('/kotPrintT14', [DineInController::class, 'kotOrderStore14']);
Route::post('/customerPrintState3BackT14', [DineInController::class, 'customerPrintState3BackT14']);



//Table 15-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT15',[DineInController::class, 'searchFood15']);
Route::post('/addtable15carts', [DineInController::class, 'table15CartsStore']);
Route::get('/printCart15', [DineInController::class, 'printCart15_show']);
Route::get('/quantityDeleteFront15/{id}', [DineInController::class, 'quantityDeleteFront15']);
Route::get('/customerPrintShowT15',[DineInController::class, 'customerPrintShowT15']);
Route::get('/customerPrintShowT15Final',[DineInController::class, 'customerPrintShowT15Final']);
Route::post('/customerPrintShowT15updateStatus', [DineInController::class, 'customerPrintShowT15updateStatus']);
Route::get('/customerPrintState3T15', [DineInController::class, 'customerPrintState3T15']);
Route::post('/customerPrint15', [DineInController::class, 'customerOrderStore15']);
Route::post('/customerPrintOrderUpdate15/{id}', [DineInController::class, 'customerPrintOrderUpdate15']);
Route::post('/kotOrderAddT15', [DineInController::class, 'kotOrderAddT15']);
Route::post('/kotPrintT15', [DineInController::class, 'kotOrderStore15']);
Route::post('/customerPrintState3BackT15', [DineInController::class, 'customerPrintState3BackT15']);





//Table 16-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT16',[DineInController::class, 'searchFood16']);
Route::post('/addtable16carts', [DineInController::class, 'table16CartsStore']);
Route::get('/printCart16', [DineInController::class, 'printCart16_show']);
Route::get('/quantityDeleteFront16/{id}', [DineInController::class, 'quantityDeleteFront16']);
Route::get('/customerPrintShowT16',[DineInController::class, 'customerPrintShowT16']);
Route::get('/customerPrintShowT16Final',[DineInController::class, 'customerPrintShowT16Final']);
Route::post('/customerPrintShowT16updateStatus', [DineInController::class, 'customerPrintShowT16updateStatus']);
Route::get('/customerPrintState3T16', [DineInController::class, 'customerPrintState3T16']);
Route::post('/customerPrint16', [DineInController::class, 'customerOrderStore16']);
Route::post('/customerPrintOrderUpdate16/{id}', [DineInController::class, 'customerPrintOrderUpdate16']);
Route::post('/kotOrderAddT16', [DineInController::class, 'kotOrderAddT16']);
Route::post('/kotPrintT16', [DineInController::class, 'kotOrderStore16']);
Route::post('/customerPrintState3BackT16', [DineInController::class, 'customerPrintState3BackT16']);




//Table 17-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT17',[DineInController::class, 'searchFood17']);
Route::post('/addtable17carts', [DineInController::class, 'table17CartsStore']);
Route::get('/printCart17', [DineInController::class, 'printCart17_show']);
Route::get('/quantityDeleteFront17/{id}', [DineInController::class, 'quantityDeleteFront17']);
Route::get('/customerPrintShowT17',[DineInController::class, 'customerPrintShowT17']);
Route::get('/customerPrintShowT17Final',[DineInController::class, 'customerPrintShowT17Final']);
Route::post('/customerPrintShowT17updateStatus', [DineInController::class, 'customerPrintShowT17updateStatus']);
Route::get('/customerPrintState3T17', [DineInController::class, 'customerPrintState3T17']);
Route::post('/customerPrint17', [DineInController::class, 'customerOrderStore17']);
Route::post('/customerPrintOrderUpdate17/{id}', [DineInController::class, 'customerPrintOrderUpdate17']);
Route::post('/kotOrderAddT17', [DineInController::class, 'kotOrderAddT17']);
Route::post('/kotPrintT17', [DineInController::class, 'kotOrderStore17']);
Route::post('/customerPrintState3BackT17', [DineInController::class, 'customerPrintState3BackT17']);




//Table 18-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT18',[DineInController::class, 'searchFood18']);
Route::post('/addtable18carts', [DineInController::class, 'table18CartsStore']);
Route::get('/printCart18', [DineInController::class, 'printCart18_show']);
Route::get('/quantityDeleteFront18/{id}', [DineInController::class, 'quantityDeleteFront18']);
Route::get('/customerPrintShowT18',[DineInController::class, 'customerPrintShowT18']);
Route::get('/customerPrintShowT18Final',[DineInController::class, 'customerPrintShowT18Final']);
Route::post('/customerPrintShowT18updateStatus', [DineInController::class, 'customerPrintShowT18updateStatus']);
Route::get('/customerPrintState3T18', [DineInController::class, 'customerPrintState3T18']);
Route::post('/customerPrint18', [DineInController::class, 'customerOrderStore18']);
Route::post('/customerPrintOrderUpdate18/{id}', [DineInController::class, 'customerPrintOrderUpdate18']);
Route::post('/kotOrderAddT18', [DineInController::class, 'kotOrderAddT18']);
Route::post('/kotPrintT18', [DineInController::class, 'kotOrderStore18']);
Route::post('/customerPrintState3BackT18', [DineInController::class, 'customerPrintState3BackT18']);



//Table 19-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT19',[DineInController::class, 'searchFood19']);
Route::post('/addtable19carts', [DineInController::class, 'table19CartsStore']);
Route::get('/printCart19', [DineInController::class, 'printCart19_show']);
Route::get('/quantityDeleteFront19/{id}', [DineInController::class, 'quantityDeleteFront19']);
Route::get('/customerPrintShowT19',[DineInController::class, 'customerPrintShowT19']);
Route::get('/customerPrintShowT19Final',[DineInController::class, 'customerPrintShowT19Final']);
Route::post('/customerPrintShowT19updateStatus', [DineInController::class, 'customerPrintShowT19updateStatus']);
Route::get('/customerPrintState3T19', [DineInController::class, 'customerPrintState3T19']);
Route::post('/customerPrint19', [DineInController::class, 'customerOrderStore19']);
Route::post('/customerPrintOrderUpdate19/{id}', [DineInController::class, 'customerPrintOrderUpdate19']);
Route::post('/kotOrderAddT19', [DineInController::class, 'kotOrderAddT19']);
Route::post('/kotPrintT19', [DineInController::class, 'kotOrderStore19']);
Route::post('/customerPrintState3BackT19', [DineInController::class, 'customerPrintState3BackT19']);



//Table 20-----------------------------------------------------------------------------------------------------------------------------
Route::post('/searchT20',[DineInController::class, 'searchFood20']);
Route::post('/addtable20carts', [DineInController::class, 'table20CartsStore']);
Route::get('/printCart20', [DineInController::class, 'printCart20_show']);
Route::get('/quantityDeleteFront20/{id}', [DineInController::class, 'quantityDeleteFront20']);
Route::get('/customerPrintShowT20',[DineInController::class, 'customerPrintShowT20']);
Route::get('/customerPrintShowT20Final',[DineInController::class, 'customerPrintShowT20Final']);
Route::post('/customerPrintShowT20updateStatus', [DineInController::class, 'customerPrintShowT20updateStatus']);
Route::get('/customerPrintState3T20', [DineInController::class, 'customerPrintState3T20']);
Route::post('/customerPrint20', [DineInController::class, 'customerOrderStore20']);
Route::post('/customerPrintOrderUpdate20/{id}', [DineInController::class, 'customerPrintOrderUpdate20']);
Route::post('/kotOrderAddT20', [DineInController::class, 'kotOrderAddT20']);
Route::post('/kotPrintT20', [DineInController::class, 'kotOrderStore20']);
Route::post('/customerPrintState3BackT20', [DineInController::class, 'customerPrintState3BackT20']);





















Route::get('/table01', [TableController::class,'table01'])->name('table01');
Route::get('/table02', [TableController::class,'table02'])->name('table02');

//Take Away 1-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAway1', [TakeAwayController::class,'takeAway1'])->name('takeAway1');
Route::post('/searchTA1',[TakeAwayController::class, 'searchFoodTA1']);
Route::post('/addTA1carts', [TakeAwayController::class, 'TA1CartsStore']);
Route::get('/printCartTA1', [TakeAwayController::class, 'printCartTA1_show']);
Route::get('/quantityDeleteFrontTA1/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA1']);
Route::get('/customerPrintShowTA1',[TakeAwayController::class, 'customerPrintShowTA1']);
Route::get('/customerPrintShowTA1Final',[TakeAwayController::class, 'customerPrintShowTA1Final']);
Route::post('/customerPrintShowTA1updateStatus', [TakeAwayController::class, 'customerPrintShowTA1updateStatus']);
Route::get('/customerPrintState3TA1', [TakeAwayController::class, 'customerPrintState3TA1']);
Route::post('/customerPrintTA1', [TakeAwayController::class, 'customerOrderStoreTA1']);
Route::post('/customerPrintOrderUpdateTA1/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA1']);
Route::post('/kotOrderAddTA1', [TakeAwayController::class, 'kotOrderAddTA1']);
Route::post('/kotPrintTA1', [TakeAwayController::class, 'kotOrderStoreTA1']);
Route::post('/customerPrintState3BackTA1', [TakeAwayController::class, 'customerPrintState3BackTA1']);



//Take Away -----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAway2', [TakeAwayController::class,'takeAway2'])->name('takeAway2');
Route::post('/searchTA2',[TakeAwayController::class, 'searchFoodTA2']);
Route::post('/addTA2carts', [TakeAwayController::class, 'TA2CartsStore']);
Route::get('/printCartTA2', [TakeAwayController::class, 'printCartTA2_show']);
Route::get('/quantityDeleteFrontTA2/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA2']);
Route::get('/customerPrintShowTA2',[TakeAwayController::class, 'customerPrintShowTA2']);
Route::get('/customerPrintShowTA2Final',[TakeAwayController::class, 'customerPrintShowTA2Final']);
Route::post('/customerPrintShowTA2updateStatus', [TakeAwayController::class, 'customerPrintShowTA2updateStatus']);
Route::get('/customerPrintState3TA2', [TakeAwayController::class, 'customerPrintState3TA2']);
Route::post('/customerPrintTA2', [TakeAwayController::class, 'customerOrderStoreTA2']);
Route::post('/customerPrintOrderUpdateTA2/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA2']);
Route::post('/kotOrderAddTA2', [TakeAwayController::class, 'kotOrderAddTA2']);
Route::post('/kotPrintTA2', [TakeAwayController::class, 'kotOrderStoreTA2']);
Route::post('/customerPrintState3BackTA2', [TakeAwayController::class, 'customerPrintState3BackTA2']);




//Take Away 3-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAway3', [TakeAwayController::class,'takeAway3'])->name('takeAway3');
Route::post('/searchTA3',[TakeAwayController::class, 'searchFoodTA3']);
Route::post('/addTA3carts', [TakeAwayController::class, 'TA3CartsStore']);
Route::get('/printCartTA3', [TakeAwayController::class, 'printCartTA3_show']);
Route::get('/quantityDeleteFrontTA3/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA3']);
Route::get('/customerPrintShowTA3',[TakeAwayController::class, 'customerPrintShowTA3']);
Route::get('/customerPrintShowTA3Final',[TakeAwayController::class, 'customerPrintShowTA3Final']);
Route::post('/customerPrintShowTA3updateStatus', [TakeAwayController::class, 'customerPrintShowTA3updateStatus']);
Route::get('/customerPrintState3TA3', [TakeAwayController::class, 'customerPrintState3TA3']);
Route::post('/customerPrintTA3', [TakeAwayController::class, 'customerOrderStoreTA3']);
Route::post('/customerPrintOrderUpdateTA3/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA3']);
Route::post('/kotOrderAddTA3', [TakeAwayController::class, 'kotOrderAddTA3']);
Route::post('/kotPrintTA3', [TakeAwayController::class, 'kotOrderStoreTA3']);
Route::post('/customerPrintState3BackTA3', [TakeAwayController::class, 'customerPrintState3BackTA3']);



//Take Away 4-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAway4', [TakeAwayController::class,'takeAway4'])->name('takeAway4');
Route::post('/searchTA4',[TakeAwayController::class, 'searchFoodTA4']);
Route::post('/addTA4carts', [TakeAwayController::class, 'TA4CartsStore']);
Route::get('/printCartTA4', [TakeAwayController::class, 'printCartTA4_show']);
Route::get('/quantityDeleteFrontTA4/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA4']);
Route::get('/customerPrintShowTA4',[TakeAwayController::class, 'customerPrintShowTA4']);
Route::get('/customerPrintShowTA4Final',[TakeAwayController::class, 'customerPrintShowTA4Final']);
Route::post('/customerPrintShowTA4updateStatus', [TakeAwayController::class, 'customerPrintShowTA4updateStatus']);
Route::get('/customerPrintState3TA4', [TakeAwayController::class, 'customerPrintState3TA4']);
Route::post('/customerPrintTA4', [TakeAwayController::class, 'customerOrderStoreTA4']);
Route::post('/customerPrintOrderUpdateTA4/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA4']);
Route::post('/kotOrderAddTA4', [TakeAwayController::class, 'kotOrderAddTA4']);
Route::post('/kotPrintTA4', [TakeAwayController::class, 'kotOrderStoreTA4']);
Route::post('/customerPrintState3BackTA4', [TakeAwayController::class, 'customerPrintState3BackTA4']);


//Take Away 5-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAwaY5', [TakeAwayController::class,'takeAway5'])->name('takeAway5');
Route::post('/searchTA5',[TakeAwayController::class, 'searchFoodTA5']);
Route::post('/addTA5carts', [TakeAwayController::class, 'TA5CartsStore']);
Route::get('/printCartTA5', [TakeAwayController::class, 'printCartTA5_show']);
Route::get('/quantityDeleteFrontTA5/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA5']);
Route::get('/customerPrintShowTA5',[TakeAwayController::class, 'customerPrintShowTA5']);
Route::get('/customerPrintShowTA5Final',[TakeAwayController::class, 'customerPrintShowTA5Final']);
Route::post('/customerPrintShowTA5updateStatus', [TakeAwayController::class, 'customerPrintShowTA5updateStatus']);
Route::get('/customerPrintState3TA5', [TakeAwayController::class, 'customerPrintState3TA5']);
Route::post('/customerPrintTA5', [TakeAwayController::class, 'customerOrderStoreTA5']);
Route::post('/customerPrintOrderUpdateTA5/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA5']);
Route::post('/kotOrderAddTA5', [TakeAwayController::class, 'kotOrderAddTA5']);
Route::post('/kotPrintTA5', [TakeAwayController::class, 'kotOrderStoreTA5']);
Route::post('/customerPrintState3BackTA5', [TakeAwayController::class, 'customerPrintState3BackTA5']);




//Take Away 6-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAwaY6', [TakeAwayController::class,'takeAway6'])->name('takeAway6');
Route::post('/searchTA6',[TakeAwayController::class, 'searchFoodTA6']);
Route::post('/addTA6carts', [TakeAwayController::class, 'TA5CartsStore']);
Route::get('/printCartTA6', [TakeAwayController::class, 'printCartTA6_show']);
Route::get('/quantityDeleteFrontTA6/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA6']);
Route::get('/customerPrintShowTA6',[TakeAwayController::class, 'customerPrintShowTA6']);
Route::get('/customerPrintShowTA6Final',[TakeAwayController::class, 'customerPrintShowTA6Final']);
Route::post('/customerPrintShowTA6updateStatus', [TakeAwayController::class, 'customerPrintShowTA6updateStatus']);
Route::get('/customerPrintState3TA6', [TakeAwayController::class, 'customerPrintState3TA6']);
Route::post('/customerPrintTA6', [TakeAwayController::class, 'customerOrderStoreTA6']);
Route::post('/customerPrintOrderUpdateTA6/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA6']);
Route::post('/kotOrderAddTA6', [TakeAwayController::class, 'kotOrderAddTA6']);
Route::post('/kotPrintTA6', [TakeAwayController::class, 'kotOrderStoreTA6']);
Route::post('/customerPrintState3BackTA6', [TakeAwayController::class, 'customerPrintState3BackTA6']);



//Take Away 7-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAwaY7', [TakeAwayController::class,'takeAway7'])->name('takeAway7');
Route::post('/searchTA7',[TakeAwayController::class, 'searchFoodTA7']);
Route::post('/addTA7carts', [TakeAwayController::class, 'TA7CartsStore']);
Route::get('/printCartTA7', [TakeAwayController::class, 'printCartTA7_show']);
Route::get('/quantityDeleteFrontTA7/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA7']);
Route::get('/customerPrintShowTA7',[TakeAwayController::class, 'customerPrintShowTA7']);
Route::get('/customerPrintShowTA7Final',[TakeAwayController::class, 'customerPrintShowTA7Final']);
Route::post('/customerPrintShowTA7updateStatus', [TakeAwayController::class, 'customerPrintShowTA7updateStatus']);
Route::get('/customerPrintState3TA7', [TakeAwayController::class, 'customerPrintState3TA7']);
Route::post('/customerPrintTA7', [TakeAwayController::class, 'customerOrderStoreTA7']);
Route::post('/customerPrintOrderUpdateTA7/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA7']);
Route::post('/kotOrderAddTA7', [TakeAwayController::class, 'kotOrderAddTA7']);
Route::post('/kotPrintTA7', [TakeAwayController::class, 'kotOrderStoreTA7']);
Route::post('/customerPrintState3BackTA7', [TakeAwayController::class, 'customerPrintState3BackTA7']);







//Take Away 8-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAwaY8', [TakeAwayController::class,'takeAway8'])->name('takeAway8');
Route::post('/searchTA8',[TakeAwayController::class, 'searchFoodTA8']);
Route::post('/addTA8carts', [TakeAwayController::class, 'TA8CartsStore']);
Route::get('/printCartTA8', [TakeAwayController::class, 'printCartTA8_show']);
Route::get('/quantityDeleteFrontTA8/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA8']);
Route::get('/customerPrintShowTA8',[TakeAwayController::class, 'customerPrintShowTA8']);
Route::get('/customerPrintShowTA8Final',[TakeAwayController::class, 'customerPrintShowTA8Final']);
Route::post('/customerPrintShowTA8updateStatus', [TakeAwayController::class, 'customerPrintShowTA8updateStatus']);
Route::get('/customerPrintState3TA8', [TakeAwayController::class, 'customerPrintState3TA8']);
Route::post('/customerPrintTA8', [TakeAwayController::class, 'customerOrderStoreTA8']);
Route::post('/customerPrintOrderUpdateTA8/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA8']);
Route::post('/kotOrderAddTA8', [TakeAwayController::class, 'kotOrderAddTA8']);
Route::post('/kotPrintTA8', [TakeAwayController::class, 'kotOrderStoreTA8']);
Route::post('/customerPrintState3BackTA8', [TakeAwayController::class, 'customerPrintState3BackTA8']);


//Take Away 9-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAwaY9', [TakeAwayController::class,'takeAway9'])->name('takeAway9');
Route::post('/searchTA9',[TakeAwayController::class, 'searchFoodTA9']);
Route::post('/addTA9carts', [TakeAwayController::class, 'TA9CartsStore']);
Route::get('/printCartTA9', [TakeAwayController::class, 'printCartTA9_show']);
Route::get('/quantityDeleteFrontTA9/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA9']);
Route::get('/customerPrintShowTA9',[TakeAwayController::class, 'customerPrintShowTA9']);
Route::get('/customerPrintShowTA9Final',[TakeAwayController::class, 'customerPrintShowTA9Final']);
Route::post('/customerPrintShowTA9updateStatus', [TakeAwayController::class, 'customerPrintShowTA9updateStatus']);
Route::get('/customerPrintState3TA9', [TakeAwayController::class, 'customerPrintState3TA9']);
Route::post('/customerPrintTA9', [TakeAwayController::class, 'customerOrderStoreTA9']);
Route::post('/customerPrintOrderUpdateTA9/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA9']);
Route::post('/kotOrderAddTA9', [TakeAwayController::class, 'kotOrderAddTA9']);
Route::post('/kotPrintTA9', [TakeAwayController::class, 'kotOrderStoreTA9']);
Route::post('/customerPrintState3BackTA9', [TakeAwayController::class, 'customerPrintState3BackTA9']);




//Take Away 10-----------------------------------------------------------------------------------------------------------------------------
Route::get('/takeAwaY10', [TakeAwayController::class,'takeAway10'])->name('takeAway10');
Route::post('/searchTA10',[TakeAwayController::class, 'searchFoodTA10']);
Route::post('/addTA10carts', [TakeAwayController::class, 'TA10CartsStore']);
Route::get('/printCartTA10', [TakeAwayController::class, 'printCartTA10_show']);
Route::get('/quantityDeleteFrontTA10/{id}', [TakeAwayController::class, 'quantityDeleteFrontTA10']);
Route::get('/customerPrintShowTA10',[TakeAwayController::class, 'customerPrintShowTA10']);
Route::get('/customerPrintShowTA10Final',[TakeAwayController::class, 'customerPrintShowTA10Final']);
Route::post('/customerPrintShowTA10updateStatus', [TakeAwayController::class, 'customerPrintShowTA10updateStatus']);
Route::get('/customerPrintState3TA10', [TakeAwayController::class, 'customerPrintState3TA10']);
Route::post('/customerPrintTA10', [TakeAwayController::class, 'customerOrderStoreTA10']);
Route::post('/customerPrintOrderUpdateTA10/{id}', [TakeAwayController::class, 'customerPrintOrderUpdateTA10']);
Route::post('/kotOrderAddTA10', [TakeAwayController::class, 'kotOrderAddTA10']);
Route::post('/kotPrintTA10', [TakeAwayController::class, 'kotOrderStoreTA10']);
Route::post('/customerPrintState3BackTA10', [TakeAwayController::class, 'customerPrintState3BackTA10']);






Route::get('/dine_in', [ProductController::class, 'dine_in']);
Route::get('/take_away', [ProductController::class, 'take_away']);
//Table 02 Arman------------------------------------------------------------------------------------------------------------
Route::get('/printCart02', [TableController::class, 'printCart02_show']);
Route::get('/quantityDeleteFront02/{id}', [TableController::class, 'quantityDeleteFront02']);
Route::get('/customerPrintShowT02',[TableController::class, 'customerPrintShowT02']);
Route::get('/customerPrintShowT02Final',[TableController::class, 'customerPrintShowT02Final']);
Route::post('/customerPrintShowT02updateStatus', [TableController::class, 'customerPrintShowT02updateStatus']);
Route::get('/customerPrintState3T02', [TableController::class, 'customerPrintState3T02']);
Route::post('/customerPrint02', [TableController::class, 'customerOrderStore02']);
Route::post('/customerPrintOrderUpdate02/{id}', [TableController::class, 'customerPrintOrderUpdate02']);
Route::post('/kotPrintT02', [TableController::class, 'kotOrderStore02']);
Route::get('/table02', [TableController::class,'table02'])->name('table02');
Route::post('/searchT02',[TableController::class, 'searchFood02']);
Route::post('/addtable02carts', [TableController::class, 'table02CartsStore']);







//-------------------------------------------------------------------------------------------------------------------------------------
//Quantity Edit Common For all Table
Route::post('/quantityEditFront/{id}', [ProductController::class, 'quantityEditFront']);
//Discount Edit Common for all
Route::post('/discountEdit/{id}', [ProductController::class, 'discount_edit']);
//Discount Amount Extra Edit Common for all
Route::post('/discountAmountExtraEdit/{id}', [ProductController::class, 'discount_amount_extra_edit']);
//Vat Edit Common for all
Route::post('/vatEdit/{id}', [ProductController::class, 'vat_edit']);
//Service Charge Edit Common for all
Route::post('/serviceChargeEdit/{id}', [ProductController::class, 'service_charge_edit']);

//Table Orders
Route::get('/tableOrders', [ProductController::class, 'tableOrders_show']);
Route::get('/tableOrderedit/{id}', [ProductController::class,'tableOrderEdit' ]) ;
Route::post('/deletetableOrder/{id}', [ProductController::class,'deleteTableOrder' ]) ;

//Table Carts
Route::post('/addtablecarts', [ProductController::class, 'tableCartsStore']);
Route::post('/tableOrdereditprocess/{id}', [ProductController::class,'tableOrderEditProcess' ]) ;
Route::get('/tableCarts', [ProductController::class, 'tableCarts_show']);
Route::get('/tableCartedit/{id}', [ProductController::class,'tableCartEdit' ]) ;
Route::post('/tableCarteditprocess/{id}', [ProductController::class,'tableCartEditProcess' ]) ;
Route::get('/deletetableCart/{id}', [ProductController::class,'deletetableCart' ]) ;

//KOT Orders
Route::get('/kotOrders', [ProductController::class, 'kotOrders']);
Route::get('/kotOrderedit/{id}', [ProductController::class,'kotOrderedit' ]) ;
Route::post('/kotOrdereditprocess/{id}', [ProductController::class,'kotOrdereditprocess' ]) ;
Route::get('/deletetableKot/{id}', [ProductController::class,'deletetableKot' ]) ;
//Waiter and table Information

//Table
//Add
Route::get('/waiteradd', function () {
    return view('restaurant.waiteradd');
});
Route::post('/addwaiter', [WaiterController::class, 'waiterStore']);

//All Waiter Show Route
Route::get('/allwaiter', [WaiterController::class, 'waiterShow']);

//Edit and Delete Waiter
Route::get('/waiteredit/{id}', [WaiterController::class,'waiterEdit' ]) ;
Route::post('/waitereditprocess/{id}', [WaiterController::class,'waiterEditProcess' ]) ;
Route::get('/deletewaiter/{id}', [WaiterController::class,'deleteWaiter' ]) ;

//Table
//Add
Route::get('/tableadd', function () {
    return view('restaurant.tableadd');
});
Route::post('/addtable', [WaiterController::class, 'tableStore']);

//All Table Show Route
Route::get('/alltable', [WaiterController::class, 'tableShow']);

//Edit and Delete Table
Route::get('/tableedit/{id}', [WaiterController::class,'tableEdit' ]) ;
Route::post('/tableeditprocess/{id}', [WaiterController::class,'tableEditProcess' ]) ;
Route::get('/deletetable/{id}', [WaiterController::class,'deleteTable' ]) ;

// Restaurant 
// Route::get('/login', [RestaurantController::class,'login' ])->name('login');
Route::get('/registration', [RestaurantController::class,'registration' ])->name('registration');
//Resrvation
Route::get('/reservation', [RestaurantController::class,'reservation' ])->name('reservation');
Route::post('/abc', [RestaurantController::class, 'advanceReservation']);

Route::get('/menu', [RestaurantController::class,'menu' ])->name('menu');
Route::get('/aboutUs', [RestaurantController::class,'aboutUs' ])->name('aboutUs');
//Contact
Route::get('/contactUs', [RestaurantController::class,'contactUs' ])->name('contactUs');
Route::post('/contactWithUs', [RestaurantController::class, 'contactWithUs']);

Route::get('/demo', [RestaurantController::class,'demo' ])->name('demo');


Route::get('/menu', [ProductController::class, 'productcartmenu'])->name('productcartmenu');

//Normal User Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/newDashboard', [HomeController::class, 'newDashboard'])->name('newDashboard');
// Route::get('/dine_in', [HomeController::class, 'dine_in'])->name('dine_in');
// Route::get('/take_away', [HomeController::class, 'take_away'])->name('take_away');

//Admin Dashboard Route
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//Route For All Nav menus
Route::get('/about', [CommonController::class,'about' ])->name('about');
Route::get('/services', [CommonController::class,'services' ])->name('services');
//Route::get('/services', [CommonController::class,'services' ])->name('services');
Route::get('/casestudies', [CommonController::class,'casestudies' ])->name('casestudies');
Route::get('/ourteam', [CommonController::class,'ourteam' ])->name('ourteam');
Route::get('/courses', [CommonController::class,'courses' ])->name('courses');
Route::get('/careers', [CommonController::class,'careers' ])->name('careers');
Route::get('/contact', [CommonController::class,'contact' ])->name('contact');
Route::get('/demorequest', [CommonController::class,'demorequest' ])->name('demorequest');
Route::get('/lms', [CommonController::class,'lms' ])->name('lms');
Route::get('/ecommerce', [CommonController::class,'ecommerce' ])->name('ecommerce');

//Request For a Demo Section Route
Route::post('/requestfordemo', [CommonController::class,'requestfordemo' ]) ;

//Contact Route
Route::post('/contactwithus', [CommonController::class,'contactwithus' ]) ;

//Product Add Route
Route::post('/addproduct', [ProductController::class, 'productStore']);
Route::get('/productadd', function () {
    return view('product.productadd');
});

//All Products Show Route
Route::get('/productshow', [ProductController::class, 'productshow']);

//Edit and Delete Product
Route::get('/productedit/{id}', [ProductController::class,'productedit' ]) ;
Route::post('/producteditprocess/{id}', [ProductController::class,'producteditprocess' ]) ;
Route::get('/deleteproduct/{id}', [ProductController::class,'deleteproduct' ]) ;

/* Food Routes */
//Food Add Routes
Route::post('/addfooditem', [ProductController::class, 'foodStore']);
Route::get('/foodadd', function () {
    return view('food.foodadd');
});
//All Food Item Show Route
Route::get('/foodshow', [ProductController::class, 'foodShow']);
//Print Test
Route::get('/students', [PrintController::class, 'index']);
Route::get('/prnpriview', [PrintController::class, 'prnpriview']);

//Edit and Delete Food Items
Route::get('/foodedit/{id}', [ProductController::class,'food_edit' ]) ;
Route::post('/foodeditprocess/{id}', [ProductController::class,'food_edit_process' ]) ;
Route::get('/deletefood/{id}', [ProductController::class,'delete_food' ]) ;

/* Ingredients Routes */
//Ingrdients Add Routes
Route::get('/ingredientsadd', [ProductController::class, 'add_ingredients']);
Route::post('/addingredients', [ProductController::class, 'ingredients_store']);

//All Ingredients Show Route
Route::get('/ingredientsShow', [ProductController::class, 'ingredientsShow']);

//Edit and Delete Ingredients
Route::get('/ingredientsedit/{id}', [ProductController::class,'ingredients_edit' ]) ;
Route::post('/ingredientseditprocess/{id}', [ProductController::class,'ingredients_edit_process' ]) ;
Route::get('/deleteingredients/{id}', [ProductController::class,'delete_ingredients' ]) ;

//Carts for Jafran
Route::get('/foodShowFront', [ProductController::class, 'foodShowFront']);

//Shop Add Routes
Route::post('/addshop', [ShopController::class, 'shopstore']);
/*Route::get('/shopadd', function () {
    return view('shop.shopadd');
});*/
Route::get('/shopadd', [ShopController::class, 'shopadd']);

//All Shop Show Route
Route::get('/shopshow', [ShopController::class, 'shopshow']);

//Edit and Delete Shop
Route::get('/shopedit/{id}', [ShopController::class,'shopedit' ]) ;
Route::post('/shopeditprocess/{id}', [ShopController::class,'shopeditprocess' ]) ;
Route::get('/deleteshop/{id}', [ShopController::class,'deleteshop' ]) ;

//SR Add Routes
Route::post('/addsr', [SrController::class, 'srstore']);
Route::get('/sradd', function () {
    return view('sr.sradd');
});

//All SR Show Route
Route::get('/srshow', [SrController::class, 'srshow']);

//Edit and Delete SR
Route::get('/sredit/{id}', [SrController::class,'sredit' ]) ;
Route::post('/sreditprocess/{id}', [SrController::class,'sreditprocess' ]) ;
Route::get('/deletesr/{id}', [SrController::class,'deletesr' ]) ;

//Deliveryman Add Routes
Route::post('/adddeliveryman', [DeliverymanController::class, 'deliverymanstore']);
Route::get('/deliverymanadd', function () {
    return view('deliveryman.deliverymanadd');
});

//All Deliveryman Show Route
Route::get('/deliverymanshow', [DeliverymanController::class, 'deliverymanshow']);

//Edit and Delete Deliveryman
Route::get('/deliverymanedit/{id}', [DeliverymanController::class,'deliverymanedit' ]) ;
Route::post('/deliverymaneditprocess/{id}', [DeliverymanController::class,'deliverymaneditprocess' ]) ;
Route::get('/deletedeliverytman/{id}', [DeliverymanController::class,'deletedeliverytman' ]) ;

//Expense Add Routes
Route::post('/addexpensename', [ExpenseController::class, 'expensenamestore']);
Route::get('/expensenameadd', function () {
    return view('expense.expensenameadd');
});

//All Expense Show Route
Route::get('/expensenameshow', [ExpenseController::class, 'expensenameshow']);

//Edit and Delete Expense
Route::get('/expensenameedit/{id}', [ExpenseController::class,'expensenameedit' ]) ;
Route::post('/expensenameeditprocess/{id}', [ExpenseController::class,'expensenameeditprocess' ]) ;
Route::get('/deleteexpensename/{id}', [ExpenseController::class,'deleteexpensename' ]) ;

//Expense Name Add Routes
Route::post('/addexpense', [ExpenseController::class, 'expensestore']);
/*Route::get('/expenseadd', function () {
    return view('expense.expenseadd');
});*/
Route::get('/expenseadd', [ExpenseController::class, 'expenseadd']);

//Others Expense Add
Route::post('/addexpenseothers', [ExpenseController::class, 'othersexpensestore']);
Route::get('/expenseaddothers', [ExpenseController::class, 'expenseaddothers']);
//All Expense Show Route
Route::get('/expenseshow', [ExpenseController::class, 'expenseshow']);

//Individual Expense Show Route
Route::get('/expenseshowjahangir', [ExpenseController::class, 'expenseshowjahangir']);
Route::get('/expenseshowyeasin', [ExpenseController::class, 'expenseshowyeasin']);
Route::get('/expenseshowhridoy', [ExpenseController::class, 'expenseshowhridoy']);
Route::get('/expenseshowsajid', [ExpenseController::class, 'expenseshowsajid']);
Route::get('/expenseshowothers', [ExpenseController::class, 'expenseshowothers']);

//Edit and Delete Expense Name
Route::get('/expenseedit/{id}', [ExpenseController::class,'expenseedit' ]) ;
Route::post('/expenseeditprocess/{id}', [ExpenseController::class,'expenseeditprocess' ]) ;
Route::get('/deleteexpense/{id}', [ExpenseController::class,'deleteexpense' ]) ;

//Offer Add Routes
Route::post('/addoffer', [OfferController::class, 'offerstore']);
/*Route::get('/offeradd', function () {
    return view('offer.offeradd');
});*/
Route::get('/offeradd', [OfferController::class, 'offeradd']);

//All Offer Show Route
Route::get('/offershow', [OfferController::class, 'offershow']);

//Edit and Delete Offer
Route::get('/offeredit/{id}', [OfferController::class,'offeredit' ]) ;
Route::post('/offereditprocess/{id}', [OfferController::class,'offereditprocess' ]) ;
Route::get('/deleteoffer/{id}', [OfferController::class,'deleteoffer' ]) ;


//Product Cart Routes
Route::get('/productcart', [ProductController::class, 'productcart'])->name('productcart');

//Product Cart Front Routes
Route::get('/', [ProductController::class, 'productcartfront'])->name('productcartfront');


//Return Cart Routes
Route::get('/returncart', [ProductController::class, 'returncart'])->name('returncart');

//Company Cart Routes
Route::get('/companycart', [ProductController::class, 'companycart'])->name('companycart');


// Cart Routes for Product
Route::group(['prefix' => 'carts'], function () {
  Route::get('/', [CartsController::class, 'index'])->name('carts');
  Route::get('/cartshome', [CartsController::class, 'cartshome'])->name('cartshome');
  Route::post('/store', [CartsController::class, 'store'])->name('carts.store');
  Route::post('/update/{id}', [CartsController::class, 'update'])->name('carts.update');
  Route::post('/delete/{id}', [CartsController::class, 'destroy'])->name('carts.delete');
});

// Checkouts Routes for Product
Route::group(['prefix' => 'checkout'], function () {
  Route::get('/', [CheckoutsController::class, 'index'])->name('checkouts');
  Route::post('/store', [CheckoutsController::class, 'store'])->name('checkouts.store');
});

// Checkouts Routes for Product Front
Route::group(['prefix' => 'checkoutfront'], function () {
  Route::get('/', [CheckoutsController::class, 'cehckoutfront'])->name('checkoutfront');
  Route::post('/frontstore', [CheckoutsController::class, 'frontstore'])->name('checkouts.frontstore');
});

// Cart Routes for Product Return
Route::group(['prefix' => 'cartsreturn'], function () {
  Route::get('/', [ReturnController::class, 'index'])->name('returncarts');
  Route::post('/store', [ReturnController::class, 'store'])->name('returncarts.store');
  Route::post('/update/{id}', [ReturnController::class, 'update'])->name('returncarts.update');
  Route::post('/delete/{id}', [ReturnController::class, 'destroy'])->name('returncarts.delete');
});

// Checkouts Routes for Product Return
Route::group(['prefix' => 'checkoutreturn'], function () {
  Route::get('/', [ReturnCheckoutsController::class, 'index'])->name('returncheckouts');
  Route::post('/store', [ReturnCheckoutsController::class, 'store'])->name('returncheckouts.store');
});

// Cart Routes for Company Product Return
Route::group(['prefix' => 'companycarts'], function () {
  Route::get('/', [CompanyController::class, 'index'])->name('companycarts');
  Route::post('/store', [CompanyController::class, 'store'])->name('companycarts.store');
  Route::post('/update/{id}', [CompanyController::class, 'update'])->name('companycarts.update');
  Route::post('/delete/{id}', [CompanyController::class, 'destroy'])->name('companycarts.delete');
});

Route::post('/updateTableandWaiter/{id}', [CompanyController::class,'updateTableandWaiter' ]) ;

Route::get('/printView1',[RestaurantController::class, 'print_view_one']);
Route::get('/printView2',[RestaurantController::class, 'print_view_two']);

// Checkouts Routes for Company Product Return
Route::group(['prefix' => 'companycheckout'], function () {
  Route::get('/', [CompanyCheckoutsController::class, 'index'])->name('companycheckouts');
  Route::post('/store', [CompanyCheckoutsController::class, 'store'])->name('companycheckouts.store');
});


/*Routes for all Reports */
Route::get('/dailyreport', [ReportController::class,'dailyreport' ])->name('dailyreport');
Route::get('/monthlyreport', [ReportController::class,'monthlyreport' ])->name('monthlyreport');
Route::get('/datewisereport', [ReportController::class,'datewisereport' ])->name('datewisereport');

//Edit and Delete Offer
Route::get('/dueedit/{id}', [DueController::class,'dueedit' ]) ;
Route::post('/dueditprocess/{id}', [DueController::class,'dueditprocess' ]) ;
Route::get('/deletedue/{id}', [DueController::class,'deletedue' ]) ;

//Stock List Table
/*Route::get('/stocklist', function () {
    return view('stock.stocklist');
});

//Damage Product List Table
Route::get('/damageproductlist', function () {
    return view('stock.damageproductlist');
});

//Due List Table
Route::get('/duetable', function () {
    return view('stock.duetable');
});*/

//Daily Sales Table
Route::get('/dailysales', function () {
    return view('stock.dailysales');
});

//Daily Delivery Table
Route::get('/dailydelivery', function () {
    return view('stock.dailydelivery');
});

//Daily Sales Report
Route::get('/dailysalesreport', function () {
    return view('stock.dailysalesreport');
});

//Stock Add Route
Route::post('/addstock', [StockController::class, 'stockstore']);
/*Route::get('/stockadd', function () {
    return view('stock.stockadd');
});*/
Route::get('/stockadd', [StockController::class, 'stockadd']);

//All Stock Show Route
Route::get('/stockshow', [StockController::class, 'stockshow']);

//Edit and Delete Stock
Route::get('/stockedit/{id}', [StockController::class,'stockedit' ]) ;
Route::post('/stockeditprocess/{id}', [StockController::class,'stockeditprocess' ]) ;
Route::get('/deletestock/{id}', [StockController::class,'deletestock' ]) ;

//Damage Product Add Route
Route::post('/adddamageproduct', [StockController::class, 'damageproductstore']);
/*Route::get('/damageproductadd', function () {
    return view('stock.damageproductadd');
});*/

Route::get('/damageproductadd', [StockController::class, 'damageproductadd']);

//Damage Product Show Route
Route::get('/damageproductkshow', [StockController::class, 'damageproductkshow']);

//Edit and Delete Damage Product 
Route::get('/damageproductedit/{id}', [StockController::class,'damageproductedit' ]) ;
Route::post('/damageproducteditprocess/{id}', [StockController::class,'damageproducteditprocess' ]) ;
Route::get('/deletedamageproduct/{id}', [StockController::class,'deletedamageproduct' ]) ;

/* Due List Add Route */

//Deliveryman Due

Route::post('/adddue', [StockController::class, 'duestore']);
/*Route::get('/dueadd', function () {
    return view('stock.dueadd');  
});*/
Route::get('/dueadd', [StockController::class, 'dueadd']);

//Others Due
Route::post('/adddueothers', [StockController::class, 'othersduestore']);
Route::get('/dueaddothers', [StockController::class, 'dueaddothers']);

//Due Show Route
Route::get('/dueshow', [StockController::class, 'dueshow']);

//Due Show individually
Route::get('/dueshowjahangir', [StockController::class, 'dueshowjahangir']);
Route::get('/dueshowyeasin', [StockController::class, 'dueshowyeasin']);
Route::get('/dueshowhridoy', [StockController::class, 'dueshowhridoy']);
Route::get('/dueshowsajid', [StockController::class, 'dueshowsajid']);
Route::get('/dueshowothers', [StockController::class, 'dueshowothers']);

//Edit and Delete Due 
Route::get('/dueedit/{id}', [StockController::class,'dueedit' ]) ;
Route::post('/dueeditprocess/{id}', [StockController::class,'dueeditprocess' ]) ;
Route::get('/deletedue/{id}', [StockController::class,'deletedue' ]) ;

//Add Collection Route
Route::get('/collectionadd', [StockController::class, 'collectionadd']);
Route::post('/addcollection', [StockController::class, 'collectionstore']);

//Add Others Collection
Route::get('/collectionaddothers', [StockController::class, 'collectionaddothers']);
Route::post('/addcollectionothers', [StockController::class, 'otherscollectionstore']);

//Collection Show Route
Route::get('/showcollection', [StockController::class, 'showcollection']);

//Colllection Show Individually Routes
Route::get('/showcollectionjahangir', [StockController::class, 'showcollectionjahangir']);
Route::get('/showcollectionyeasin', [StockController::class, 'showcollectionyeasin']);
Route::get('/showcollectionhridoy', [StockController::class, 'showcollectionhridoy']);
Route::get('/showcollectionsajid', [StockController::class, 'showcollectionsajid']);
Route::get('/showcollectionothers', [StockController::class, 'showcollectionothers']);

//Edit and Delete Collection 
Route::get('/collectionedit/{id}', [StockController::class,'collectionedit' ]) ;
Route::post('/collectioneditprocess/{id}', [StockController::class,'collectioneditprocess' ]) ;
Route::get('/deletecollection/{id}', [StockController::class,'deletecollection' ]) ;

//Collection Statement Show Route
Route::get('/collectionstatement', [StockController::class, 'showcollectionstatement']);

//Edit and Delete Collection 
Route::get('/collectionstatementedit/{id}', [StockController::class,'collectionstatementedit' ]) ;
Route::post('/collectionstatementeditprocess/{id}', [StockController::class,'collectionstatementeditprocess' ]) ;
Route::get('/deletecollectionstatement/{id}', [StockController::class,'deletecollectionstatement' ]) ;


/* Daily Sales Route */

//Restaurant Order add Backend
Route::get('/dailysaleRestaurantadd', [StockController::class, 'dailysaleadd_restaurant'])->name('dailysaleRestaurantadd');
Route::post('/addDailySaleRestaurant', [StockController::class, 'dailysale_restaurant_store']);

//Restaurant Order Show
Route::get('/dailysaleshowRestaurant', [StockController::class, 'restauarant_dailysale_show']);

//Restaurant Order Edit and Delete
Route::get('/dailysaleShow/{id}', [StockController::class,'dailysale_printView_show' ]) ;
Route::get('/dailysaleeditRestaurant/{id}', [StockController::class,'dailysale_edit_restaurant' ]) ;
Route::post('/dailysaleeditprocessreRestaurant/{id}', [StockController::class,'dailysale_editprocess_restaurant' ]) ;
Route::get('/deletedailysaleRestaurant/{id}', [StockController::class,'delete_dailysale_restaurant' ]) ;

//All Contacts Person Controls
//Show
Route::get('/allContacts', [RestaurantController::class, 'restauarant_contacts_show']);
//Edit and Delete
Route::get('/onlineContactShow/{id}', [RestaurantController::class,'onlineContact_printView_show' ]) ;
Route::get('/onlineContactedit/{id}', [RestaurantController::class,'onlineContactedit' ]) ;
Route::post('/onlineContactediteditProcess/{id}', [RestaurantController::class,'onlineContactediteditProcess' ]) ;
Route::get('/onlineContactdelete/{id}', [RestaurantController::class,'onlineContactdelete' ]) ;

//All Reservation Controls
//Show
Route::get('/allReservation', [RestaurantController::class, 'restauarant_reservation_show']);
//Edit and Delete
Route::get('/onlineReservationShow/{id}', [RestaurantController::class,'onlineReservation_printView_show' ]) ;
Route::get('/onlineReservationedit/{id}', [RestaurantController::class,'onlineReservationedit' ]) ;
Route::post('/onlineReservationeditProcess/{id}', [RestaurantController::class,'onlineReservationeditProcess' ]) ;
Route::get('/onlineReservationdelete/{id}', [RestaurantController::class,'onlineReservationdelete' ]) ;

//Restaurant Order Details Frontend
//Show
Route::get('/allOnlineOrder', [StockController::class, 'restauarant_onlineOrder_show']);
//Edit and Delete
Route::get('/onlineOrderShow/{id}', [StockController::class,'onlineOrder_printView_show' ]) ;
Route::get('/onlineOrderedit/{id}', [StockController::class,'onlineOrderedit' ]) ;
Route::post('/onlineOrdereditProcess/{id}', [StockController::class,'onlineOrdereditProcess' ]) ;
Route::get('/onlineOrderdelete/{id}', [StockController::class,'onlineOrderdelete' ]) ;

//Restaurant All Online Order Frontend
Route::get('/allOrderInfoOnline', [StockController::class, 'restauarant_allOnlineOrder_info']);
//Edit and Delete
Route::get('/onlineOrderInfoShow/{id}', [StockController::class,'onlineOrder_Info_printView_show' ]) ;
Route::get('/onlineOrderInfoedit/{id}', [StockController::class,'onlineOrderInfoedit' ]) ;
Route::post('/onlineOrderInfoeditProcess/{id}', [StockController::class,'onlineOrderInfoeditProcess' ]) ;
Route::get('/onlineOrderInfodelete/{id}', [StockController::class,'onlineOrderInfodelete' ]) ;

//Jahangir
Route::post('/adddailysale', [StockController::class, 'dailysalestore']);
Route::get('/dailaysaleadd', [StockController::class, 'dailysaleadd']);

//Yesasin
Route::post('/adddailysaleyeasin', [StockController::class, 'yeasindailysalestore']);
Route::get('/dailaysaleaddyeasin', [StockController::class, 'dailaysaleaddyeasin']);

//Hridoy
Route::post('/adddailysalehridoy', [StockController::class, 'hridoydailysalestore']);
Route::get('/dailaysaleaddhridoy', [StockController::class, 'dailaysaleaddhridoy']);

//Sajid
Route::post('/adddailysalesajid', [StockController::class, 'sajiddailysalestore']);
Route::get('/dailaysaleaddsajid', [StockController::class, 'dailaysaleaddsajid']);

//Daily Sale Show Route
Route::get('/dailysaleshow', [StockController::class, 'dailysaleshow']);

//Individual Sale
Route::get('/showjahangirsale', [StockController::class, 'showjahangirsale']);
Route::get('/showyeasinsale', [StockController::class, 'showyeasinsale']);
Route::get('/showhridoysale', [StockController::class, 'showhridoysale']);
Route::get('/showsajidsale', [StockController::class, 'showsajidsale']);

//Show Sale by Date Range
Route::get('/datewisesale', [StockController::class, 'datewisesale']);

//Edit and Delete Daily Sale 
Route::get('/dailysaleedit/{id}', [StockController::class,'dailysaleedit' ]) ;
Route::post('/dailysaleeditprocess/{id}', [StockController::class,'dailysaleeditprocess' ]) ;
Route::get('/deletedailysale/{id}', [StockController::class,'deletedailysale' ]) ;

//Daily Report
Route::post('/dailyreport', [StockController::class, 'dailyreport']);

//Datewise Report
Route::get('/reportdatewise', [StockController::class, 'reportdatewise']);
Route::post('/getdatewisereport', [StockController::class, 'getdatewisereport']);

//Monthly Report
Route::get('/reportemonthwise', [StockController::class, 'reportemonthwise']);
Route::post('/getmonthwisereport', [StockController::class, 'getmonthwisereport']);

