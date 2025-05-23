<!-- TOP MENU BAR -->
<div class="smart-header header">
    <div class="container-fluid"> 
        <div class="d-flex">            
            <div class="go-back ml-1">
                <a class="fs-12 text-muted" href="<?php echo e(route('user.dashboard')); ?>"><i class="   fa-solid fa-chevrons-left fs-9 mr-2"></i><?php echo e(__('Back to Dashboard')); ?></a>
            </div>
            <a class="header-brand w-100 text-center" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(URL::asset($settings->logo_dashboard)); ?>" class="header-brand-img desktop-lgo w-10 pt-2" alt="Dashboard Logo">
                <img src="<?php echo e(URL::asset($settings->logo_dashboard_collapsed)); ?>" class="header-brand-img mobile-logo" alt="Dashboard Logo">
            </a>

            <!-- MENU BAR -->
            <div class="dropdown items-center flex">
                <a href="#" class="nav-link icon btn-theme-toggle">
                    <span class="header-icon    fa-solid text-white"></span>
                </a>
            </div> 
            <div class="dropdown profile-dropdown">
                <a href="#" class="nav-link pt-2" data-bs-toggle="dropdown">
                    <span class="float-right">
                        <img src="<?php if(auth()->user()->profile_photo_path): ?><?php echo e(asset(auth()->user()->profile_photo_path)); ?> <?php else: ?> <?php echo e(theme_url('img/users/avatar.jpg')); ?> <?php endif; ?>" alt="img" class="avatar avatar-md">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                    <div class="text-center pt-2">
                        <span class="text-center user fs-12 pb-0 font-weight-bold"><?php echo e(Auth::user()->name); ?></span><br>
                        <span class="text-center fs-12 text-muted"><?php echo e(Auth::user()->job_role); ?></span>
                        <div class="dropdown-divider mt-3"></div>    
                    </div>
                    <?php if(App\Services\HelperService::extensionSaaS()): ?>
                        <a class="dropdown-item d-flex" href="<?php echo e(route('user.plans')); ?>">
                            <span class="profile-icon fa-solid fa-box-circle-check"></span>
                            <div class="fs-12"><?php echo e(__('Pricing Plans')); ?></div>
                        </a>  
                    <?php endif; ?>      
                    <a class="dropdown-item d-flex" href="<?php echo e(route('user.templates')); ?>">
                        <span class="profile-icon fa-solid fa-microchip-ai"></span>
                        <div class="fs-12"><?php echo e(__('Templates')); ?></div>
                    </a>
                    <a class="dropdown-item d-flex" href="<?php echo e(route('user.workbooks')); ?>">
                        <span class="profile-icon fa-solid fa-folder-bookmark"></span>
                        <div class="fs-12"><?php echo e(__('Workbooks')); ?></div>
                    </a> 
                    <?php if(App\Services\HelperService::extensionSaaS()): ?>
                        <?php if(config('payment.referral.enabled') == 'on'): ?>
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.referral')); ?>">
                                <span class="profile-icon fa-solid fa-badge-dollar"></span>
                                <span class="fs-12"><?php echo e(__('Affiliate Program')); ?></span></a>
                            </a>
                        <?php endif; ?>                        
                        <a class="dropdown-item d-flex" href="<?php echo e(route('user.purchases')); ?>">
                            <span class="profile-icon fa-solid fa-money-check-pen"></span>
                            <span class="fs-12"><?php echo e(__('Orders')); ?></span></a>
                        </a>
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.user_support') == 'enabled'): ?>
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.support')); ?>">
                                <span class="profile-icon fa-solid fa-messages-question"></span>
                                <div class="fs-12"><?php echo e(__('Support Request')); ?></div>
                            </a>
                        <?php endif; ?>        
                        <?php if(config('settings.user_notification') == 'enabled'): ?>
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.notifications')); ?>">
                                <span class="profile-icon fa-solid fa-message-exclamation"></span>
                                <div class="fs-12"><?php echo e(__('Notifications')); ?></div>
                                <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                                    <span class="badge badge-warning ml-3"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()); ?></span>
                                <?php endif; ?>   
                            </a>
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>   
                        <a class="dropdown-item d-flex" href="<?php echo e(route('user.support')); ?>">
                            <span class="profile-icon fa-solid fa-messages-question"></span>
                            <div class="fs-12"><?php echo e(__('Support Request')); ?></div>
                        </a>
                        <a class="dropdown-item d-flex" href="<?php echo e(route('user.notifications')); ?>">
                            <span class="profile-icon fa-solid fa-message-exclamation"></span>
                            <div class="fs-12"><?php echo e(__('Notifications')); ?></div>
                            <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                                <span class="badge badge-warning ml-3"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()); ?></span>
                            <?php endif; ?>   
                        </a>
                    <?php endif; ?>
                    <a class="dropdown-item d-flex" href="<?php echo e(route('user.profile')); ?>">
                        <span class="profile-icon fa-solid fa-id-badge"></span>
                        <span class="fs-12"><?php echo e(__('My Profile')); ?></span></a>
                    </a>
                    <a class="dropdown-item d-flex" href="<?php echo e(route('user.security')); ?>">
                        <span class="profile-icon fa-solid fa-lock-hashtag"></span>
                        <div class="fs-12"><?php echo e(__('Change Password')); ?></div>
                    </a>
                    <a class="dropdown-item d-flex" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> 
                        <span class="profile-icon fa-solid fa-right-from-bracket"></span>          
                        <div class="fs-12"><?php echo e(__('Logout')); ?></div>                            
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>

            <!-- END MENU BAR -->
        </div>
    </div>
</div>
<!-- END TOP MENU BAR -->
<?php /**PATH /var/www/html/public_html/resources/views/default/layouts/dashboard/nav-top-smart.blade.php ENDPATH**/ ?>