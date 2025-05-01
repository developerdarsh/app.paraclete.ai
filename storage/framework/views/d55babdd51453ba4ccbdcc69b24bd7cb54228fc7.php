

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Perplexity AI')); ?></h4>
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
					<form action="<?php echo e(route('admin.davinci.configs.perplexity.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="card shadow-0 mb-6">							
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="input-box">								
											<h6><?php echo e(__('Perplexity API Key')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="perplexity_api" name="perplexity_api" value="<?php echo e($extension->perplexity_api); ?>" autocomplete="off">
											</div> 												
										</div> 
									</div>

									<div class="col-sm-12">
										<div class="input-box mb-3">
											<h6><?php echo e(__('Default Model for Real-Time Data Access')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Real Time Data Access in AI Chat feature can use either Serper or Perplexity, here you can set default model that will be used in case if Perplexity is selected as Real-Time Data Access engine')); ?>."></i></h6>
											<select class="form-select" name="perplexity_realtime_model">
												<option value="sonar" <?php if($extension->perplexity_realtime_model == 'sonar'): ?> selected <?php endif; ?>><?php echo e(__('Perplexity Sonar')); ?></option>
												<option value="sonar-pro" <?php if($extension->perplexity_realtime_model == 'sonar-pro'): ?> selected <?php endif; ?>><?php echo e(__('Perplexity Sonar Pro')); ?></option>
												<option value="sonar-reasoning" <?php if($extension->perplexity_realtime_model == 'sonar-reasoning'): ?> selected <?php endif; ?>><?php echo e(__('Perplexity Sonar Reasoning')); ?></option>
												<option value="sonar-reasoning-pro" <?php if($extension->perplexity_realtime_model == 'sonar-reasoning-pro'): ?> selected <?php endif; ?>><?php echo e(__('Perplexity Sonar Reasoning Pro')); ?></option>											
											</select>
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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/davinci/configuration/extension/perplexity/setting.blade.php ENDPATH**/ ?>