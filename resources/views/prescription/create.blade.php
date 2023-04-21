@extends('layouts.master')
@section('title')
{{ __('sentence.New Prescription') }}
@endsection
@section('content')
<form method="post" action="{{ route('prescription.store') }}">
   <div class="row">
      <div class="col">
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
         @endif
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Patient informations') }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Doctor :</label>
                  <select class="form-control select2 select2-hidden-accessible" id="doctor_id" tabindex="-1" name="doctor_id" aria-hidden="true">
                     <option value="">Select Doctor</option>
                     @foreach($doctor as $val)
                     <option value="{{ $val->id }}">{{ $val->name }}</option>
                     @endforeach
                  </select>
                  {{ csrf_field() }}
               </div>
                
            
               <div class="form-group">
                  <label for="exampleInputEmail1">{{ __('sentence.Patient') }} :</label>
                  <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1" name="patient_id" aria-hidden="true">
                     <option value="">{{ __('sentence.Select Patient') }}</option>
                     @foreach($patients as $patient)
                     <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group text-center">
                  <img src="{{ asset('img/patient-icon.png') }}" class="img-profile rounded-circle img-fluid">
               </div>
               <div class="form-group">
                  <input type="submit" value="{{ __('sentence.Create Prescription') }}" class="btn btn-warning" align="center">
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Drugs list') }}</h6>
            </div>
            <div class="card-body">
               <fieldset class="todos_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> {{ __('sentence.Add Drug') }}</a>
                  </div>
               </fieldset>
            </div>
         </div>
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Tests list') }}</h6>
            </div>
            <div class="card-body">
               <fieldset class="test_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> {{ __('sentence.Add Test') }}</a>
                  </div>
               </fieldset>
            </div>
         </div>
      </div>
   </div>
</form>
@endsection

@section('footer')
<script type="text/template" id="todos_labels">
   <section>
                         <div class="row">
                           <div class="col-md-3">
                              <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                          <select class="form-control" name="type[]">
                                            <option value="Type">{{ __('sentence.Type') }}</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Syrup">Syrup</option>
                                            <option value="Ointment">Ointment</option>
                                            <option value="Injection">Injection</option>
                                            
                                        </select>
                                    </div>
                              </div>
                           </div>
                             <div class="col-md-4">
                                 <select class="form-control select2 select2-hidden-accessible" name="trade_name[]" id="drug" tabindex="-1" aria-hidden="true">
                                   <option value="">{{ __('sentence.Select Drug') }}...</option>
                                   @foreach($drugs as $drug)
                                       <option value="{{ $drug->id }}">{{ $drug->trade_name }}</option>
                                   @endforeach
                                 </select>
                             </div>
                            
                             <div class="col-md-4">
                                 <div class="form-group-custom">
                                     <input type="text" id="strength" name="strength[]"  class="form-control" placeholder="Mg/Ml">
                                 </div>
                             </div>
                         </div>
   
                         <div class="row">
   
                         <div class="col-md-6">
                              <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                          <select class="form-control" name="dose[]">
                                            <option value="Dose">{{ __('sentence.Dose') }}</option>
                                            <option value="Morning-Evening">Morning-Evening</option>
                                            <option value="Before Food">Before Food</option>
                                            <option value="After Food">After Food</option>
                                            <option value="Once Daily">Once Daily</option>
                                            <option value="Once A Week">Once A Week</option>
                                            <option value="Others">Others</option>
                                            
                                        </select>
                                    </div>
                              </div>
                           </div>
                             <div class="col-md-6">
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                          <select class="form-control" name="duration[]">
                                            <option value="Duration">{{ __('sentence.Duration') }}</option>
                                            <option value="7 Days">7 Days</option>
                                            <option value="10 Days">10 Days</option>
                                            <option value="15 Days">15 Days</option>
                                            <option value="30 Days">30 Days</option>
                                            <option value="Others">Others</option>
                                            
                                        </select>
                                    </div>
                              </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group-custom">
                                     <input type="text" id="drug_advice" name="drug_advice[]" class="form-control" placeholder="{{ __('sentence.Advice_Comment') }}">
                                 </div>
                             </div>
                         </div>
                 </section>
   <hr color="#a1f1d4">
</script>
<script type="text/template" id="test_labels">
   <section>
                         <div class="row">
                            
                             <div class="col-md-6">
                                 <select class="form-control select2 select2-hidden-accessible" name="test_name[]" id="test" tabindex="-1" aria-hidden="true">
                                   <option value="">{{ __('sentence.Select Test') }}...</option>
                                   @foreach($tests as $test)
                                       <option value="{{ $test->id }}">{{ $test->test_name }}</option>
                                   @endforeach
                                 </select>
                             </div>
                            
                             <div class="col-md-6">
                                 <div class="form-group-custom">
                                     <input type="text" id="strength" name="description[]"  class="form-control" placeholder="{{ __('sentence.Description') }}">
                                 </div>
                             </div>
                         </div>
   
                      
                 </section>
   <hr color="#a1f1d4">
</script>
@endsection