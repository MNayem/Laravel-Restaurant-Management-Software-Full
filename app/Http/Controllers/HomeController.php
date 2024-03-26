<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
   
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function newDashboard()
    {
        return view('restaurant.arman.newDashboard');
    }    
    public function dine_in()
    {
        return view('restaurant.arman.dine_in.dine_in');
    }    
    public function take_away()
    {
        return view('restaurant.arman.take_away.take_away');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
    
}
