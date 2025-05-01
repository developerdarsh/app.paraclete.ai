

<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(URL::asset('plugins/tippy/scale-extreme.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/tippy/material.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"> <?php echo e(__('Frontend Section Settings')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Management')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Section Settings')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>					
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-10 col-sm-12">
			<div class="card overflow-hidden border-0 p-3">
				<div class="card-body">
				
					<form action="<?php echo e(route('admin.settings.section.store')); ?>" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="row">

							<div class="col-sm-12">									
								<div class="card shadow-0 mb-6">							
									<div class="card-body">
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Main Banner Section')); ?></h6>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Main Banner Pre Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="main_banner_pretitle" value="<?php echo e($frontend_sections->main_banner_pretitle); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Main Banner Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="main_banner_title" value="<?php echo e($frontend_sections->main_banner_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Main Banner Carousel Text')); ?> <i class="ml-2 fa fa-info info-notification" data-tippy-content="<?php echo e(__('Use comma seperated list like: Chatbots,Vision,Voiceovers')); ?>"></i></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="main_banner_carousel" value="<?php echo e($frontend_sections->main_banner_carousel); ?>">
													</div> 
												</div> 
											</div>
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Main Banner Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="main_banner_subtitle" value="<?php echo e($frontend_sections->main_banner_subtitle); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('How it Works Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="how_it_works" class="custom-switch-input" <?php if($frontend_sections->how_it_works_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('How it Works Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="how_it_works_title" value="<?php echo e($frontend_sections->how_it_works_title); ?>" autocomplete="off">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('How it Works Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="how_it_works_subtitle" value="<?php echo e($frontend_sections->how_it_works_subtitle); ?>" autocomplete="off">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('AI Tools Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="tools" class="custom-switch-input" <?php if($frontend_sections->tools_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('AI Tools Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="tools_title" value="<?php echo e($frontend_sections->tools_title); ?>" autocomplete="off">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('AI Tools Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="tools_subtitle" value="<?php echo e($frontend_sections->tools_subtitle); ?>" autocomplete="off">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Templates Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="templates" class="custom-switch-input" <?php if($frontend_sections->templates_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Templates Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="templates_title" value="<?php echo e($frontend_sections->templates_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Templates Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="templates_subtitle" value="<?php echo e($frontend_sections->templates_subtitle); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Features Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="features" class="custom-switch-input" <?php if($frontend_sections->features_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Features Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="features_title" value="<?php echo e($frontend_sections->features_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Features Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="features_subtitle" value="<?php echo e($frontend_sections->features_subtitle); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Features Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="features_description" value="<?php echo e($frontend_sections->features_description); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Pricing Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="pricing" class="custom-switch-input" <?php if($frontend_sections->pricing_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Pricing Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="pricing_title" value="<?php echo e($frontend_sections->pricing_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Pricing Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="pricing_subtitle" value="<?php echo e($frontend_sections->pricing_subtitle); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Pricing Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="pricing_description" value="<?php echo e($frontend_sections->pricing_description); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Reviews Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="reviews" class="custom-switch-input" <?php if($frontend_sections->reviews_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Reviews Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="reviews_title" value="<?php echo e($frontend_sections->reviews_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Reviews Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="reviews_subtitle" value="<?php echo e($frontend_sections->reviews_subtitle); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('FAQs Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="faq" class="custom-switch-input" <?php if($frontend_sections->faq_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('FAQs Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="faq_title" value="<?php echo e($frontend_sections->faq_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('FAQs Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="faq_subtitle" value="<?php echo e($frontend_sections->faq_subtitle); ?>">
													</div> 
												</div> 
											</div>	
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('FAQs Description')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="faq_description" value="<?php echo e($frontend_sections->faq_description); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Blogs Section')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="blog" class="custom-switch-input" <?php if($frontend_sections->blogs_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Blogs Main Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="blog_title" value="<?php echo e($frontend_sections->blogs_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Blogs Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="blog_subtitle" value="<?php echo e($frontend_sections->blogs_subtitle); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Info Banner')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="info" class="custom-switch-input" <?php if($frontend_sections->info_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Info Banner Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="info_title" value="<?php echo e($frontend_sections->info_title); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Images Banner')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="images" class="custom-switch-input" <?php if($frontend_sections->images_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box">								
													<h6><?php echo e(__('Images Banner Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="images_title" value="<?php echo e($frontend_sections->images_title); ?>">
													</div> 
												</div> 
											</div>		
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Images Banner Sub Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="images_subtitle" value="<?php echo e($frontend_sections->images_subtitle); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Clients Banner')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="clients" class="custom-switch-input" <?php if($frontend_sections->clients_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Info Banner Title')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="clients_title" value="<?php echo e($frontend_sections->clients_title); ?>">
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
		
										<h6 class="fs-12 font-weight-bold mb-4 plan-title-bar"><?php echo e(__('Contact Us Page')); ?></h6>
		
										<div class="form-group">
											<label class="custom-switch mb-4">
												<input type="checkbox" name="contact" class="custom-switch-input" <?php if($frontend_sections->contact_status): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
											</label>
										</div>
		
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Office Location Address')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="contact_location" value="<?php echo e($frontend_sections->contact_location); ?>">
													</div> 
												</div> 
											</div>							
										</div>	
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Email Address')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="contact_email" value="<?php echo e($frontend_sections->contact_email); ?>">
													</div> 
												</div> 
											</div>							
										</div>
										<div class="row">
											<div class="col-md-12 col-sm-12">													
												<div class="input-box mb-3">								
													<h6><?php echo e(__('Phone Address')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="contact_phone" value="<?php echo e($frontend_sections->contact_phone); ?>">
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
							<button type="submit" class="btn btn-primary ripple pl-7 pr-7"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>

				</div>
			</div>
		</div>
	</div>	
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/classic/admin/frontend/section/setting/index.blade.php ENDPATH**/ ?>