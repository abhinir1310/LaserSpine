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
       <img src="{{asset('front/img/finvoices.jpeg')}}" width="100%">
      <div class="card shadow mb-4">
         <div class="card-body">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="">
                  {!! clean(App\Setting::get_option('header_left')) !!}
               </div>
               
               <div class="col-md-3">
                    <h4 class="name">
                            <a target="_blank" href="https://lobianijs.com" style="font-size: 20px;">
                            {{$doctor->name}}
                            </a>
                    </h4>
                  <b style="font-size: 15px;">{{$doctor->speciality}}</b><br>
               </div>
                
                <div class="col">
               <div class="col-md-3" style="float:right">
                   <b>Patient Id :</b> {{ $prescription->id }}<br>
                   <b>{{ __('sentence.Patient Name') }} :</b> {{ $prescription->User->name }}
                      @isset($prescription->User->Patient->birthday)
                      <b>{{ __('sentence.Age') }} :</b> {{ $prescription->User->Patient->birthday }}
                   <?php /*   ({{ \Carbon\Carbon::parse($prescription->User->Patient->birthday)->age }} Years) */ ?>
                    @endisset
                    
                    
                  <p> <b>Date : </b> {{ $prescription->created_at->format('d-m-Y') }}</p>
               </div>
               </div>
            </div>
            <br><br>

            <!--<div class="row">
               <div class="col">
                  <hr>
                  <h3>Prescription Details</h3>
                  <ol>
                    
                    @isset($prescription->User->Patient->gender) 
                      <li><b>{{ __('sentence.Gender') }} :</b> {{ __('sentence.'.$prescription->User->Patient->gender) }}</li>
                    @endisset 
                    
                    @isset($prescription->User->Patient->weight)
                      <li><b>{{ __('sentence.Patient Weight') }} :</b> {{ $prescription->User->Patient->weight }} Kg</li>
                    @endisset 
                    
                    @isset($prescription->User->Patient->height)
                      <li><b>{{ __('sentence.Patient Height') }} :</b> {{ $prescription->User->Patient->height }}</li>
                    @endisset 
                  </ol>
                  
                  <hr>
               </div>
            </div>-->
            
            <h3>Drugs Details</h3>
            <div class="row justify-content-center">
               <div class="col">
                   <table class="table table-bordered">
                       <tr>
                           <th>Type</th>
                           <th>Trade name</th>
                           
                           <th>Dose</th>
                           <th>Duration</th>
                           <th>Advice</th>
                       </tr>
                      
                        @forelse ($prescription_drugs as $drug)
                         <tr>
                           <td>{{ $drug->type }}</td>
                           <td>{{ $drug->Drug->trade_name }}</td>
                           
                           <td>{{ $drug->dose }}</td>
                           <td>{{ $drug->duration }}</td>
                           <td>{{ $drug->drug_advice }}</td>
                        </tr>   
                        @empty
                        @endforelse
                   </table>
                  <hr>
               </div>
            </div>
            <br>
            @if(count($prescription_tests))
            <h3>{{ __('Test') }} </h3>
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                   
                   <table class="table table-bordered">
                       <tr>
                           <th>Name</th>
                           <th>Description</th>
                       </tr>
                       
                        @forelse ($prescription_tests as $test)
                        <tr>
                           <td>{{ $test->Test->test_name }}</td></td>
                           <td>{{ $test->description ? $test->description : '-'  }}</td>
                        </tr>   
                        @empty
                        @endforelse
                       
                   </table>
                   
                   
                  
                  <hr>
               </div>
            </div>
            @endif
             <center><button id="btn" class="btn btn-primary"><i class="fas fa-print"></i> Print</button></center><br>
            <div class="row">
                
                    <img src="{{asset('front/img/fpic.PNG')}}" width="100%">
                   <!--<center><p style="color:green; font-size:22px;">Not Applicable for Medicolegal Purpose</p></center>-->
                   <!--<center><p style="color:#4e73df; font-size:22px;">Laser Clinic, Sofitel Apartment, First Floor, Haroon Colony Sector -||, Phulwari Sharif, Patna, Bihar 801505</p></center>-->
                   <!--<center><p style="color:#4e73df; font-size:22px;">Laser Clinic, Sri Ram Kunj  Apartment, East Boring Canal Road, Nageshwar Colony, Pandoi Kothi, Patna, Bihar 800001</p></center>-->
               
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer')
<script>
    
        $("#btn").click(function () {
           $('ul,#btn').hide();
   window.print(); 
})
</script>
@endsection