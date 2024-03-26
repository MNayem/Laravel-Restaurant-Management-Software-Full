<?php
   
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rerservation;
use App\Models\Contact;
   
class RestaurantController extends Controller
{
    // public function login(){return view('pages.login');}
    // public function registration(){return view('pages.registration');}
    // public function aboutUs(){return view('pages.aboutUs');}
    // public function contactUs(){return view('pages.contactUs');}
    // public function menu(){return view('pages.menu');}
    
    public function login() 
    {
        return view('pages.login');
    }     
    public function registration() 
    {
        return view('pages.registration');
    }
    //Reservation
    public function reservation() 
    {
        return view('pages.reservation');
    }
    public function advanceReservation(Request $request)
    {
        $reservation=new Rerservation;
        $reservation->totalperson= $request->totalperson;
        if(!empty($request->date)){
            $reservation->date=$request->date;
        }
        else{
            $reservation->date= Carbon::today();
        }
        $reservation->time= $request->time;
        $reservation->phone= $request->phone;
        
        $reservation->save();
        return redirect()->back()->with('message', 'Thanks for choosing us, We will contact soon!!');
    }
    //Show and Manage all Reservations
    public function restauarant_reservation_show()
    {
      $allReservation= Rerservation::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('stock.restaurant.allReservation',compact('allReservation'));
    }
    public function onlineReservation_printView_show($id)
    {
        $printView=Rerservation::find($id);
        return view('stock.restaurant.onlineReservationShowprintView', compact('printView'));
    }
    //Edit
    public function onlineReservationedit($id)
    {
        $data=Rerservation::find($id);
        return view('stock.restaurant.editOnlineReservationStatus', compact('data'));
    }
    public function onlineReservationeditProcess(Request $request, $id)
    {
        $data=Rerservation::find($id);
        $data->status= $request->status;
        
        $data->save();
      	return redirect()->to('/allReservation')->with('message', 'Reservation status has been updated successly!!');  
    }
    public function onlineReservationdelete($id)
    {
        $data=Rerservation::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Reservation Information has been deleted successly!!');
    }
    public function menu() 
    {
        return view('pages.menu');
    }    
    public function aboutUs() 
    {
        return view('pages.aboutUs');
    }
    //Contact
    public function contactUs() 
    {
        return view('pages.contactUs');
    }
     public function contactWithUs(Request $request)
    {
        $contact=new Contact;
        $contact->email= $request->email;
        $contact->phone= $request->phone;
        $contact->subject= $request->subject;
        $contact->message= $request->message;
        
        $contact->save();
        return redirect()->back()->with('message', 'Thanks for contacting us, We will get back to you soon!!');
    }
    //Show and Manage all Contacts Info
    public function restauarant_contacts_show()
    {
      $allContacts= Contact::select('*')
                    ->orderBy('id', 'DESC')
                    ->get();
      return view('stock.restaurant.allContacts',compact('allContacts'));
    }
    public function onlineContact_printView_show($id)
    {
        $printView=Contact::find($id);
        return view('stock.restaurant.onlineContactShowprintView', compact('printView'));
    }
    //Edit
    public function onlineContactedit($id)
    {
        $data=Contact::find($id);
        return view('stock.restaurant.editOnlineContactStatus', compact('data'));
    }
    public function onlineContactediteditProcess(Request $request, $id)
    {
        $data=Contact::find($id);
        $data->status= $request->status;
        
        $data->save();
      	return redirect()->to('/allContacts')->with('message', 'Contact person status has been updated successly!!');  
    }
    public function onlineContactdelete($id)
    {
        $data=Contact::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Contact Information has been deleted successly!!');
    }
    public function demo() 
    {
        return view('pages.demo');
    }   
    
    public function print_view_one()
    {
        return view('restaurant.printViewOne');
    }
     public function print_view_two()
    {
        return view('restaurant.printViewTwo');
    }
}
