
<?php $__env->startSection('title','Laser Clinic - Centre for Minimally Invasive Spine Surgery - Spine Services'); ?>
<?php $__env->startSection('content'); ?>

	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/1.jpg);">
    	<div class="auto-container">
        	<h2>About Us</h2>
        </div>
    </section>
    
    <!--Breadcrumb-->
    <div class="breadcrumb-outer">
    	<div class="auto-container">
        	<ul class="bread-crumb text-center">
            	<li><a href="<?php echo e(route('front')); ?>">Home</a> <span class="fa fa-angle-right"></span></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    
    <!--About Section-->
	<section class="about-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!--Content Column-->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>About Us</h2>
						</div>
						<div class="text">
							<p>Laser Clinic - Laser Spine is dedicated to providing you the best scientific solution to your spine problem. Our Moto is <b>"Less is More"</b> meaning providing minimally invasive maximum intervention spine solution.We recommend the use of Key-Hole spine surgical technique. Vist (www.laserspine.in) to know more.</p>
							<p>Laser skin clinic - For advance Skin,Nail & Hair treatment and Advance Paediatric & Neuropsychiatric clinic for Paediatric and Neuropsychiatric care.</p>
						</div>
						<ul class="list-style-one">
							<li>www.laserspine.in</li>
							<li>090045 49623</li>
							<li>drlaserspine@gmail.com</li>
						</ul>
					</div>
				</div>
				
				<!--Video Column-->
				<div class="video-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						
						<!--Video Box-->
                        <div class="video-box">
                            <figure class="image">
                                <img src="<?php echo e(asset('front/img/172044344.jpg')); ?>" alt="">
                            </figure>
                        </div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--End About Section-->
	
	<!--Fluid Section One-->
    <section class="fluid-section-one">
    	<div class="outer-container clearfix">
        	
            <!--Image Column-->
            <div class="image-column" style="background-image:url(<?php echo e(asset('front/img/kjb234l.PNG')); ?>);">
            	<figure class="image-box"><img src="<?php echo e(asset('front/img/kjb234l.PNG')); ?>" alt=""></figure>
            </div>
            
        	<!--Content Column-->
            <div class="content-column">
            	<div class="inner-column">
					<h2>Why Choose Us</h2>
					<div class="text">We offer 24 hour services with modern well equipped modular operation theatres and ICU back up. We also provide diagnostic and imaging services includeing</div>
					<div class="row clearfix">
						<!--Column-->
						<div class="column col-lg-6 col-md-6 col-sm-12">
							<!--Featured Block-->
							<div class="featured-block">
								<div class="feature-inner">
									<h3>Ultrasonography</h3>
								</div>
							</div>
						</div>
						<!--Column-->
						<div class="column col-lg-6 col-md-6 col-sm-12">
							<!--Featured Block-->
							<div class="featured-block">
								<div class="feature-inner">
									
									<h3>EEG</h3>
								</div>
							</div>
						</div>
						<!--Column-->
						<div class="column col-lg-6 col-md-6 col-sm-12">
							<!--Featured Block-->
							<div class="featured-block">
								<div class="feature-inner">
									
									<h3>EMG</h3>
								</div>
							</div>
						</div>
						<!--Column-->
						<div class="column col-lg-6 col-md-6 col-sm-12">
							<!--Featured Block-->
							<div class="featured-block">
								<div class="feature-inner">
									
									<h3>NCV</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End Fluid Section One-->
	
	
	<!--Subscribe Style One-->
    <section class="subscribe-style-one">
    	<div class="auto-container">
        	<div class="row clearfix">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <h2>Newsletter Subscribe</h2>
                    <div class="text">Sign up today for hints, tips and the latest Updates.</div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <form method="post" action="#">
                        <div class="form-group clearfix">
                            <input type="email" name="email" value="" placeholder="Enter Email Address" required>
                            <button type="submit" class="theme-btn btn-style-one">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!--End Subscribe Style One-->
<?php $__env->stopSection(); ?>	

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u218248846/domains/laserclinicpatna.com/public_html/resources/views/front/about.blade.php ENDPATH**/ ?>