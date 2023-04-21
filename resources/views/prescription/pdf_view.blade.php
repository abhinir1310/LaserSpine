<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
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
<div class="row">
   <div class="col">
       <img src="{{asset('front/img/finvoices.jpeg')}}" width="100%">
      <div class="card shadow mb-4">
         <div class="card-body">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="col">
                  {!! clean(App\Setting::get_option('header_left')) !!}
               </div>
               <div class="col-md-3">
                    <h4 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            {{$doctor->name}}
                            </a>
                    </h4>
                  <b>{{$doctor->speciality}}</b><br>
                    
                     <br>
                     
                   <strong>{{ __('sentence.Patient Name') }} :</strong> {{ $prescription->User->name }}
                      @isset($prescription->User->Patient->birthday)
                      <strong>{{ __('sentence.Age') }} :</strong> {{ $prescription->User->Patient->birthday }}
                      ({{ \Carbon\Carbon::parse($prescription->User->Patient->birthday)->age }} Years)
                    @endisset
                    
                    
                  <p><strong>Date : </strong>{{ __('sentence.On') }} {{ $prescription->created_at->format('d-m-Y') }}</p>
              
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
                           <th>Strength</th>
                           <th>Dose</th>
                           <th>Duration</th>
                           <th>Advice</th>
                       </tr>
                      
                        @forelse ($prescription_drugs as $drug)
                        <tr>
                           <td>{{ $drug->type }}</td>
                           <td>{{ $drug->Drug->trade_name }}</td>
                           <td>{{ $drug->strength }}</td>
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
            <h3>{{ __('sentence.Test to do') }} </h3>
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
            <div class="row">
                    <img src="{{asset('front/img/fdetails.PNG')}}" width="100%">
                   <!--<center><p style="color:green; font-size:22px;">Not Applicable for Medicolegal Purpose</p></center>-->
                   <!--<center><p style="color:#4e73df; font-size:22px;">Laser Clinic, Sofitel Apartment, First Floor, Haroon Colony Sector -||, Phulwari Sharif, Patna, Bihar 801505</p></center>-->
                   <!--<center><p style="color:#4e73df; font-size:22px;">Laser Clinic, Sri Ram Kunj  Apartment, East Boring Canal Road, Nageshwar Colony, Pandoi Kothi, Patna, Bihar 800001</p></center>-->
               
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
</body>
</html>