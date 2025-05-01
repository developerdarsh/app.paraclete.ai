

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Azure OpenAI')); ?></h4>
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
					<form action="<?php echo e(route('admin.davinci.configs.azure.openai.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="card shadow-0 mb-6">							
							<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="input-box mb-2">
												<h6><?php echo e(__('Use Azure OpenAI')); ?></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="azure_openai_activate" class="custom-switch-input" <?php if($extension->azure_openai_activate): ?> checked <?php endif; ?>>
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="input-box">								
												<h6><?php echo e(__('Azure OpenAI Key')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="text" class="form-control" name="azure_openai_key" value="<?php echo e($extension->azure_openai_key); ?>" autocomplete="off">

												</div> 												
											</div> 
										</div>
										<div class="col-sm-12">
											<div class="input-box">								
												<h6><?php echo e(__('Azure OpenAI Endpoint')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="text" class="form-control" name="azure_openai_endpoint" value="<?php echo e($extension->azure_openai_endpoint); ?>" autocomplete="off">

												</div> 												
											</div> 
										</div>
									</div>
											
							</div>
						</div>	
						
						<div class="card shadow-0 mb-6">							
							<div class="card-body">
									<div class="row">
										<h6 class="text-center fs-13 text-muted mb-6 mt-5"><?php echo e(__('Azure Model Deployment Names')); ?></h6>
										<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="col-md-6 col-sm-12">
												<div class="input-box">								
													<h6><?php echo e(__('OpenAI Model Name')); ?></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="<?php echo e($model->model); ?>" value="<?php echo e($model->model); ?>" autocomplete="off" readonly>

													</div> 												
												</div> 
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="input-box">								
													<h6><?php echo e(__('Azure Model Deployment Name')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control" name="<?php echo e($model->model); ?>-value" value="<?php echo e($model->deployment_name); ?>" autocomplete="off">

													</div> 												
												</div> 
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/davinci/configuration/extension/azure-openai/index.blade.php ENDPATH**/ ?>