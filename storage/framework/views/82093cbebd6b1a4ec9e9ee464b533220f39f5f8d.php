

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center"> 
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Update Subscription Plan')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-sack-dollar mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.finance.dashboard')); ?>"> <?php echo e(__('Finance Management')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.finance.plans')); ?>"> <?php echo e(__('Subscription Plans')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Update Subscription Plan')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>						
	<div class="row justify-content-center">

		<div class="col-lg-8 col-md-8 col-sm-12">
			<div class="card border-0">
				<div class="card-header border-0 pb-0">
					<h6 class="card-title fs-12 text-muted"><?php echo e(__('Update Subscription Plan')); ?> <span class="text-primary font-weight-bold"><?php echo e($id->plan_name); ?></span></h6>
				</div>
				<div class="card-body pt-0">	
					<hr class="mt-0">									
					<form action="<?php echo e(route('admin.finance.plan.update', $id)); ?>" method="POST" enctype="multipart/form-data">
						<?php echo method_field('PUT'); ?>
						<?php echo csrf_field(); ?>

						<div class="card mt-4 shadow-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-money-check-dollar-pen text-info fs-14 mr-1 fw-2"></i><?php echo e(__('General Settings')); ?></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">						
										<div class="input-box">	
											<h6><?php echo e(__('Plan Status')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="plan-status" name="plan-status" class="form-select" data-placeholder="<?php echo e(__('Select Plan Status')); ?>:">			
												<option value="active" <?php if($id->status == 'active'): ?> selected <?php endif; ?>><?php echo e(__('Active')); ?></option>
												<option value="hidden" <?php if($id->status == 'hidden'): ?> selected <?php endif; ?>><?php echo e(__('Hidden')); ?></option>
												<option value="closed" <?php if($id->status == 'closed'): ?> selected <?php endif; ?>><?php echo e(__('Closed')); ?></option>
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
												<input type="text" class="form-control" id="plan-name" name="plan-name" value="<?php echo e($id->plan_name); ?>" required>
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
												<input type="number" step="0.01" class="form-control" id="cost" name="cost" value="<?php echo e($id->price); ?>" required>
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
													<option value="<?php echo e($key); ?>" <?php if( $id->currency == $key): ?> selected <?php endif; ?>><?php echo e($value['name']); ?> - <?php echo e($key); ?> (<?php echo $value['symbol']; ?>)</option>
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
												<option value="monthly" <?php if($id->payment_frequency == 'monthly'): ?> selected <?php endif; ?>><?php echo e(__('Monthly')); ?></option>
												<option value="yearly" <?php if($id->payment_frequency == 'yearly'): ?> selected <?php endif; ?>><?php echo e(__('Yearly')); ?></option>
												<option value="lifetime" <?php if($id->payment_frequency == 'lifetime'): ?> selected <?php endif; ?>><?php echo e(__('Lifetime')); ?></option>
												
											</select>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Featured Plan')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="featured" name="featured" class="form-select" data-placeholder="<?php echo e(__('Select if Plan is Featured')); ?>:">		
												<option value=1 <?php if($id->featured == true): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
												<option value=0 <?php if($id->featured == false): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
											</select>
										</div> 						
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Free Plan')); ?></h6>
											<div class="form-group">							    
												<select id="free-plan" name="free-plan" class="form-select" data-placeholder="<?php echo e(__('Make this plan a Free Plan?')); ?>:">			
													<option value=1 <?php if($id->free == true): ?> selected <?php endif; ?>><?php echo e(('Yes')); ?></option>
													<option value=0 <?php if($id->free == false): ?> selected <?php endif; ?>><?php echo e(('No')); ?></option>
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
												<input type="number" class="form-control" id="days" name="days" min=0 value="<?php echo e($id->days); ?>">
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
												<input type="text" class="form-control" id="paypal_gateway_plan_id" name="paypal_gateway_plan_id" value="<?php echo e($id->paypal_gateway_plan_id); ?>">
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
												<input type="text" class="form-control" id="stripe_gateway_plan_id" name="stripe_gateway_plan_id" value="<?php echo e($id->stripe_gateway_plan_id); ?>">
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
												<input type="text" class="form-control" id="paystack_gateway_plan_id" name="paystack_gateway_plan_id" value="<?php echo e($id->paystack_gateway_plan_id); ?>">
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
												<input type="text" class="form-control" id="razorpay_gateway_plan_id" name="razorpay_gateway_plan_id" value="<?php echo e($id->razorpay_gateway_plan_id); ?>">
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
												<input type="text" class="form-control" id="flutterwave_gateway_plan_id" name="flutterwave_gateway_plan_id" value="<?php echo e($id->flutterwave_gateway_plan_id); ?>">
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
												<input type="text" class="form-control" id="paddle_gateway_plan_id" name="paddle_gateway_plan_id" value="<?php echo e($id->paddle_gateway_plan_id); ?>">
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
											<h6><?php echo e(__('GPT 3 Turbo Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="gpt_3_turbo" name="gpt_3_turbo" value="<?php echo e($id->gpt_3_turbo_credits); ?>" required placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('GPT 4 Turbo Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="gpt_4_turbo" name="gpt_4_turbo" value="<?php echo e($id->gpt_4_turbo_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('GPT 4o Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="gpt_4o" name="gpt_4o" value="<?php echo e($id->gpt_4o_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('GPT 4o mini Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="gpt_4o_mini" name="gpt_4o_mini" value="<?php echo e($id->gpt_4o_mini_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('GPT 4 Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="gpt_4" name="gpt_4" value="<?php echo e($id->gpt_4_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('o1 preview Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="o1_preview" name="o1_preview" value="<?php echo e($id->o1_preview_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('o1 mini Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="o1_mini" name="o1_mini" value="<?php echo e($id->o1_mini_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Fine Tuned Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="fine_tune" name="fine_tune" value="<?php echo e($id->fine_tune_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Claude 3 Opus Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="claude_3_opus" name="claude_3_opus" value="<?php echo e($id->claude_3_opus_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Claude 3.5 Sonnet Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="claude_3_sonnet" name="claude_3_sonnet" value="<?php echo e($id->claude_3_sonnet_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Claude 3.5 Haiku Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="claude_3_haiku" name="claude_3_haiku" value="<?php echo e($id->claude_3_haiku_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Gemini Pro Model Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="gemini_pro" name="gemini_pro" value="<?php echo e($id->gemini_pro_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Each text generation task counts output words created')); ?>. <?php echo e(__('Set as -1 for unlimited words')); ?>. (<?php echo e(__('1 credit = 1 word')); ?>).</span>
											</div> 
										</div> 						
									</div>

									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Characters Included')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="characters" name="characters" value="<?php echo e($id->characters); ?>" placeholder="0">
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
												<input type="number" class="form-control" id="minutes" name="minutes" value="<?php echo e($id->minutes); ?>" placeholder="0">
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
									
									<div class="col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Image Credits')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-muted ml-3">(<?php echo e(__('Renewed Monthly')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="image-credits" name="image-credits" value="<?php echo e($id->image_credits); ?>" placeholder="0">
												<span class="text-muted fs-10"><?php echo e(__('Valid for all image vendors')); ?>. <?php echo e(__('Set as -1 for unlimited images')); ?>.</span>
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
													<input type="checkbox" name="writer-feature" class="custom-switch-input" <?php if($id->writer_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="image-feature" class="custom-switch-input" <?php if($id->image_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="voiceover-feature" class="custom-switch-input" <?php if($id->voiceover_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="whisper-feature" class="custom-switch-input" <?php if($id->transcribe_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="chat-feature" class="custom-switch-input" <?php if($id->chat_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="code-feature" class="custom-switch-input" <?php if($id->code_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="personal-openai-api" class="custom-switch-input" <?php if($id->personal_openai_api == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="personal-claude-api" class="custom-switch-input" <?php if($id->personal_claude_api == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="personal-gemini-api" class="custom-switch-input" <?php if($id->personal_gemini_api == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="personal-sd-api" class="custom-switch-input" <?php if($id->personal_sd_api == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="wizard-feature" class="custom-switch-input" <?php if($id->wizard_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="vision-feature" class="custom-switch-input" <?php if($id->vision_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="chat-image-feature" class="custom-switch-input" <?php if($id->chat_image_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="file-chat-feature" class="custom-switch-input" <?php if($id->file_chat_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="internet-feature" class="custom-switch-input" <?php if($id->internet_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="chat-web-feature" class="custom-switch-input" <?php if($id->chat_web_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="smart-editor-feature" class="custom-switch-input" <?php if($id->smart_editor_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="rewriter-feature" class="custom-switch-input" <?php if($id->rewriter_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="personal-chat-feature" class="custom-switch-input" <?php if($id->personal_chats_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="personal-template-feature" class="custom-switch-input" <?php if($id->personal_templates_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="brand-voice-feature" class="custom-switch-input" <?php if($id->brand_voice_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="youtube-feature" class="custom-switch-input" <?php if($id->youtube_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="rss-feature" class="custom-switch-input" <?php if($id->rss_feature == true): ?> checked <?php endif; ?>>
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
													<input type="checkbox" name="integration-feature" class="custom-switch-input" <?php if($id->integration_feature == true): ?> checked <?php endif; ?>>
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
								<h6 class="fs-12 font-weight-bold mb-5 plan-title-bar"><i class="fa-solid fa-box-circle-check text-info fs-14 mr-1 fw-2"></i><?php echo e(__('Included Service Limits')); ?></h6>

								<div class="row">								
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Available Models for All Templates')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Subscribers will only have access to the selected models for all AI features related to generating text')); ?>."></i></h6>
											<select class="form-select" id="templates-models-list" name="templates_models_list[]" data-placeholder="<?php echo e(__('Choose Models for Templates')); ?>" multiple>
												<option value="gpt-3.5-turbo-0125" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-3.5-turbo-0125'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 3.5 Turbo')); ?></option>												
												<option value="gpt-4" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4')); ?></option>
												<option value="gpt-4o" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4o'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4o')); ?></option>
												<option value="gpt-4o-mini" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4o-mini'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4o mini')); ?></option>
												<option value="gpt-4-0125-preview" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4-0125-preview'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4 Turbo')); ?></option>
												<option value="gpt-4-turbo-2024-04-09" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4-turbo-2024-04-09'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4 Turbo with Vision')); ?> </option>	
												<option value="o1-preview" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'o1-preview'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('o1 preview')); ?> </option>	
												<option value="o1-mini" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'o1-mini'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('o1 mini')); ?> </option>	
												<option value='claude-3-opus-20240229' <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'claude-3-opus-20240229'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Claude 3 Opus')); ?></option>																																																																																																																											
												<option value='claude-3-5-sonnet-20241022' <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'claude-3-5-sonnet-20241022'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Claude 3.5 Sonnet')); ?></option>																																																																																																																											
												<option value='claude-3-5-haiku-20241022' <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'claude-3-5-haiku-20241022'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Claude 3.5 Haiku')); ?></option>																																																																																																																										
												<option value='gemini_pro' <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gemini_pro'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Gemini Pro')); ?></option>																																																																																																																										
												<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($model->model); ?>" <?php $__currentLoopData = $model_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == $model->model): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($model->description); ?> (<?php echo e(__('Fine Tune Model')); ?>)</option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Available Models for All Chat Bots')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Subscribers will only have access to the selected models for all AI features related to chat bots')); ?>."></i></h6>
											<select class="form-select" id="chats-models-list" name="chats_models_list[]" data-placeholder="<?php echo e(__('Choose Models for Chat Bots')); ?>" multiple>
												<option value="gpt-3.5-turbo-0125" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-3.5-turbo-0125'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 3.5 Turbo')); ?></option>
												<option value="gpt-4" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4')); ?></option>												
												<option value="gpt-4o" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4o'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4o')); ?></option>	
												<option value="gpt-4o-mini" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4o-mini'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4o mini')); ?></option>	
												<option value="gpt-4-0125-preview" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4-0125-preview'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4 Turbo')); ?></option>
												<option value="gpt-4-turbo-2024-04-09" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gpt-4-turbo-2024-04-09'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GPT 4 Turbo with Vision')); ?></option>																																																																																																																										
												<option value="o1-preview" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'o1-preview'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('o1 preview')); ?> </option>	
												<option value="o1-mini" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'o1-mini'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('o1 mini')); ?> </option>	
												<option value='claude-3-opus-20240229' <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'claude-3-opus-20240229'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Claude 3 Opus')); ?></option>																																																																																																																											
												<option value='claude-3-5-sonnet-20241022' <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'claude-3-5-sonnet-20241022'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Claude 3.5 Sonnet')); ?></option>																																																																																																																											
												<option value='claude-3-5-haiku-20241022' <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'claude-3-5-haiku-20241022'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Claude 3.5 Haiku')); ?></option>
												<option value='gemini_pro' <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gemini_pro'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Gemini Pro')); ?></option>
												<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($model->model); ?>" <?php $__currentLoopData = $model_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == $model->model): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($model->description); ?> (<?php echo e(__('Fine Tune Model')); ?>)</option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>		


									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Template Categories Access')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="templates" name="templates" class="form-select" data-placeholder="<?php echo e(__('Set Templates Access')); ?>">
												<option value="all" <?php if($id->templates == 'all'): ?> selected <?php endif; ?>><?php echo e(__('All Templates')); ?></option>
												<option value="free" <?php if($id->templates == 'free'): ?> selected <?php endif; ?>><?php echo e(__('Only Free Templates')); ?></option>																																											
												<option value="standard" <?php if($id->templates == 'standard'): ?> selected <?php endif; ?>> <?php echo e(__('Up to Standard Templates')); ?></option>
												<option value="professional" <?php if($id->templates == 'professional'): ?> selected <?php endif; ?>> <?php echo e(__('Up to Professional Templates')); ?></option>
												<option value="premium" <?php if($id->templates == 'premium'): ?> selected <?php endif; ?>> <?php echo e(__('Up to Premium Templates')); ?> (<?php echo e(__('All')); ?>)</option>																																																														
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('AI Chat Categories Access')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="chats" name="chats" class="form-select" data-placeholder="<?php echo e(__('Set AI Chat Type Access')); ?>">
												<option value="all" <?php if($id->chats == 'all'): ?> selected <?php endif; ?>><?php echo e(__('All Chat Types')); ?></option>
												<option value="free" <?php if($id->chats == 'free'): ?> selected <?php endif; ?>><?php echo e(__('Only Free Chat Types')); ?></option>																																											
												<option value="standard" <?php if($id->chats == 'standard'): ?> selected <?php endif; ?>> <?php echo e(__('Up to Standard Chat Types')); ?></option>
												<option value="professional" <?php if($id->chats == 'professional'): ?> selected <?php endif; ?>> <?php echo e(__('Up to Professional Chat Types')); ?></option>
												<option value="premium" <?php if($id->chats == 'premium'): ?> selected <?php endif; ?>> <?php echo e(__('Up to Premium Chat Types')); ?> (<?php echo e(__('All')); ?>)</option>																																																														
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6><?php echo e(__('Supported AI Voiceover Vendors')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Only listed TTS voices of the listed vendors will be available for the subscriber. Make sure to include respective vendor API keys in the Davinci settings page.')); ?>."></i></h6>
											<select class="form-select" id="voiceover-vendors" name="voiceover_vendors[]" data-placeholder="<?php echo e(__('Choose Voiceover vendors')); ?>" multiple>
												<option value='aws' <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'aws'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('AWS')); ?></option>																															
												<option value='azure' <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'azure'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('Azure')); ?></option>																																																														
												<option value='gcp' <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'gcp'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('GCP')); ?></option>																																																														
												<option value='openai' <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'openai'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('OpenAI')); ?></option>																																																														
												<option value='elevenlabs' <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'elevenlabs'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('ElevenLabs')); ?></option>																																																																																																																											
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">							
										<div class="input-box">								
											<h6><?php echo e(__('Number of Team Members')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Define how many team members a user is allowed to create under this subscription plan')); ?>."></i></h6>
											<div class="form-group">							    
												<input type="number" class="form-control" id="team-members" name="team-members" value="<?php echo e($id->team_members); ?>" required>
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

									<div class="row">

										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="input-box">
												<h6><?php echo e(__('Included AI Image Vendors')); ?> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Only listed AI Image vendors models will be available for the subscriber. Make sure to include respective vendor API keys in the Davinci settings page.')); ?>."></i></h6>
												<select class="form-select" id="image-vendors" name="image_vendors[]" data-placeholder="<?php echo e(__('Choose AI Image vendors')); ?>" multiple>
													<option value='openai' <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'openai'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e(__('OpenAI')); ?></option>																															
													<option value='sd' <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'sd'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> <?php echo e(__('Stable Diffusion')); ?></option>																															
													<?php if(App\Services\HelperService::extensionFlux()): ?>
														<option value='falai' <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'falai'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> <?php echo e(__('Fal AI')); ?></option>																																																																																													
													<?php endif; ?>
													<?php if(App\Services\HelperService::extensionMidjourney()): ?>
														<option value='midjourney' <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value == 'midjourney'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> <?php echo e(__('Midjourney')); ?></option>																																																																																													
													<?php endif; ?>
												</select>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Maximum Allowed CSV File Size')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Set the maximum CSV file size limit that subscriber is allowed to process')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0.1" step="0.1" id="chat-csv-file-size" name="chat-csv-file-size" value="<?php echo e($id->chat_csv_file_size); ?>">
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
													<input type="number" class="form-control" min="0.1" step="0.1" id="chat-pdf-file-size" name="chat-pdf-file-size" value="<?php echo e($id->chat_pdf_file_size); ?>">
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
													<input type="number" class="form-control" min="0.1" step="0.1" id="chat-word-file-size" name="chat-word-file-size" value="<?php echo e($id->chat_word_file_size); ?>">
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
													<input type="number" class="form-control" id="file-result-duration" name="file-result-duration" value="<?php echo e($id->file_result_duration); ?>">
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
													<input type="number" class="form-control" id="document-result-duration" name="document-result-duration" value="<?php echo e($id->document_result_duration); ?>">
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
												<h6><?php echo e(__('Max Allowed Words Limit for All Text Results')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-2 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('OpenAI will treat this limit as a stop marker. i.e. If you set it to 500, openai will try to stop as it will create a text with 500 tokens, but it can also ignore it on some cases')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" id="tokens" name="tokens" value="<?php echo e($id->max_tokens); ?>" required>
												</div> 
												<?php $__errorArgs = ['tokens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('words')); ?></p>
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
														<input type="checkbox" name="plagiarism-feature" class="custom-switch-input"  <?php if($id->plagiarism_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="detector-feature" class="custom-switch-input" <?php if($id->ai_detector_feature == true): ?> checked <?php endif; ?>>
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Scan tasks for AI Plagiarism Checker')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="plagiarism-pages" name="plagiarism-pages" value="<?php echo e($id->plagiarism_pages); ?>">
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
													<input type="number" class="form-control" min="0" id="detector-pages" name="detector-pages" value="<?php echo e($id->ai_detector_pages); ?>">
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
														<input type="checkbox" name="voice-clone-feature" class="custom-switch-input" <?php if($id->voice_clone_feature == true): ?> checked <?php endif; ?>>
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Maximum Allowed Created Voice Clones')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Set the number of voice clones that user can create')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="voice_clone_number" name="voice_clone_number" value="<?php echo e($id->voice_clone_number); ?>">
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
														<input type="checkbox" name="sound-studio-feature" class="custom-switch-input" <?php if($id->sound_studio_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="photo-studio-feature" class="custom-switch-input" <?php if($id->photo_studio_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="product-photo-feature" class="custom-switch-input" <?php if($id->product_photo_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="video-image-feature" class="custom-switch-input" <?php if($id->video_image_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="video-text-feature" class="custom-switch-input" <?php if($id->video_text_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="video-video-feature" class="custom-switch-input" <?php if($id->video_video_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="wordpress-feature" class="custom-switch-input" <?php if($id->wordpress_feature == true): ?> checked <?php endif; ?>>
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>	

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Allowed Wordpress Websites')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="<?php echo e(__('Number of Wordpress Websites use will be able to connect')); ?>."></i></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="wordpress-website-number" name="wordpress-website-number" value="<?php echo e($id->wordpress_website_number); ?>">
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
													<input type="number" class="form-control" min="0" id="wordpress-post-number" name="wordpress-post-number" value="<?php echo e($id->wordpress_post_number); ?>">
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
														<input type="checkbox" name="avatar_feature" class="custom-switch-input" <?php if($id->avatar_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="avatar_video_feature" class="custom-switch-input" <?php if($id->avatar_video_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="avatar_image_feature" class="custom-switch-input" <?php if($id->avatar_image_feature == true): ?> checked <?php endif; ?>>
														<span class="custom-switch-indicator"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12">							
											<div class="input-box">								
												<h6><?php echo e(__('Total Video from AI Avatar Videos Tasks')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<div class="form-group">							    
													<input type="number" class="form-control" min="0" id="avatar_video_numbers" name="avatar_video_numbers" value="<?php echo e($id->avatar_video_numbers); ?>">
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
													<input type="number" class="form-control" min="0" id="avatar_image_numbers" name="avatar_image_numbers" value="<?php echo e($id->avatar_image_numbers); ?>">
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
														<input type="checkbox" name="voice-isolator-feature" class="custom-switch-input" <?php if($id->voice_isolator_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="faceswap-feature" class="custom-switch-input" <?php if($id->faceswap_feature == true): ?> checked <?php endif; ?>>
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
														<input type="checkbox" name="music-feature" class="custom-switch-input" <?php if($id->music_feature == true): ?> checked <?php endif; ?>>
														<span class="custom-switch-indicator"></span>
													</label>
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
											<h6><?php echo e(__('Primary Heading')); ?></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="primary-heading" name="primary-heading" value="<?php echo e($id->primary_heading); ?>">
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-6">
									<div class="col-lg-12 col-md-12 col-sm-12">	
										<div class="input-box">	
											<h6><?php echo e(__('Plan Features')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <span class="text-danger ml-3">(<?php echo e(__('Comma Seperated')); ?>)</span></h6>							
											<textarea class="form-control" name="features" rows="10"><?php echo e($id->plan_features); ?></textarea>
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
							<button type="submit" class="btn btn-primary pl-7 pr-7"><?php echo e(__('Update')); ?></button>							
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
						<ol class="fs-11 mb-1 text-muted"><?php echo e(__('o1 preview Model')); ?>: <span class="text-warning cost-right-side">$<span id="cost-o1-preview">0</span></span></ol>
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
		let list = "<?php echo e($id->voiceover_vendors); ?>";
		let templates = "<?php echo e($id->model); ?>";
		let chats = "<?php echo e($id->model_chat); ?>";
		let images = "<?php echo e($id->image_vendors); ?>";
		list = list.split(', ')
		templates = templates.split(', ')
		chats = chats.split(', ')
		images = images.split(', ')
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

		$(function(){
			$("#voiceover-vendors").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(list).trigger('change.select2');

			$("#templates-models-list").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(templates).trigger('change.select2');

			$("#chats-models-list").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(chats).trigger('change.select2');

			$("#image-vendors").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(images).trigger('change.select2');
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/default/admin/finance/plans/finance_subscription_edit.blade.php ENDPATH**/ ?>