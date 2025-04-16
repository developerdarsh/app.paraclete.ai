
<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center"> 
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('New Subscription Plan')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-sack-dollar mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.finance.dashboard')); ?>"> <?php echo e(__('Finance Management')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.finance.plans')); ?>"> <?php echo e(__('Subscription Plans')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('New Subscription Plan')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>						
	<div class="row justify-content-center">

		<div class="col-lg-7 col-md-8 col-sm-12">
			<div class="card border-0">
				<div class="card-header border-0 pb-0">
					<h6 class="card-title fs-12 text-muted"><?php echo e(__('Create New Subscription Plan')); ?></h6>
				</div>
				<div class="card-body pt-0">
					<hr class="mt-0">									
					<form action="<?php echo e(route('admin.finance.plan.store')); ?>" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="card mt-4 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-money-check-dollar-pen text-info fs-14 mr-1 fw-2"></i><?php echo e(__('General Settings')); ?></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">						
										<div class="input-box">	
											<h6><?php echo e(__('Plan Status')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="plan-status" name="plan-status" class="form-select" data-placeholder="<?php echo e(__('Select Plan Status')); ?>:">			
												<option value="active" selected><?php echo e(__('Active')); ?></option>
												<option value="hidden"><?php echo e(__('Hidden')); ?></option>
												<option value="closed"><?php echo e(__('Closed')); ?></option>
											</select>
											<?php $__errorArgs = ['plan-status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('plan-status')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>	
										</div>						
									</div>							
									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Plan Name')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="plan-name" name="plan-name" value="<?php echo e(old('plan-name')); ?>" required>
											</div> 
											<?php $__errorArgs = ['plan-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('plan-name')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Price')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="number" step="0.01" class="form-control" id="cost" name="cost" value="<?php echo e(old('cost')); ?>" required>
											</div> 
											<?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('cost')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Currency')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="currency" name="currency" class="form-select" data-placeholder="<?php echo e(__('Select Currency')); ?>:">			
												<?php $__currentLoopData = config('currencies.all'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($key); ?>" <?php if(config('payment.default_system_currency') == $key): ?> selected <?php endif; ?>><?php echo e($value['name']); ?> - <?php echo e($key); ?> (<?php echo $value['symbol']; ?>)</option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
											<?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('currency')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Payment Frequence')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="frequency" name="frequency" class="form-select" data-placeholder="<?php echo e(__('Select Payment Frequency')); ?>:" data-callback="duration_select">		
												<option value="monthly" selected><?php echo e(__('Monthly')); ?></option>
												<option value="yearly"><?php echo e(__('Yearly')); ?></option>
												<option value="lifetime"><?php echo e(__('Lifetime')); ?></option>
											</select>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Featured Plan')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="featured" name="featured" class="form-select" data-placeholder="<?php echo e(__('Select if Plan is Featured')); ?>:">		
												<option value=1><?php echo e(__('Yes')); ?></option>
												<option value=0 selected><?php echo e(__('No')); ?></option>
											</select>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Free Plan')); ?></h6>
											<div class="form-group">							    
												<select id="free-plan" name="free-plan" class="form-select" data-placeholder="<?php echo e(__('Make this plan a Free Plan?')); ?>:">			
													<option value=1><?php echo e(('Yes')); ?></option>
													<option value=0 selected><?php echo e(('No')); ?></option>
												</select>
											</div> 
											<?php $__errorArgs = ['free-plan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('free-plan')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Free Plan Days')); ?></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="days" name="days" min=0 value="<?php echo e(old('days')); ?>">
											</div> 
											<?php $__errorArgs = ['days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('days')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>
								</div>
							</div>
						</div>

						<div class="card mt-7 shadow-0" id="payment-gateways">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa fa-bank text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Payment Gateways Plan IDs')); ?></h6>

								<div class="row">								
									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('PayPal Plan ID')); ?> <span class="text-danger">(<?php echo e(__('Required for Paypal')); ?>) <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('You have to get Paypal Plan ID in your Paypal account. Refer to the documentation if you need help with creating one')); ?>."></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="paypal_gateway_plan_id" name="paypal_gateway_plan_id" value="<?php echo e(old('paypal_gateway_plan_id')); ?>">
											</div> 
											<?php $__errorArgs = ['paypal_gateway_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('paypal_gateway_plan_id')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Stripe Product ID')); ?> <span class="text-danger">(<?php echo e(__('Required for Stripe')); ?>) <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('You have to get Stripe Product ID in your Stripe account. Refer to the documentation if you need help with creating one')); ?>."></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="stripe_gateway_plan_id" name="stripe_gateway_plan_id" value="<?php echo e(old('stripe_gateway_plan_id')); ?>">
											</div> 
											<?php $__errorArgs = ['stripe_gateway_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('stripe_gateway_plan_id')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Paystack Plan Code')); ?> <span class="text-danger">(<?php echo e(__('Required for Paystack')); ?>) <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('You have to get Paystack Plan ID in your Paystack account. Refer to the documentation if you need help with creating one')); ?>."></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="paystack_gateway_plan_id" name="paystack_gateway_plan_id" value="<?php echo e(old('paystack_gateway_plan_id')); ?>">
											</div> 
											<?php $__errorArgs = ['paystack_gateway_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('paystack_gateway_plan_id')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Razorpay Plan ID')); ?> <span class="text-danger">(<?php echo e(__('Required for Razorpay')); ?>) <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('You have to get Razorpay Plan ID in your Razorpay account. Refer to the documentation if you need help with creating one')); ?>."></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="razorpay_gateway_plan_id" name="razorpay_gateway_plan_id" value="<?php echo e(old('razorpay_gateway_plan_id')); ?>">
											</div> 
											<?php $__errorArgs = ['razorpay_gateway_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('razorpay_gateway_plan_id')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Flutterwave Plan ID')); ?> <span class="text-danger">(<?php echo e(__('Required for Flutterwave')); ?>) <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('You have to get Flutterwave Plan ID in your Flutterwave account. Refer to the documentation if you need help with creating one')); ?>."></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="flutterwave_gateway_plan_id" name="flutterwave_gateway_plan_id" value="<?php echo e(old('flutterwave_gateway_plan_id')); ?>">
											</div> 
											<?php $__errorArgs = ['flutterwave_gateway_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('flutterwave_gateway_plan_id')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Paddle Plan ID')); ?> <span class="text-danger">(<?php echo e(__('Required for Paddle')); ?>) <i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('You have to get Paddle Plan ID in your Paddle account. Refer to the documentation if you need help with creating one')); ?>."></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="paddle_gateway_plan_id" name="paddle_gateway_plan_id" value="<?php echo e(old('paddle_gateway_plan_id')); ?>">
											</div> 
											<?php $__errorArgs = ['paddle_gateway_plan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('paddle_gateway_plan_id')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>
								</div>
							</div>						
						</div>

						<div class="card mt-7 mb-7 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-box-circle-check text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Included AI Credits')); ?></h6>

								<div class="row">

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php if($settings->model_credit_name == 'words'): ?> <?php echo e(__('Word Credits')); ?> <?php else: ?> <?php echo e(__('Token Credits')); ?> <?php endif; ?><span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="token-credits" name="token-credits" value="0" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Valid for all models')); ?>. <?php if($settings->model_credit_name == 'words'): ?> <?php echo e(__('Set as -1 for unlimited words')); ?> <?php else: ?> <?php echo e(__('Set as -1 for unlimited tokens')); ?> <?php endif; ?>.</span>
											</div> 
										</div> 						
									</div>
									
									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Media Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="image-credits" name="image-credits" value="0" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Valid for all media tasks')); ?>. <?php echo e(__('Set as -1 for unlimited credits')); ?>.</span>
											</div> 
											<?php $__errorArgs = ['image-credits'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('image-credits')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Characters Included')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="characters" name="characters" value="0" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('For AI Voiceover feature')); ?>. <?php echo e(__('Set as -1 for unlimited characters')); ?>.</span>
											</div> 
											<?php $__errorArgs = ['characters'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('characters')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Minutes Included')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="minutes" name="minutes" value="0" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('For AI Speech to Text feature')); ?>. <?php echo e(__('Set as -1 for unlimited minutes')); ?>.</span>
											</div> 
											<?php $__errorArgs = ['minutes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('minutes')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>
								</div>
							</div>
						</div>

						<div class="card mt-7 mb-7 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-box-circle-check text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Included Features')); ?></h6>

								<div class="row">	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Writer Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="writer-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Article Wizard Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="wizard-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Smart Editor Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="smart-editor-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Rewriter Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="rewriter-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Image Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="image-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Voiceover Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="voiceover-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Speech to Text Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="whisper-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Chat Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="chat-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Code Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="code-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Personal OpenAI API Usage Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="personal-openai-api" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Personal Claude API Usage Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="personal-claude-api" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Personal Gemini API Usage Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="personal-gemini-api" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>
		
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Personal Stable Diffusion API Usage Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="personal-sd-api" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Vision Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="vision-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Chat Image Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="chat-image-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI File Chat Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="file-chat-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Internet Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="internet-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Web Chat Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="chat-web-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>																			

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Personal Custom AI Chat Bot Creation Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="personal-chat-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Personal Custom Template Creation Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="personal-template-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Brand Voice Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="brand-voice-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>					

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Youtube Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="youtube-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI RSS Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="rss-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="input-box">
                                            <h6><?php echo e(__('Smart Ads Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
                                            <div class="form-group mt-3">
                                                <label class="custom-switch">
                                                    <input type="checkbox" id="smart_ads_feature" name="smart_ads_feature" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Integration Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="integration-feature" class="custom-switch-input">
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card mt-7 mb-7 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-box-circle-check text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Included Extra Service Limits')); ?></h6>

								<div class="row">							
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Available Models for All Templates')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Subscribers will only have access to the selected models for all AI features related to generating text')); ?>."></i></h6>
											<select class="form-select" id="templates-models-list" name="templates_models_list[]" data-placeholder="<?php echo e(__('Choose Models for Templates')); ?>" multiple>									
												<option value='gpt-3.5-turbo-0125'><?php echo e(__('OpenAI GPT 3.5 Turbo')); ?></option>																																																																																												
												<option value='gpt-4'><?php echo e(__('OpenAI GPT 4')); ?></option>																																																																																																																																																																																																																																																							
												<option value='gpt-4o'><?php echo e(__('OpenAI GPT 4o')); ?></option>																																																																																																																																																																																																																																																					
												<option value='gpt-4o-mini'><?php echo e(__('OpenAI GPT 4o mini')); ?></option>																																																																																																																																																																																																																																																					
												<option value='gpt-4-0125-preview'><?php echo e(__('OpenAI GPT 4 Turbo')); ?></option>																																																																																																																																																																																																																																																																																															
												<option value='gpt-4.5-preview'><?php echo e(__('OpenAI GPT 4.5')); ?></option>																																																																																																																																																																																																																																																																																															
												<option value='o1'><?php echo e(__('OpenAI o1')); ?></option>																																																																																																																																																																																																																																																						
												<option value='o1-mini'><?php echo e(__('OpenAI o1 mini')); ?></option>																																																																																																																																																																																																																																																						
												<option value='o3-mini'><?php echo e(__('OpenAI o3 mini')); ?></option>																																																																																																																																																																																																																																																						
												<option value='claude-3-opus-20240229'><?php echo e(__('Claude 3 Opus')); ?></option>																																																																																																																											
												<option value='claude-3-7-sonnet-20250219'><?php echo e(__('Claude 3.7 Sonnet')); ?></option>																																																																																																																											
												<option value='claude-3-5-sonnet-20241022'><?php echo e(__('Claude 3.5 Sonnet')); ?></option>																																																																																																																											
												<option value='claude-3-5-haiku-20241022'><?php echo e(__('Claude 3.5 Haiku')); ?></option>																																																																																																																											
												<option value='gemini-1.5-pro'><?php echo e(__('Gemini 1.5 Pro')); ?></option>																																																																																																																											
												<option value='gemini-1.5-flash'><?php echo e(__('Gemini 1.5 Flash')); ?></option>																																																																																																																											
												<option value='gemini-2.0-flash'><?php echo e(__('Gemini 2.0 Flash')); ?></option>																																																																																																																											
												<option value='deepseek-chat'><?php echo e(__('DeepSeek V3')); ?></option>																																																																																																																											
												<option value='deepseek-reasoner'><?php echo e(__('DeepSeek R1')); ?></option>																																																																																																																											
												<option value='grok-2-1212'><?php echo e(__('Grok 2')); ?></option>																																																																																																																											
												<option value='grok-2-vision-1212'><?php echo e(__('Grok 2 Vision')); ?></option>
												<?php if(App\Services\HelperService::extensionPerplexity()): ?>	
													<option value="sonar"><?php echo e(__('Perplexity Sonar')); ?></option>
													<option value="sonar-pro"><?php echo e(__('Perplexity Sonar Pro')); ?></option>
													<option value="sonar-reasoning"><?php echo e(__('Perplexity Sonar Reasoning')); ?></option>
													<option value="sonar-reasoning-pro"><?php echo e(__('Perplexity Sonar Reasoning Pro')); ?></option>
												<?php endif; ?>	
												<?php if(App\Services\HelperService::extensionAmazonBedrock()): ?>	
													<option value="us.amazon.nova-micro-v1:0"><?php echo e(__('Nova Micro')); ?></option>
													<option value="us.amazon.nova-lite-v1:0"><?php echo e(__('Nova Lite')); ?></option>
													<option value="us.amazon.nova-pro-v1:0"><?php echo e(__('Nova Pro')); ?></option>
												<?php endif; ?>																																																																																																																										
												<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($model->model); ?>"> <?php echo e($model->description); ?> (<?php echo e(__('Fine Tune Model')); ?>)</option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Available Models for All Chat Bots')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Subscribers will only have access to the selected models for all AI features related to chat bots')); ?>."></i></h6>
											<select class="form-select" id="chats-models-list" name="chats_models_list[]" data-placeholder="<?php echo e(__('Choose Models for Chat Bots')); ?>" multiple>
												<option value='gpt-3.5-turbo-0125'><?php echo e(__('OpenAI GPT 3.5 Turbo')); ?></option>																																																																																												
												<option value='gpt-4'><?php echo e(__('OpenAI GPT 4')); ?></option>																																																																																																																																																																																																																																																							
												<option value='gpt-4o'><?php echo e(__('OpenAI GPT 4o')); ?></option>																																																																																																																																																																																																																																																					
												<option value='gpt-4o-mini'><?php echo e(__('OpenAI GPT 4o mini')); ?></option>																																																																																																																																																																																																																																																					
												<option value='gpt-4-0125-preview'><?php echo e(__('OpenAI GPT 4 Turbo')); ?></option>																																																																																																																																																																																																																																																																																															
												<option value='gpt-4.5-preview'><?php echo e(__('OpenAI GPT 4.5')); ?></option>																																																																																																																																																																																																																																																																																															
												<option value='o1'><?php echo e(__('OpenAI o1')); ?></option>																																																																																																																																																																																																																																																						
												<option value='o1-mini'><?php echo e(__('OpenAI o1 mini')); ?></option>																																																																																																																																																																																																																																																						
												<option value='o3-mini'><?php echo e(__('OpenAI o3 mini')); ?></option>																																																																																																																																																																																																																																																						
												<option value='claude-3-opus-20240229'><?php echo e(__('Claude 3 Opus')); ?></option>	
												<option value='claude-3-7-sonnet-20250219'><?php echo e(__('Claude 3.7 Sonnet')); ?></option>																																																																																																																											
												<option value='claude-3-5-sonnet-20241022'><?php echo e(__('Claude 3.5 Sonnet')); ?></option>																																																																																																																											
												<option value='claude-3-5-haiku-20241022'><?php echo e(__('Claude 3.5 Haiku')); ?></option>																																																																																																																											
												<option value='gemini-1.5-pro'><?php echo e(__('Gemini 1.5 Pro')); ?></option>																																																																																																																											
												<option value='gemini-1.5-flash'><?php echo e(__('Gemini 1.5 Flash')); ?></option>																																																																																																																											
												<option value='gemini-2.0-flash'><?php echo e(__('Gemini 2.0 Flash')); ?></option>
												<option value='deepseek-chat'><?php echo e(__('DeepSeek V3')); ?></option>																																																																																																																											
												<option value='deepseek-reasoner'><?php echo e(__('DeepSeek R1')); ?></option>		
												<option value='grok-2-1212'><?php echo e(__('Grok 2')); ?></option>																																																																																																																											
												<option value='grok-2-vision-1212'><?php echo e(__('Grok 2 Vision')); ?></option>	
												<?php if(App\Services\HelperService::extensionPerplexity()): ?>	
													<option value="sonar"><?php echo e(__('Perplexity Sonar')); ?></option>
													<option value="sonar-pro"><?php echo e(__('Perplexity Sonar Pro')); ?></option>
													<option value="sonar-reasoning"><?php echo e(__('Perplexity Sonar Reasoning')); ?></option>
													<option value="sonar-reasoning-pro"><?php echo e(__('Perplexity Sonar Reasoning Pro')); ?></option>
												<?php endif; ?>	
												<?php if(App\Services\HelperService::extensionAmazonBedrock()): ?>	
													<option value="us.amazon.nova-micro-v1:0"><?php echo e(__('Nova Micro')); ?></option>
													<option value="us.amazon.nova-lite-v1:0"><?php echo e(__('Nova Lite')); ?></option>
													<option value="us.amazon.nova-pro-v1:0"><?php echo e(__('Nova Pro')); ?></option>
												<?php endif; ?>																																																																																																																											
												<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($model->model); ?>"> <?php echo e($model->description); ?> (<?php echo e(__('Fine Tune Model')); ?>)</option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>									

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Template Categories Access')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="templates" name="templates" class="form-select" data-placeholder="<?php echo e(__('Set Templates Access')); ?>">
												<option value="all" selected><?php echo e(__('All Templates')); ?></option>																																										
												<option value="free"><?php echo e(__('Only Free Templates')); ?></option>																																										
												<option value="standard"> <?php echo e(__('Up to Standard Templates')); ?></option>		
												<option value="professional"> <?php echo e(__('Up to Professional Templates')); ?></option>																																																												
												<option value="premium"> <?php echo e(__('Up to Premium Templates')); ?> (<?php echo e(__('All')); ?>)</option>																																																												
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Chat Categories Access')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="chats" name="chats" class="form-select" data-placeholder="<?php echo e(__('Set AI Chat Type Access')); ?>">
												<option value="all"><?php echo e(__('All Chat Types')); ?></option>
												<option value="free"><?php echo e(__('Only Free Chat Types')); ?></option>																																											
												<option value="standard"> <?php echo e(__('Up to Standard Chat Types')); ?></option>
												<option value="professional"> <?php echo e(__('Up to Professional Chat Types')); ?></option>
												<option value="premium"> <?php echo e(__('Upto Premium Chat Types')); ?> (<?php echo e(__('All')); ?>)</option>																																																														
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Included AI Voiceover Vendors')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Only listed TTS voices of the listed vendors will be available for the subscriber. Make sure to include respective vendor API keys in the AI Settings page.')); ?>."></i></h6>
											<select class="form-select" id="voiceover-vendors" name="voiceover_vendors[]" data-placeholder="<?php echo e(__('Choose Voiceover vendors')); ?>" multiple>
												<option value='aws'><?php echo e(__('AWS')); ?></option>																															
												<option value='azure'> <?php echo e(__('Azure')); ?></option>																															
												<option value='gcp'> <?php echo e(__('GCP')); ?></option>																															
												<option value='openai'> <?php echo e(__('OpenAI')); ?></option>																															
												<option value='elevenlabs'> <?php echo e(__('ElevenLabs')); ?></option>	
												<?php if(App\Services\HelperService::extensionWatson()): ?>
													<option value='ibm'> <?php echo e(__('IBM')); ?></option>		
												<?php endif; ?>																																																													
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Number of Team Members')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Define how many team members a user is allowed to create under this subscription plan')); ?>."></i></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="team-members" name="team-members" min=0 value="0" required>
											</div> 
											<?php $__errorArgs = ['team-members'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('team-members')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div> 						
									</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Included AI Image Vendors')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Only listed AI Image vendors models will be available for the subscriber. Make sure to include respective vendor API keys in the AI Settings page.')); ?>."></i></h6>
												<select class="form-select" id="image-vendors" name="image_vendors[]" data-placeholder="<?php echo e(__('Choose AI Image vendors')); ?>" multiple>
													<option value='openai'><?php echo e(__('OpenAI')); ?></option>																															
													<option value='sd'> <?php echo e(__('Stable Diffusion')); ?></option>	
													<?php if(App\Services\HelperService::extensionFlux()): ?>																														
														<option value='falai'> <?php echo e(__('Fal AI')); ?></option>
													<?php endif; ?>	
													<?php if(App\Services\HelperService::extensionMidjourney()): ?>																														
														<option value='midjourney'> <?php echo e(__('Midjourney')); ?></option>
													<?php endif; ?>		
													<?php if(App\Services\HelperService::extensionClipdrop()): ?>																														
														<option value='clipdrop'> <?php echo e(__('Clipdrop')); ?></option>
													<?php endif; ?>																																																																																												
												</select>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Maximum Allowed CSV File Size')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Set the maximum CSV file size limit that subscriber is allowed to process')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0.1" step="0.1" id="chat-csv-file-size" name="chat-csv-file-size" value="1.0">
													<span class="text-muted fs-10"><?php echo e(__('Maximum Size limit is in Megabytes (MB)')); ?>.</span>
												</div> 
												<?php $__errorArgs = ['chat-csv-file-size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('chat-csv-file-size')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Maximum Allowed PDF File Size')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Set the maximum PDF file size limit that subscriber is allowed to process')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0.1" step="0.1" id="chat-pdf-file-size" name="chat-pdf-file-size" value="1.0">
													<span class="text-muted fs-10"><?php echo e(__('Maximum Size limit is in Megabytes (MB)')); ?>.</span>
												</div> 
												<?php $__errorArgs = ['chat-pdf-file-size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('chat-pdf-file-size')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Maximum Allowed Word File Size')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Set the maximum Word file size limit that subscriber is allowed to process')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0.1" step="0.1" id="chat-word-file-size" name="chat-word-file-size" value="1.0">
													<span class="text-muted fs-10"><?php echo e(__('Maximum Size limit is in Megabytes (MB)')); ?>.</span>
												</div> 
												<?php $__errorArgs = ['chat-word-file-size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('chat-word-file-size')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>																					

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Image/Video/Voiceover Results Storage Period')); ?> <span class="text-muted">(<?php echo e(__('In Days')); ?>)</span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('After set days file results will be deleted via CRON task')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" id="file-result-duration" name="file-result-duration" value="-1">
													<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited storage duration')); ?>.</span>
												</div> 
												<?php $__errorArgs = ['file-result-duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('file-result-duration')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Generated Text Content Results Storage Period')); ?> <span class="text-muted">(<?php echo e(__('In Days')); ?>)</span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('After set days results will be deleted from database via CRON task')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" id="document-result-duration" name="document-result-duration" value="-1">
													<span class="text-muted fs-10"><?php echo e(__('Set as -1 for unlimited storage duration')); ?>.</span>
												</div> 
												<?php $__errorArgs = ['document-result-duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('document-result-duration')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Max Allowed Words Limit for All Text Results')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('OpenAI will treat this limit as a stop marker. i.e. If you set it to 500, openai will try to stop as it will create a text with 500 tokens, but it can also ignore it on some cases')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" id="tokens" name="tokens" value="4000" required>
												</div> 
												<?php $__errorArgs = ['tokens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('tokens')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>
									
									
								</div>
							</div>
						</div>

						<div class="card mt-7 mb-7 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-box-circle-check text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Included Extension Features')); ?></h6>

								<?php if(App\Services\HelperService::extensionPlagiarism()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Plagiarism Check and Content Detector Extension')); ?></h6>
									
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Plagiarism Checker Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="plagiarism-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Content Detector Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="detector-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Scan tasks for AI Plagiarism Checker')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="plagiarism-pages" name="plagiarism-pages" value="0">
												</div> 
												<?php $__errorArgs = ['plagiarism-pages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('plagiarism-pages')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Scan tasks for AI Content Decoder')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="detector-pages" name="detector-pages" value="0">
												</div> 
												<?php $__errorArgs = ['detector-pages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('detector-pages')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>										
									</div>
								<?php endif; ?>
								
								<?php if(App\Services\HelperService::extensionVoiceClone()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('Voice Clone Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Voice Clone Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="voice-clone-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Maximum Allowed Created Voice Clones')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Set the number of voice clones that user can create')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="voice_clone_number" name="voice_clone_number" value="0">
												</div> 
												<?php $__errorArgs = ['voice_clone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('voice_clone_number')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>
									</div>
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionSoundStudio()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('Sound Studio Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Sound Studio Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="sound-studio-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionPhotoStudio()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Photo Studio Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Photo Studio Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="photo-studio-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionPebblely()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Product Photo Extension')); ?></h6>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Product Photo')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="product-photo-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionVideoImage()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Video (Image to Video) Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Image to Video Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="video-image-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionVideoText()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Video (Text to Video) Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Text to Video Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="video-text-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionVideoVideo()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Video (Video to Video) Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Video to Video Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="video-video-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionWordpressIntegration()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('Wordpress Integration Extension')); ?></h6>
									
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Wordpress Integration Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="wordpress-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Allowed Wordpress Websites')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Number of Wordpress Websites use will be able to connect')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="wordpress-website-number" name="wordpress-website-number" value="0">
												</div> 
												<?php $__errorArgs = ['wordpress-website-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('wordpress-website-number')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Allowed Wordpress Posts Scheduled')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Number of active posts in the schedule queue')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="wordpress-post-number" name="wordpress-post-number" value="0">
												</div> 
												<?php $__errorArgs = ['wordpress-post-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('wordpress-post-number')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>
									</div>
								<?php endif; ?>		
								
								<?php if(App\Services\HelperService::extensionAvatar()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Avatar Extension')); ?></h6>
									
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Avatar Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="avatar_feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Create Video from AI Avatar Videos Option')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="avatar_video_feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Create Video from AI Avatar Photos Option')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="avatar_image_feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Video from AI Avatar Videos Tasks')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="avatar_video_numbers" name="avatar_video_numbers" value="0">
												</div> 
												<?php $__errorArgs = ['avatar_video_numbers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('avatar_video_numbers')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Video from AI Avatar Photos Tasks')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="avatar_image_numbers" name="avatar_image_numbers" value="0">
												</div> 
												<?php $__errorArgs = ['avatar_image_numbers'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('avatar_image_numbers')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 						
										</div>
									</div>
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionVoiceIsolator()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Voice Isolator')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Voice Isolator Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="voice-isolator-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionFaceswap()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('Faceswap Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Faceswap Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="faceswap-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionMusic()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Music Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Music Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="music-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionSEO()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('SEO Tool Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('SEO Tool Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="seo-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionSocialMedia()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Social Media Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Social Media Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="social-media-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionChatShare()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('Chat Share Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Chat Share Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="chat-share-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionTextract()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Textract Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Textract Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="textract-feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionRealtimeChat()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI Realtime Voice Chat Extension')); ?></h6>

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI Realtime Voice Chat Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="chat_realtime_feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	
									</div>	
								<?php endif; ?>

								<?php if(App\Services\HelperService::extensionExternalChatbot()): ?>
									<div class="row subscription-extension-row">	
										<h6 class="fs-12 mb-5 text-muted"><?php echo e(__('AI External Chatbot Extension')); ?></h6>

										<div class="col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('AI External Chatbot Feature')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group mt-3">
													<label class="custom-switch">
														<input type="checkbox" name="chatbot_external_feature" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Allowed Chatbots')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" name="chatbot_external_quantity" value="0">
												</div> 
											</div> 						
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Allowed Domains per Chatbot')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" name="chatbot_external_domains" value="0">
												</div> 
											</div> 						
										</div>
									</div>	
								<?php endif; ?>


							</div>
						</div>

						<div class="card mt-7 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-filter-list text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Extra')); ?> <span class="text-muted">(<?php echo e(__('Optional')); ?>)</span></h6>

								<div class="row mt-6">
									<div class="col-12">
										<div class="input-box">	
											<h6><?php echo e(__('Primary Heading')); ?> </h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="primary-heading" name="primary-heading" value="<?php echo e(old('primary-heading')); ?>">
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-6">
									<div class="col-lg-12 col-md-12 col-sm-12">	
										<div class="input-box">	
											<h6><?php echo e(__('Plan Features')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-danger ml-3">(<?php echo e(__('Comma Seperated')); ?>)</span></h6>							
											<textarea class="form-control" name="features" rows="10"><?php echo e(old('features')); ?></textarea>
											<?php $__errorArgs = ['features'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('features')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>	
										</div>											
									</div>
								</div>
							</div>
						</div>
						

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<a href="<?php echo e(route('admin.finance.plans')); ?>" class="btn btn-cancel mr-2 pl-7 pr-7"><?php echo e(__('Return')); ?></a>
							<button type="submit" class="btn btn-primary pl-7 pr-7"><?php echo e(__('Create')); ?></button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-12">
			<div class="card border-0 cost-sticky">
				<div class="card-header border-0 pb-0">
					<h6 class="card-title fs-12 text-muted"><?php echo e(__('Calculate Cost and Margin')); ?> (USD)</h6>
				</div>						
				<div class="card-body pt-0">		
					<hr class="mt-0">							
					<h6 class="fs-12 font-weight-semibold"><?php echo e(__('OpenAI Cost')); ?>:</h6>
					<ul>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('GPT 3.5 Turbo Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-gpt-3t">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('GPT 4 Turbo Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-gpt-4t">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('GPT 4 Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-gpt-4">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('GPT 4o Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-gpt-4o">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('GPT 4o mini Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-gpt-4o-mini">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('o1 mini Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-o1-mini">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('o1 Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-o1">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('o3 mini Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-o3-mini">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Fine Tuned Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-fine-tuned">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Whisper')); ?> (STT): <span class="text-warning cost-right-side">$<span id="cost-whisper">0</span></span></ol>
					</ul>
					<h6 class="fs-12 mt-3 font-weight-semibold"><?php echo e(__('Anthropic Cost')); ?>:</h6>
					<ul>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Claude 3 Opus Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-opus">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Claude 3.5 Sonnet Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-sonnet">0</span></span></ol>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Claude 3.5 Haiku Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-haiku">0</span></span></ol>
					</ul>
					<h6 class="fs-12 mt-3 font-weight-semibold"><?php echo e(__('Gemini Cost')); ?>:</h6>
					<ul>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Gemini Pro Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-gemini">0</span></span></ol>
					</ul>
					<h6 class="fs-12 mt-3 font-weight-semibold"><?php echo e(__('Voiceover Cost')); ?>:</h6>
					<ul>
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('Characters')); ?> (TTS): <span class="text-warning cost-right-side">$<span id="cost-tts">0</span></span></ol>
					</ul>
					<hr>
					<h6 class="fs-12 mt-3 font-weight-semibold text-muted"><?php echo e(__('Target Price')); ?>: <span class="text-warning cost-right-side">$<span id="target-price">0</span></span></h6>
					<h6 class="fs-12 mt-3 font-weight-semibold text-muted"><?php echo e(__('Total Cost')); ?>: <span class="text-warning cost-right-side">$<span id="total-cost">0</span></span></h6>
					<h6 class="fs-12 mt-3 font-weight-semibold text-muted"><?php echo e(__('Net Profit')); ?>: <span class="text-warning cost-right-side">$<span id="net-profit">0</span></span></h6>
				</div>
			</div>
		</div>
			
		
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
	<script>
		let total_cost = 0;
		let target_price = 0;
		let net_profit = 0;
		let cost_gpt_3t = 0;
		let cost_gpt_4t = 0;
		let cost_gpt_4 = 0;
		let cost_gpt_4o = 0;
		let cost_gpt_4o_mini = 0;
		let cost_o1_mini = 0;
		let cost_o1_preview = 0;
		let cost_fine_tuned = 0;
		let cost_whisper = 0;
		let cost_opus = 0;
		let cost_sonnet = 0;
		let cost_haiku = 0;
		let cost_gemini = 0;
		let cost_tts = 0;

		$("#voiceover-vendors").select2({
			theme: "bootstrap-5",
			containerCssClass: "select2--small",
			dropdownCssClass: "select2--small",
		});

		$("#templates-models-list").select2({
			theme: "bootstrap-5",
			containerCssClass: "select2--small",
			dropdownCssClass: "select2--small",
		});

		$("#chats-models-list").select2({
			theme: "bootstrap-5",
			containerCssClass: "select2--small",
			dropdownCssClass: "select2--small",
		});

		$("#image-vendors").select2({
			theme: "bootstrap-5",
			containerCssClass: "select2--small",
			dropdownCssClass: "select2--small",
		});

		$('#gpt_3_turbo').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->gpt_3t); ?>';
			if (credits > 0) cost_gpt_3t = (credits/1000) * price; 
			if (credits == 0) cost_gpt_3t = 0; 
			let view = document.getElementById('cost-gpt-3t').innerHTML = cost_gpt_3t;
			calculateTotalCost();
		});

		$('#gpt_4_turbo').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->gpt_4t); ?>';
			if (credits > 0) cost_gpt_4t = (credits/1000) * price; 
			if (credits == 0) cost_gpt_4t = 0; 
			let view = document.getElementById('cost-gpt-4t').innerHTML = cost_gpt_4t;
			calculateTotalCost();
		});

		$('#gpt_4').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->gpt_4); ?>';
			if (credits > 0) cost_gpt_4 = (credits/1000) * price; 
			if (credits == 0) cost_gpt_4 = 0; 
			let view = document.getElementById('cost-gpt-4').innerHTML = cost_gpt_4;
			calculateTotalCost();
		});

		$('#gpt_4o').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->gpt_4o); ?>';
			if (credits > 0) cost_gpt_4o = (credits/1000) * price; 
			if (credits == 0) cost_gpt_4o = 0; 
			let view = document.getElementById('cost-gpt-4o').innerHTML = cost_gpt_4o;
			calculateTotalCost();
		});

		$('#gpt_4o_mini').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->gpt_4o_mini); ?>';
			if (credits > 0) cost_gpt_4o_mini = (credits/1000) * price; 
			if (credits == 0) cost_gpt_4o_mini = 0; 
			let view = document.getElementById('cost-gpt-4o-mini').innerHTML = cost_gpt_4o_mini;
			calculateTotalCost();
		});

		$('#o1_mini').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->o1_mini); ?>';
			if (credits > 0) cost_o1_mini = (credits/1000) * price; 
			if (credits == 0) cost_o1_mini = 0; 
			let view = document.getElementById('cost-o1-mini').innerHTML = cost_o1_mini;
			calculateTotalCost();
		});

		$('#o1_preview').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->o1_preview); ?>';
			if (credits > 0) cost_o1_preview = (credits/1000) * price; 
			if (credits == 0) cost_o1_preview = 0; 
			let view = document.getElementById('cost-o1-preview').innerHTML = cost_o1_preview;
			calculateTotalCost();
		});

		$('#fine_tune').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->fine_tuned); ?>';
			if (credits > 0) cost_fine_tuned = (credits/1000) * price; 
			if (credits == 0) cost_fine_tuned = 0; 
			let view = document.getElementById('cost-fine-tuned').innerHTML = cost_fine_tuned;
			calculateTotalCost();
		});

		$('#claude_3_opus').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->claude_3_opus); ?>';
			if (credits > 0) cost_opus = (credits/1000) * price; 
			if (credits == 0) cost_opus = 0; 
			let view = document.getElementById('cost-opus').innerHTML = cost_opus;
			calculateTotalCost();
		});

		$('#claude_3_sonnet').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->claude_3_sonnet); ?>';
			if (credits > 0) cost_sonnet = (credits/1000) * price; 
			if (credits == 0) cost_sonnet = 0; 
			let view = document.getElementById('cost-sonnet').innerHTML = cost_sonnet;
			calculateTotalCost();
		});

		$('#claude_3_haiku').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->claude_3_haiku); ?>';
			if (credits > 0) cost_haiku = (credits/1000) * price; 
			if (credits == 0) cost_haiku = 0; 
			let view = document.getElementById('cost-haiku').innerHTML = cost_haiku;
			calculateTotalCost();
		});

		$('#gemini_pro').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->gemini_pro); ?>';
			if (credits > 0) cost_gemini = (credits/1000) * price; 
			if (credits == 0) cost_gemini = 0; 
			let view = document.getElementById('cost-gemini').innerHTML = cost_gemini;
			calculateTotalCost();
		});

		$('#minutes').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->whisper); ?>';
			if (credits > 0) cost_whisper = credits * price; 
			if (credits == 0) cost_whisper = 0; 
			let view = document.getElementById('cost-whisper').innerHTML = cost_whisper;
			calculateTotalCost();
		});

		$('#characters').on('keyup', function () {
			let credits = $(this).val();
			let price = '<?php echo e($prices->aws_tts); ?>';
			if (credits > 0) cost_tts = (credits/1000000) * price; 
			if (credits == 0) cost_tts = 0; 
			let view = document.getElementById('cost-tts').innerHTML = cost_tts;
			calculateTotalCost();
		});

		$('#cost').on('keyup', function () {
			let cost = $(this).val();
			if (cost > 0) target_price = cost; 
			if (cost == 0) target_price = 0; 
			calculateTotalCost();
		});

		function duration_select(value) {
			if (value == 'lifetime') {
				$('#payment-gateways').css('display', 'none');
			} else {
				$('#payment-gateways').css('display', 'block');
			}
		} 

		function calculateTotalCost() {
			total_cost = cost_gpt_3t + cost_gpt_4t + cost_gpt_4 + cost_gpt_4o + cost_gpt_4o_mini + cost_o1_mini + cost_o1_preview + cost_fine_tuned + cost_whisper + cost_opus + cost_sonnet + cost_haiku + cost_gemini + cost_tts;
			document.getElementById('total-cost').innerHTML = total_cost;
			if (target_price > 0) {
				document.getElementById('target-price').innerHTML = target_price;
				net_profit = target_price - total_cost;
				document.getElementById('net-profit').innerHTML = net_profit;
			}
		}
	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/finance/plans/finance_subscription_create.blade.php ENDPATH**/ ?>