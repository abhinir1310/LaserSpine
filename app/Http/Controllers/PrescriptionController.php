<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drug;
use App\User;
use App\Patient;
use App\Prescription;
use App\Prescription_drug;
use App\Prescription_test;
use App\Test;
use Redirect;
use PDF;
use App\Doctor;

class PrescriptionController extends Controller{
    

    public function __construct(){
        $this->middleware('auth');
    }


    public function create(){
    	$drugs = Drug::all();
        $patients = User::where('role','patient')->get();
        $doctor = Doctor::latest()->get();
        $tests = Test::all();
    	return view('prescription.create',['drugs' => $drugs, 'patients' => $patients, 'tests' => $tests,'doctor'=>$doctor]);
    }

    public function store(Request $request){

	    	 $validatedData = $request->validate([
	        	'patient_id' => ['required','exists:users,id'],
	        	'type.*' => 'required',
	        	'doctor_id' => 'required',
	        	'strength.*' => 'required',
	        	'dose.*' => 'required',
	        	'duration.*' => 'required',
	        	'trade_name.*' => 'required',
	    	],[
	    	    'patient_id.required' =>'Patient name is required',
	    	    'doctor_id.required' =>'Doctor name is required'
	    	    
	    	    ]);

            

    	$prescription = new Prescription;

        $prescription->user_id = $request->patient_id;
        $prescription->doctor_id = $request->doctor_id;
        $prescription->reference = 'p'.rand(10000,99999);
        $prescription->save();

     
    if(isset($request->type)):
  	   	$i = count($request->type);

  	   	for ($x = 0; $x < $i; $x++) {
		  
		  echo $request->trade_name[$x];

		  

            $add_drug = new Prescription_drug;

            $add_drug->type = $request->type[$x];
            $add_drug->strength = $request->strength[$x];
            $add_drug->dose = $request->dose[$x];
            $add_drug->duration = $request->duration[$x];
            $add_drug->drug_advice = $request->drug_advice[$x];
            $add_drug->prescription_id = $prescription->id;
            $add_drug->drug_id = $request->trade_name[$x];

            $add_drug->save();
        }
    endif;

    if(isset($request->test_name)):

        $y = count($request->test_name);

        for ($x = 0; $x < $y; $x++) {

            $add_test = new Prescription_test;

            $add_test->test_id = $request->test_name[$x];
            $add_test->prescription_id = $prescription->id;
            $add_test->description = $request->description[$x];

            $add_test->save();

		}

    endif;

		return Redirect::route('prescription.all')->with('success', 'Prescription Created Successfully!');;



    }

    public function all(){
    	$prescriptions = Prescription::latest()->get();
    	return view('prescription.all',['prescriptions' => $prescriptions]);
    }

    public function view($id){

    	$prescription = Prescription::findOrfail($id);
        $prescription_drugs = Prescription_drug::where('prescription_id' ,$id)->get();
        $prescription_tests = Prescription_test::where('prescription_id' ,$id)->get();
        
        $doctor = Doctor::where('id',$prescription->doctor_id)->first();
    
    	return view('prescription.view',['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs, 'prescription_tests' => $prescription_tests,'doctor'=> $doctor]);
    }

    public function pdf($id){
    	
    	$prescription = Prescription::find($id);
    	$prescription_drugs = Prescription_drug::where('prescription_id' ,$id)->get();
    	$prescription_tests = Prescription_test::where('prescription_id' ,$id)->get();
    	
    	$doctor = Doctor::where('id',$prescription->doctor_id)->first();
    
    	
        view()->share(['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs]);
        $pdf = PDF::loadView('prescription.pdf_view', ['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs,'prescription_tests' => $prescription_tests,'doctor'=> $doctor]);
      
        //return view('prescription.view',['prescription' => $prescription, 'prescription_drugs' => $prescription_drugs, 'prescription_tests' => $prescription_tests]);

      //download PDF file with download method
      return $pdf->download($prescription->User->name.'_pdf.pdf');
    }


    public function destroy($id){

        Prescription::destroy($id);
        return Redirect::route('prescription.all')->with('success', 'Prescription Deleted Successfully!');;

    }
}
