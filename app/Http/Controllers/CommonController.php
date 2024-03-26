<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemoRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function about()
    {
        return view('common.about');
    }
    public function services()
    {
        return view('common.services');
    }
    public function casestudies()
    {
        return view('common.casestudies');
    }
    public function ourteam()
    {
        return view('common.ourteam');
    }
    public function courses()
    {
        return view('common.courses');
    }
    public function careers()
    {
        return view('common.careers');
    }
    public function contact()
    {
        return view('common.contact');
    }
    public function demorequest()
    {
        return view('common.demorequest');
    }
    public function lms()
    {
        return view('common.lms');
    }
    public function ecommerce()
    {
        return view('common.ecommerce');
    }
    
    

    /*Request for a Demo Section */
    public function requestfordemo(Request $request)
    {
        $demo=new DemoRequest;
        $demo->fname= $request->fname;
        $demo->lname= $request->lname;
        $demo->email= $request->email;
        $demo->mobile= $request->mobile;
        $demo->address= $request->address;
        $demo->message= $request->message;

        $demo->save();
        /*return redirect()->back()->with('message', 'Thanks for Contacting With Us, We will get back to you soon!');*/
        return redirect()->to('/')->with('message', 'Thanks for Contacting With Us, We will get back to you soon!');
        
        //echo    $demo->save()?"Request has been sent, please wait patiently":"insert fail";
    }

    /*Contact with us Section */
    public function contactwithus(Request $request)
    {
        $contact=new Contact;
        $contact->name= $request->name;
        $contact->mobile= $request->mobile;
        $contact->email= $request->email;
        $contact->subject= $request->subject;
        $contact->url= $request->url;
        $contact->message= $request->message;

        $contact->save();
        /*return redirect()->back()->with('message', 'Thanks for Contacting With Us, We will get back to you soon!');*/
        return redirect()->to('/')->with('message', 'Thanks for Contacting With Us, We will get back to you soon!');
        
        //echo    $contact->save()?"Request has been sent, please wait patiently":"insert fail";
    }
}
