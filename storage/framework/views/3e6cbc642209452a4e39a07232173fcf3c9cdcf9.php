<?php $__env->startSection('title'); ?>
<?php echo e($patient->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center">
      <div class="col">
        <div class="card shadow mb-4">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <center><img src="<?php echo e(asset('img/patient-icon.png')); ?>" class="img-profile rounded-circle img-fluid"></center>
                       <h4 class="text-center"><b><?php echo e($patient->name); ?></b></h4>
                            <hr>
                            <?php if(isset($patient->Patient->birthday)): ?>
                            <p><b><?php echo e(__('sentence.Age')); ?> :</b> <?php echo e($patient->Patient->birthday); ?> (<?php echo e(\Carbon\Carbon::parse($patient->Patient->birthday)->age); ?> Years)</p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->gender)): ?>
                            <p><b><?php echo e(__('sentence.Gender')); ?> :</b> <?php echo e(__('sentence.'.$patient->Patient->gender)); ?></p> 
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->phone)): ?>
                            <p><b><?php echo e(__('sentence.Phone')); ?> :</b> <?php echo e($patient->Patient->phone); ?></p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->adress)): ?>
                            <p><b><?php echo e(__('sentence.Address')); ?> :</b> <?php echo e($patient->Patient->adress); ?></p>
                            <?php endif; ?>
                    </div>
                    <div class="col-md-8 col-sm-6">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="Profile" aria-selected="true"><?php echo e(__('sentence.Medical Info')); ?></a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="appointements-tab" data-toggle="tab" href="#appointements" role="tab" aria-controls="appointements" aria-selected="false"><?php echo e(__('sentence.Appointment List')); ?></a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="prescriptions-tab" data-toggle="tab" href="#prescriptions" role="tab" aria-controls="prescriptions" aria-selected="false"><?php echo e(__('sentence.Prescription List')); ?></a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="Billing-tab" data-toggle="tab" href="#Billing" role="tab" aria-controls="Billing" aria-selected="false"><?php echo e(__('sentence.Billing')); ?></a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           
                           <div class="mt-4"></div>

                            <?php if(isset($patient->Patient->weight)): ?>
                            <p><b><?php echo e(__('sentence.Weight')); ?> :</b> <?php echo e($patient->Patient->weight); ?> Kg</p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->height)): ?>
                            <p><b><?php echo e(__('sentence.Height')); ?> :</b> <?php echo e($patient->Patient->height); ?> cm</p>
                            <?php endif; ?>

                            <?php if(isset($patient->Patient->blood)): ?>
                            <p><b><?php echo e(__('sentence.Blood Group')); ?> :</b> <?php echo e($patient->Patient->blood); ?></p>
                            <?php endif; ?>

                          
                        </div>
                        <div class="tab-pane fade" id="appointements" role="tabpanel" aria-labelledby="appointements-tab">
                          <table class="table">
                            <tr>
                              <td align="center">Id</td>
                              <td align="center"><?php echo e(__('sentence.Date')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Time Slot')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Status')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Actions')); ?></td>
                            </tr>
                            <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td align="center"><?php echo e($appointment->id); ?> </td>
                              <td align="center"><?php echo e($appointment->date->format('d M Y')); ?> </td>
                              <td align="center"><?php echo e($appointment->time_start); ?> - <?php echo e($appointment->time_end); ?> </td>
                               <td class="text-center">
                                <?php if($appointment->visited == 0): ?>
                                <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-hourglass-start"></i>
                                  </span>
                                  <span class="text"><?php echo e(__('sentence.Not Yet Visited')); ?></span>
                                </a>
                                <?php elseif($appointment->visited == 1): ?>
                                <a href="#" class="btn btn-success btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                  </span>
                                  <span class="text"><?php echo e(__('sentence.Visited')); ?></span>
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
                              <td align="center">
                                <a data-rdv_id="<?php echo e($appointment->id); ?>" data-rdv_date="<?php echo e($appointment->date->format('d M Y')); ?>" data-rdv_time_start="<?php echo e($appointment->time_start); ?>" data-rdv_time_end="<?php echo e($appointment->time_end); ?>" data-patient_name="<?php echo e($appointment->User->name); ?>" class="btn btn-success btn-circle btn-sm text-white" data-toggle="modal" data-target="#EDITRDVModal"><i class="fas fa-check"></i></a>
                                <a href="<?php echo e(url('appointment/delete/'.$appointment->id)); ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                              <td colspan="5" align="center"><?php echo e(__('sentence.No appointment available')); ?></td>
                            </tr>
                            <?php endif; ?>
                          </table>
                        </div>

                        <div class="tab-pane fade" id="prescriptions" role="tabpanel" aria-labelledby="prescriptions-tab">
                          <table class="table">
                            <tr>
                              <td align="center"><?php echo e(__('sentence.Reference')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Date')); ?></td>
                              <td align="center"><?php echo e(__('sentence.Actions')); ?></td>
                            </tr>
                            <?php $__empty_1 = true; $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td align="center"><?php echo e($prescription->reference); ?> </td>
                              <td align="center"><?php echo e($prescription->created_at); ?> </td>
                              <td align="center">
                                <a href="<?php echo e(url('prescription/view/'.$prescription->id)); ?>" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(url('prescription/pdf/'.$prescription->id)); ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a>
                                <a href="<?php echo e(url('prescription/delete/'.$prescription->id)); ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                              <td colspan="3" align="center"><?php echo e(__('sentence.No prescription available')); ?></td>
                            </tr>
                            <?php endif; ?>
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
                            <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td><?php echo e($invoice->reference); ?></td>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                            </tr>
                              <td colspan="6" align="center"><?php echo e(__('sentence.No Invoices Available')); ?></td>
                            <?php endif; ?>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/patient/view.blade.php ENDPATH**/ ?>