<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
<link href="<?php echo e(asset('front/css/bootstrap.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('front/css/style.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('front/css/slick.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('front/css/responsive.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('front/css/color-switcher-design.css')); ?>" rel="stylesheet">
<link id="theme-color-file" href="<?php echo e(asset('front/css/color-themes/default-theme.css')); ?>" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo e(asset('front/images/favicon.png')); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo e(asset('front/images/favicon.png')); ?>" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="hidden-bar-wrapper">
<div class="page-wrapper">
	<?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
	<?php echo $__env->yieldContent('content'); ?>
	
	<?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
<script src="<?php echo e(asset('front/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/jquery.fancybox.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/appear.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/owl.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/wow.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/validate.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/slick.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/script.js')); ?>"></script>
<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD39_Mb1wKUcuRD-0KPmQT6SQHhEMVX1O0"></script>
<script src="<?php echo e(asset('front/js/map-script.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/color-settings.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /home/u218248846/domains/laserclinicpatna.com/public_html/resources/views/layouts/front.blade.php ENDPATH**/ ?>