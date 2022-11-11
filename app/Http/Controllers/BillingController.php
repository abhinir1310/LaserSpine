<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doctor;
use App\Billing;
use App\Billing_item;
use Redirect;
use PDF;
use DateTime;

class BillingController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    
    public function create(){
    	$patients = User::where('role','patient')->get();
    	$doctor = Doctor::latest()->get();

    	return view('billing.create',['patients' => $patients,'doctor' => $doctor]);
    }


    public function store(Request $request){

	    	 $validatedData = $request->validate([
	        	'patient_id' => ['required','exists:users,id'],
	        	'payment_mode' => 'required',
	        	'doctor_id' => 'required',
	        	'payment_status' => 'required',
	        	'invoice_title.*' => 'required',
	        	'invoice_amount.*' => ['required','numeric'],
	    	],[
	    	    'patient_id.required' => 'Patient is required',
	    	    'doctor_id.required' => 'Doctor is required'
	    	   ]);

            

    	$billing = new Billing;
        $billing->user_id = $request->patient_id;
        $billing->doctor_id = $request->doctor_id;
        $billing->payment_mode = $request->payment_mode;
        $billing->payment_status = $request->payment_status;
        $billing->reference = 'b'.rand(10000,99999);
        $billing->save();

        $i = 0;
        if(is_array($request->invoice_title) && count($request->invoice_title) > 0){
  	   	    $i = count($request->invoice_title);
        
  	   	for ($x = 0; $x < $i; $x++) {
		  
		  echo $request->invoice_title[$x];
            $invoice_item = new Billing_item;
            $invoice_item->invoice_title = $request->invoice_title[$x];
            $invoice_item->invoice_amount = $request->invoice_amount[$x];
            $invoice_item->billing_id = $billing->id;
            $invoice_item->save();
        }
		return Redirect::route('billing.create')->with('success', 'Invoice Created Successfully!');;
        }else{
            	return Redirect::route('billing.create')->with('error', 'Invoice Details is required!');;   
        }
    }
    
    public function search(Request $request){
         $date = $request->input('date');  
         
         
         
        
           $date_format = new DateTime($date);

          $invoices = Billing::wheredate("billings.created_at",$date_format->format('Y-m-d'))->get();
          
          $search__count = $invoices->count();
          
         
    	return view('billing.all',['invoices' => $invoices,'search__count'=>$search__count]);
    }

    public function all(){
        
    	$invoices = Billing::orderBy('id', 'DESC')->get();
    	
    	return view('billing.all',['invoices' => $invoices]);
    }


    public function view($id){

        $billing = Billing::findOrfail($id);
        
        $doctor = Doctor::where('id',$billing->doctor_id)->first();
        
        $billing_items = Billing_item::where('billing_id' ,$id)->get();
        
        
         //$pdf = PDF::loadView('billing.pdf_view', ['billing' => $billing, 'billing_items' => $billing_items]);
         
        //return $pdf->stream('result.pdf', array('Attachment'=>0));  
        
        return view('billing.view',['billing' => $billing, 'billing_items' => $billing_items,'doctor' => $doctor]);
    }

      public function pdf($id){
        
        $billing = Billing::findOrfail($id);
        $doctor = Doctor::where('id',$billing->doctor_id)->first();
        $billing_items = Billing_item::where('billing_id' ,$id)->get();
        
        
         view()->share(['billing' => $billing, 'billing_items' => $billing_items]);
      $pdf = PDF::loadView('billing.pdf_view', ['billing' => $billing, 'billing_items' => $billing_items,'doctor'=>$doctor]);

      // download PDF file with download method
      return $pdf->download($billing->User->name.'_invoice.pdf');
    }
    
    public function destroy($id)
    {
        Billing::findOrFail($id)->delete();
        	return Redirect::route('billing.all')->with('success', __('Billing detail delete Successfully'));
    }

    // public function doctor($doctor_id){
    //     doctor($id==doctor_id)->name();
    //     return(name)
    // }
}
