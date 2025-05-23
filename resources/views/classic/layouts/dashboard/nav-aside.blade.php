<!-- SIDE MENU BAR -->
<aside class="app-sidebar"> 
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/')}}">
            <img src="{{ URL::asset($settings->logo_dashboard)}}" class="header-brand-img desktop-lgo" alt="Dashboard Logo">
            <img src="{{ URL::asset($settings->logo_dashboard_collapsed)}}" class="header-brand-img mobile-logo" alt="Dashboard Logo">
        </a>
        <div class="app-sidebar__toggle" data-toggle="sidebar">
            <a class="open-toggle" href="{{url('#')}}">
                <svg class="w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 6l-6 6l6 6"></path>
                  </svg>
            </a>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        
        <li class="side-item side-item-category mt-4 mb-3">{{ __('User') }}</li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('user.dashboard') }}">
            <span class="side-menu__icon bx bx-spreadsheet"></span>
            <span class="side-menu__label">{{ __('Dashboard') }}</span></a>
        </li> 
        @if (config('settings.writer_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.templates') }}">
                <span class="side-menu__icon bx bx-file"></span>
                <span class="side-menu__label">{{ __('AI Writer') }}</span></a>
            </li>
        @endif 
        @if (config('settings.wizard_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.wizard') }}">
                <span class="side-menu__icon bx bxs-magic-wand"></span>
                <span class="side-menu__label">{{ __('AI Article Wizard') }}</span></a>
            </li> 
        @endif
        @if (config('settings.smart_editor_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.smart.editor') }}">
                <span class="side-menu__icon bx bx-brain"></span>
                <span class="side-menu__label">{{ __('Templates') }}</span></a>
            </li> 
        @endif
        @if (App\Services\HelperService::extensionAvatar())
            @if (App\Services\HelperService::checkAvatarFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.extension.avatar') }}">
                    <span class="side-menu__icon fa-solid fa-aperture"></span>
                    <span class="side-menu__label">{{ __('AI Avatar') }}</span></a>
                </li> 
            @endif
        @endif
        @if (config('settings.rewriter_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.rewriter') }}">
                <span class="side-menu__icon bx bx-edit-alt"></span>
                <span class="side-menu__label">{{ __('AI ReWriter') }}</span></a>
            </li> 
        @endif
        @if (App\Services\HelperService::extensionVideoImage())
            @if (App\Services\HelperService::checkVideoImageFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.video') }}">
                    <span class="side-menu__icon fa-solid fa-video"></span>
                    <span class="side-menu__label">{{ __('AI Video Image') }}</span></a>
                </li> 
            @endif
        @endif
        @if (App\Services\HelperService::extensionVideoText())
            @if (App\Services\HelperService::checkVideoTextFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.video.text') }}">
                    <span class="side-menu__icon fa-solid fa-video-plus"></span>
                    <span class="side-menu__label">{{ __('AI Video Text') }}</span></a>
                </li> 
            @endif
        @endif
        @if (config('settings.image_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.images') }}">
                <span class="side-menu__icon bx bx-image"></span>
                <span class="side-menu__label">{{ __('AI Images') }}</span></a>
            </li> 
        @endif
        @if (App\Services\HelperService::extensionPhotoStudio())
            @if (App\Services\HelperService::checkPhotoStudioFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.photo.studio') }}">
                    <span class="side-menu__icon lead-3 fa-solid fa-photo-film"></span>
                    <span class="side-menu__label">{{ __('AI Photo Studio') }}</span></a>
                </li> 
            @endif
        @endif
        @if (App\Services\HelperService::extensionPebblely())
            @if (App\Services\HelperService::checkPebblelyFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.extension.product.photo') }}">
                    <span class="side-menu__icon fa-solid fa-aperture"></span>
                    <span class="side-menu__label">{{ __('AI Product Photo') }}</span></a>
                </li> 
            @endif
        @endif 
        @if (App\Services\HelperService::extensionSocialMedia())
            @if (App\Services\HelperService::checkSocialMediaFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.extension.social.media') }}">
                    <span class="side-menu__icon fa-solid fa-share-nodes"></span>
                    <span class="side-menu__label">{{ __('AI Social Media') }}</span></a>
                </li> 
            @endif
        @endif 
        @if (config('settings.voiceover_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#') }}">
                    <span class="side-menu__icon bx bx-headphone"></span>
                    <span class="side-menu__label">{{ __('AI Voiceover') }}</span><i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('user.voiceover') }}" class="slide-item">{{ __('Text to Speech') }}</a></li>
                    @if (App\Services\HelperService::extensionVoiceClone())
                        @if (App\Services\HelperService::checkVoiceCloneFeature())
                            <li><a href="{{ route('user.voiceover.clone') }}" class="slide-item">{{ __('Voice Cloning') }}</a></li>
                        @endif
                    @endif
                    @if (App\Services\HelperService::extensionSoundStudio())
                        @if (App\Services\HelperService::checkSoundStudioFeature())
                            <li><a href="{{ route('user.studio') }}" class="slide-item">{{ __('Sound Studio') }}</a></li>
                        @endif
                    @endif
                </ul>
            </li> 
        @endif
        @if (config('settings.whisper_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.transcribe') }}">
                <span class="side-menu__icon bx bx-microphone"></span>
                <span class="side-menu__label">{{ __('AI Speech to Text') }}</span></a>
            </li> 
        @endif
        @if (config('settings.chat_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.chat') }}">
                <span class="side-menu__icon bx bx-chat"></span>
                <span class="side-menu__label">{{ __('AI Chat Staff') }}</span></a>
            </li> 
        @endif
       
        @if (config('settings.vision_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.vision') }}">
                <span class="side-menu__icon bx bx-dialpad-alt"></span>
                <span class="side-menu__label">{{ __('AI Vision') }}</span></a>
            </li> 
        @endif
        @if (config('settings.chat_file_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.chat.file') }}">
                <span class="side-menu__icon bx bx-conversation"></span>
                <span class="side-menu__label">{{ __('AI File Chat') }}</span></a>
            </li> 
        @endif
        @if (config('settings.chat_web_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.chat.web') }}">
                <span class="side-menu__icon bx bx-message-dots"></span>
                <span class="side-menu__label">{{ __('AI Web Chat') }}</span></a>
            </li> 
        @endif
        @if (App\Services\HelperService::checkYoutubeAccess())
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.youtube') }}">
                <span class="side-menu__icon bx bxl-youtube"></span>
                <span class="side-menu__label">{{ __('AI Youtube') }}</span></a>
            </li> 
        @endif
        @if (App\Services\HelperService::checkRSSAccess())
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.rss') }}">
                <span class="side-menu__icon bx bx-rss"></span>
                <span class="side-menu__label">{{ __('AI RSS') }}</span></a>
            </li> 
        @endif
        @if (config('settings.chat_image_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.chat.image') }}">
                <span class="side-menu__icon bx bx-images"></span>
                <span class="side-menu__label">{{ __('AI Chat Image') }}</span></a>
            </li> 
        @endif
        @if (config('settings.code_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.codex') }}">
                <span class="side-menu__icon bx bx-code-alt"></span>
                <span class="side-menu__label">{{ __('AI Code') }}</span></a>
            </li> 
        @endif 
        @if (App\Services\HelperService::checkBrandVoiceAccess())
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.brand') }}">
                <span class="side-menu__icon bx bx-barcode"></span>
                <span class="side-menu__label">{{ __('Brand Voice') }}</span></a>
            </li> 
        @endif 
        @if (App\Services\HelperService::checkIntegrationAccess())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.integration') }}">
                    <span class="side-menu__icon bx bx-extension"></span>
                    <span class="side-menu__label">{{ __('Integrations') }}</span></a>
                </li> 
        @endif
        @if (App\Services\HelperService::extensionPlagiarism())
            @if (App\Services\HelperService::checkPlagiarismFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.plagiarism') }}">
                    <span class="side-menu__icon bx bx-copyright"></span>
                    <span class="side-menu__label">{{ __('AI Plagiarism Checker') }}</span></a>
                </li> 
            @endif
        @endif 
        @if (App\Services\HelperService::extensionPlagiarism())
            @if (App\Services\HelperService::checkDetectorFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.detector') }}">
                    <span class="side-menu__icon bx bx-copy-alt"></span>
                    <span class="side-menu__label">{{ __('AI Content Detector') }}</span></a>
                </li> 
            @endif
        @endif 
        @if (App\Services\HelperService::extensionVoiceIsolator())
            @if (App\Services\HelperService::checkVoiceIsolatorFeature())
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.voice.isolator') }}">
                    <span class="side-menu__icon fa-solid fa-record-vinyl"></span>
                    <span class="side-menu__label">{{ __('Voice Isolator') }}</span></a>
                </li> 
            @endif
        @endif 
	    <!-- custom feature -->
        @if (config('settings.smart_ads_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.smart.ads') }}">
                <span class="side-menu__icon lead-3 fa-solid fa-rectangle-ad"></span>
                <span class="side-menu__label">{{ __('Smart Ads') }}</span></a>
            </li>
        @endif 
        @if (config('settings.training_video_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.videos') }}">
                <span class="side-menu__icon fa-solid fa-circle-video"></span>
                <span class="side-menu__label">{{ __('Training Videos') }}</span></a>
            </li> 
        @endif    
        @if (config('settings.rss_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.rss-feed') }}">
                <span class="side-menu__icon fa-solid fa-newspaper"></span>
                <span class="side-menu__label">{{ __('Digital Newspaper') }}</span></a>
            </li> 
        @endif 
        @if (config('settings.resume_feature_user') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.resume') }}">
                <span class="side-menu__icon fa-solid fa fa-file"></span>
                <span class="side-menu__label">{{ __('AI Resume') }}</span></a>
            </li> 
        @endif 
        <li class="slide mb-3">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                <span class="side-menu__icon bx bx-folder-open"></span>
                <span class="side-menu__label">{{ __('Documents') }}</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ route('user.documents') }}" class="slide-item">{{ __('All Documents') }}</a></li>
                    @if (config('settings.image_feature_user') == 'allow')
                        <li><a href="{{ route('user.documents.images') }}" class="slide-item">{{ __('All Images') }}</a></li> 
                    @endif 
                    @if (config('settings.voiceover_feature_user') == 'allow')
                        <li><a href="{{ route('user.documents.voiceovers') }}" class="slide-item">{{ __('All Voiceovers') }}</a></li> 
                    @endif 
                    @if (config('settings.whisper_feature_user') == 'allow')
                        <li><a href="{{ route('user.documents.transcripts') }}" class="slide-item">{{ __('All Transcripts') }}</a></li> 
                    @endif 
                    @if (config('settings.code_feature_user') == 'allow')
                        <li><a href="{{ route('user.documents.codes') }}" class="slide-item">{{ __('All Codes') }}</a></li> 
                    @endif 
                    <li><a href="{{ route('user.workbooks') }}" class="slide-item">{{ __('Workbooks') }}</a></li>                    
                </ul>
        </li>       
        <hr class="w-90 text-center m-auto">
        <li class="side-item side-item-category mt-4 mb-3">{{ __('Account') }}</li>
        @if (App\Services\HelperService::extensionSaaS())
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.plans') }}">
                <span class="side-menu__icon bx bx-gift"></span>
                <span class="side-menu__label">{{ __('Subscription Plans') }}</span></a>
            </li>
        @endif
        @if (config('settings.team_members_feature') == 'allow')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.team') }}">
                <span class="side-menu__icon bx bx-group"></span>
                <span class="side-menu__label">{{ __('Team Members') }}</span></a>
            </li>
        @endif 
        <li class="slide">
            <a class="side-menu__item" href="{{ route('user.profile') }}">
            <span class="side-menu__icon lead-3 bx bx-user-pin"></span>
            <span class="side-menu__label">{{ __('My Account') }}</span></a>
        </li>
        @if (App\Services\HelperService::extensionSaaS())
            @if (config('payment.referral.enabled') == 'on')
                <li class="slide mb-3">
                    <a class="side-menu__item" href="{{ route('user.referral') }}">
                    <span class="side-menu__icon bx bx-dollar-circle"></span>
                    <span class="side-menu__label">{{ __('Affiliate Program') }}</span></a>
                </li>
            @endif 
        @endif
        @role('admin')
            <hr class="w-90 text-center m-auto">
            <li class="side-item side-item-category mt-4 mb-3">{{ __('Admin') }}</li>
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('admin.dashboard') }}">
                    <span class="side-menu__icon bx bx-category"></span>
                    <span class="side-menu__label">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.extensions') }}">
                <span class="side-menu__icon lead-3 fa-solid fa-objects-column"></span>
                <span class="side-menu__label">{{ __('Marketpace') }}</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.themes') }}">
                <span class="side-menu__icon bx bx-palette"></span>
                <span class="side-menu__label">{{ __('Themes') }}</span></a>
            </li>
            <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                        <span class="side-menu__icon bx bx-brain"></span>
                        <span class="side-menu__label">{{ __('AI Management') }}</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.davinci.dashboard') }}" class="slide-item">{{ __('AI Usage Dashboard') }}</a></li>                        
                        <li><a href="{{ route('admin.davinci.image.prompt') }}" class="slide-item">{{ __('AI Image Prompts') }}</a></li>
                        <li><a href="{{ route('admin.davinci.voices') }}" class="slide-item">{{ __('AI Voiceover Voices') }}</a></li>                        
                        <li><a href="{{ route('admin.davinci.configs') }}" class="slide-item">{{ __('AI Settings') }}</a></li>
			<li><a href="{{ route('admin.davinci.banner') }}" class="slide-item">{{ __('Banner') }}</a></li>                  
		   </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon bx bx-book-content"></span>
                    <span class="side-menu__label">{{ __('Template Settings') }}</span><i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('admin.davinci.custom.category') }}" class="slide-item">{{ __('Template Categories') }}</a></li>
                    <li><a href="{{ route('admin.davinci.templates') }}" class="slide-item">{{ __('Original Templates') }}</a></li>
                    <li><a href="{{ route('admin.davinci.custom') }}" class="slide-item">{{ __('Custom Templates') }}</a></li>                    
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon bx bx-message-dots"></span>
                    <span class="side-menu__label">{{ __('Chat Settings') }}</span><i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">                                       
                    <li><a href="{{ route('admin.davinci.chat.category') }}" class="slide-item">{{ __('Chat Categories') }}</a></li>
                    <li><a href="{{ route('admin.davinci.chat.prompt') }}" class="slide-item">{{ __('Chat Prompts') }}</a></li>
                    <li><a href="{{ route('admin.davinci.chats') }}" class="slide-item">{{ __('Original Chatbots') }}</a></li>                   
                    <li><a href="{{ route('admin.chat.assistant') }}" class="slide-item">{{ __('Chat Assistants') }}</a></li>                   
                    {{-- <li><a href="{{ route('admin.chat.training') }}" class="slide-item">{{ __('Chat Training') }}</a></li>                    --}}
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon bx bx-user-check"></span>
                    <span class="side-menu__label">{{ __('User Management') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.user.dashboard') }}" class="slide-item">{{ __('User Dashboard') }}</a></li>
                        <li><a href="{{ route('admin.user.list') }}" class="slide-item">{{ __('User List') }}</a></li>
                        <li><a href="{{ route('admin.user.activity') }}" class="slide-item">{{ __('Activity Monitoring') }}</a></li>
                    </ul>
            </li>
            @if (App\Services\HelperService::extensionSaaS())
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                        <span class="side-menu__icon bx bx-wallet"></span>
                        <span class="side-menu__label">{{ __('Finance Management') }}</span>
                        @if (auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count())
                            <span class="badge badge-warning">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count() }}</span>
                        @else
                            <i class="angle fa fa-angle-right"></i>
                        @endif
                    </a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('admin.finance.dashboard') }}" class="slide-item">{{ __('Finance Dashboard') }}</a></li>
                            <li><a href="{{ route('admin.finance.transactions') }}" class="slide-item">{{ __('Transactions') }}</a></li>
                            <li><a href="{{ route('admin.finance.plans') }}" class="slide-item">{{ __('Subscription Plans') }}</a></li>
                            <li><a href="{{ route('admin.finance.prepaid') }}" class="slide-item">{{ __('Prepaid Plans') }}</a></li>
                            <li><a href="{{ route('admin.finance.subscriptions') }}" class="slide-item">{{ __('Subscribers') }}</a></li>
                            <li><a href="{{ route('admin.finance.promocodes') }}" class="slide-item">{{ __('Promocodes') }}</a></li>
                            <li><a href="{{ route('admin.referral.settings') }}" class="slide-item">{{ __('Referral System') }}</a></li>
                            <li><a href="{{ route('admin.referral.payouts') }}" class="slide-item">{{ __('Referral Payouts') }}
                                    @if ((auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()))
                                        <span class="badge badge-warning ml-5">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count() }}</span>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{ route('admin.settings.invoice') }}" class="slide-item">{{ __('Invoice Settings') }}</a></li>
                            <li><a href="{{ route('admin.finance.settings') }}" class="slide-item">{{ __('Payment Settings') }}</a></li>
                        </ul>
                </li>
            @endif
            @if (config('settings.user_support') == 'enabled')
                <li class="slide">
                    <a class="side-menu__item"  href="{{ route('admin.support') }}">
                        <span class="side-menu__icon bx bx-support"></span>
                        <span class="side-menu__label">{{ __('Support Requests') }}</span>
                        @if (App\Models\SupportTicket::where('status', 'Open')->count())
                            <span class="badge badge-warning">{{ App\Models\SupportTicket::where('status', 'Open')->count() }}</span>
                        @endif 
                    </a>
                </li>
            @endif
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon bx bx-envelope"></span>
                    <span class="side-menu__label">{{ __('Email & Notifications') }}</span>
                        @if (auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count())
                            <span class="badge badge-warning" id="total-notifications-a"></span>
                        @else
                            <i class="angle fa fa-angle-right"></i>
                        @endif
                    </a>                     
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.email.newsletter') }}" class="slide-item">{{ __('Newsletter') }}</a></li>
                        <li><a href="{{ route('admin.email.templates') }}" class="slide-item">{{ __('Email Templates') }}</a></li>
                        <li><a href="{{ route('admin.notifications') }}" class="slide-item">{{ __('Mass Notifications') }}</a></li>
                        <li><a href="{{ route('admin.notifications.system') }}" class="slide-item">{{ __('System Notifications') }} 
                                @if ((auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()))
                                    <span class="badge badge-warning ml-5" id="total-notifications-b"></span>
                                @endif
                            </a>
                        </li> 
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon bx bx-world"></span>
                    <span class="side-menu__label">{{ __('Frontend Management') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.settings.frontend') }}" class="slide-item">{{ __('Frontend Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.section') }}" class="slide-item">{{ __('Frontend Sections') }}</a></li>
                        <li><a href="{{ route('admin.settings.seo') }}" class="slide-item">{{ __('SEO Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.page') }}" class="slide-item">{{ __('Pages') }}</a></li>
                        <li><a href="{{ route('admin.settings.appearance') }}" class="slide-item">{{ __('Logos') }}</a></li>
                        <li><a href="{{ route('admin.settings.step') }}" class="slide-item">{{ __('How it Works Section') }}</a></li>
                        <li><a href="{{ route('admin.settings.tool') }}" class="slide-item">{{ __('AI Tools Section') }}</a></li>                                           
                        <li><a href="{{ route('admin.settings.feature') }}" class="slide-item">{{ __('Features Section') }}</a></li>                      
                        <li><a href="{{ route('admin.settings.review') }}" class="slide-item">{{ __('Reviews Manager') }}</a></li>                      
                        <li><a href="{{ route('admin.settings.blog') }}" class="slide-item">{{ __('Blogs Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.faq') }}" class="slide-item">{{ __('FAQs Manager') }}</a></li>                                                 
                        <li><a href="{{ route('admin.settings.adsense') }}" class="slide-item">{{ __('Google Adsense') }}</a></li>                           
                    </ul>
            </li>
            <li class="slide mb-3">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon bx bx-list-plus"></span>
                    <span class="side-menu__label">{{ __('General Settings') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.settings.global') }}" class="slide-item">{{ __('Global Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.oauth') }}" class="slide-item">{{ __('Auth Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.registration') }}" class="slide-item">{{ __('Registration Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.smtp') }}" class="slide-item">{{ __('SMTP Settings') }}</a></li>
                        <li><a href="{{ route('elseyyid.translations.home2') }}" class="slide-item">{{ __('Languages') }}</a></li>   
                        <li><a href="{{ route('admin.settings.system') }}" class="slide-item">{{ __('System Settings') }}</a></li>  
                        <li><a href="{{ route('admin.settings.activation') }}" class="slide-item">{{ __('Activation') }}</a></li>     
                        <li><a href="{{ route('admin.settings.upgrade') }}" class="slide-item">{{ __('Upgrade Software') }}</a></li>                              
                    </ul>
            </li>
        @endrole
        <hr class="w-90 text-center m-auto">
        <div class="side-progress-position mt-4">
            <div class="side-plan-wrapper text-center pt-3 pb-3">
                @if (App\Services\HelperService::extensionSaaS())
                    <span class="side-item side-item-category mt-4">{{ __('Plan') }}: @if (is_null(auth()->user()->plan_id))<span class="text-primary">{{ __('No Active Subscription') }}</span> @else <span class="text-primary">{{ __(App\Services\HelperService::getPlanName())}}</span>  @endif </span>
                @endif
                <div class="view-credits @if (App\Services\HelperService::extensionSaaS()) mt-1 @endif"><a class=" fs-11 text-muted mb-2" href="javascript:void(0)" id="view-credits" data-bs-toggle="modal" data-bs-target="#creditsModel"><i class="fa-solid fa-coin-front text-yellow "></i> {{ __('View Credits') }}</a></div> 
                @if (App\Services\HelperService::extensionSaaS())
                    @if (is_null(auth()->user()->plan_id))
                        <div class="text-center mt-3 mb-2"><a href="{{ route('user.plans') }}" class="btn btn-primary pl-6 pr-6 fs-11"> <i class="fa-solid fa-bolt text-yellow mr-2"></i> {{ __('Upgrade') }}</a></div> 
                    @endif    
                @endif          
            </div>
            @if (App\Services\HelperService::extensionSaaS())
                @if (config('payment.referral.enabled') == 'on')
                    <div class="side-plan-wrapper mt-4 text-center p-3 pl-5 pr-5">
                        <div class="mb-1"><i class="fa-solid fa-gifts fs-20 text-yellow"></i></div>
                        <span class="fs-12 mt-4" style="color: #344050">{{ __('Invite your friends and get') }} {{ config('payment.referral.payment.commission') }}% @if (config('payment.referral.payment.policy') == 'all') {{ __('of all their purchases') }} @else {{ __('of their first purchase') }}@endif</span>
                        <div class="text-center mt-3 mb-2"><a href="{{ route('user.referral') }}" class="btn btn-primary pl-6 pr-6 fs-11" id="referral-button"> {{ __('Invite Friends') }}</a></div>              
                    </div>
                @endif
            @endif
        </div>
    </ul>
</aside>

<div class="modal fade" id="creditsModel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
          <div class="modal-content">
            <div class="modal-header">
                <h6 class="text-center font-weight-bold fs-16"> {{ __('Credits on') }} {{ config('app.name') }}</h6>	
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pl-5 pr-5">
                
                <h6 class="font-weight-semibold mb-2 mt-3">{{ __('Unlock your creativity with') }} {{ config('app.name') }} {{ __('credits') }}</h6>
                <p class="text-muted">{{ __('Maximize your content creation with') }} {{ config('app.name') }}. {{ __('Each credit unlocks powerful AI tools and features designed to enhance your content creation.') }}</p>
                
                <div class="d-flex justify-content-between mt-3">
                    <div class="font-weight-bold fs-12">{{ __('AI Chats/Templates') }}</div>
                    <div class="font-weight-bold fs-12">{{ __('Credits') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('OpenAI GPT 4o') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableGPT4oWords() == -1) {{ __('Unlimited') }} @else {{ \App\Services\HelperService::userAvailableGPT4oWords()}}  @endif{{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('OpenAI GPT 4o Mini') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableGPT4oMiniWords() == -1) {{ __('Unlimited') }} @else {{ \App\Services\HelperService::userAvailableGPT4oMiniWords()}}  @endif{{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('OpenAI GPT 4') }}</div>
                    <div class="text-muted fs-10"><span>@if (\App\Services\HelperService::userAvailableGPT4Words() == -1) {{ __('Unlimited') }} @else {{ \App\Services\HelperService::userAvailableGPT4Words()}} @endif {{ __('Words') }}</span></div>
                </div>                
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('OpenAI GPT 4 Turbo') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableGPT4TWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableGPT4TWords()}} @endif {{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('OpenAI GPT 3.5 Turbo') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableWords()}} @endif {{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('OpenAI Fine Tune') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableFineTuneWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableFineTuneWords()}} @endif {{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('Anthropic Claude 3 Opus') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableClaudeOpusWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableClaudeOpusWords()}} @endif {{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('Anthropic Claude 3.5 Sonnet') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableClaudeSonnetWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableClaudeSonnetWords()}} @endif {{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('Anthropic Claude 3 Haiku') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableClaudeHaikuWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableClaudeHaikuWords()}} @endif {{ __('Words') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('Google Gemini Pro') }}</div>
                    <div class="text-muted fs-10">@if (\App\Services\HelperService::userAvailableGeminiProWords() == -1) {{ __('Unlimited') }} @else {{ App\Services\HelperService::userAvailableGeminiProWords()}} @endif {{ __('Words') }}</div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div class="font-weight-bold fs-12">{{ __('AI Image') }}</div>
                    <div class="font-weight-bold fs-12">{{ __('Credits') }}</div>
                </div>
                <hr class="mt-2 mb-2">

                <div class="d-flex justify-content-between mt-4">
                    <div class="font-weight-bold fs-12">{{ __('Extra') }}</div>
                    <div class="font-weight-bold fs-12">{{ __('Credits') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('AI Image') }}</div>
                    <div class="text-muted fs-10">{{ \App\Services\HelperService::getTotalImages()}} {{ __('Images') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('AI Voiceover') }}</div>
                    <div class="text-muted fs-10">{{ App\Services\HelperService::getTotalCharacters()}} {{ __('Characters') }}</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="text-muted fs-10">{{ __('AI Speech to Text') }}</div>
                    <div class="text-muted fs-10">{{ App\Services\HelperService::getTotalMinutes()}} {{ __('Minutes') }}</div>
                </div>
                @if (App\Services\HelperService::extensionSaaS())
                    <div class="text-center mt-4"><a href="{{ route('user.plans') }}" class="btn btn-primary pl-6 pr-6 fs-11" style="text-transform: none"> <i class="fa-solid fa-bolt text-yellow mr-2"></i> {{ __('Upgrade Now') }}</a></div> 
                @endif
            </div>
          </div>
    </div>
</div>
<!-- END SIDE MENU BAR -->
