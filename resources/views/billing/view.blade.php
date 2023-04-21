@extends('layouts.master')
@section('title')
{{ __('sentence.View billing') }}
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
           <img src="{{asset('front/img/b_logo.png')}}" width="100%" height="150px">
         <div class="card-body" id="main_section">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="">
                  {!! clean(App\Setting::get_option('header_left')) !!}
               </div>
              
               <div class="col-md-4">
                    <h4 class="name">
                            <a target="_blank" href="https://lobianijs.com" style="font-size: 18px;">
                            {{$doctor->name}}
                            </a>
                    </h4>
                  <b style="font-size: 16px;">{{$doctor->speciality}}</b><br>
               </div>
        
                <div class="col">
               <div class="col-md-5" style="float:right">
                <p style="font-size: 18px;">
                <b>Patient Id :</b>{{ $billing->id }}<br>
                <b>{{ __('sentence.Patient Name') }} :</b> {{ $billing->User->name }}<br>
                <b>{{ __('sentence.Age') }} :</b> {{ $billing->User->Patient->birthday }}<br>
                <b>{{ __('sentence.Gender') }} :</b> {{ $billing->User->Patient->gender }}<br>
                <b>{{ __('sentence.Date') }} :</b> {{ $billing->created_at->format('d-m-Y') }}<br>
                <b>{{ __('sentence.Reference') }} :</b> {{ $billing->reference }}<br></p>
               </div>
               </div>
            </div>
            <!-- END ROW : Doctor informations -->
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  <h5 class="text-center"><b>{{ __('sentence.Invoice') }}</b></h5>
                  <table class="table" border="2">
                     <tr>
                        <td><b>Serial No</b></td>
                        <td><b>Services / Investigation</b></td>
                        <td><b>Services Charge</b></td>
                     </tr>
                     @forelse ($billing_items as $key => $billing_item)
                     <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $billing_item->invoice_title }}</td>
                        <td><i class="fa fa-inr" aria-hidden="true"></i>{{ $billing_item->invoice_amount }} {{ App\Setting::get_option('currency') }}</td>
                     </tr>
                     @empty
                     <tr>
                        <td colspan="3">{{ __('sentence.Empty Invoice') }}</td>
                     </tr>
                     @endforelse
                     @empty(!$billing_item)
                     <tr>
                         <td></td>
                         <td></td>
                        <td><strong>Total</strong> : <i class="fa fa-inr" aria-hidden="true"></i>{{ $billing_items->sum('invoice_amount') }}  {{ App\Setting::get_option('currency') }}</td>
                     </tr>
                     
                     <!--<tr>-->
                     <!--   <td colspan="2"><strong>{{ __('sentence.Total') }}</strong></td>-->
                     <!--   <td align="center"><strong>{{ $billing_items->sum('invoice_amount') + ($billing_items->sum('invoice_amount') * App\Setting::get_option('vat')/100) }}  {{ App\Setting::get_option('currency') }}</strong></td>-->
                     <!--</tr>-->
                     @endempty
                  </table>
                  <hr>
               </div>
            </div>
            <!--<a class="print-btn hover-btn" id="printPageButton" href="javascript:void(0);" onclick="PrintDiv();">Print</a>-->
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  <hr>
               </div>
            </div>
            <!-- END ROW : Drugs List -->
            <!-- ROW : Footer informations -->
            <center><button id="btn" class="btn btn-primary"><i class="fas fa-print"></i> Print</button></center><br>
            <div class="row justify-content-center" style="text-align:center;">
                <div class= "col justify-content-center">
                     <h4 style="font-size: 16px; display: block;  ; color: green ;font-weight: bold;" >Not Applicable for Medicolegal Purpose</h4>
                    <h6>Laser Clinic, Sofitel Apartment, 1st Floor, Haroon Colony Sector - II, Phulwari Sharif, Patna, Bihar 801505</h6>
                    <h6>Laser Clinic, Sri Ram Kunj Apartment, East Boring Canal Road, Patna, Bihar 800001</h6>
                </div>
             
              

               <!--// <img src="{{asset('front/img/fpic.PNG')}}" width="100%">-->
               <!--<div class="col">-->
               <!--   <p>{!! clean(App\Setting::get_option('footer_left')) !!}</p>-->
               <!--</div>-->
               <!--<div class="col">-->
               <!--   <p class="float-right">{!! clean(App\Setting::get_option('footer_right')) !!}</p>-->
               <!--</div>-->
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
@endsection

@section('footer')

<script type="text/javascript">  
        
        $("#btn").click(function () {
           $('ul,#btn').hide();
   window.print(); 
})
    
        function PrintDiv() {  
            var divContents = document.getElementById("main_section").innerHTML;  
            var printWindow = window.open('', '', '');  
            printWindow.document.write('<html><head><title>Print DIV Content</title>');  
            printWindow.document.write('</head><body >');  
            printWindow.document.write(divContents);  
            printWindow.document.write('</body></html>');  
            printWindow.document.close();  
            printWindow.print();  
        }  
    </script>

@endsection