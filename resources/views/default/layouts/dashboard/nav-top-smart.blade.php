<!-- TOP MENU BAR -->
<div class="smart-header header">
    <div class="container-fluid"> 
        <div class="d-flex">            
            <div class="go-back ml-1">
                <a class="fs-12 text-muted" href="{{ route('user.dashboard') }}"><i class="   fa-solid fa-chevrons-left fs-9 mr-2"></i>{{ __('Back to Dashboard') }}</a>
            </div>
            <a class="header-brand w-100 text-center" href="{{ url('/') }}">
                <img src="{{ URL::asset($settings->logo_dashboard)}}" class="header-brand-img desktop-lgo w-10 pt-2" alt="Dashboard Logo">
                <img src="{{ URL::asset($settings->logo_dashboard_collapsed)}}" class="header-brand-img mobile-logo" alt="Dashboard Logo">
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
                        <img src="@if(auth()->user()->profile_photo_path){{ asset(auth()->user()->profile_photo_path) }} @else {{ theme_url('img/users/avatar.jpg') }} @endif" alt="img" class="avatar avatar-md">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                    <div class="text-center pt-2">
                        <span class="text-center user fs-12 pb-0 font-weight-bold">{{ Auth::user()->name }}</span><br>
                        <span class="text-center fs-12 text-muted">{{ Auth::user()->job_role }}</span>
                        <div class="dropdown-divider mt-3"></div>    
                    </div>
                    @if (App\Services\HelperService::extensionSaaS())
                        <a class="dropdown-item d-flex" href="{{ route('user.plans') }}">
                            <span class="profile-icon fa-solid fa-box-circle-check"></span>
                            <div class="fs-12">{{ __('Pricing Plans') }}</div>
                        </a>  
                    @endif      
                    <a class="dropdown-item d-flex" href="{{ route('user.templates') }}">
                        <span class="profile-icon fa-solid fa-microchip-ai"></span>
                        <div class="fs-12">{{ __('Templates') }}</div>
                    </a>
                    <a class="dropdown-item d-flex" href="{{ route('user.workbooks') }}">
                        <span class="profile-icon fa-solid fa-folder-bookmark"></span>
                        <div class="fs-12">{{ __('Workbooks') }}</div>
                    </a> 
                    @if (App\Services\HelperService::extensionSaaS())
                        @if (config('payment.referral.enabled') == 'on')
                            <a class="dropdown-item d-flex" href="{{ route('user.referral') }}">
                                <span class="profile-icon fa-solid fa-badge-dollar"></span>
                                <span class="fs-12">{{ __('Affiliate Program') }}</span></a>
                            </a>
                        @endif                        
                        <a class="dropdown-item d-flex" href="{{ route('user.purchases') }}">
                            <span class="profile-icon fa-solid fa-money-check-pen"></span>
                            <span class="fs-12">{{ __('Orders') }}</span></a>
                        </a>
                    @endif
                    @role('user|subscriber')
                        @if (config('settings.user_support') == 'enabled')
                            <a class="dropdown-item d-flex" href="{{ route('user.support') }}">
                                <span class="profile-icon fa-solid fa-messages-question"></span>
                                <div class="fs-12">{{ __('Support Request') }}</div>
                            </a>
                        @endif        
                        @if (config('settings.user_notification') == 'enabled')
                            <a class="dropdown-item d-flex" href="{{ route('user.notifications') }}">
                                <span class="profile-icon fa-solid fa-message-exclamation"></span>
                                <div class="fs-12">{{ __('Notifications') }}</div>
                                @if (auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count())
                                    <span class="badge badge-warning ml-3">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count() }}</span>
                                @endif   
                            </a>
                        @endif 
                    @endrole
                    @role('admin')   
                        <a class="dropdown-item d-flex" href="{{ route('user.support') }}">
                            <span class="profile-icon fa-solid fa-messages-question"></span>
                            <div class="fs-12">{{ __('Support Request') }}</div>
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('user.notifications') }}">
                            <span class="profile-icon fa-solid fa-message-exclamation"></span>
                            <div class="fs-12">{{ __('Notifications') }}</div>
                            @if (auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count())
                                <span class="badge badge-warning ml-3">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\GeneralNotification')->count() }}</span>
                            @endif   
                        </a>
                    @endrole
                    <a class="dropdown-item d-flex" href="{{ route('user.profile') }}">
                        <span class="profile-icon fa-solid fa-id-badge"></span>
                        <span class="fs-12">{{ __('My Profile') }}</span></a>
                    </a>
                    <a class="dropdown-item d-flex" href="{{ route('user.security') }}">
                        <span class="profile-icon fa-solid fa-lock-hashtag"></span>
                        <div class="fs-12">{{ __('Change Password') }}</div>
                    </a>
                    <a class="dropdown-item d-flex" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> 
                        <span class="profile-icon fa-solid fa-right-from-bracket"></span>          
                        <div class="fs-12">{{ __('Logout') }}</div>                            
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- END MENU BAR -->
        </div>
    </div>
</div>
<!-- END TOP MENU BAR -->
