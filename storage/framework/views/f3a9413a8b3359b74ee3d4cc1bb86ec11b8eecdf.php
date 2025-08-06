

<?php $__env->startSection('metadata'); ?>
    <meta name="description" content="<?php echo e(__($metadata->register_description)); ?>">
    <meta name="keywords" content="<?php echo e(__($metadata->register_keywords)); ?>">
    <meta name="author" content="<?php echo e(__($metadata->register_author)); ?>">	    
    <link rel="canonical" href="<?php echo e($metadata->register_url); ?>">
    <title><?php echo e(__($metadata->register_title)); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($extension->maintenance_feature): ?>                    
        <div class="container">
            <div class="row text-center h-100vh align-items-center">
                <div class="col-md-12">
                    <img src="<?php echo e(theme_url($extension->maintenance_banner)); ?>" alt="Maintenance Image">
                    <h2 class="mt-4 font-weight-bold"><?php echo e(__($extension->maintenance_header)); ?></h2>
                    <h5><?php echo e(__($extension->maintenance_message)); ?> </h5>						
                </div>					
            </div>
            <footer class="text-center  align-items-center">
                <p class="text-muted"><?php echo e(__($extension->maintenance_message)); ?> </p>
            </footer>
        </div>
    <?php else: ?>
        <?php if(config('settings.registration') == 'enabled'): ?>
            <div class="container-fluid">                
                <div class="row login-background justify-content-center">

                    <div class="col-sm-12"> 
                        <div class="row justify-content-center subscribe-registration-background">
                            <div class="col-lg-8 col-md-12 col-sm-12 mx-auto">
                                <div class="card-body pt-8">

                                    <a class="navbar-brand register-logo" href="<?php echo e(url('/')); ?>"><img id="brand-img"  src="<?php echo e(URL::asset($settings->logo_frontend)); ?>" alt=""></a>
                                    
                                    <div class="registration-nav mb-8 mt-8">
                                        <div class="registration-nav-inner">					
                                            <div class="row text-center justify-content-center">
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="d-flex wizard-nav-text">
                                                        <div class="wizard-step-number current-step mr-3 fs-14" id="step-one-number">1</div>
                                                        <div class="wizard-step-title"><span class="font-weight-bold fs-14"><?php echo e(__('Create Account')); ?></span> <br> <span class="text-muted wizard-step-title-number fs-11 float-left"><?php echo e(__('STEP 1')); ?></span></div>
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-chevrons-right wizard-nav-chevron" id="step-one-icon"></i>
                                                    </div>									
                                                </div>	
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="d-flex wizard-nav-text">
                                                        <div class="wizard-step-number mr-3 fs-14" id="step-two-number">2</div>
                                                        <div class="wizard-step-title responsive"><span class="font-weight-bold fs-14"><?php echo e(__('Select Your Plan')); ?></span> <br> <span class="text-muted wizard-step-title-number fs-11 float-left"><?php echo e(__('STEP 2')); ?></span></div>
                                                    </div>	
                                                    <div>
                                                        <i class="fa-solid fa-chevrons-right wizard-nav-chevron" id="step-two-icon"></i>
                                                    </div>								
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="d-flex wizard-nav-text">
                                                        <div class="wizard-step-number mr-3 fs-14" id="step-three-number">3</div>
                                                        <div class="wizard-step-title"><span class="font-weight-bold fs-14"><?php echo e(__('Payment')); ?></span> <br> <span class="text-muted wizard-step-title-number fs-11 float-left"><?php echo e(__('STEP 3')); ?></span></div>
                                                    </div>								
                                                </div>
                                            </div>					
                                        </div>
                                    </div>
                                    
                                    <form method="POST" action="<?php echo e(route('register.subscriber')); ?>" class="subscribe-first-step" id="registration-form" onsubmit="process()">
                                        <?php echo csrf_field(); ?>                                
                                        
                                        <h3 class="text-center login-title mb-2"><?php echo e(__('Create Your Account with')); ?> <span class="text-info"><a href="<?php echo e(url('/')); ?>"><?php echo e(config('app.name')); ?></a></span></h3>
                                        <p class="fs-12 text-muted text-center mb-8"><?php echo e(__('Provide your personal information and click continue')); ?></p>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-box mb-4">                             
                                                    <label for="name" class="fs-12 font-weight-bold text-md-right"><?php echo e(__('First Name')); ?> <span class="text-required-register"><i class="fa-solid fa-asterisk"></i></span></label>
                                                    <input id="name" type="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" autocomplete="off" autofocus placeholder="<?php echo e(__('Your First Names')); ?>" required>             
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                                                              
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-box mb-4">                             
                                                    <label for="name" class="fs-12 font-weight-bold text-md-right"><?php echo e(__('Last Name')); ?> <span class="text-required-register"><i class="fa-solid fa-asterisk"></i></span></label>
                                                    <input id="lastname" type="name" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(old('lastname')); ?>" autocomplete="off" placeholder="<?php echo e(__('Your Last Names')); ?>" required>
                                                    <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                            
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-box mb-4">                             
                                                    <label for="email" class="fs-12 font-weight-bold text-md-right"><?php echo e(__('Email Address')); ?> <span class="text-required-register"><i class="fa-solid fa-asterisk"></i></span></label>
                                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="off"  placeholder="<?php echo e(__('Email Address')); ?>" required>
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                        
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-box mb-4">                             
                                                    <label for="country" class="fs-12 font-weight-bold text-md-right"><?php echo e(__('Country')); ?></label>
                                                    <select id="user-country" name="country" data-placeholder="<?php echo e(__('Select Your Country')); ?>" required>	
                                                        <?php $__currentLoopData = config('countries'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>" <?php if(config('settings.default_country') == $value): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
                                                    </select>                         
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-box">                            
                                                    <label for="password-input" class="fs-12 font-weight-bold text-md-right"><?php echo e(__('Password')); ?> <span class="text-required-register"><i class="fa-solid fa-asterisk"></i></span></label>
                                                    <input id="password-input" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="off" placeholder="<?php echo e(__('Password')); ?>">
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <?php echo e($message); ?>

                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                        
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="input-box">
                                                    <label for="password-confirm" class="fs-12 font-weight-bold text-md-right"><?php echo e(__('Confirm Password')); ?> <span class="text-required-register"><i class="fa-solid fa-asterisk"></i></span></label>                       
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="<?php echo e(__('Confirm Password')); ?>">                        
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-2">  
                                            <div class="d-flex">                        
                                                <label class="custom-switch">
                                                    <input type="checkbox" class="custom-switch-input" name="agreement" id="agreement" <?php echo e(old('remember') ? 'checked' : ''); ?> required>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-10 text-muted"><?php echo e(__('By continuing, I agree with your Terms and Conditions and Privacy Policies')); ?></a></span>
                                                </label>   
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">  
                                            <div class="d-flex">                        
                                                <label class="custom-switch">
                                                    <input type="checkbox" class="custom-switch-input" name="newsletter" id="newsletter" <?php echo e(old('remember') ? 'checked' : ''); ?> checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description fs-10 text-muted"><?php echo e(__('I agree to receive newsletters via email')); ?></span>
                                                </label>   
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <div class="form-group mt-4">                        
                                                <button type="submit" class="btn btn-primary ripple font-weight-bold register-continue-button" id="continue"><?php echo e(__('Continue')); ?></button>              
                                            </div>   
                                            <p class="fs-10 text-muted pt-3 mb-0"><?php echo e(__('Already have an account?')); ?></p>
                                            <div class="text-center">
                                                <a href="<?php echo e(route('login')); ?>"  class="fs-12 font-weight-bold special-action-sign"><?php echo e(__('Sign In')); ?></a>      
                                            </div>                                                                 
                                        </div>
                                    </form>
                                </div> 
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h5 class="text-center pt-9"><?php echo e(__('New user registration is disabled currently')); ?></h5>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Awselect JS -->
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect.min.js')); ?>"></script>
	<script src="<?php echo e(theme_url('js/awselect.js')); ?>"></script>
    <script type="text/javascript">
        let loading = `<span class="loading">
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					</span>`;

        function process() {
            $('#continue').prop('disabled', true);
            let btn = document.getElementById('continue');					
            btn.innerHTML = loading;  
            document.querySelector('#loader-line')?.classList?.remove('hidden'); 
            return; 
        }

    </script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/auth/subscribe-one.blade.php ENDPATH**/ ?>