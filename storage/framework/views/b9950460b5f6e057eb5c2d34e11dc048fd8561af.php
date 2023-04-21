<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Laser Clinic - <?php echo e(__('sentence.View Invoice')); ?> </title>
     
      
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

@media  print {
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
                 <!--<img src="<?php echo e(asset('front/img/finvoices.jpeg')); ?>" width="100%">-->
                <header>
                <div class="row">
                    
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
                     
                     <tr>
                        <td colspan="2"><strong><?php echo e(__('sentence.Total')); ?></strong></td>
                        <td align="center"><strong><?php echo e($billing_items->sum('invoice_amount') + ($billing_items->sum('invoice_amount') * App\Setting::get_option('vat')/100)); ?>  <?php echo e(App\Setting::get_option('currency')); ?></strong></td>
                     </tr>
                     <?php endif; ?>
                  </table>
    

                
            </main>
            <footer>
               <?php echo clean(App\Setting::get_option('footer_right')); ?>

            
                <img src="<?php echo e(asset('front/img/finvoice.jpeg')); ?>" width="100%">
            </footer>
      </div></div>
      </div>
   </body>
</html>

<?php /**PATH /home/u218248846/domains/laserclinicpatna.com/public_html/resources/views/billing/pdf_view.blade.php ENDPATH**/ ?>