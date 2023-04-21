<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.All Patients')); ?>

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
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2"><?php echo e(__('sentence.All Patients')); ?></h6>
                </div>
                <div class="col-4">
                  <a href="<?php echo e(route('patient.create')); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> <?php echo e(__('sentence.New Patient')); ?></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th><?php echo e(__('sentence.Patient Name')); ?></th>
                      <th class="text-center"><?php echo e(__('sentence.Phone')); ?></th>
                      <th class="text-center"><?php echo e(__('sentence.Blood Group')); ?></th>
                      <th class="text-center"><?php echo e(__('sentence.Date')); ?></th>
                      <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($patient->id); ?></td>
                      <td><a href="<?php echo e(url('patient/view/'.$patient->id)); ?>"> <?php echo e($patient->name); ?> </a></td>
                      <td class="text-center"> <?php echo e($patient->Patient->phone); ?> </td>
                      <td class="text-center"> <?php echo e($patient->Patient->blood); ?> </td>
                      <td class="text-center"><?php echo e($patient->created_at->format('d M Y H:i')); ?></td>
                      <td class="text-center">
                        <a href="<?php echo e(url('patient/view/'.$patient->id)); ?>" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(url('patient/edit/'.$patient->id)); ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/patient/all.blade.php ENDPATH**/ ?>