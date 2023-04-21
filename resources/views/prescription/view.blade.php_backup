@extends('layouts.master')
@section('title')
{{ __('sentence.View Prescription') }}
@endsection
@section('content')
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
   <div class="col">
      <div class="card shadow mb-4">
         <div class="card-body">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="col">
                  {!! clean(App\Setting::get_option('header_left')) !!}
               </div>
               <div class="col-md-3">
                  <p>Alger, {{ __('sentence.On') }} {{ $prescription->created_at->format('d-m-Y') }}</p>
               </div>
            </div>
            <!-- END ROW : Doctor informations -->
            <!-- ROW : Patient informations -->
            <div class="row">
               <div class="col">
                  <hr>
                  <p>
                     <b>{{ __('sentence.Patient Name') }} :</b> {{ $prescription->User->name }}
                     @isset($prescription->User->Patient->birthday)
                     - <b>{{ __('sentence.Age') }} :</b> {{ $prescription->User->Patient->birthday }} ({{ \Carbon\Carbon::parse($prescription->User->Patient->birthday)->age }} Years)
                     @endisset
                     @isset($prescription->User->Patient->gender)
                     - <b>{{ __('sentence.Gender') }} :</b> {{ __('sentence.'.$prescription->User->Patient->gender) }}
                     @endisset
                     @isset($prescription->User->Patient->weight)
                     - <b>{{ __('sentence.Patient Weight') }} :</b> {{ $prescription->User->Patient->weight }} Kg
                     @endisset
                     @isset($prescription->User->Patient->height)
                     - <b>{{ __('sentence.Patient Height') }} :</b> {{ $prescription->User->Patient->height }}
                     @endisset
                  </p>
                  <hr>
               </div>
            </div>
            <!-- END ROW : Patient informations -->
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  @forelse ($prescription_drugs as $drug)
                  <li>{{ $drug->type }} - {{ $drug->Drug->trade_name }} {{ $drug->strength }} - {{ $drug->dose }} - {{ $drug->duration }} <br> {{ $drug->drug_advice }}</li>
                  @empty
                  @endforelse
                  <hr>
               </div>
            </div>
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  <strong>{{ __('sentence.Test to do') }} </strong><br><br>
                  @forelse ($prescription_tests as $test)
                  <li>{{ $test->Test->test_name }} @empty(!$test->description) - {{ $test->description }} @endempty</li>
                  @empty
                  <p>{{ __('sentence.No Test Required') }}</p>
                  @endforelse
                  <hr>
               </div>
            </div>
            <!-- END ROW : Drugs List -->
            <!-- ROW : Footer informations -->
            <div class="row">
               <div class="col">
                  <p>{!! clean(App\Setting::get_option('footer_left')) !!}</p>
               </div>
               <div class="col">
                  <p>{!! clean(App\Setting::get_option('footer_right')) !!}</p>
               </div>
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer')
@endsection