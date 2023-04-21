<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\User;
use App\Appointment;
use App\Setting;
use App\Doctor;
use Redirect;
class AppointmentController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        
    	$patients = User::where('role','patient')->get();
    	$doctor = Doctor::latest()->get();
	    return view('appointment.create', ['patients' => $patients,'doctor'=>$doctor]);
    }

    public function checkslots($date){
    	return $this->getTimeSlot($date);
    }


    public function available_slot($date,$start,$end){
    	$check = Appointment::where('date',$date)->where('time_start', $start)->where('time_end', $end)->count();
    	if($check == 0){
        	return 'available';
    	}else{
        	return 'unavailable';
    	}
    }


    public function getTimeSlot($date) {
    
    $day = date("l", strtotime($date));
  	$day_from =  strtolower($day.'_from');
  	$day_to =  strtolower($day.'_to');

    $start = Setting::get_option($day_from);
    $end = Setting::get_option($day_to);
    $interval = Setting::get_option('appointment_interval');

    $start = new DateTime($start);
    $end = new DateTime($end);
    $start_time = $start->format('H:i'); // Get time Format in Hour and minutes
    $end_time = $end->format('H:i');

    $i=0;
    $time = [];	
    while(strtotime($start_time) <= strtotime($end_time)){
        $start = $start_time;
        $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($start_time)));
        $start_time = date('H:i',strtotime('+'.$interval.' minutes',strtotime($start_time)));
        $i++;
        if(strtotime($start_time) <= strtotime($end_time)){
            $time[$i]['start'] = $start;
            $time[$i]['end'] = $end;
            $time[$i]['available'] = $this->available_slot($date ,$start,$end);
        }
    }

    return $time;
	
	}

	public function store(Request $request){


		$validatedData = $request->validate([
        	'patient_name' => ['required','exists:users,id'],
            'doctor_id' => ['required'],
            'date' => ['required'],
            //'rdv_time_end' => ['required'],

    	]);

    	$appointment = new Appointment();
		$appointment->user_id = $request->patient_name;
		$appointment->doctor_id = $request->doctor_id;
		$appointment->date = $request->date;
		//$appointment->time_start = $request->rdv_time_start;
		//$appointment->time_end = $request->rdv_time_end;
		$appointment->visited = 0;
		$appointment->save();

		return Redirect::back()->with('success', 'Appointment Created Successfully!');

	}

    public function store_edit(Request $request){

        $validatedData = $request->validate([
            'rdv_id' => ['required','exists:appointments,id'],
            'rdv_status' => ['required','numeric'],
        ]);

        $appointment = Appointment::findOrFail($request->rdv_id);
        $appointment->visited = $request->rdv_status;
        $appointment->save();

        return Redirect::back()->with('success', 'Appointment Updated Successfully!');
    }

	public function all(){
		$appointments = Appointment::all();

		return view('appointment.all', ['appointments' => $appointments]);
	}


    public function destroy($id){

        Appointment::destroy($id);
        return Redirect::route('appointment.all')->with('success', 'Appointment Deleted Successfully!');

    }


}
