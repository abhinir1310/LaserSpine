<?php $__env->startSection('title'); ?>
<?php echo e(__('All Doctors')); ?>

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

   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">All Inquiry</h6>
                </div>
                <div class="col-4">
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th><?php echo e(__('Name')); ?></th>
                      <th class="text-center"><?php echo e(__('Email')); ?></th>
                      <th class="text-center">Subject</th>
                      <th class="text-center">Message</th>
                      <th class="text-center">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $inquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($val->id); ?></td>
                      <td class="text-center"><?php echo e($val->name); ?> </td>
                      
                      <td class="text-center"> <?php echo e($val->email); ?> </td>
                      <td class="text-center"> <?php echo e($val->subject); ?> </td>
                      <td class="text-center"> <?php echo e($val->messages); ?> </td>
                      <td class="text-center"><?php echo e($val->created_at->diffForHumans()); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel8\laserspine\resources\views/doctor/inquiry.blade.php ENDPATH**/ ?>