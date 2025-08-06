

<?php $__env->startSection('page-header'); ?>
<!-- PAGE HEADER -->
<div class="page-header mt-5-7 justify-content-center">
	<div class="page-leftheader text-center">
		<h4 class="page-title mb-0"><i class="text-primary mr-2 fs-16 fa-solid fa-rectangles-mixed"></i><?php echo e(__('Integrations')); ?></h4>
		<h6 class="text-muted"><?php echo e(__('Posts your contents directly to your favorite CMS')); ?></h6>
		<ol class="breadcrumb mb-2 justify-content-center">
			<li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>"><i class="fa-solid fa-id-badge mr-2 fs-12"></i><?php echo e(__('User')); ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('Integrations')); ?></a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<div class="row justify-content-center">
		<div class="col-lg-10 col-md-12 col-sm-12">
			<div class="card border-0 p-6 pt-7 pb-7">
				<div class="card-body pt-2">
					<?php $__currentLoopData = $integrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $integration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($integration->app == 'wordpress'): ?>
							<?php if(App\Services\HelperService::extensionWordpressIntegration()): ?>
								<div class="col-4">
									<div class="cms-box text-center" style="height: auto; width: auto">																
										<img class="cms-image mb-4" src="<?php echo e(theme_url($integration->logo)); ?>" alt="">							
										<h5 class="cms-title font-weight-semibold fs-18"><?php echo e(ucfirst($integration->app)); ?></h5>
										<p class="cms-description fs-14 text-muted"><?php echo e(__($integration->description)); ?></p>
										<a href="<?php echo e(route('user.integration.wordpress')); ?>" class="cms-action ripple btn btn-primary pl-8 pr-8 fs-12"><?php echo e(__('Manage')); ?></a>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>						
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/user/integration/index.blade.php ENDPATH**/ ?>