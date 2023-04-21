
<?php $__env->startSection('title','Laser Clinic - Centre for Minimally Invasive Spine Surgery - Contact Us'); ?>
<?php $__env->startSection('content'); ?>

	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/2.jpg);">
    	<div class="auto-container">
        	<h2>Contact</h2>
        </div>
    </section>
    
    <!--Breadcrumb-->
    <div class="breadcrumb-outer">
    	<div class="auto-container">
        	<ul class="bread-crumb text-center">
            	<li><a href="index-2.html">Home</a> <span class="fa fa-angle-right"></span></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
    <!--End Page Title-->
	
	<!--Contact Location Section-->
    <section class="contact-location-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                
                 <!--Column-->
                <div class="info-column col-lg-12 col-md-6 col-sm-12">
                	<div class="column-inner">
                	    <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
                    
                        <h3>Laser Clinic - excellence centre for spine surgery</h3>
                       
                        <div class="text">We care for our patients <br> so feel free to contact us.</div>
                        <ul>
                            <li>Support : +919004549623</li>
                            <li><a href="mailto:drlaserspine@gmail.com?subject=contact-us">Email : drlaserspine@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Contact Location Section-->
	
	<!--Contact Section-->
    <section class="contact-page-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
               <!--Map Column-->
                <div class="map-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner-column">
                    	<!--Map Canvas-->
                        <div class="sec-title">
						   <h2>Online appointment available</h2>
						</div>
						<p><b>Appointment-LASER Clinic --Mumbai/Patna</b></p>
						
						<a href="https://api.whatsapp.com/send/?phone=919004549623&text&app_absent=0" class="theme-btn btn-style-one" target="_blank"><i id="icn1" class="fa fa-whatsapp" aria-hidden="true"></i> Message us on WhatsApp</a>
                    </div>
                </div>
               
                <!--Form Column-->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner-column">
                    	<!--Sec Title-->
                       	<div class="sec-title">
						   <h2>Contact us</h2>
						</div>
						<p><b>Feel free to reach out us. Our dedicated team will help you out with all the queries.</b></p>
                        <!--Contact Form-->
                        <div class="contact-form">
                            <form method="post" id="contact-form">
                                <?php echo csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="" placeholder="Your name" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="email" value="" placeholder="Your email address" required>
                                    </div>
                                    
                                  
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="subject" value="" placeholder="Subject" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="messages" placeholder="Type your massage here..."></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="theme-btn btn-style-one">Submit now</button>
                                    </div>                                        
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form-->
						<h3>OUR SOCIALS LINKS</h3>
						<div class="print">Print this page to PDF for the complete set of vectors.</div>
                   		<ul class="social-icon-one">
							<li><a href="https://www.facebook.com/www.laserspine.in/"><span class="fa fa-facebook-f"></span></a></li>
							<li><a href="https://twitter.com/dr_ayush"><span class="fa fa-twitter"></span></a></li>
							<li><a href="https://www.linkedin.com/in/dr-ayush-sharma-aa653634/"><span class="fa fa-linkedin"></span></a></li>
							<li><a href="https://www.instagram.com/laserspineindia/"><span class="fa fa-instagram"></span></a></li>
						</ul>
                    </div>
                </div>
                
			</div>
        </div>
    </section>
    <!--End Faq Section-->
<?php $__env->stopSection(); ?>    
	
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel8\laserspine\resources\views/front/contact_us.blade.php ENDPATH**/ ?>