<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
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
<div class="row">
   <div class="col">
       <img src="<?php echo e(asset('front/img/finvoices.jpeg')); ?>" width="100%">
      <div class="card shadow mb-4">
         <div class="card-body">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="col">
                  <?php echo clean(App\Setting::get_option('header_left')); ?>

               </div>
               <div class="col-md-3">
                    <h4 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            <?php echo e($doctor->name); ?>

                            </a>
                    </h4>
                  <b><?php echo e($doctor->speciality); ?></b><br>
                    
                     <br>
                     
                   <strong><?php echo e(__('sentence.Patient Name')); ?> :</strong> <?php echo e($prescription->User->name); ?>

                      <?php if(isset($prescription->User->Patient->birthday)): ?>
                      <strong><?php echo e(__('sentence.Age')); ?> :</strong> <?php echo e($prescription->User->Patient->birthday); ?>

                      (<?php echo e(\Carbon\Carbon::parse($prescription->User->Patient->birthday)->age); ?> Years)
                    <?php endif; ?>
                    
                    
                  <p><strong>Date : </strong><?php echo e(__('sentence.On')); ?> <?php echo e($prescription->created_at->format('d-m-Y')); ?></p>
              
               </div>
               
                
                
            </div>
            <br><br>

            <!--<div class="row">
               <div class="col">
                  <hr>
                  <h3>Prescription Details</h3>
                  <ol>
                    
                    <?php if(isset($prescription->User->Patient->gender)): ?> 
                      <li><b><?php echo e(__('sentence.Gender')); ?> :</b> <?php echo e(__('sentence.'.$prescription->User->Patient->gender)); ?></li>
                    <?php endif; ?> 
                    
                    <?php if(isset($prescription->User->Patient->weight)): ?>
                      <li><b><?php echo e(__('sentence.Patient Weight')); ?> :</b> <?php echo e($prescription->User->Patient->weight); ?> Kg</li>
                    <?php endif; ?> 
                    
                    <?php if(isset($prescription->User->Patient->height)): ?>
                      <li><b><?php echo e(__('sentence.Patient Height')); ?> :</b> <?php echo e($prescription->User->Patient->height); ?></li>
                    <?php endif; ?> 
                  </ol>
                  
                  <hr>
               </div>
            </div>-->
            
            <h3>Drugs Details</h3>
            <div class="row justify-content-center">
               <div class="col">
                   <table class="table table-bordered">
                       <tr>
                           <th>Type</th>
                           <th>Trade name</th>
                           <th>Strength</th>
                           <th>Dose</th>
                           <th>Duration</th>
                           <th>Advice</th>
                       </tr>
                      
                        <?php $__empty_1 = true; $__currentLoopData = $prescription_drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                           <td><?php echo e($drug->type); ?></td>
                           <td><?php echo e($drug->Drug->trade_name); ?></td>
                           <td><?php echo e($drug->strength); ?></td>
                           <td><?php echo e($drug->dose); ?></td>
                           <td><?php echo e($drug->duration); ?></td>
                           <td><?php echo e($drug->drug_advice); ?></td>
                        </tr>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                       
                   </table>
                  <hr>
               </div>
            </div>
            <br>
            <h3><?php echo e(__('sentence.Test to do')); ?> </h3>
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                   
                   <table class="table table-bordered">
                       <tr>
                           <th>Name</th>
                           <th>Description</th>
                       </tr>
                       
                        <?php $__empty_1 = true; $__currentLoopData = $prescription_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                           <td><?php echo e($test->Test->test_name); ?></td></td>
                           <td><?php echo e($test->description ? $test->description : '-'); ?></td>
                        </tr>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                       
                   </table>
                   
                   
                  
                  <hr>
               </div>
            </div>
            <div class="row">
                    <img src="<?php echo e(asset('front/img/fdetails.PNG')); ?>" width="100%">
                   <!--<center><p style="color:green; font-size:22px;">Not Applicable for Medicolegal Purpose</p></center>-->
                   <!--<center><p style="color:#4e73df; font-size:22px;">Laser Clinic, Sofitel Apartment, First Floor, Haroon Colony Sector -||, Phulwari Sharif, Patna, Bihar 801505</p></center>-->
                   <!--<center><p style="color:#4e73df; font-size:22px;">Laser Clinic, Sri Ram Kunj  Apartment, East Boring Canal Road, Nageshwar Colony, Pandoi Kothi, Patna, Bihar 800001</p></center>-->
               
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
</body>
</html><?php /**PATH D:\Laravel8\laserspine\resources\views/prescription/pdf_view.blade.php ENDPATH**/ ?>