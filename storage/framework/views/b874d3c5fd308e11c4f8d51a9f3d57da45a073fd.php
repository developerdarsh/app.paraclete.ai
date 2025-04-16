

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('AI Image Model Credits')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.dashboard')); ?>"> <?php echo e(__('AI Management')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.configs')); ?>"> <?php echo e(__('AI Settings')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('AI Image Model Credits')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>						
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('Set AI Image Model Credits')); ?></h3>
				</div>
				<div class="card-body pt-5">									
					<form id="" action="<?php echo e(route('admin.davinci.configs.image.credits.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<h6 class="text-muted text-center"><?php echo e(__('OpenAI')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('OpenAI Dalle 3 HD')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="openai_dalle_3_hd" value="<?php echo e($credits->openai_dalle_3_hd); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('OpenAI Dalle 3')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="openai_dalle_3" value="<?php echo e($credits->openai_dalle_3); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('OpenAI Dalle 2')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="openai_dalle_2" value="<?php echo e($credits->openai_dalle_2); ?>">
									</div> 	
								</div> 						
							</div>
						</div>

						<h6 class="text-muted text-center"><?php echo e(__('Stable Diffusion')); ?></h6>

						<div class="row pl-5 pr-5">							

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('Stable Diffusion Ultra')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_ultra" value="<?php echo e($credits->sd_ultra); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('Stable Diffusion Core')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_core" value="<?php echo e($credits->sd_core); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('Stable Diffusion 3 Large')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_3_large" value="<?php echo e($credits->sd_3_large); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('Stable Diffusion 3 Large Turbo')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_3_large_turbo" value="<?php echo e($credits->sd_3_large_turbo); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('Stable Diffusion 3 Medium')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_3_medium" value="<?php echo e($credits->sd_3_medium); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('SDXL v1.0')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_xl_v10" value="<?php echo e($credits->sd_xl_v10); ?>">
									</div> 	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6><?php echo e(__('Stable Diffusion v1.6')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="number" min=1 class="form-control" name="sd_v16" value="<?php echo e($credits->sd_v16); ?>">
									</div> 	
								</div> 						
							</div>
						</div>

						<?php if(App\Services\HelperService::extensionFlux()): ?>
							<h6 class="text-muted text-center"><?php echo e(__('Fal AI')); ?></h6>

							<div class="row pl-5 pr-5">							

								<div class="col-lg-12 col-md-12 col-sm-12">							
									<div class="input-box">								
										<h6><?php echo e(__('FLUX Realism')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
										<div class="form-group">							    
											<input type="number" min=1 class="form-control" name="flux_realism" value="<?php echo e($credits->flux_realism); ?>">
										</div> 	
									</div> 						
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12">							
									<div class="input-box">								
										<h6><?php echo e(__('FLUX.1 [pro]')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
										<div class="form-group">							    
											<input type="number" min=1 class="form-control" name="flux_pro" value="<?php echo e($credits->flux_pro); ?>">
										</div> 	
									</div> 						
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12">							
									<div class="input-box">								
										<h6><?php echo e(__('FLUX.1 [schnell]')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
										<div class="form-group">							    
											<input type="number" min=1 class="form-control" name="flux_schnell" value="<?php echo e($credits->flux_schnell); ?>">
										</div> 	
									</div> 						
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12">							
									<div class="input-box">								
										<h6><?php echo e(__('FLUX.1 [dev]')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
										<div class="form-group">							    
											<input type="number" min=1 class="form-control" name="flux_dev" value="<?php echo e($credits->flux_dev); ?>">
										</div> 	
									</div> 						
								</div>
								
							</div>
						<?php endif; ?>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<button type="submit" class="btn ripple btn-primary pl-9 pr-9 pt-3 pb-3"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/classic/admin/davinci/configuration/image.blade.php ENDPATH**/ ?>