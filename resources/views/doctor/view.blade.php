@extends('layouts.master')

@section('title')
{{ $doctor->name }}
@endsection

@section('content')

    <div class="row justify-content-center">
      <div class="col">
        <div class="card shadow mb-4">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <center><img src="{{ asset('img/patient-icon.png') }}" class="img-profile rounded-circle img-fluid"></center>
                       <h4 class="text-center"><b>{{ $doctor->name }}</b></h4>
                            <hr>
                            @isset($doctor->email)
                            <p><b>{{ __('Email') }} :</b> {{ $doctor->email }} </p>
                            @endisset

                            @isset($doctor->gender)
                            <p><b>{{ __('Gender') }} :</b> {{ __($doctor->gender) }}</p> 
                            @endisset

                            @isset($doctor->phone)
                            <p><b>{{ __('Phone') }} :</b> {{ $doctor->phone }}</p>
                            @endisset

                            @isset($doctor->age)
                            <p><b>{{ __('Age') }} :</b> {{ $doctor->age }}</p>
                            @endisset
                    </div>
                    <div class="col-md-8 col-sm-6">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="Profile" aria-selected="true">{{ __('sentence.Medical Info') }}</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           
                           <div class="mt-4"></div>

                            @isset($doctor->designation)
                            <p><b>{{ __('Designation') }} :</b> {{ $doctor->designation }} </p>
                            @endisset
                            
                            @isset($doctor->speciality)
                            <p><b>{{ __('Speciality') }} :</b> {{ $doctor->speciality }} </p>
                            @endisset
                            
                            @isset($doctor->experience)
                            <p><b>{{ __('Experience') }} :</b> {{ $doctor->experience }} </p>
                            @endisset

                            @isset($doctor->details)
                            <p><b>{{ __('Details') }} :</b> {{ $doctor->details }} cm</p>
                            @endisset

                            @isset($doctor->created_at)
                            <p><b>{{ __('Created At') }} :</b> {{ $doctor->created_at }}</p>
                            @endisset

                          
                        </div>
                        

                        <div class="tab-pane fade" id="prescriptions" role="tabpanel" aria-labelledby="prescriptions-tab">
                          <table class="table">
                            <tr>
                              <td align="center">{{ __('sentence.Reference') }}</td>
                              <td align="center">{{ __('sentence.Date') }}</td>
                              <td align="center">{{ __('sentence.Actions') }}</td>
                            </tr>
                            
                          </table>
                        </div>
                        <div class="tab-pane fade" id="Billing" role="tabpanel" aria-labelledby="Billing-tab">
                          <table class="table">
                            <tr>
                              <th>{{ __('sentence.Reference') }}</th>
                              <th>{{ __('sentence.Date') }}</th>
                              <th>{{ __('sentence.Amount') }}</th>
                              <th>{{ __('sentence.Status') }}</th>
                              <th>{{ __('sentence.Actions') }}</th>
                            </tr>
                            
                          </table>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
      </div>
    </div>

  <!-- Appointment Modal-->
  <div class="modal fade" id="EDITRDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('sentence.You are about to modify an appointment') }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b>{{ __('sentence.Patient') }} :</b> <span id="patient_name"></span></p>
          <p><b>{{ __('sentence.Date') }} :</b> <span id="rdv_date"></span></p>
          <p><b>{{ __('sentence.Time Slot') }} :</b> <span id="rdv_time"></span></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('sentence.Close') }}</button>
          <a class="btn btn-primary text-white" onclick="event.preventDefault(); document.getElementById('rdv-form-confirm').submit();">{{ __('sentence.Confirm Appointment') }}</a>
                                                     <form id="rdv-form-confirm" action="{{ route('appointment.store_edit') }}" method="POST" class="d-none">
                                                      <input type="hidden" name="rdv_id" id="rdv_id">
                                                      <input type="hidden" name="rdv_status" value="1">
                                                        @csrf
                                                    </form>
          <a class="btn btn-primary text-white" onclick="event.preventDefault(); document.getElementById('rdv-form-cancel').submit();">{{ __('sentence.Cancel Appointment') }}</a>
                                                     <form id="rdv-form-cancel" action="{{ route('appointment.store_edit') }}" method="POST" class="d-none">
                                                      <input type="hidden" name="rdv_id" id="rdv_id2">
                                                      <input type="hidden" name="rdv_status" value="2">
                                                        @csrf
                                                    </form>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('footer')

@endsection