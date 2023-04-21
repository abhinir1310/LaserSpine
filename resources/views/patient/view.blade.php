@extends('layouts.master')

@section('title')
{{ $patient->name }}
@endsection

@section('content')

    <div class="row justify-content-center">
      <div class="col">
        <div class="card shadow mb-4">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <center><img src="{{ asset('img/patient-icon.png') }}" class="img-profile rounded-circle img-fluid"></center>
                       <h4 class="text-center"><b>{{ $patient->name }}</b></h4>
                            <hr>
                            @isset($patient->Patient->birthday)
                            <p><b>{{ __('sentence.Age') }} :</b> {{ $patient->Patient->birthday }} </p>
                            @endisset

                            @isset($patient->Patient->gender)
                            <p><b>{{ __('sentence.Gender') }} :</b> {{ __('sentence.'.$patient->Patient->gender) }}</p> 
                            @endisset

                            @isset($patient->Patient->phone)
                            <p><b>{{ __('sentence.Phone') }} :</b> {{ $patient->Patient->phone }}</p>
                            @endisset

                            @isset($patient->Patient->adress)
                            <p><b>{{ __('sentence.Address') }} :</b> {{ $patient->Patient->adress }}</p>
                            @endisset
                    </div>
                    <div class="col-md-8 col-sm-6">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="Profile" aria-selected="true">{{ __('sentence.Medical Info') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="appointements-tab" data-toggle="tab" href="#appointements" role="tab" aria-controls="appointements" aria-selected="false">{{ __('sentence.Appointment List') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="prescriptions-tab" data-toggle="tab" href="#prescriptions" role="tab" aria-controls="prescriptions" aria-selected="false">{{ __('sentence.Prescription List') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="Billing-tab" data-toggle="tab" href="#Billing" role="tab" aria-controls="Billing" aria-selected="false">{{ __('sentence.Billing') }}</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           
                           <div class="mt-4"></div>

                            @isset($patient->Patient->weight)
                            <p><b>{{ __('sentence.Weight') }} :</b> {{ $patient->Patient->weight }} Kg</p>
                            @endisset

                            @isset($patient->Patient->height)
                            <p><b>{{ __('sentence.Height') }} :</b> {{ $patient->Patient->height }} cm</p>
                            @endisset

                            @isset($patient->Patient->blood)
                            <p><b>{{ __('sentence.Blood Group') }} :</b> {{ $patient->Patient->blood }}</p>
                            @endisset

                          
                        </div>
                        <div class="tab-pane fade" id="appointements" role="tabpanel" aria-labelledby="appointements-tab">
                          <table class="table">
                            <tr>
                              <td align="center">Id</td>
                              <td align="center">{{ __('sentence.Date') }}</td>
                              <td align="center">{{ __('sentence.Time Slot') }}</td>
                              <td align="center">{{ __('sentence.Status') }}</td>
                              <td align="center">{{ __('sentence.Actions') }}</td>
                            </tr>
                            @forelse($appointments as $appointment)
                            <tr>
                              <td align="center">{{ $appointment->id }} </td>
                              <td align="center">{{ $appointment->date->format('d M Y') }} </td>
                              <td align="center">{{ $appointment->time_start }} - {{ $appointment->time_end }} </td>
                               <td class="text-center">
                                @if($appointment->visited == 0)
                                <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-hourglass-start"></i>
                                  </span>
                                  <span class="text">{{ __('sentence.Not Yet Visited') }}</span>
                                </a>
                                @elseif($appointment->visited == 1)
                                <a href="#" class="btn btn-success btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                  </span>
                                  <span class="text">{{ __('sentence.Visited') }}</span>
                                </a>
                                @else
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-user-times"></i>
                                  </span>
                                  <span class="text">{{ __('sentence.Cancelled') }}</span>
                                </a>
                                @endif
                              </td>
                              <td align="center">
                                <a data-rdv_id="{{ $appointment->id }}" data-rdv_date="{{ $appointment->date->format('d M Y') }}" data-rdv_time_start="{{ $appointment->time_start }}" data-rdv_time_end="{{ $appointment->time_end }}" data-patient_name="{{ $appointment->User->name }}" class="btn btn-success btn-circle btn-sm text-white" data-toggle="modal" data-target="#EDITRDVModal"><i class="fas fa-check"></i></a>
                                <a href="{{ url('appointment/delete/'.$appointment->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="5" align="center">{{ __('sentence.No appointment available') }}</td>
                            </tr>
                            @endforelse
                          </table>
                        </div>

                        <div class="tab-pane fade" id="prescriptions" role="tabpanel" aria-labelledby="prescriptions-tab">
                          <table class="table">
                            <tr>
                              <td align="center">{{ __('sentence.Reference') }}</td>
                              <td align="center">{{ __('sentence.Date') }}</td>
                              <td align="center">{{ __('sentence.Actions') }}</td>
                            </tr>
                            @forelse($prescriptions as $prescription)
                            <tr>
                              <td align="center">{{ $prescription->reference }} </td>
                              <td align="center">{{ $prescription->created_at }} </td>
                              <td align="center">
                                <a href="{{ url('prescription/view/'.$prescription->id) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('prescription/pdf/'.$prescription->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a>
                                <a href="{{ url('prescription/delete/'.$prescription->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                             @empty
                            <tr>
                              <td colspan="3" align="center">{{ __('sentence.No prescription available') }}</td>
                            </tr>
                            @endforelse
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
                            @forelse($invoices as $invoice)
                            <tr>
                              <td>{{ $invoice->reference }}</td>
                              <td>{{ $invoice->created_at->format('d M Y') }}</td>
                              <td> {{ $invoice->Items->sum('invoice_amount')}} {{ App\Setting::get_option('currency') }} </td>
                              <td>
                                @if($invoice->payment_status == 'Unpaid')
                                <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-hourglass-start"></i>
                                  </span>
                                  <span class="text">{{ __('sentence.Unpaid') }}</span>
                                </a>
                                @elseif($invoice->payment_status == 'Paid')
                                <a href="#" class="btn btn-success btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                  </span>
                                  <span class="text">{{ __('sentence.Paid') }}</span>
                                </a>
                                @else
                                <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-user-times"></i>
                                  </span>
                                  <span class="text">{{ __('sentence.Cancelled') }}</span>
                                </a>
                                @endif
                              </td>
                              <td>
                                <a href="{{ url('billing/view/'.$invoice->id) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('billing/pdf/'.$invoice->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a>
                                <a href="{{ url('billing/delete/'.$invoice->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr>
                            </tr>
                              <td colspan="6" align="center">{{ __('sentence.No Invoices Available') }}</td>
                            @endforelse
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