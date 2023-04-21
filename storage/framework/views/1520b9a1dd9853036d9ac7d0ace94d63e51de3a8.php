<?php $__env->startSection('title'); ?>
<?php echo e($doctor->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center">
      <div class="col">
        <div class="card shadow mb-4">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <center><img src="<?php echo e(asset('img/patient-icon.png')); ?>" class="img-profile rounded-circle img-fluid"></center>
                       <h4 class="text-center"><b><?php echo e($doctor->name); ?></b></h4>
                            <hr>
                            <?php if(isset($doctor->email)): ?>
                            <p><b><?php echo e(__('Email')); ?> :</b> <?php echo e($doctor->email); ?> </p>
                            <?php endif; ?>

                            <?php if(isset($doctor->gender)): ?>
                            <p><b><?php echo e(__('Gender')); ?> :</b> <?php echo e(__($doctor->gender)); ?></p> 
                            <?php endif; ?>

                            <?php if(isset($doctor->phone)): ?>
                            <p><b><?php echo e(__('Phone')); ?> :</b> <?php echo e($doctor->phone); ?></p>
                            <?php endif; ?>

                            <?php if(isset($doctor->age)): ?>
                            <p><b><?php echo e(__('Age')); ?> :</b> <?php echo e($doctor->age); ?></p>
                            <?php endif; ?>
                    </div>
                    <div class="col-md-8 col-sm-6">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="Profile" aria-selected="true"><?php echo e(__('sentence.Medical Info')); ?></a>
                        </li>
                        
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           
                           <div class="mt-4"></div>

                            <?php if(isset($doctor->designation)): ?>
                            <p><b><?php echo e(__('Designation')); ?> :</b> <?php echo e($doctor->designation); ?> </p>
                            <?php endif; ?>
                            
                            <?php if(isset($doctor->speciality)): ?>
                            <p><b><?php echo e(__('Speciality')); ?> :</b> <?php echo e($doctor->speciality); ?> </p>
                            <?php endif; ?>
                            
                            <?php if(isset($doctor->experience)): ?>
                            <p><b><?php echo e(__('Experience')); ?> :</b> <?php echo e($doctor->experience); ?> </p>
                            <?php endif; ?>

                            <?php if(isset($doctor->details)): ?>
                            <p><b><?php echo e(__('Details')); ?> :</b> <?php echo e($doctor->details); ?> cm</p>
                            <?php endif; ?>

                            <?php if(isset($doctor->created_at)): ?>
                            <p><b><?php echo e(__('Created At')); ?> :</b> <?php echo e($doctor->created_at); ?></p>
                            <?php endif; ?>

                          
                        </div>
                        

                        <div class="tab-pane fade" id="prescriptions" role="tabpanel" aria-labelledby="prescriptions-tab">
                          <table class="table">
                            <tr>
                              <td align="center"><?php echo e(__('sentence.Reference')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Date')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Actions')); ?></td>
                            </tr>
                            
                          </table>
                        </div>
                        <div class="tab-pane fade" id="Billing" role="tabpanel" aria-labelledby="Billing-tab">
                          <table class="table">
                            <tr>
                              <th><?php echo e(__('sentence.Reference')); ?></th>
                              <th><?php echo e(__('sentence.Date')); ?></th>
                              <th><?php echo e(__('sentence.Amount')); ?></th>
                              <th><?php echo e(__('sentence.Status')); ?></th>
                              <th><?php echo e(__('sentence.Actions')); ?></th>
                            </tr>
                            
                          </table>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
      </div>
    </div>

  <!-- Appointment Modal-->
  <div class="modal fade" id="EDITRDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('sentence.You are about to modify an appointment')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b><?php echo e(__('sentence.Patient')); ?> :</b> <span id="patient_name"></span></p>
          <p><b><?php echo e(__('sentence.Date')); ?> :</b> <span id="rdv_date"></span></p>
          <p><b><?php echo e(__('sentence.Time Slot')); ?> :</b> <span id="rdv_time"></span></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo e(__('sentence.Close')); ?></button>
          <a class="btn btn-primary text-white" onclick="event.preventDefault(); document.getElementById('rdv-form-confirm').submit();"><?php echo e(__('sentence.Confirm Appointment')); ?></a>
                                                     <form id="rdv-form-confirm" action="<?php echo e(route('appointment.store_edit')); ?>" method="POST" class="d-none">
                                                      <input type="hidden" name="rdv_id" id="rdv_id">
                                                      <input type="hidden" name="rdv_status" value="1">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
          <a class="btn btn-primary text-white" onclick="event.preventDefault(); document.getElementById('rdv-form-cancel').submit();"><?php echo e(__('sentence.Cancel Appointment')); ?></a>
                                                     <form id="rdv-form-cancel" action="<?php echo e(route('appointment.store_edit')); ?>" method="POST" class="d-none">
                                                      <input type="hidden" name="rdv_id" id="rdv_id2">
                                                      <input type="hidden" name="rdv_status" value="2">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u218248846/domains/onestopneeds.com/public_html/sanjivani/resources/views/doctor/view.blade.php ENDPATH**/ ?>