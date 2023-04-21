<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Response;
use App\Contact;


class FrontendController extends Controller
{
    public function index(){
        
    	return view('front.index'); 
    }
    
    public function spine_services(){
        
    	return view('front.spine_services'); 
    }
    
    public function spine_surgeries(){
        
    	return view('front.spine_surgeries'); 
    }
    
    public function publications_reserch(){
        
    	return view('front.publications_reserch'); 
    }
    
    public function awards_recognitions(){
        
    	return view('front.awards_recognitions'); 
    }
    
    public function contact_us(){
        
    	return view('front.contact_us'); 
    }
    
    public function about(){
        
    	return view('front.about'); 
    }
    
    public function storecontact(Request $request){
    
        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');        
        $contact->messages = $request->get('messages');

        $contact->save();
      	
      	return back()->with('success','Thank you for contacting us. We have received your enquiry and will respond to you within 24 hours!');
    }
}    