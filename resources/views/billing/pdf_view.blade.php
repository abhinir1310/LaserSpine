<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Laser Clinic - {{ __('sentence.View Invoice') }} </title>
     
      
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}




.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
   </head>
   
   <body id="page-top">
      <div id="invoice"> 
            <div class="invoice overflow-auto">
            <div>
                 <!--<img src="{{asset('front/img/finvoices.jpeg')}}" width="100%">-->
                <header>
                <div class="row">
                    
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
                 </div>
                 
                 </div>
            </header>
            <main>
               
            

      <table id="" width="100%" cellspacing="0" border="2"  class="table table-bordered dataTable no-footer" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
         
                     <tr>
                        <td>Serial No</td>
                        <td>Services / Investigation</td>
                        <td>Services Charge</td>
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
                     
                     <tr>
                        <td colspan="2"><strong>{{ __('sentence.Total') }}</strong></td>
                        <td align="center"><strong>{{ $billing_items->sum('invoice_amount') + ($billing_items->sum('invoice_amount') * App\Setting::get_option('vat')/100) }}  {{ App\Setting::get_option('currency') }}</strong></td>
                     </tr>
                     @endempty
                  </table>
    

                
            </main>
            <footer>
               {!! clean(App\Setting::get_option('footer_right')) !!}
            
                <img src="{{asset('front/img/finvoice.jpeg')}}" width="100%">
            </footer>
      </div></div>
      </div>
   </body>
</html>

