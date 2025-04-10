

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('AI Avatar')); ?></h4>
			<ol class="breadcrumb mb-2 justify-content-center">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.configs')); ?>"> <?php echo e(__('AI Settings')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('Extensions')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>						
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body pt-7 pl-7 pr-7 pb-6">									
					<form action="<?php echo e(route('admin.davinci.configs.avatar.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="card shadow-0 mt-0 mb-7">							
							<div class="card-body">
								<div class="row">

									<div class="col-sm-12">
										<div class="input-box">								
											<h6><?php echo e(__('Heygen API Key')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['heygen_api'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="heygen_api" name="heygen_api" value="<?php echo e($extension->heygen_api); ?>" autocomplete="off">
												<?php $__errorArgs = ['heygen_api'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('heygen_api')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 												
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Avatar Feature')); ?></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="heygen_avatar_feature" class="custom-switch-input" <?php if($extension->heygen_avatar_feature): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Avatar Free Tier Access')); ?></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="heygen_avatar_free_tier" class="custom-switch-input" <?php if($extension->heygen_avatar_free_tier): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Avatar Image Feature')); ?></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="heygen_avatar_image" class="custom-switch-input" <?php if($extension->heygen_avatar_image): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>	

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Avatar Video Feature')); ?></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="heygen_avatar_video" class="custom-switch-input" <?php if($extension->heygen_avatar_video): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="input-box">								
											<h6><?php echo e(__('Total Image Avatars per Free Tier User')); ?></h6>
											<div class="form-group">							    
												<input type="number" min=0 class="form-control <?php $__errorArgs = ['heygen_avatar_image_numbers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="heygen_avatar_image_numbers" name="heygen_avatar_image_numbers" value="<?php echo e($extension->heygen_avatar_image_numbers); ?>" autocomplete="off">
												<?php $__errorArgs = ['heygen_avatar_image_numbers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('heygen_avatar_image_numbers')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 												
										</div> 
									</div>

									<div class="col-sm-12">
										<div class="input-box">								
											<h6><?php echo e(__('Total Video Avatars per Free Tier User')); ?></h6>
											<div class="form-group">							    
												<input type="number" min=0 class="form-control <?php $__errorArgs = ['heygen_avatar_video_numbers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="heygen_avatar_video_numbers" name="heygen_avatar_video_numbers" value="<?php echo e($extension->heygen_avatar_video_numbers); ?>" autocomplete="off">
												<?php $__errorArgs = ['heygen_avatar_video_numbers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('heygen_avatar_video_numbers')); ?></p>
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
						

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<button type="submit" class="btn ripple btn-primary pl-8 pr-8 pt-2 pb-2"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/davinci/configuration/extension/avatar/setting.blade.php ENDPATH**/ ?>