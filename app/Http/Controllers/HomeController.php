<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prescription;
use App\Appointment;
use App\Billing;
use App\Billing_item;
use App;
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
        
        $total_patients = User::where('role','patient')->count();
        $total_patients_today = User::where('role','patient')->wheredate('created_at', Today())->count();
        $total_appointments = Appointment::all()->count();
        $total_appointments_today = Appointment::wheredate('date', Today())->get();
        $total_prescriptions = Prescription::all()->count();
        $total_payments = Billing::all()->count();
        $total_payments = Billing::all()->count();
        $total_payments_month = Billing_item::whereMonth('created_at',date('m'))->sum('invoice_amount');
        $total_payments_month = Billing_item::whereMonth('created_at',date('m'))->sum('invoice_amount');
        $total_payments_year = Billing_item::whereYear('created_at',date('Y'))->sum('invoice_amount');
        
        $today = Billing_item::wheredate('created_at',Today())->sum('invoice_amount');
         
        //   $today = Billing_item::whereDay('created_at', '=', date('d'))->sum('invoice_amount');
        //   dd($today);

        return view('home', [
            'total_patients' => $total_patients, 
            'total_prescriptions' => $total_prescriptions, 
            'total_patients_today' => $total_patients_today,
            'total_appointments' => $total_appointments,
            'total_appointments_today' => $total_appointments_today,
            'total_payments' => $total_payments,
            'total_payments_month' => $total_payments_month,
            'total_payments_year' => $total_payments_year,
            'today' => $today
        ]);
    }


    public function lang($locale){

        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
