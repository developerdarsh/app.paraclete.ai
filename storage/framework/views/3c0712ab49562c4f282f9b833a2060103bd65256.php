

<?php $__env->startSection('page-header'); ?>
	<!-- EDIT PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Update User Credits')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-id-badge mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.user.dashboard')); ?>"> <?php echo e(__('User Management')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.user.list')); ?>"><?php echo e(__('User List')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('Update User Credits')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><i class="fa-solid fa-id-badge mr-2 text-primary fs-14"></i><?php echo e(__('Update User Credits')); ?></h3>
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo e(route('admin.user.increase', [$user->id])); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="row">

							<div class="col-sm-12 col-md-12 mt-2">
								<div>
									<p class="fs-12 mb-2"><?php echo e(__('Full Name')); ?>: <span class="font-weight-bold ml-2 text-primary"><?php echo e($user->name); ?></span></p>
									<p class="fs-12 mb-2"><?php echo e(__('Email Address')); ?>: <span class="font-weight-bold ml-2"><?php echo e($user->email); ?></span></p>
									<p class="fs-12 mb-2"><?php echo e(__('User Group')); ?>: <span class="font-weight-bold ml-2"><?php echo e(ucfirst($user->group)); ?></span></p>
								</div>
								<div class="row mt-4 mb-5">
									<div class="col-sm-12 col-md-6">										
										<p class="fs-12 mb-2"><?php if($settings->model_credit_name == 'words'): ?> <?php echo e(__('Available Words')); ?> <?php else: ?> <?php echo e(__('Available Tokens')); ?> <?php endif; ?>: <span class="font-weight-bold ml-2"><?php if($user->tokens == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->tokens )); ?> <?php endif; ?></span></p>										
										<p class="fs-12 mb-2"><?php echo e(__('Available Media Credits')); ?>: <span class="font-weight-bold ml-2"><?php if($user->images == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->images )); ?> <?php endif; ?></span></p>										
										<p class="fs-12 mb-2"><?php echo e(__('Available Characters')); ?>: <span class="font-weight-bold ml-2"><?php if($user->characters == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->characters)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Minutes')); ?>: <span class="font-weight-bold ml-2"><?php if($user->minutes == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->minutes)); ?> <?php endif; ?></span></p>
									</div>
									<div class="col-sm-12 col-md-6">										
										<p class="fs-12 mb-2"><?php if($settings->model_credit_name == 'words'): ?> <?php echo e(__('Available Prepaid Words')); ?> <?php else: ?> <?php echo e(__('Available Prepaid Tokens')); ?> <?php endif; ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->tokens_prepaid)); ?></span></p>										
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Media Credits')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->images_prepaid)); ?></span></p>										
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Characters')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->characters_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Minutes')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->minutes_prepaid)); ?></span></p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-text mr-2 text-info"></i><?php if($settings->model_credit_name == 'words'): ?> <?php echo e(__('User Words')); ?> <?php else: ?> <?php echo e(__('User Tokens')); ?> <?php endif; ?></label>
										<input type="number" class="form-control" value=<?php echo e($user->tokens); ?> name="tokens">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-text mr-2 text-info"></i><?php if($settings->model_credit_name == 'words'): ?> <?php echo e(__('User Prepaid Words')); ?> <?php else: ?> <?php echo e(__('User Prepaid Tokens')); ?> <?php endif; ?></label>
										<input type="number" class="form-control" value=<?php echo e($user->tokens_prepaid); ?> name="tokens-prepaid">								
									</div>
								</div>
							</div>
							
							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-image mr-2 text-info"></i><?php echo e(__('User Media Credits')); ?></label>
										<input type="number" class="form-control" value=<?php echo e($user->images); ?> name="image-credits">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited media credits')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-image mr-2 text-info"></i><?php echo e(__('User Prepaid Media Credits')); ?></label>
										<input type="number" class="form-control" value=<?php echo e($user->images_prepaid); ?> name="image-credits-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-waveform-lines mr-2 text-info"></i><?php echo e(__('User Character Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['chars'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->characters); ?> name="chars">	
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited characters')); ?></span>							
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-waveform-lines mr-2 text-info"></i><?php echo e(__('User Prepaid Character Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['chars_prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->characters_prepaid); ?> name="chars_prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-folder-music mr-2 text-info"></i><?php echo e(__('User Minutes Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['minutes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->minutes); ?> name="minutes">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited minutes')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-folder-music mr-2 text-info"></i><?php echo e(__('User Prepaid Minutes Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['minutes_prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->minutes_prepaid); ?> name="minutes_prepaid">									
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer border-0 text-center pr-0">							
							<a href="<?php echo e(route('admin.user.list')); ?>" class="btn btn-cancel mr-2"><?php echo e(__('Return')); ?></a>
							<button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/users/list/increase.blade.php ENDPATH**/ ?>