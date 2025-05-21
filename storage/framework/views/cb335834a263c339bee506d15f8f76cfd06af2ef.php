

<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(URL::asset('plugins/tippy/scale-extreme.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/tippy/material.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"> <?php echo e(__('SEO Manager')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-globe mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Management')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('SEO Manager')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>					
	<div class="row justify-content-center">
		<div class="col-lg-5 col-md-8 col-sm-12">
			<div class="card overflow-hidden border-0 p-3">
				<div class="card-body">
				
					<form action="<?php echo e(route('admin.settings.seo.store')); ?>" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="row">

							<div class="col-sm-12">									
								<div class="card shadow-0 mb-6">							
									<div class="card-body">
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('SEO for Main Landing Page')); ?></h6>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Landing Page Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="home_title" value="<?php echo e($metadata->home_title); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Landing Page Author')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="home_author" value="<?php echo e($metadata->home_author); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Landing Page Canonical URL')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="home_url" value="<?php echo e($metadata->home_url); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Landing Page Keywords')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="home_keywords" value="<?php echo e($metadata->home_keywords); ?>">
													</div> 
												</div> 
											</div>
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Landing Page Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="home_description" value="<?php echo e($metadata->home_description); ?>">
													</div> 
												</div> 
											</div>					
										</div>	
									</div>
								</div>
							</div>

							<div class="col-sm-12">									
								<div class="card shadow-0 mb-6">							
									<div class="card-body">
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('SEO for Login Page')); ?></h6>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Login Page Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="login_title" value="<?php echo e($metadata->login_title); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Login Page Author')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="login_author" value="<?php echo e($metadata->login_author); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Login Page Canonical URL')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="login_url" value="<?php echo e($metadata->login_url); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Login Page Keywords')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="login_keywords" value="<?php echo e($metadata->login_keywords); ?>">
													</div> 
												</div> 
											</div>
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Login Page Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="login_description" value="<?php echo e($metadata->login_description); ?>">
													</div> 
												</div> 
											</div>							
										</div>	
									</div>
								</div>
							</div>

							<div class="col-sm-12">									
								<div class="card shadow-0 mb-6">							
									<div class="card-body">
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('SEO for Registration Page')); ?></h6>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Register Page Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="register_title" value="<?php echo e($metadata->register_title); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Register Page Author')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="register_author" value="<?php echo e($metadata->register_author); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Register Page Canonical URL')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="register_url" value="<?php echo e($metadata->register_url); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Register Page Keywords')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="register_keywords" value="<?php echo e($metadata->register_keywords); ?>">
													</div> 
												</div> 
											</div>
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Register Page Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="register_description" value="<?php echo e($metadata->register_description); ?>">
													</div> 
												</div> 
											</div>							
										</div>	
									</div>
								</div>
							</div>

							<div class="col-sm-12">									
								<div class="card shadow-0 mb-6">							
									<div class="card-body">
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('SEO for Dashboard')); ?></h6>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Dashboard Author')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="dashboard_author" value="<?php echo e($metadata->dashboard_author); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Dashboard Keywords')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="dashboard_keywords" value="<?php echo e($metadata->dashboard_keywords); ?>">
													</div> 
												</div> 
											</div>
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Dashboard Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="dashboard_description" value="<?php echo e($metadata->dashboard_description); ?>">
													</div> 
												</div> 
											</div>							
										</div>	
									</div>
								</div>
							</div>
							

						</div>

						
						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<button type="submit" class="btn btn-primary ripple pl-8 pr-8"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>

				</div>
			</div>
		</div>
	</div>	
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/frontend/seo/index.blade.php ENDPATH**/ ?>