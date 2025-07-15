

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"> <?php echo e(__('Frontend Settings')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-globe mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Management')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Settings')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>					
	<div class="row justify-content-center">
		<div class="col-lg-7 col-md-10 col-sm-12">
			<div class="card overflow-hidden border-0 p-3">
				<div class="card-body">
				
					<form id="frontend-settings" action="<?php echo e(route('admin.settings.frontend.store')); ?>" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="row">
							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Frontend Page')); ?></h6>								
								<div class="form-group mb-4">
									<label class="custom-switch">
										<input type="checkbox" name="frontend" class="custom-switch-input" <?php if( config('frontend.frontend_page')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>
						</div>


						<div class="card shadow-0 mb-6">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Custom Landing Page URL')); ?></h6>

								<div class="form-group mb-3">
									<label class="custom-switch">
										<input type="checkbox" name="enable-redirection" class="custom-switch-input" <?php if( config('frontend.custom_url.status')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-md-12 col-sm-12">													
										<div class="input-box mb-3">								
											<h6><?php echo e(__('Landing Page URL')); ?> <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="Set custom index url for all frontend pages. Ex: https://aws.amazon.com (Note: https:// - is required)"></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="url" name="url" value="<?php echo e(config('frontend.custom_url.link')); ?>" autocomplete="off">
												<?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('url')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>							
								</div>	
							</div>
						</div>

						<div class="card shadow-0 mb-6">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Advanced Settings')); ?></h6>

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">													
										<div class="input-box mb-3">								
											<h6><?php echo e(__('Custom CSS File Path URL')); ?> <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="Provide full URL of the CSS file (With: https:// or http:// included)"></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['css'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="css" name="css" value="<?php if($frontend_settings): ?> <?php echo e($frontend_settings->custom_css_url); ?> <?php endif; ?>" autocomplete="off">
												<?php $__errorArgs = ['css'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('css')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="input-box">	
											<h6><?php echo e(__('Custom JS File Path URL')); ?> <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="Provide full URL of the JS file (With: https:// or http:// included)"></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['js'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="js" name="js" value="<?php if($frontend_settings): ?> <?php echo e($frontend_settings->custom_js_url); ?> <?php endif; ?>" autocomplete="off">
												<?php $__errorArgs = ['js'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('js')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 						
									</div>	
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="input-box">	
											<h6><?php echo e(__('Custom JS Code to Header')); ?> <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="Only JS code is allowed with proper <script> </script> tags"></i></h6>
											<div class="form-group">							    
												<textarea class="form-control" id="header_code" name="header_code"><?php if($frontend_settings): ?> <?php echo e($frontend_settings->custom_header_code); ?> <?php endif; ?></textarea>
											</div> 
										</div> 						
									</div>	
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="input-box">	
											<h6><?php echo e(__('Custom JS Code to Body')); ?> <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="Only JS code is allowed with proper <script> </script> tags"></i></h6>
											<div class="form-group">							    
												<textarea class="form-control" id="body_code" name="body_code"><?php if($frontend_settings): ?> <?php echo e($frontend_settings->custom_body_code); ?> <?php endif; ?></textarea>
											</div> 
										</div> 						
									</div>							
								</div>
	
							</div>
						</div>
						
						<div class="card shadow-0">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Footer Social Media Information')); ?></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-twitter mr-2"></i><?php echo e(__('Twitter')); ?> <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="twitter" name="twitter" value="<?php echo e(config('frontend.social_twitter')); ?>" autocomplete="off">
												<?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('twitter')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-facebook-f mr-2"></i><?php echo e(__('Facebook')); ?> <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="facebook" name="facebook" value="<?php echo e(config('frontend.social_facebook')); ?>" autocomplete="off">
												<?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('facebook')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-linkedin-in mr-2"></i><?php echo e(__('LinkedIn')); ?> <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="linkedin" name="linkedin" value="<?php echo e(config('frontend.social_linkedin')); ?>" autocomplete="off">
												<?php $__errorArgs = ['linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('linkedin')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-instagram mr-2"></i><?php echo e(__('Instagram')); ?> <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="instagram" name="instagram" value="<?php echo e(config('frontend.social_instagram')); ?>" autocomplete="off">
												<?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('instagram')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-youtube mr-2"></i><?php echo e(__('Youtube')); ?> <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="youtube" name="youtube" value="<?php echo e(config('frontend.social_youtube')); ?>" autocomplete="off">
												<?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('youtube')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
								</div>
	
							</div>
						</div>
						
						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-center mt-1">
							<button type="button" class="btn btn-primary ripple pl-7 pr-7" id="save"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>

				</div>
			</div>
		</div>
	</div>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(URL::asset('plugins/ace/src-min-noconflict/ace.js')); ?>"></script>
	<script>
		$(function () {
			let header_code = ace.edit("header_code");
			header_code.session.setMode("ace/mode/javascript");

			let body_code = ace.edit("body_code");
			body_code.session.setMode("ace/mode/javascript");

			$('#save').on('click',function(e) {

				const form = document.getElementById("frontend-settings");
				let formData = new FormData(form);

				if (header_code) {
					formData.append('header_code', header_code.getValue());
				}
				if (body_code) {
					formData.append('body_code', body_code.getValue());
				}

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: "POST",
					url: $('#frontend-settings').attr('action'),
					data: formData,
					processData: false,
					contentType: false,
					success: function(data) {

						if (data['status'] == 200) {
							toastr.success('<?php echo e(__('Settings were successfully saved')); ?>');
						}

					},
					error: function(data) {
						toastr.error('<?php echo e(__('There was an issue with saving the settings')); ?>');
					}
				}).done(function(data) {})
			});
		});
   </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/frontend/frontend/index.blade.php ENDPATH**/ ?>