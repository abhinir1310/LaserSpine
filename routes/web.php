<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'FrontendController@index')->name('front');

Route::get('spine-services', 'FrontendController@spine_services')->name('spine-services');
Route::get('spine-surgeries', 'FrontendController@spine_surgeries')->name('spine-surgeries');
Route::get('publications-reserch', 'FrontendController@publications_reserch')->name('publications-reserch');
Route::get('awards-recognitions', 'FrontendController@awards_recognitions')->name('awards-recognitions');
Route::get('contact-us', 'FrontendController@contact_us')->name('contact-us');
Route::post('contact-us', 'FrontendController@storecontact')->name('storecontact');
Route::get('about', 'FrontendController@about')->name('about');





Route::get('login', function () {
    return view('auth.login');
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang/{locale}', 'HomeController@lang');




//Patients
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/create', 'PatientController@store')->name('patient.store');
Route::get('/patient/all', 'PatientController@all')->name('patient.all');
Route::get('/patient/view/{id}', 'PatientController@view')->where('id', '[0-9]+')->name('patient.view');
Route::get('/patient/edit/{id}', 'PatientController@edit')->where('id', '[0-9]+')->name('patient.edit');
Route::post('/patient/edit', 'PatientController@store_edit')->name('patient.store_edit');


//Doctor new
Route::get('/doctor/create', 'DoctorController@create')->name('doctor.create');
Route::post('/doctor/create', 'DoctorController@store')->name('doctor.store');
Route::get('/doctor/all', 'DoctorController@all')->name('doctor.all');
Route::get('/doctor/view/{id}', 'DoctorController@view')->where('id', '[0-9]+')->name('doctor.view');
Route::get('/doctor/edit/{id}', 'DoctorController@edit')->where('id', '[0-9]+')->name('doctor.edit');
Route::post('/doctor/edit', 'DoctorController@store_edit')->name('doctor.store_edit');
Route::get('/doctor/delete/{id}', 'DoctorController@delete')->where('id', '[0-9]+')->name('doctor.delete');

Route::get('/inquiry', 'DoctorController@inquiry')->name('inquiry.all');


//Doctor
//Route::get('/doctor/edit/{id}', 'DoctorController@create')->where('id', '[0-9]+')->name('doctor.create');
//Route::post('/doctor/create', 'DoctorController@store')->name('doctor.store');

//Appointments
Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('/appointment/create', 'AppointmentController@store')->name('appointment.store');
Route::get('/appointment/all', 'AppointmentController@all')->name('appointment.all');
Route::get('/appointment/checkslots/{id}','AppointmentController@checkslots')->where('id', '[0-9]+');
Route::get('/appointment/delete/{id}','AppointmentController@destroy')->where('id', '[0-9]+');
Route::post('/appointment/edit', 'AppointmentController@store_edit')->name('appointment.store_edit');

//Drugs
Route::get('/drug/create', 'DrugController@create')->name('drug.create');
Route::post('/drug/create', 'DrugController@store')->name('drug.store');
Route::get('/drug/edit/{id}', 'DrugController@edit')->where('id', '[0-9]+')->name('drug.edit');
Route::post('/drug/edit', 'DrugController@store_edit')->name('drug.store_edit');
Route::get('/drug/all', 'DrugController@all')->name('drug.all');
Route::get('/drug/delete/{id}','DrugController@destroy');


//Tests
Route::get('/test/create', 'TestController@create')->name('test.create');
Route::post('/test/create', 'TestController@store')->name('test.store');
Route::get('/test/edit/{id}', 'TestController@edit')->name('test.edit');
Route::post('/test/edit', 'TestController@store_edit')->name('test.store_edit');
Route::get('/test/all', 'TestController@all')->name('test.all');
Route::get('/test/delete/{id}', 'TestController@destroy')->where('id', '[0-9]+');

//Prescriptions
Route::get('/prescription/create', 'PrescriptionController@create')->name('prescription.create');
Route::post('/prescription/create', 'PrescriptionController@store')->name('prescription.store');
Route::get('/prescription/all', 'PrescriptionController@all')->name('prescription.all');
Route::get('/prescription/view/{id}', 'PrescriptionController@view')->where('id', '[0-9]+')->name('prescription.view');
Route::get('/prescription/pdf/{id}','PrescriptionController@pdf')->where('id', '[0-9]+');
Route::get('/prescription/delete/{id}','PrescriptionController@destroy');

//Billing
Route::get('/billing/create', 'BillingController@create')->name('billing.create');
Route::post('/billing/create', 'BillingController@store')->name('billing.store');
Route::get('/billing/all', 'BillingController@all')->name('billing.all');
Route::get('/billing/view/{id}', 'BillingController@view')->where('id', '[0-9]+')->name('billing.view');
Route::get('/billing/pdf/{id}','BillingController@pdf')->where('id', '[0-9]+');
Route::get('/billing/delete/{id}','BillingController@destroy');

Route::get('billing-search', 'BillingController@search');

//Settings
/* Doctorino Settings */
Route::get('/settings/doctorino_settings', 'SettingController@doctorino_settings')->name('doctorino_settings.edit');
Route::post('/settings/doctorino_settings', 'SettingController@doctorino_settings_store')->name('doctorino_settings.store');
/* Prescription Settings */
Route::get('/settings/prescription_settings', 'SettingController@prescription_settings')->name('prescription_settings.edit');
Route::post('/settings/prescription_settings', 'SettingController@prescription_settings_store')->name('prescription_settings.store');