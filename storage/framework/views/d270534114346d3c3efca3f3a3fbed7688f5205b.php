<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.View billing')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col">
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
   </div>
</div>
<div class="row justify-content-center">
   <div class="col">
      <div class="card shadow mb-4">
           <img src="<?php echo e(asset('front/img/b_logo.png')); ?>" width="100%" height="150px">
         <div class="card-body" id="main_section">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="">
                  <?php echo clean(App\Setting::get_option('header_left')); ?>

               </div>
              
               <div class="col-md-4">
                    <h4 class="name">
                            <a target="_blank" href="https://lobianijs.com" style="font-size: 18px;">
                            <?php echo e($doctor->name); ?>

                            </a>
                    </h4>
                  <b style="font-size: 16px;"><?php echo e($doctor->speciality); ?></b><br>
               </div>
        
                <div class="col">
               <div class="col-md-5" style="float:right">
                <p style="font-size: 18px;">
                <b>Patient Id :</b><?php echo e($billing->id); ?><br>
                <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($billing->User->name); ?><br>
                <b><?php echo e(__('sentence.Age')); ?> :</b> <?php echo e($billing->User->Patient->birthday); ?><br>
                <b><?php echo e(__('sentence.Gender')); ?> :</b> <?php echo e($billing->User->Patient->gender); ?><br>
                <b><?php echo e(__('sentence.Date')); ?> :</b> <?php echo e($billing->created_at->format('d-m-Y')); ?><br>
                <b><?php echo e(__('sentence.Reference')); ?> :</b> <?php echo e($billing->reference); ?><br></p>
               </div>
               </div>
            </div>
            <!-- END ROW : Doctor informations -->
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  <h5 class="text-center"><b><?php echo e(__('sentence.Invoice')); ?></b></h5>
                  <table class="table" border="2">
                     <tr>
                        <td><b>Serial No</b></td>
                        <td><b>Services / Investigation</b></td>
                        <td><b>Services Charge</b></td>
                     </tr>
                     <?php $__empty_1 = true; $__currentLoopData = $billing_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $billing_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($billing_item->invoice_title); ?></td>
                        <td><i class="fa fa-inr" aria-hidden="true"></i><?php echo e($billing_item->invoice_amount); ?> <?php echo e(App\Setting::get_option('currency')); ?></td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                     <tr>
                        <td colspan="3"><?php echo e(__('sentence.Empty Invoice')); ?></td>
                     </tr>
                     <?php endif; ?>
                     <?php if(empty(!$billing_item)): ?>
                     <tr>
                         <td></td>
                         <td></td>
                        <td><strong>Total</strong> : <i class="fa fa-inr" aria-hidden="true"></i><?php echo e($billing_items->sum('invoice_amount')); ?>  <?php echo e(App\Setting::get_option('currency')); ?></td>
                     </tr>
                     
                     <!--<tr>-->
                     <!--   <td colspan="2"><strong><?php echo e(__('sentence.Total')); ?></strong></td>-->
                     <!--   <td align="center"><strong><?php echo e($billing_items->sum('invoice_amount') + ($billing_items->sum('invoice_amount') * App\Setting::get_option('vat')/100)); ?>  <?php echo e(App\Setting::get_option('currency')); ?></strong></td>-->
                     <!--</tr>-->
                     <?php endif; ?>
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
             
              

               <!--// <img src="<?php echo e(asset('front/img/fpic.PNG')); ?>" width="100%">-->
               <!--<div class="col">-->
               <!--   <p><?php echo clean(App\Setting::get_option('footer_left')); ?></p>-->
               <!--</div>-->
               <!--<div class="col">-->
               <!--   <p class="float-right"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>-->
               <!--</div>-->
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u218248846/domains/laserclinicpatna.com/public_html/resources/views/billing/view.blade.php ENDPATH**/ ?>