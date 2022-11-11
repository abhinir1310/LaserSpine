<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Doctor;
use App\Prescription;
use App\Appointment;
use App\Billing;
use Hash;
use Redirect;
use Illuminate\Validation\Rule;
use App\Contact;

class DoctorController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }


    public function all(){

    	$doctors = Doctor::latest()->get();

    	return view('doctor.all', ['doctors' => $doctors]);

    }
    
     public function inquiry (){

    	$inquiry = Contact::latest()->get();

    	return view('doctor.inquiry', ['inquiry' => $inquiry]);

    }

    public function create(){
        
    	return view('doctor.create');
    }

    public function edit($id){
        
    	$doctor = Doctor::find($id);
    	return view('doctor.edit',['doctor' => $doctor]);
    }

        public function store_edit(Request $request){
    
    
   
    	$validatedData = $request->validate([
        	'name' => ['required', 'string', 'max:255'],
            'email' => [
		        'required', 'email', 'max:255',
		        Rule::unique('doctors')->ignore($request->user_id),
		    ],
            'phone' => ['required'],
            'gender' => ['required'],

    	]);

    	$user = Doctor::find($request->user_id);
		$user->email = $request->email;
		$user->name = $request->name;
		$user->age = $request->age;
		$user->phone = $request->phone;
		$user->gender = $request->gender;
		$user->designation = $request->designation;
		$user->speciality = $request->speciality;
		$user->experience = $request->experience;
		$user->details = $request->details;
		
		$user->saturday_from = $request->saturday_from;
		$user->saturday_to = $request->saturday_to;
		
		$user->sunday_from = $request->sunday_from;
		$user->sunday_to = $request->sunday_to;
		
		$user->monday_from = $request->monday_from;
		$user->monday_to = $request->monday_to;
		
		$user->tuesday_from = $request->tuesday_from;
		$user->tuesday_to = $request->tuesday_to;
		
		$user->wednesday_from = $request->wednesday_from;
		$user->wednesday_to = $request->wednesday_to;
		
		$user->thursday_from = $request->thursday_from;
		$user->thursday_to = $request->thursday_to;
		
		$user->friday_from = $request->friday_from;
		$user->friday_to = $request->friday_to;
		$user->save();
		
		return Redirect::back()->with('success', __('Doctor Updated Successfully'));

    }

    public function store(Request $request){

    	$validatedData = $request->validate([
        	'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors,email'],
            'age' => ['required'],
            'gender' => ['required'],

    	]);

    	$user = new Doctor();
		$user->email = $request->email;
		$user->name = $request->name;
		$user->age = $request->age;
		$user->phone = $request->phone;
		$user->gender = $request->gender;
		$user->designation = $request->designation;
		$user->speciality = $request->speciality;
		$user->experience = $request->experience;
		$user->details = $request->details;
		
		$user->saturday_from = $request->saturday_from;
		$user->saturday_to = $request->saturday_to;
		
		$user->sunday_from = $request->sunday_from;
		$user->sunday_to = $request->sunday_to;
		
		$user->monday_from = $request->monday_from;
		$user->monday_to = $request->monday_to;
		
		$user->tuesday_from = $request->tuesday_from;
		$user->tuesday_to = $request->tuesday_to;
		
		$user->wednesday_from = $request->wednesday_from;
		$user->wednesday_to = $request->wednesday_to;
		
		$user->thursday_from = $request->thursday_from;
		$user->thursday_to = $request->thursday_to;
		
		$user->friday_from = $request->friday_from;
		$user->friday_to = $request->friday_to;
		
		
		$user->save();

		return Redirect::route('doctor.all')->with('success', __('Doctor Created Successfully'));

    }


    public function view($id){

    	$doctor = Doctor::findOrfail($id);
        //$prescriptions = Prescription::where('user_id' ,$id)->OrderBy('id','Desc')->get();
        //$appointments = Appointment::where('user_id' ,$id)->OrderBy('id','Desc')->get();
        //$invoices = Billing::where('user_id' ,$id)->OrderBy('id','Desc')->get();
    	return view('doctor.view', ['doctor' => $doctor]);

    }
    
    public function delete($id)
    {
        Doctor::findOrFail($id)->delete();
        	return Redirect::route('doctor.all')->with('success', __('Doctor delete Successfully'));
    }


}
