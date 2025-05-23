@extends('layouts.auth')

@section('metadata')
    <meta name="description" content="{{ __($metadata->login_description) }}">
    <meta name="keywords" content="{{ __($metadata->login_keywords) }}">
    <meta name="author" content="{{ __($metadata->login_author) }}">	    
    <link rel="canonical" href="{{ $metadata->login_url }}">
    <title>{{ __($metadata->login_title) }}</title>
@endsection

@section('content')
<div class="container-fluid h-100vh ">
    <div class="row login-background justify-content-center">
        <div class="col-md-6 col-sm-12" id="login-responsive"> 
            <div class="row justify-content-center">
                <div class="col-lg-7 mx-auto">
                    <div class="card-body pt-10">

                        <form method="POST" action="{{ route('login') }}" onsubmit="process()">
                            @csrf                                       
        
                            <h3 class="text-center login-title mb-8">{{ __('Welcome Back to') }} <span class="text-info"><a href="{{ url('/') }}">{{ config('app.name') }}</a></span></h3>
        
                            @if ($message = Session::get('success'))
                                <div class="alert alert-login alert-success"> 
                                    <strong><i class="fa fa-check-circle"></i> {{ $message }}</strong>
                                </div>
                                @endif
        
                                @if ($message = Session::get('error'))
                                <div class="alert alert-login alert-danger">
                                    <strong><i class="fa fa-exclamation-triangle"></i> {{ $message }}</strong>
                                </div>
                            @endif
                            
                            @if (config('settings.oauth_login') == 'enabled')
                                <div class="divider">
                                    <div class="divider-text text-muted">
                                        <small>{{__('Sign In with Social Media')}}</small>
                                    </div>
                                </div>
        
                                <div class="social-logins-box text-center">
                                    @if(config('services.facebook.enable') == 'on')<a href="{{ url('/auth/redirect/facebook') }}" class="social-login-button" id="login-facebook">
                                        <svg class="mr-3" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24 12C24 5.3726 18.6274 2.65179e-05 12 2.65179e-05C5.37258 2.65179e-05 0 5.3726 0 12C0 17.9896 4.38823 22.954 10.125 23.8542V15.4688H7.07813V12H10.125V9.35628C10.125 6.34878 11.9165 4.68753 14.6576 4.68753C15.9705 4.68753 17.3438 4.9219 17.3438 4.9219V7.87503H15.8306C14.3399 7.87503 13.875 8.80003 13.875 9.74902V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9896 24 12Z" fill="#1877F2"></path>
                                            <path d="M16.6711 15.4687L17.2031 12H13.875V9.74899C13.875 8.80001 14.3399 7.875 15.8306 7.875H17.3438V4.92187C17.3438 4.92187 15.9705 4.6875 14.6576 4.6875C11.9165 4.6875 10.125 6.34875 10.125 9.35625V12H7.07812V15.4687H10.125V23.8542C10.7359 23.9501 11.3621 24 12 24C12.6379 24 13.2641 23.9501 13.875 23.8542V15.4687H16.6711Z" fill="white"></path>
                                        </svg>
                                        {{ __('Sign In with Facebook') }}</a>
                                    @endif
                                    @if(config('services.twitter.enable') == 'on')<a href="{{ url('/auth/redirect/twitter') }}" class="social-login-button" id="login-twitter">
                                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" viewBox="0 0 16 16">
                                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                        </svg>
                                        {{ __('Sign In with Twitter') }}</a>
                                    @endif	
                                    @if(config('services.google.enable') == 'on')<a href="{{ url('/auth/redirect/google') }}" class="social-login-button" id="login-google">
                                        <svg class="mr-3" width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.001 12.2332C23.001 11.3699 22.9296 10.7399 22.7748 10.0865H12.7153V13.9832H18.62C18.501 14.9515 17.8582 16.4099 16.4296 17.3898L16.4096 17.5203L19.5902 19.935L19.8106 19.9565C21.8343 18.1249 23.001 15.4298 23.001 12.2332Z" fill="#4285F4"></path>
                                            <path d="M12.714 22.5C15.6068 22.5 18.0353 21.5666 19.8092 19.9567L16.4282 17.3899C15.5235 18.0083 14.3092 18.4399 12.714 18.4399C9.88069 18.4399 7.47596 16.6083 6.61874 14.0766L6.49309 14.0871L3.18583 16.5954L3.14258 16.7132C4.90446 20.1433 8.5235 22.5 12.714 22.5Z" fill="#34A853"></path>
                                            <path d="M6.62046 14.0767C6.39428 13.4234 6.26337 12.7233 6.26337 12C6.26337 11.2767 6.39428 10.5767 6.60856 9.92337L6.60257 9.78423L3.25386 7.2356L3.14429 7.28667C2.41814 8.71002 2.00146 10.3084 2.00146 12C2.00146 13.6917 2.41814 15.29 3.14429 16.7133L6.62046 14.0767Z" fill="#FBBC05"></path>
                                            <path d="M12.7141 5.55997C14.7259 5.55997 16.083 6.41163 16.8569 7.12335L19.8807 4.23C18.0236 2.53834 15.6069 1.5 12.7141 1.5C8.52353 1.5 4.90447 3.85665 3.14258 7.28662L6.60686 9.92332C7.47598 7.39166 9.88073 5.55997 12.7141 5.55997Z" fill="#EB4335"></path>
                                        </svg>
                                        {{ __('Sign In with Google') }}</a>
                                    @endif	
                                    @if(config('services.linkedin.enable') == 'on')<a href="{{ url('/auth/redirect/linkedin') }}" class="social-login-button" id="login-linkedin">
                                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                        </svg>
                                        {{ __('Sign In with Linkedin') }}</a>
                                    @endif	
                                </div>
        
                                <div class="divider">
                                    <div class="divider-text text-muted">
                                        <small>{{ __('or sign in with email') }}</small>
                                    </div>
                                </div>
                            @endif
                            
        
                            <div class="input-box mb-4">                             
                                <label for="email" class="fs-12 font-weight-bold text-md-right">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="{{ __('Email Address') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ __($message) }}
                                    </span>
                                @enderror                            
                            </div>
        
                            <div class="input-box">                            
                                <label for="password" class="fs-12 font-weight-bold text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="{{ __('Password') }}" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ __($message) }}
                                    </span>
                                @enderror                            
                            </div>
        
                            <div class="form-group mb-3">  
                                <div class="d-flex">                        
                                    <label class="custom-switch">
                                        <input type="checkbox" class="custom-switch-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ __('Keep me logged in') }}</span>
                                    </label>   
        
                                    <div class="ml-auto">
                                        @if (Route::has('password.request'))
                                            <a class="text-info fs-12" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
        
                            <input type="hidden" name="recaptcha" id="recaptcha">
        
                            <div class="text-center">
                                <div class="form-group mb-0">                        
                                    <button type="submit" class="btn btn-primary font-weight-bold login-main-button" id="sign-in">{{ __('Sign In') }}</button>              
                                </div>
            
                            </div>
        
                        </form>
                    </div>
                </div>
            </div>               
                 
        </div>

        <div class="col-md-6 col-sm-12 text-center background-special align-middle p-0" id="login-background">
            <div class="login-bg">
                <img src="{{ theme_url('img/frontend/backgrounds/I08.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @if (config('services.google.recaptcha.enable') == 'on')
        <!-- Google reCaptcha JS -->
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google.recaptcha.site_key') }}"></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.google.recaptcha.site_key') }}', {action: 'contact'}).then(function(token) {
                    if (token) {
                    document.getElementById('recaptcha').value = token;
                    }
                });
            });
        </script>
    @endif

    <script type="text/javascript">
        let loading = `<span class="loading">
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					</span>`;

        function process() {
            $('#sign-in').prop('disabled', true);
            let btn = document.getElementById('sign-in');					
            btn.innerHTML = loading;  
            document.querySelector('#loader-line')?.classList?.remove('hidden'); 
            return; 
        }
    </script>
    
@endsection
