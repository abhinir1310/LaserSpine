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
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('billing.create')); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> <?php echo e(__('sentence.Create Invoice')); ?></a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>ID</th>
                  <th><?php echo e(__('sentence.Patient')); ?></th>
                  <th><?php echo e(__('sentence.Date')); ?></th>
                  <th><?php echo e(__('sentence.Amount')); ?></th>
                  <th><?php echo e(__('sentence.Status')); ?></th>
                  <th><?php echo e(__('sentence.Actions')); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($invoice->id); ?></td>
                  <td><a href="<?php echo e(url('patient/view/'.$invoice->user_id)); ?>"> <?php echo e($invoice->User->name); ?> </a></td>
                  <td><?php echo e($invoice->created_at->format('d M Y')); ?></td>
                  <td> <?php echo e($invoice->Items->sum('invoice_amount')); ?> <?php echo e(App\Setting::get_option('currency')); ?> </td>
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
                     <a href="<?php echo e(url('billing/pdf/'.$invoice->id)); ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/billing/all.blade.php ENDPATH**/ ?>