<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Doctorino - <?php echo e(__('sentence.View Invoice')); ?> 
      </title>
      <!-- Custom styles for this template-->
      
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
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
            <div class="toolbar hidden-print">
                
                <hr>
            </div>
            <div class="invoice overflow-auto">
            <div>
                <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="<?php echo e(asset('front/logo.jpeg')); ?>" data-holder-rendered="true" width="200px;">
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            Laser Clinic
                            </a>
                        </h2>
                        <div>
                            Sofitel Apartment, First Floor,<br> Haroon
Colony Sector -|| <br>Phulwari Sharif,
Patna <br> Bihar 801505</div>
                        <div>+91 9709764619</div>
                        <div>Drlaserspine@gmail.Com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    
                    <div class="col invoice-details">
                        <h4 class="invoice-id">INVOICE TO : <?php echo e($billing->User->name); ?></h4>
                        <div class="date">Date of Invoice: <?php echo e($billing->created_at->format('d-m-Y')); ?></div>
                        <div class="date"><?php echo e(__('sentence.Reference')); ?> : <?php echo e($billing->reference); ?></div>
                    </div>
                </div>
                <div class="col-md-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th  width="20%">#</th>
                            <th  width="40%"><?php echo e(__('sentence.Item')); ?></th>
                            <th  width="80%"><?php echo e(__('sentence.Amount')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $billing_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $billing_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="no"><?php echo e($key+1); ?></td>
                            <td class="text-left">
                                <?php echo e($billing_item->invoice_title); ?>

                            </td>
                            <td class="total"><?php echo e($billing_item->invoice_amount); ?> <?php echo e(App\Setting::get_option('currency')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                             <td colspan="3"><?php echo e(__('sentence.Empty Invoice')); ?></td>
                          </tr>
                          <?php endif; ?>
                          
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td><?php echo e($billing_items->sum('invoice_amount')); ?>  <?php echo e(App\Setting::get_option('currency')); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"><?php echo e(__('sentence.VAT')); ?></td>
                            <td> <?php echo e(App\Setting::get_option('vat')); ?>%</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?php echo e($billing_items->sum('invoice_amount') + ($billing_items->sum('invoice_amount') * App\Setting::get_option('vat')/100)); ?>  <?php echo e(App\Setting::get_option('currency')); ?><</td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <div class="thanks">Thank you!</div>
                
            </main>
            <footer>
               <?php echo clean(App\Setting::get_option('footer_right')); ?>

            </footer>
      
      
      </div></div>
      </div>
   </body>
</html><?php /**PATH /home/u218248846/domains/onestopneeds.com/public_html/sanjivani/resources/views/billing/pdf_view.blade.php ENDPATH**/ ?>