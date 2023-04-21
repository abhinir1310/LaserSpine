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
                
                <div class="card-body">

                  <!-- ROW : Doctor informations -->
                  <div class="row">
                    <div class="col">
                      <?php echo clean(App\Setting::get_option('header_left')); ?>

                    </div>
                    <div class="col-md-3">
                      <p><b><?php echo e(__('sentence.Date')); ?> :</b> <?php echo e($billing->created_at->format('d-m-Y')); ?><br>
                        <b><?php echo e(__('sentence.Reference')); ?> :</b> <?php echo e($billing->reference); ?><br>
                        <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($billing->User->name); ?>

                      </p>
                    </div>
                  </div>
                  <!-- END ROW : Doctor informations -->

                

                  <!-- ROW : Drugs List -->
                  <div class="row justify-content-center">
                    <div class="col">
                      <h5 class="text-center"><b><?php echo e(__('sentence.Invoice')); ?></b></h5>
                      <br><br>
                      <table class="table">
                        <tr>
                          <td width="10%">#</td>
                          <td width="60%"><?php echo e(__('sentence.Item')); ?></td>
                          <td width="30%" align="center"><?php echo e(__('sentence.Amount')); ?></td>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $billing_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $billing_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                          <td><?php echo e($key+1); ?></td>
                          <td><?php echo e($billing_item->invoice_title); ?></td>
                          <td align="center"><?php echo e($billing_item->invoice_amount); ?> <?php echo e(App\Setting::get_option('currency')); ?></td>
                        </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                         <tr>
                           <td colspan="3"><?php echo e(__('sentence.Empty Invoice')); ?></td>
                         </tr>
                      <?php endif; ?>
                      <?php if(empty(!$billing_item)): ?>
                      <?php if(App\Setting::get_option('vat') > 0): ?>
                      <tr>
                        <td colspan="2"><strong><?php echo e(__('sentence.Sub-Total')); ?></strong></td>
                        <td align="center"><strong><?php echo e($billing_items->sum('invoice_amount')); ?>  <?php echo e(App\Setting::get_option('currency')); ?></strong></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong><?php echo e(__('sentence.VAT')); ?></strong></td>
                        <td align="center"><strong> <?php echo e(App\Setting::get_option('vat')); ?>%</strong></td>
                      </tr>
                      <?php endif; ?>
                      <tr>
                        <td colspan="2"><strong><?php echo e(__('sentence.Total')); ?></strong></td>
                        <td align="center"><strong><?php echo e($billing_items->sum('invoice_amount') + ($billing_items->sum('invoice_amount') * App\Setting::get_option('vat')/100)); ?>  <?php echo e(App\Setting::get_option('currency')); ?></strong></td>
                      </tr>
                      <?php endif; ?>
                      </table>
                      <hr>
                    </div>
                  </div>

                   <!-- ROW : Drugs List -->
                  <div class="row justify-content-center">
                    <div class="col">
                      
                    
                      <hr>
                    </div>
                  </div>

                  <!-- END ROW : Drugs List -->
                  <!-- ROW : Footer informations -->
                  <div class="row">
                    <div class="col">
                      <p><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
                    </div>
                    <div class="col">
                      <p class="float-right"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
                    </div>
                  </div>
                  <!-- END ROW : Footer informations -->

                </div>
              </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/billing/view.blade.php ENDPATH**/ ?>