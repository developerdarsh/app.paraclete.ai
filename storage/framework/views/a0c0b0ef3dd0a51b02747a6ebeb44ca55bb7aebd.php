<!-- TOP MENU BAR -->
<div class="app-header header">
    <div class="container"> 
        <div class="d-flex">
            <a class="header-brand" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(URL::asset($settings->logo_dashboard)); ?>" class="header-brand-img desktop-lgo" alt="Dashboard Logo">
                <img src="<?php echo e(URL::asset($settings->logo_dashboard_collapsed)); ?>" class="header-brand-img mobile-logo" alt="Dashboard Logo">
            </a>
            <div class="app-sidebar__toggle2 nav-link icon" data-toggle="sidebar">
                <a class="open-toggle" href="<?php echo e(url('#')); ?>">
                    <span class="fa fa-align-justify header-icon"></span>
                </a>
            </div>
            <!-- SEARCH BAR -->
            <div id="search-bar">                
                <div>
                    <a class="nav-link icon" id="search-field-box">
                        <form id="search-field" action="<?php echo e(route('search')); ?>" method="POST" enctype="multipart/form-data">         
                            <?php echo csrf_field(); ?>                   
                            <input type="search" name='keyword' placeholder="<?php echo e(__('Search for templates and documents...')); ?>">
                            <span class="bx bx-search-alt-2"></span>
                        </form>                        
                    </a>
                </div>                
            </div>
            <!-- END SEARCH BAR -->
            <!-- MENU BAR -->
            <div class="d-flex order-lg-2 ml-auto"> 
                <div class="dropdown items-center flex">
                    <a href="#" class="nav-link icon btn-theme-toggle">
                        <span class="header-icon bx"></span>
                    </a>
                </div>
                <div class="dropdown header-notify">
                    <a class="nav-link icon" data-bs-toggle="dropdown">                        
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                            <span class="header-icon bx bx-bell pr-3"></span>
                            <?php if(auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()): ?>
                                <span class="pulse "></span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                            <?php if(config('settings.user_notification') == 'enabled'): ?>
                                <span class="header-icon bx bx-bell pr-3"></span>                            
                                    <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                                        <span class="pulse "></span>
                                    <?php endif; ?>                            
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                            <?php if(auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()): ?>
                                <div class="dropdown-header">
                                    <h6 class="mb-0 fs-12 font-weight-bold notification-dark-theme"><span id="total-notifications"></span> <span class="text-primary"><?php echo e(__('New')); ?></span> <?php echo e(__('Notification(s)')); ?></h6>
                                    <a href="#" class="mb-1 badge badge-primary ml-auto pl-3 pr-3 mark-read" id="mark-all"><?php echo e(__('Mark All Read')); ?></a>
                                </div>
                                <div class="notify-menu">
                                    <div class="notify-menu-inner">
                                        <?php $__currentLoopData = auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="d-flex dropdown-item border-bottom pl-4 pr-4">
                                                <?php if($notification->data['type'] == 'new-user'): ?>                                                
                                                    <div>
                                                        <a href="<?php echo e(route('admin.notifications.systemShow', [$notification->id])); ?>" class="d-flex">
                                                            <div class="notifyimg bg-info-transparent text-info"> <i class="fa-solid fa-user-check fs-18"></i></div>
                                                            <div class="mr-6">
                                                                <div class="font-weight-bold fs-12 notification-dark-theme"><?php echo e(__('New User Registered')); ?></div>
                                                                <div class="text-muted fs-10"><?php echo e(__('Name')); ?>: <?php echo e($notification->data['name']); ?></div>
                                                                <div class="small text-muted fs-10"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                                                            </div>                                            
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="badge badge-primary mark-read mark-as-read" data-id="<?php echo e($notification->id); ?>"><?php echo e(__('Mark as Read')); ?></a>
                                                    </div>
                                                <?php endif; ?>  
                                                <?php if($notification->data['type'] == 'new-payment'): ?>                                                
                                                    <div>
                                                        <a href="<?php echo e(route('admin.notifications.systemShow', [$notification->id])); ?>" class="d-flex">
                                                            <div class="notifyimg bg-info-green"> <i class="fa-solid fa-sack-dollar leading-loose"></i></div>
                                                            <div class="mr-4">
                                                                <div class="font-weight-bold fs-12 notification-dark-theme"><?php echo e(__('New User Payment')); ?></div>
                                                                <div class="text-muted fs-10"><?php echo e(__('From')); ?>: <?php echo e($notification->data['name']); ?></div>
                                                                <div class="small text-muted fs-10"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                                                            </div>                                            
                                                        </a>
                                                    </div>
                                                    <div class="text-right">
                                                        <a href="#" class="badge badge-primary mark-read mark-as-read ml-5" data-id="<?php echo e($notification->id); ?>"><?php echo e(__('Mark as Read')); ?></a>
                                                    </div>
                                                <?php endif; ?>  
                                                <?php if($notification->data['type'] == 'payout-request'): ?>                                                
                                                    <div>
                                                        <a href="<?php echo e(route('admin.notifications.systemShow', [$notification->id])); ?>" class="d-flex">
                                                            <div class="notifyimg bg-info-green"> <i class="fa-solid fa-face-tongue-money fs-20 leading-loose"></i></div>
                                                            <div class="mr-4">
                                                                <div class="font-weight-bold fs-12 notification-dark-theme"><?php echo e(__('New Payout Request')); ?></div>
                                                                <div class="text-muted fs-10"><?php echo e(__('From')); ?>: <?php echo e($notification->data['name']); ?></div>
                                                                <div class="small text-muted fs-10"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                                                            </div>                                            
                                                        </a>
                                                    </div>
                                                    <div class="text-right">
                                                        <a href="#" class="badge badge-primary mark-read mark-as-read ml-5" data-id="<?php echo e($notification->id); ?>"><?php echo e(__('Mark as Read')); ?></a>
                                                    </div>
                                                <?php endif; ?>                                                
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    </div>                              
                                </div>
                                <div class="view-all-button text-center">                            
                                    <a href="<?php echo e(route('admin.notifications.system')); ?>" class="fs-12 font-weight-bold notification-dark-theme"><?php echo e(__('View All Notifications')); ?></a>
                                </div>                            
                            <?php else: ?>
                                <div class="view-all-button text-center">
                                    <h6 class=" fs-12 font-weight-bold mb-1 notification-dark-theme"><?php echo e(__('There are no new notifications')); ?></h6>                                    
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(config('settings.user_notification') == 'enabled'): ?>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                                <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                                    <div class="dropdown-header">
                                        <h6 class="mb-0 fs-12 font-weight-bold notification-dark-theme"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()); ?> <span class="text-primary">New</span> Notification(s)</h6>
                                        <a href="#" class="mb-1 badge badge-primary ml-auto pl-3 pr-3 mark-read" id="mark-all"><?php echo e(__('Mark All Read')); ?></a>
                                    </div>
                                    <div class="notify-menu">
                                        <div class="notify-menu-inner">
                                            <?php $__currentLoopData = auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="dropdown-item border-bottom pl-4 pr-4">
                                                    <div>
                                                        <a href="<?php echo e(route('user.notifications.show', [$notification->id])); ?>" class="d-flex">
                                                            <div class="notifyimg bg-info-transparent text-info"> <i class="fa fa-bell fs-18"></i></div>
                                                            <div>
                                                                <div class="font-weight-bold fs-12 mt-2 notification-dark-theme"><?php echo e(__('New')); ?> <?php echo e($notification->data['type']); ?> <?php echo e(__('Notification')); ?></div>
                                                                <div class="small text-muted fs-10"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                                                            </div>                                            
                                                        </a>
                                                    </div>                                            
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                        </div>
                                    </div>
                                    <div class="view-all-button text-center">                            
                                        <a href="<?php echo e(route('user.notifications')); ?>" class="fs-12 font-weight-bold notification-dark-theme"><?php echo e(__('View All Notifications')); ?></a>
                                    </div>                             
                                <?php else: ?>
                                    <div class="view-all-button text-center">
                                        <h6 class=" fs-12 font-weight-bold mb-1 notification-dark-theme"><?php echo e(__('There are no new notifications')); ?></h6>                                    
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>                        
                    </div>
                </div>                
                <div class="dropdown header-languages mr-2">
                    <a class="nav-link icon" data-bs-toggle="dropdown">
                        <span class="header-icon bx bx-world"></span>
                    </a>
                    <div class="dropdown-menu animated">
                        <div class="local-menu">
                            <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($localeCode, explode(',', $settings->languages))): ?>
                                    <a href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" class="dropdown-item d-flex pl-4" hreflang="<?php echo e($localeCode); ?>">
                                        <div>
                                            <span class="font-weight-normal fs-12"><?php echo e(ucfirst($properties['native'])); ?></span> <span class="fs-10 text-muted"><?php echo e($localeCode); ?></span>
                                        </div>
                                    </a>   
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>                
                <div class="dropdown profile-dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="float-right">
                            <img src="<?php if(auth()->user()->profile_photo_path): ?><?php echo e(asset(auth()->user()->profile_photo_path)); ?> <?php else: ?> <?php echo e(theme_url('img/users/avatar.jpg')); ?> <?php endif; ?>" alt="img" class="avatar avatar-md">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                        <div class="text-center pt-2">
                            <span class="text-center user fs-12 pb-0 font-weight-bold"><?php echo e(Auth::user()->name); ?></span><br>
                            <span class="text-center fs-12 text-muted"><?php echo e(__(Auth::user()->job_role)); ?></span>
                            <div class="dropdown-divider mt-3"></div>    
                        </div>
                        <?php if(App\Services\HelperService::extensionSaaS()): ?>
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.plans')); ?>">
                                <span class="profile-icon bx bx-gift"></span>
                                <div class="fs-12"><?php echo e(__('Subscription Plans')); ?></div>
                            </a>  
                        <?php endif; ?>      
                        <a class="dropdown-item d-flex" href="<?php echo e(route('user.workbooks')); ?>">
                            <span class="profile-icon bx bx-folder-open"></span>
                            <div class="fs-12"><?php echo e(__('My Workbooks')); ?></div>
                        </a> 
                        <?php if(App\Services\HelperService::extensionSaaS()): ?>
                            <?php if(config('payment.referral.enabled') == 'on'): ?>
                                <a class="dropdown-item d-flex" href="<?php echo e(route('user.referral')); ?>">
                                    <span class="profile-icon bx bx-dollar-circle"></span>
                                    <span class="fs-12"><?php echo e(__('Affiliate Program')); ?></span></a>
                                </a>
                            <?php endif; ?>                        
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.purchases')); ?>">
                                <span class="profile-icon bx bx-file-blank"></span>
                                <span class="fs-12"><?php echo e(__('Orders')); ?></span></a>
                            </a>
                        <?php endif; ?>
                        <?php if(config('settings.user_support') == 'enabled'): ?>
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.support')); ?>">
                                <span class="profile-icon bx bx-support"></span>
                                <div class="fs-12"><?php echo e(__('Support Request')); ?></div>
                            </a>
                        <?php endif; ?>        
                        <?php if(config('settings.user_notification') == 'enabled'): ?>
                            <a class="dropdown-item d-flex" href="<?php echo e(route('user.notifications')); ?>">
                                <span class="profile-icon bx bx-notification"></span>
                                <div class="fs-12"><?php echo e(__('Notifications')); ?></div>
                                <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()): ?>
                                    <span class="badge badge-warning ml-3"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count()); ?></span>
                                <?php endif; ?>   
                            </a>
                        <?php endif; ?> 
                        <a class="dropdown-item d-flex" href="<?php echo e(route('user.profile')); ?>">
                            <span class="profile-icon bx bx-user-pin"></span>
                            <span class="fs-12"><?php echo e(__('Profile Settings')); ?></span></a>
                        </a>
                        <a class="dropdown-item d-flex" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> 
                            <span class="profile-icon bx bx-log-out"></span>          
                            <div class="fs-12"><?php echo e(__('Logout')); ?></div>                            
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MENU BAR -->
        </div>
    </div>
</div>
<!-- END TOP MENU BAR -->
<?php /**PATH /var/www/html/public_html/resources/views/classic/layouts/dashboard/nav-top.blade.php ENDPATH**/ ?>