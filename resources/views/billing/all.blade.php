@extends('layouts.master')

@section('title')
{{ __('sentence.Billing List') }}
@endsection

@section('content')

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

<!-- DataTables  -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('sentence.Billing List') }}</h6>
            <!--<button  class="btn btn-danger clearfix btn-csv"><span class="fa fa-file-excel-o"></span> Export to Excel</button>-->
            <!--<button  class="btn btn-primary btn-pdf"><span class="fa fa-file-pdf-o"></span> Export to Pdf</button>-->
         </div>
         <div class="col-4">
            <a href="{{ route('billing.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> {{ __('sentence.Create Invoice') }}</a>
             
         </div>
         
           
            
            <form class="reportform padd15" action="/billing-search" method="get" name="inquiry" autocomplete="off">
            
            <input id="dob" name="date" type="text" class="">
                  <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                  
                  
                @if($search__count ?? '' != 0)
                  <button id="btnExporttoExcel" class="btn btn-danger clearfix"><span class="fa fa-file-excel-o"></span> Export to Excel</button>
                @endif  
                  </form>
        
      </div>
      <br>
       @if($search__count ?? '' != 0)
       <strong>Search Records Found :  {{$search__count ?? ''}}</strong>
       @endif
   </div>
   
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered example2" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>Serial No</th>
                  <th>{{ __('sentence.Patient') }}</th>
                  <th>{{ __('Doctor') }}</th>
                  <th>{{ __('sentence.Date') }}</th>
                  <th>{{ __('sentence.Amount') }}</th>
                  <th>{{ __('sentence.Status') }}</th>
                  <th class='remove'>{{ __('sentence.Actions') }}</th>
               </tr>
            </thead>
            <tbody>
               @foreach($invoices as $invoice)
               <tr>
                  <td>{{ $invoice->id }}</td>
                  <td><a href="{{ url('patient/view/'.$invoice->user_id) }}"> {{ $invoice->User->name }} </a></td>
                  <td>
                     {{ $invoice-> doctor_id }}</td>
                  <td>{{ $invoice->created_at->format('d M Y') }}</td>
                  <td> {{ $invoice->Items->sum('invoice_amount')}} </td>
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
                     <!-- <a href="{{ url('billing/pdf/'.$invoice->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a> -->
                     <a href="{{ url('billing/delete/'.$invoice->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@section('script')

<script src="{{ asset('public/js/table2excel.js')}}" type="text/javascript"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>

$(document).ready(function() {
    
    $('#dob').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight:'TRUE',
    autoclose: true,
           icons: {
               time: "fa fa-clock-o",
               date: "fa fa-calendar",
               up: "fa fa-chevron-up",
               down: "fa fa-chevron-down",
               previous: 'fa fa-chevron-left',
               next: 'fa fa-chevron-right',
               today: 'fa fa-screenshot',
               clear: 'fa fa-trash',
               close: 'fa fa-remove'
           }
        });


    
   $('.dt-buttons').css('display','none');
   
   });
    $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

  $('.btn-copy').click(function(){
    $('.buttons-copy').trigger('click');
  });
  $('.btn-csv').click(function(){
    $('.buttons-csv').trigger('click');
  });
  $('.btn-pdf').click(function(){
    $('.buttons-pdf').trigger('click');
  });
  $('.btn-print').click(function(){
    $('.buttons-print').trigger('click');
  });
  
$("#btnExporttoExcel").click(function(){
    
   
    var url = '<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/billing/all'; ?>';
    window.location.href = url;
    
    var table = $('#dataTable').DataTable();

  $('<table>')
     .append(
        $(".example2").append(table.$('tr')).clone()
     )
      $(".example2").remove(".remove").table2excel({
         exclude: ".delete,.remove",
        name: "Worksheet Name",
        filename: "Users"
     });
     
     var url = '<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/billing/all'; ?>';
     window.location.href = url;
});  


</script>
@endsection