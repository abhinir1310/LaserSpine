<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.Billing List')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
   <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
</div>
<?php endif; ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
   <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<!-- DataTables  -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2"><?php echo e(__('sentence.Billing List')); ?></h6>
            <!--<button  class="btn btn-danger clearfix btn-csv"><span class="fa fa-file-excel-o"></span> Export to Excel</button>-->
            <!--<button  class="btn btn-primary btn-pdf"><span class="fa fa-file-pdf-o"></span> Export to Pdf</button>-->
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('billing.create')); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> <?php echo e(__('sentence.Create Invoice')); ?></a>
             
         </div>
         
           
            
            <form class="reportform padd15" action="/billing-search" method="get" name="inquiry" autocomplete="off">
            
            <input id="dob" name="date" type="text" class="">
                  <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                  
                  
                <?php if($search__count ?? '' != 0): ?>
                  <button id="btnExporttoExcel" class="btn btn-danger clearfix"><span class="fa fa-file-excel-o"></span> Export to Excel</button>
                <?php endif; ?>  
                  </form>
        
      </div>
      <br>
       <?php if($search__count ?? '' != 0): ?>
       <strong>Search Records Found :  <?php echo e($search__count ?? ''); ?></strong>
       <?php endif; ?>
   </div>
   
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered example2" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>Serial No</th>
                  <th><?php echo e(__('sentence.Patient')); ?></th>
                  <th><?php echo e(__('Doctor')); ?></th>
                  <th><?php echo e(__('sentence.Date')); ?></th>
                  <th><?php echo e(__('sentence.Amount')); ?></th>
                  <th><?php echo e(__('sentence.Status')); ?></th>
                  <th class='remove'><?php echo e(__('sentence.Actions')); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($invoice->id); ?></td>
                  <td><a href="<?php echo e(url('patient/view/'.$invoice->user_id)); ?>"> <?php echo e($invoice->User->name); ?> </a></td>
                  <td>
                     <?php echo e($invoice-> doctors -> name); ?></td>
                  <td><?php echo e($invoice->created_at->format('d M Y')); ?></td>
                  <td> <?php echo e($invoice->Items->sum('invoice_amount')); ?> </td>
                  <td>
                     <?php if($invoice->payment_status == 'Unpaid'): ?>
                     <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                     <i class="fas fa-hourglass-start"></i>
                     </span>
                     <span class="text"><?php echo e(__('sentence.Unpaid')); ?></span>
                     </a>
                     <?php elseif($invoice->payment_status == 'Paid'): ?>
                     <a href="#" class="btn btn-success btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                     <i class="fas fa-check"></i>
                     </span>
                     <span class="text"><?php echo e(__('sentence.Paid')); ?></span>
                     </a>
                     <?php else: ?>
                     <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                     <span class="icon text-white-50">
                     <i class="fas fa-user-times"></i>
                     </span>
                     <span class="text"><?php echo e(__('sentence.Cancelled')); ?></span>
                     </a>
                     <?php endif; ?>
                  </td>
                  <td>
                     <a href="<?php echo e(url('billing/view/'.$invoice->id)); ?>" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                     <!-- <a href="<?php echo e(url('billing/pdf/'.$invoice->id)); ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a> -->
                     <a href="<?php echo e(url('billing/delete/'.$invoice->id)); ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('public/js/table2excel.js')); ?>" type="text/javascript"></script> 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hp\laravel8\laserspine\resources\views/billing/all.blade.php ENDPATH**/ ?>