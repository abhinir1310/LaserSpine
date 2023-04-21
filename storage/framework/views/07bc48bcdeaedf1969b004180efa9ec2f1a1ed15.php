<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.Edit Patient')); ?>

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
                  

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Edit Doctor')); ?></h6>
                </div>
                <div class="card-body">
                 <form method="post" action="<?php echo e(route('doctor.store_edit')); ?>">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Full Name')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo e($doctor->name); ?>">
                        <input type="hidden" class="form-control" id="inputEmail3" name="user_id" value="<?php echo e($doctor->id); ?>">
                        <?php echo e(csrf_field()); ?>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Email Adress')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo e($doctor->email); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('Age')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="age" name="age" autocomplete="off" value="<?php echo e($doctor->age); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Phone')); ?></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="phone" value="<?php echo e($doctor->phone); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Gender')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender">
                            
                            
                            
                          <option value="Male" <?php echo e($doctor->gender == 'Male' ? "selected" : ""); ?>><?php echo e(__('sentence.Male')); ?></option>
                          <option value="Female" <?php echo e($doctor->gender == 'Female' ? "selected" : ""); ?>><?php echo e(__('sentence.Female')); ?></option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('Designation')); ?></label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="designation" name="designation" placeholder="Designation"><?php echo e($doctor->designation); ?></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('Speciality')); ?></label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="speciality" name="speciality" placeholder="Your Speciality"><?php echo e($doctor->speciality); ?></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('Details')); ?></label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="details" name="details" placeholder="Your professional career details"><?php echo e($doctor->details); ?></textarea>
                      </div>
                    </div>
                    
                     <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('Experience')); ?></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="experience" name="experience" value="<?php echo e($doctor->experience); ?>">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                  <label for="Sunday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('sentence.Sunday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Sunday" name="sunday_from" value="<?php echo e($doctor->sunday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Sunday" name="sunday_to" value="<?php echo e($doctor->sunday_to); ?>">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Monday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('sentence.Monday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Monday" name="monday_from" value="<?php echo e($doctor->monday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Monday" name="monday_to" value="<?php echo e($doctor->monday_to); ?>">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Tuesday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('sentence.Tuesday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Tuesday" name="tuesday_from" value="<?php echo e($doctor->tuesday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Tuesday" name="tuesday_to" value="<?php echo e($doctor->tuesday_to); ?>">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Wednseday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('sentence.Wednseday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Wednseday" name="wednesday_from" value="<?php echo e($doctor->wednesday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Wednseday" name="wednesday_to" value="<?php echo e($doctor->wednesday_to); ?>">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Thurday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('sentence.Thurday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Thurday" name="thursday_from" value="<?php echo e($doctor->thursday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Thurday" name="thursday_to" value="<?php echo e($doctor->thursday_to); ?>">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Friday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('sentence.Friday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Friday" name="friday_from" value="<?php echo e($doctor->friday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Friday" name="friday_to" value="<?php echo e($doctor->friday_to); ?>">
                  </div>
               </div> 
               
               <div class="form-group row">
                  <label for="Friday" class="col-sm-4 col-md-3 col-form-label"><?php echo e(__('Saturday')); ?></label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="saturday_from" name="saturday_from" value="<?php echo e($doctor->saturday_from); ?>">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="saturday_to" name="saturday_to" value="<?php echo e($doctor->saturday_to); ?>">
                  </div>
               </div> 
                    
        
                   
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('sentence.Save')); ?></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u218248846/domains/laserclinicpatna.com/public_html/resources/views/doctor/edit.blade.php ENDPATH**/ ?>