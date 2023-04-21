<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.Create Invoice')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <form method="post" action="<?php echo e(route('billing.store')); ?>">
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
                  
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Informations')); ?></h6>
                </div>
                <div class="card-body">
                 
                      <div class="form-group">
                        <label for="drug"><?php echo e(__('sentence.Select Patient')); ?></label>
                       <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1" name="patient_id" aria-hidden="true">
                                      <option></option>
                                      <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                        <?php echo e(csrf_field()); ?>

                      </div>
                      <div class="form-group">
                        <label for="PaymentMode"><?php echo e(__('sentence.Payment Mode')); ?></label>
                        <select class="form-control" name="payment_mode" id="PaymentMode">
                          <option value="Cash"><?php echo e(__('sentence.Cash')); ?></option>
                          <option value="Cheque"><?php echo e(__('sentence.Cheque')); ?></option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="PaymentMode"><?php echo e(__('sentence.Payment Status')); ?></label>
                        <select class="form-control" name="payment_status">
                          <option value="Paid"><?php echo e(__('sentence.Paid')); ?></option>
                          <option value="Unpaid"><?php echo e(__('sentence.Unpaid')); ?></option>
                        </select>
                      </div>
                       <div class="form-group">
                                  <input type="submit" value="<?php echo e(__('sentence.Create Invoice')); ?>" class="btn btn-warning" align="center">
                        </div>
                     
                </div>
              </div>
            
        </div>
        <div class="col-md-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('sentence.Invoice Details')); ?></h6>
                </div>
                <div class="card-body">


                            <fieldset class="todos_labels">

                              <div class="repeatable"></div>

                              <div class="form-group">
                                <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> <?php echo e(__('sentence.Add More')); ?></a>
                              </div>

                            </fieldset>

                </div>
              </div>
            
        </div>

    </div>

  </form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

      <script type="text/template" id="todos_labels">
      <div class="field-group row">
       <div class="col">
          <div class="form-group-custom">
             <input type="text" id="strength" name="invoice_title[]"  class="form-control" placeholder="<?php echo e(__('sentence.Invoice Title')); ?>">
          </div>
       </div>
       <div class="col">
          <div class="input-group mb-3">
             <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
             </div>
             <input type="text" class="form-control" placeholder="<?php echo e(__('sentence.Amount')); ?>" aria-label="Amount" aria-describedby="basic-addon1" name="invoice_amount[]">
          </div>
       </div>
       <div class="col-md-3">
          <a type="button" class="btn btn-danger  text-white span-2 delete"><i class="fa fa-times-circle"></i> <?php echo e(__('sentence.Remove')); ?></a>
       </div>
    </div>
    </script>

    <script>
    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/billing/create.blade.php ENDPATH**/ ?>