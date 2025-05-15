

<?php $__env->startSection('page-header'); ?>
	<!-- EDIT PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Update User Credits')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Admin')); ?></a></li>
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
								<div class="row mt-4">
									<div class="col-sm-12 col-md-6">
										<p class="fs-12 mb-2"><?php echo e(__('Available GPT 3.5 Turbo Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->gpt_3_turbo_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->gpt_3_turbo_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available GPT 4 Turbo Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->gpt_4_turbo_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->gpt_4_turbo_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available GPT 4 Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->gpt_4_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->gpt_4_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available GPT 4o Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->gpt_4o_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->gpt_4o_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available GPT 4o mini Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->gpt_4o_mini_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->gpt_4o_mini_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available o1 mini Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->o1_mini_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->o1_mini_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available o1 preview Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->o1_preview_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->o1_preview_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Fine Tune Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->fine_tune_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->fine_tune_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Claude 3 Opus Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->claude_3_opus_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->claude_3_opus_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Claude 3.5 Sonnet Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->claude_3_sonnet_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->claude_3_sonnet_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Claude 3.5 Haiku Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->claude_3_haiku_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->claude_3_haiku_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Gemini Pro Model Words')); ?>: <span class="font-weight-bold ml-2"><?php if($user->gemini_pro_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->gemini_pro_credits)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Image Credits')); ?>: <span class="font-weight-bold ml-2"><?php if($user->image_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->image_credits )); ?> <?php endif; ?></span></p>										
										<p class="fs-12 mb-2"><?php echo e(__('Available Characters')); ?>: <span class="font-weight-bold ml-2"><?php if($user->available_chars == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->available_chars)); ?> <?php endif; ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Minutes')); ?>: <span class="font-weight-bold ml-2"><?php if($user->available_minutes == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(number_format($user->available_minutes)); ?> <?php endif; ?></span></p>
									</div>
									<div class="col-sm-12 col-md-6">
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid GPT 3.5 Turbo Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->gpt_3_turbo_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid GPT 4 Turbo Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->gpt_4_turbo_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid GPT 4 Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->gpt_4_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid GPT 4o Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->gpt_4o_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid GPT 4o mini Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->gpt_4o_mini_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid o1 mini Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->o1_mini_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid o1 preview Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->o1_preview_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Fine Tune Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->fine_tune_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Claude 3 Opus Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->claude_3_opus_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Claude 3.5 Sonnet Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->claude_3_sonnet_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Claude 3.5 Haiku Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->claude_3_haiku_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Gemini Pro Model Words')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->gemini_pro_credits_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Image Credits')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->image_credits_prepaid)); ?></span></p>										
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Characters')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->available_chars_prepaid)); ?></span></p>
										<p class="fs-12 mb-2"><?php echo e(__('Available Prepaid Minutes')); ?>: <span class="font-weight-bold ml-2"><?php echo e(number_format($user->available_minutes_prepaid)); ?></span></p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User GPT 3.5 Turbo Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-3-turbo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_3_turbo_credits); ?> name="gpt-3-turbo">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid GPT 3.5 Turbo Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-3-turbo-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_3_turbo_credits_prepaid); ?> name="gpt-3-turbo-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User GPT 4 Turbo Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4-turbo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4_turbo_credits); ?> name="gpt-4-turbo">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid GPT 4 Turbo Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4-turbo-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4_turbo_credits_prepaid); ?> name="gpt-4-turbo-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User GPT 4 Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4_credits); ?> name="gpt-4">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid GPT 4 Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4_credits_prepaid); ?> name="gpt-4-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User GPT 4o Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4o'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4o_credits); ?> name="gpt-4o">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid GPT 4o Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4o-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4o_credits_prepaid); ?> name="gpt-4o-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User GPT 4o mini Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4o-mini'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4o_mini_credits); ?> name="gpt-4o-mini">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid GPT 4o mini Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gpt-4o-mini-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gpt_4o_mini_credits_prepaid); ?> name="gpt-4o-mini-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User o1 mini Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['o1-mini'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->o1_mini_credits); ?> name="o1-mini">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid o1 mini Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['o1-mini-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->o1_mini_credits_prepaid); ?> name="o1-mini-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User o1 preview Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['o1-preview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->o1_mini_credits); ?> name="o1-preview">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid o1 preview Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['o1-preview-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->o1_preview_credits_prepaid); ?> name="o1-preview-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Fine Tune Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['fine-tune'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->fine_tune_credits); ?> name="fine-tune">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid Fine Tune Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['fine-tune-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->fine_tune_credits_prepaid); ?> name="fine-tune-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Claude 3 Opus Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['claude-3-opus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->claude_3_opus_credits); ?> name="claude-3-opus">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid Claude 3 Opus Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['claude-3-opus-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->claude_3_opus_credits_prepaid); ?> name="claude-3-opus-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Claude 3.5 Sonnet Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['claude-3-sonnet'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->claude_3_sonnet_credits); ?> name="claude-3-sonnet">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid Claude 3.5 Sonnet Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['claude-3-sonnet-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->claude_3_sonnet_credits_prepaid); ?> name="claude-3-sonnet-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Claude 3.5 Haiku Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['claude-3-haiku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->claude_3_haiku_credits); ?> name="claude-3-haiku">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid Claude 3.5 Haiku Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['claude-3-haiku-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->claude_3_haiku_credits_prepaid); ?> name="claude-3-haiku-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Gemini Pro Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gemini-pro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gemini_pro_credits); ?> name="gemini-pro">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited words')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 mt-3">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-scroll-old mr-2 text-info"></i><?php echo e(__('User Prepaid Gemini Pro Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['gemini-pro-prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->gemini_pro_credits_prepaid); ?> name="gemini-pro-prepaid">								
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-image mr-2 text-info"></i><?php echo e(__('User Image Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['dalle-images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->image_credits); ?> name="image-credits">
										<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited images')); ?></span>									
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="input-box mb-4">
									<div class="form-group">
										<label class="form-label fs-12 font-weight-bold"><i class="fa-solid fa-image mr-2 text-info"></i><?php echo e(__('User Prepaid Image Credits')); ?></label>
										<input type="number" class="form-control <?php $__errorArgs = ['dalle_images_prepaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->image_credits_prepaid); ?> name="image-credits-prepaid">								
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
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->available_chars); ?> name="chars">	
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
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->available_chars_prepaid); ?> name="chars_prepaid">								
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
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->available_minutes); ?> name="minutes">
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
unset($__errorArgs, $__bag); ?>" value=<?php echo e($user->available_minutes_prepaid); ?> name="minutes_prepaid">									
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/classic/admin/users/list/increase.blade.php ENDPATH**/ ?>