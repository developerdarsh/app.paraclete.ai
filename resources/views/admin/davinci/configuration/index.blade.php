@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')					
	<div class="row justify-content-center mt-24">
		<div class="col-sm-12 text-center">
			<h3 class="card-title fs-20 mb-3 super-strong"><i class="fa-solid fa-microchip-ai mr-2 text-primary"></i>{{ __('AI Settings') }}</h3>
			<h6 class="mb-6 fs-12 text-muted">{{ __('Control all AI settings from one place') }}</h6>
		</div>

		<div class="col-lg-9 col-md-10 col-sm-12 mb-5">
			<div class="templates-nav-menu">
				<div class="template-nav-menu-inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist" style="padding: 3px">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">{{ __('General AI Settings') }}</button>
						</li>
						<li class="nav-item category-check" role="presentation">
							<button class="nav-link" id="api-tab" data-bs-toggle="tab" data-bs-target="#api" type="button" role="tab" aria-controls="api" aria-selected="false">{{ __('AI API Keys') }}</button>
						</li>
						<li class="nav-item category-check" role="presentation">
							<button class="nav-link" id="extended-tab" data-bs-toggle="tab" data-bs-target="#extended" type="button" role="tab" aria-controls="extended" aria-selected="false">{{ __('Extensions') }}</button>
						</li>	
						<li class="nav-item category-check" role="presentation">
							<button class="nav-link" id="trial-tab" data-bs-toggle="tab" data-bs-target="#trial" type="button" role="tab" aria-controls="trial" aria-selected="false">{{ __('Free Trial Features') }}</button>
						</li>				
					</ul>
				</div>
			</div>
		</div>

		<div class="col-lg-9 col-md-10 col-sm-12">
			<div class="card border-0">
				<div class="card-body p-7">				
					<div class="tab-content" id="myTabContent">

						<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
							<form id="general-features-form" action="{{ route('admin.davinci.configs.store') }}" method="POST" enctype="multipart/form-data">
								@csrf

								<div class="row">							

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Default AI Model') }} <span class="text-muted">({{ __('For Admin Group') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="default-model-admin" name="default-model-admin" class="form-select" data-placeholder="{{ __('Select Default Model') }}:">			
												<option value="gpt-3.5-turbo-0125" @if ( config('settings.default_model_admin')  == 'gpt-3.5-turbo-0125') selected @endif>{{ __('GPT 3.5 Turbo') }}</option>												
												<option value="gpt-4" @if ( config('settings.default_model_admin')  == 'gpt-4') selected @endif>{{ __('GPT 4') }}</option>
												<option value="gpt-4o" @if ( config('settings.default_model_admin')  == 'gpt-4o') selected @endif>{{ __('GPT 4o') }}</option>
												<option value="gpt-4o-mini" @if ( config('settings.default_model_admin')  == 'gpt-4o-mini') selected @endif>{{ __('GPT 4o mini') }}</option>
												<option value="gpt-4-0125-preview" @if ( config('settings.default_model_admin')  == 'gpt-4-0125-preview') selected @endif>{{ __('GPT 4 Turbo') }}</option>
												<option value="gpt-4-turbo-2024-04-09" @if ( config('settings.default_model_admin')  == 'gpt-4-turbo-2024-04-09') selected @endif>{{ __('GPT 4 Turbo with Vision') }}</option>
												<option value="o1-preview" @if ( config('settings.default_model_admin')  == 'o1-preview') selected @endif>{{ __('o1 preview') }}</option>
												<option value="o1-mini" @if ( config('settings.default_model_admin')  == 'o1-mini') selected @endif>{{ __('o1 mini') }}</option>
												<option value="claude-3-opus-20240229" @if ( config('settings.default_model_admin')  == 'claude-3-opus-20240229') selected @endif>{{ __('Claude 3 Opus') }}</option>
												<option value="claude-3-5-sonnet-20241022" @if ( config('settings.default_model_admin')  == 'claude-3-5-sonnet-20241022') selected @endif>{{ __('Claude 3.5 Sonnet') }}</option>
												<option value="claude-3-5-haiku-20241022" @if ( config('settings.default_model_admin')  == 'claude-3-5-haiku-20241022') selected @endif>{{ __('Claude 3.5 Haiku') }}</option>
												<option value="gemini_pro" @if ( config('settings.default_model_admin')  == 'gemini_pro') selected @endif>{{ __('Gemini Pro') }}</option>
												@foreach ($models as $model)
													<option value="{{ $model->model }}" @if ( config('settings.default_model_admin')  == $model->model) selected @endif>{{ $model->description }} ({{ __('Fine Tune Model')}})</option>
												@endforeach
											</select>
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Default Embedding Model') }} <span class="text-muted">({{ __('For All Groups') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="default-embedding-model" name="default-embedding-model" class="form-select">			
												<option value="text-embedding-ada-002" @if ( config('settings.default_embedding_model')  == 'text-embedding-ada-002') selected @endif>{{ __('Embedding V2 Ada') }}</option>
												<option value="text-embedding-3-small" @if ( config('settings.default_embedding_model')  == 'text-embedding-3-small') selected @endif>{{ __('Embedding V3 Small') }}</option>
												<option value="text-embedding-3-large" @if ( config('settings.default_embedding_model')  == 'text-embedding-3-large') selected @endif>{{ __('Embedding V3 Large') }}</option>
											</select>
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Default Templates Result Language') }} <span class="text-muted">({{ __('For New Registrations Only') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
												<select id="default-language" name="default-language" class="form-select" data-placeholder="{{ __('Select Default Template Language') }}:">	
													@foreach ($languages as $language)
														<option value="{{ $language->language_code }}" data-img="{{ theme_url($language->language_flag) }}" @if (config('settings.default_language') == $language->language_code) selected @endif> {{ $language->language }}</option>
													@endforeach
											</select>
										</div>								
									</div>	

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Templates Category Access') }} <span class="text-muted">({{ __('For Admin Group') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="templates-admin" name="templates-admin" class="form-select" data-placeholder="{{ __('Set Templates Access') }}">
												<option value="all" @if (config('settings.templates_access_admin') == 'all') selected @endif>{{ __('All Templates') }}</option>
												<option value="free" @if (config('settings.templates_access_admin') == 'free') selected @endif>{{ __('Only Free Templates') }}</option>
												<option value="standard" @if (config('settings.templates_access_admin') == 'standard') selected @endif> {{ __('Up to Standard Templates') }}</option>
												<option value="professional" @if (config('settings.templates_access_admin') == 'professional') selected @endif> {{ __('Up to Professional Templates') }}</option>																																		
												<option value="premium" @if (config('settings.templates_access_admin') == 'premium') selected @endif> {{ __('Up to Premium Templates') }} ({{ __('All') }})</option>																																																																																																									
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Article Wizard Image Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="wizard-image-vendor" name="wizard-image-vendor" class="form-select">
												<option value='none' @if (config('settings.wizard_image_vendor') == 'none') selected @endif>{{ __('Disable Image Generation for AI Article Wizard') }}</option>
												<option value='dall-e-2' @if (config('settings.wizard_image_vendor') == 'dall-e-2') selected @endif> {{ __('Dalle 2') }}</option>																															
												<option value='dall-e-3' @if (config('settings.wizard_image_vendor') == 'dall-e-3') selected @endif> {{ __('Dalle 3') }}</option>																															
												<option value='dall-e-3-hd' @if (config('settings.wizard_image_vendor') == 'dall-e-3-hd') selected @endif> {{ __('Dalle 3 HD') }}</option>																															
												<option value='stable-diffusion-v1-6' @if (config('settings.wizard_image_vendor') == 'stable-diffusion-v1-6') selected @endif> {{ __('Stable Diffusion v1.6') }}</option>																															
												<option value='stable-diffusion-xl-1024-v1-0' @if (config('settings.wizard_image_vendor') == 'stable-diffusion-xl-1024-v1-0') selected @endif> {{ __('Stable Diffusion XL v1.0') }}</option>																															
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Maximum Result Length') }} <span class="text-muted">({{ __('In Words') }}) ({{ __('For Admin Group') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('OpenAI has a hard limit based on Token limits for each model. Refer to OpenAI documentation to learn more. As a recommended by OpenAI, max result length is capped at 1500 words.') }}"></i></h6>
											<input type="number" class="form-control @error('max-results-admin') is-danger @enderror" id="max-results-admin" name="max-results-admin" placeholder="Ex: 10" value="{{ config('settings.max_results_limit_admin') }}" required>
											@error('max-results-admin')
												<p class="text-danger">{{ $errors->first('max-results-admin') }}</p>
											@enderror
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Custom Chats for Users') }} <span class="text-muted">({{ __('For All Groups') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="custom-chats" name="custom-chats" class="form-select">			
												<option value="anyone" @if ( config('settings.custom_chats')  == 'anyone') selected @endif>{{ __('Available to Anyone') }}</option>												
												<option value="subscription" @if ( config('settings.custom_chats')  == 'subscription') selected @endif>{{ __('Available only via Subscription Plan') }}</option>												
											</select>
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Custom Templates for Users') }} <span class="text-muted">({{ __('For All Groups') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="custom-templates" name="custom-templates" class="form-select">			
												<option value="anyone" @if ( config('settings.custom_templates')  == 'anyone') selected @endif>{{ __('Available to Anyone') }}</option>												
												<option value="subscription" @if ( config('settings.custom_templates')  == 'subscription') selected @endif>{{ __('Available only via Subscription Plan') }}</option>												
											</select>
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Writer Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="writer-feature-user" class="custom-switch-input" @if ( config('settings.writer_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Article Wizard Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="wizard-feature-user" class="custom-switch-input" @if ( config('settings.wizard_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Smart Editor Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="smart-editor-feature-user" class="custom-switch-input" @if ( config('settings.smart_editor_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI ReWriter Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="rewriter-feature-user" class="custom-switch-input" @if ( config('settings.rewriter_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Vision Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="vision-feature-user" class="custom-switch-input" @if ( config('settings.vision_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Vision for AI Chat') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="vision-for-chat-user" class="custom-switch-input" @if ( config('settings.vision_for_chat_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI File Chat Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="chat-file-feature-user" class="custom-switch-input" @if ( config('settings.chat_file_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Web Chat Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="chat-web-feature-user" class="custom-switch-input" @if ( config('settings.chat_web_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Chat Image Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="chat-image-feature-user" class="custom-switch-input" @if ( config('settings.chat_image_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Code Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="code-feature-user" class="custom-switch-input" @if ( config('settings.code_feature_user')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Team Members Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="team-members-feature" class="custom-switch-input" @if ( config('settings.team_members_feature')  == 'allow') checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div> 						
									</div>	

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Youtube Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="youtube-feature" class="custom-switch-input" @if ($settings->youtube_feature) checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI RSS Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="rss-feature" class="custom-switch-input" @if ($settings->rss_feature) checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Integration Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">
												<label class="custom-switch">
													<input type="checkbox" name="integration-feature" class="custom-switch-input" @if ($settings->integration_feature) checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-sharp fa-solid fa-message-captions text-info fs-14 mr-2"></i>{{ __('AI Chat Settings') }} <span class="text-muted">({{ __('For All Groups') }})</span></h6>

										<div class="row">

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Chat Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="chat-feature-user" class="custom-switch-input" @if ( config('settings.chat_feature_user')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('AI Chat Default Voice') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="chat-default-voice" name="chat-default-voice" class="form-select">			
														<option value="alloy" @if ( config('settings.chat_default_voice')  == 'alloy') selected @endif>{{ __('Alloy') }} ({{ __('Male') }})</option>
														<option value="echo" @if ( config('settings.chat_default_voice')  == 'echo') selected @endif>{{ __('Echo') }} ({{ __('Male') }})</option>
														<option value="fable" @if ( config('settings.chat_default_voice')  == 'fable') selected @endif>{{ __('Fable') }} ({{ __('Male') }})</option>
														<option value="onyx" @if ( config('settings.chat_default_voice')  == 'onyx') selected @endif>{{ __('Onyx') }} ({{ __('Male') }})</option>
														<option value="nova" @if ( config('settings.chat_default_voice')  == 'nova') selected @endif>{{ __('Nova') }} ({{ __('Female') }})</option>
														<option value="shimmer" @if ( config('settings.chat_default_voice')  == 'shimmer') selected @endif>{{ __('Shimmer') }} ({{ __('Female') }})</option>
													</select>
												</div>								
											</div>				
										</div>		
									</div>
								</div>


								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-sharp fa-solid fa-camera-viewfinder text-info fs-14 mr-2"></i>{{ __('AI Image Settings') }} <span class="text-muted">({{ __('For All Groups') }})</span></h6>

										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Image Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="image-feature-user" class="custom-switch-input" @if ( config('settings.image_feature_user')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Image Vendors') }} <i class="ml-2 fa fa-info info-notification" data-tippy-content="{{ __('Image models of the selected image vendors will be available to all non-subscribers. You can control image vendors availability via subscription plans as well') }}."></i></h6>
													<select class="form-select" id="image-vendors" name="image_vendors[]" data-placeholder="{{ __('Choose AI Image vendors') }}" multiple>
														<option value='openai' @foreach ($images as $key=>$value) @if($value == 'openai') selected @endif @endforeach>{{ __('OpenAI') }}</option>																															
														<option value='sd' @foreach ($images as $key=>$value) @if($value == 'sd') selected @endif @endforeach> {{ __('Stable Diffusion') }}</option>																															
														@if (App\Services\HelperService::extensionFlux())
															<option value='falai' @foreach ($images as $key=>$value) @if($value == 'falai') selected @endif @endforeach> {{ __('Fal AI') }}</option>																																																																																													
														@endif
													</select>
												</div>
											</div>
				
											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('Default Storage for AI Images') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="storage" name="default-storage" class="form-select" data-placeholder="{{ __('Set Default Storage for AI Images') }}:">			
														<option value="local" @if ( config('settings.default_storage')  == 'local') selected @endif>{{ __('Local Server') }}</option>
														<option value="aws" @if ( config('settings.default_storage')  == 'aws') selected @endif>{{ __('Amazon Web Services') }}</option>
														<option value="wasabi" @if ( config('settings.default_storage')  == 'wasabi') selected @endif>{{ __('Wasabi Cloud') }}</option>
														<option value="gcp" @if ( config('settings.default_storage')  == 'gcp') selected @endif>{{ __('Google Cloud Platform') }}</option>
														<option value="storj" @if ( config('settings.default_storage')  == 'storj') selected @endif>{{ __('Storj') }}</option>
														<option value="dropbox" @if ( config('settings.default_storage')  == 'dropbox') selected @endif>{{ __('Dropbox') }}</option>
														<option value="r2" @if ( config('settings.default_storage')  == 'r2') selected @endif>{{ __('Cloudflare R2') }}</option>
													</select>
												</div>								
											</div>	
											
											<div class="col-lg-6 col-md-6 col-sm-12 mb-2">
												<a href="{{ route('admin.davinci.configs.image.credits') }}" class="btn btn-primary ripple pl-9 pr-9 pt-3 pb-3 fs-12" style="text-transform:none;">{{ __('Set AI Image Model Credits') }}</a>
											</div>
										</div>		
									</div>
								</div>


								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-sharp fa-solid fa-waveform-lines text-info fs-14 mr-2"></i>{{ __('AI Voiceover Settings') }} <span class="text-muted">({{ __('For All Groups') }})</span></h6>

										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Voiceover Feature') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="voiceover-feature-user" class="custom-switch-input" @if ( config('settings.voiceover_feature_user')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>	

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- EFFECTS -->
												<div class="input-box">	
													<h6>{{ __('SSML Effects') }}</h6>
													<select id="set-ssml-effects" name="set-ssml-effects" class="form-select" data-placeholder="{{ __('Configure SSML Effects') }}">			
														<option value="enable" @if ( config('settings.voiceover_ssml_effect')  == 'enable') selected @endif>{{ __('Enable All') }}</option>
														<option value="disable" @if ( config('settings.voiceover_ssml_effect')  == 'disable') selected @endif>{{ __('Disable All') }}</option>
													</select>
												</div> <!-- END EFFECTS -->							
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- STORAGE OPTION -->
												<div class="input-box">	
													<h6>{{ __('Default Storage for AI Voiceovers') }}</h6>
													<select id="set-storage-option" name="set-storage-option" class="form-select" data-placeholder="{{ __('Select Default Storage for AI Voiceover') }}">			
														<option value="local" @if ( config('settings.voiceover_default_storage')  == 'local') selected @endif>{{ __('Local Server Storage') }}</option>
														<option value="aws" @if ( config('settings.voiceover_default_storage')  == 'aws') selected @endif>Amazon Web Services</option>
														<option value="wasabi" @if ( config('settings.voiceover_default_storage')  == 'wasabi') selected @endif>Wasabi Cloud</option>
														<option value="gcp" @if ( config('settings.voiceover_default_storage')  == 'gcp') selected @endif>{{ __('Google Cloud Platform') }}</option>
														<option value="storj" @if ( config('settings.voiceover_default_storage')  == 'storj') selected @endif>{{ __('Storj') }}</option>
														<option value="dropbox" @if ( config('settings.voiceover_default_storage')  == 'dropbox') selected @endif>{{ __('Dropbox') }}</option>
														<option value="r2" @if ( config('settings.voiceover_default_storage')  == 'r2') selected @endif>{{ __('Cloudflare R2') }}</option>
													</select>
												</div> <!-- END STORAGE OPTION -->							
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- LANGUAGE -->
												<div class="input-box">	
													<h6>{{ __('Default Language') }}</h6>
													<select id="languages" name="language" class="form-select" data-placeholder="{{ __('Select Default Language') }}" data-callback="language_select">			
														@foreach ($voiceover_languages as $language)
															<option value="{{ $language->language_code }}" data-img="{{ theme_url($language->language_flag) }}" @if (config('settings.voiceover_default_language') == $language->language_code) selected @endif> {{ $language->language }}</option>
														@endforeach
													</select>
												</div> <!-- END LANGUAGE -->							
											</div>
				
											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- VOICE -->
												<div class="input-box">	
													<h6>{{ __('Default Voice') }}</h6>
													<select id="voices" name="voice" class="form-select" data-placeholder="{{ __('Select Default Voice') }}" data-callback="default_voice">			
														@foreach ($voices as $voice)
															<option value="{{ $voice->voice_id }}" 	
																data-img="{{ theme_url($voice->avatar_url) }}"										
																data-id="{{ $voice->voice_id }}" 
																data-lang="{{ $voice->language_code }}" 
																data-type="{{ $voice->voice_type }}"
																data-gender="{{ $voice->gender }}"
																@if (config('settings.voiceover_default_voice') == $voice->voice_id) selected @endif
																data-class="@if (config('settings.voiceover_default_language') !== $voice->language_code) remove-voice @endif"> 
																{{ $voice->voice }}  														
															</option>
														@endforeach
													</select>
												</div> <!-- END VOICE -->							
											</div>
																			
											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- MAX CHARACTERS -->
												<div class="input-box">								
													<h6>{{ __('Maximum Total Characters Synthesize Limit') }} <i class="ml-2 fa fa-info info-notification" data-tippy-content="{{ __('Maximum supported characters per single synthesize task can be up to 100000 characters. Each voice (textarea) has a limitation of up to 5000 characters, and you can combine up to 20 voices in a single task (20 voices x 5000 textarea limit = 100000)') }}."></i></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-max-chars') is-danger @enderror" id="set-max-chars" name="set-max-chars" placeholder="Ex: 3000" value="{{ config('settings.voiceover_max_chars_limit') }}">
														@error('set-max-chars')
															<p class="text-danger">{{ $errors->first('set-max-chars') }}</p>
														@enderror
													</div> 
												</div> <!-- END MAX CHARACTERS -->							
											</div>
				
											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">								
													<h6>{{ __('Maximum Concurrent Voices Limit') }} <i class="ml-2 fa fa-info info-notification" data-tippy-content="{{ __('You can mix up to 20 different voices in a single synthesize task. Each voice can synthesize up to 5000 characters, total characters can not exceed the limit set by Maximum Characters Synthesize Limit field.') }}"></i></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-max-voices') is-danger @enderror" id="set-max-voices" name="set-max-voices" placeholder="Ex: 5" value="{{ config('settings.voiceover_max_voice_limit') }}">
														@error('set-max-voices')
															<p class="text-danger">{{ $errors->first('set-max-voices') }}</p>
														@enderror
													</div> 
												</div>							
											</div>					
										</div>		
									</div>
								</div>


								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-sharp fa-solid fa-folder-music text-info fs-14 mr-2"></i>{{ __('AI Speech to Text Settings') }} <span class="text-muted">({{ __('For All Groups') }})</span></h6>

										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Speech to Text Feature') }} <span class="text-muted">({{ __('For User & Subscriber Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="whisper-feature-user" class="custom-switch-input" @if ( config('settings.whisper_feature_user')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>
																			
											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- MAX CHARACTERS -->
												<div class="input-box">								
													<h6>{{ __('Maximum Allowed Audio File Size') }} <i class="ml-2 fa fa-info info-notification" data-tippy-content="{{ __('OpenAI supports audio files only up to 25MB') }}."></i></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-max-audio-size') is-danger @enderror" id="set-max-audio-size" name="set-max-audio-size" placeholder="Ex: 25" value="{{ config('settings.whisper_max_audio_size') }}">
														@error('set-max-audio-size')
															<p class="text-danger">{{ $errors->first('set-max-audio-size') }}</p>
														@enderror
													</div> 
												</div> <!-- END MAX CHARACTERS -->							
											</div>
				
											
											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- STORAGE OPTION -->
												<div class="input-box">	
													<h6>{{ __('Default Storage for AI Speech to Text') }}</h6>
													<select id="set-whisper-storage-option" name="set-whisper-storage-option" class="form-select" data-placeholder="{{ __('Select Default Storage for AI Speech to Text') }}">			
														<option value="local" @if ( config('settings.whisper_default_storage')  == 'local') selected @endif>{{ __('Local Server Storage') }}</option>
														<option value="aws" @if ( config('settings.whisper_default_storage')  == 'aws') selected @endif>Amazon Web Services</option>
														<option value="wasabi" @if ( config('settings.whisper_default_storage')  == 'wasabi') selected @endif>Wasabi Cloud</option>
														<option value="gcp" @if ( config('settings.whisper_default_storage')  == 'gcp') selected @endif>{{ __('Google Cloud Platform') }}</option>
														<option value="storj" @if ( config('settings.whisper_default_storage')  == 'storj') selected @endif>{{ __('Storj') }}</option>
														<option value="dropbox" @if ( config('settings.whisper_default_storage')  == 'dropbox') selected @endif>{{ __('Dropbox') }}</option>
														<option value="r2" @if ( config('settings.whisper_default_storage')  == 'r2') selected @endif>{{ __('Cloudflare R2') }}</option>
													</select>
												</div> <!-- END STORAGE OPTION -->							
											</div>								
										</div>		
									</div>
								</div>


								<div class="card shadow-0 ">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-sharp fa-solid fa-sliders text-info fs-14 mr-2"></i>{{ __('Miscellaneous') }}</h6>

										<div class="row">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">	
													<div class="input-box">	
														<h6>{{ __('Sensitive Words Filter') }} <span class="text-muted">({{ __('Comma Separated') }})</span></h6>							
														<textarea class="form-control" name="words-filter" rows="6" id="words-filter">{{ $filters->value }}</textarea>	
													</div>											
												</div>
											</div>							
										</div>
			
									</div>
								</div>

								<!-- SAVE CHANGES ACTION BUTTON -->
								<div class="border-0 text-center mb-2 mt-1">
									<button type="button" class="btn ripple btn-primary pl-9 pr-9 pt-3 pb-3 fs-12" style="min-width: 300px;" id="general-settings">{{ __('Save') }}</button>							
								</div>				
							</form>
						</div>

						<div class="tab-pane fade" id="api" role="tabpanel" aria-labelledby="api-tab">
							<form id="api-features-form" action="{{ route('admin.davinci.configs.store.api') }}" method="POST" enctype="multipart/form-data">
								@csrf

								<div class="card shadow-0 mt-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/openai-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('OpenAI') }}</h6>

										<div class="row">
											<div class="col-lg-12 col-md-6 col-sm-12">
												<div class="row">								
													<div class="col-md-6 col-sm-12">
														<div class="input-box mb-0">								
															<h6>{{ __('OpenAI Secret Key') }} <span class="text-muted">({{ __('Main API Key') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
															<div class="form-group">							    
																<input type="text" class="form-control @error('secret-key') is-danger @enderror" id="secret-key" name="secret-key" value="{{ config('services.openai.key') }}" autocomplete="off">
																@error('secret-key')
																	<p class="text-danger">{{ $errors->first('secret-key') }}</p>
																@enderror
															</div> 												
														</div> 
													</div>

													<div class="col-md-6 col-sm-12">
														<div class="input-box">
															<h6>{{ __('Personal OpenAI API Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('If enabled, all users will be required to include their Personal OpenAi API keys in their profile pages. You can also enable it via Subscription plans only.') }}"></i></h6>
															<select id="personal-openai-api" name="personal-openai-api" class="form-select">
																<option value="allow" @if (config('settings.personal_openai_api') == 'allow') selected @endif>{{ __('Allow') }}</option>
																<option value="deny" @if (config('settings.personal_openai_api') == 'deny') selected @endif>{{ __('Deny') }}</option>																																																																																																								
															</select>
														</div>
													</div>				
													
													<div class="col-md-6 col-sm-12">
														<div class="input-box mb-0">								
															<h6>{{ __('Openai API Key Usage Model') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
															<select id="openai-key-usage" name="openai-key-usage" class="form-select" data-placeholder="{{ __('Set API Key Usage Model') }}">
																<option value="main" @if (config('settings.openai_key_usage') == 'main') selected @endif>{{ __('Only Main API Key') }}</option>
																<option value="random" @if (config('settings.openai_key_usage') == 'random') selected @endif>{{ __('Random API Key') }}</option>																																																																																																									
															</select>
														</div> 
													</div>
												</div>
												<a href="{{ route('admin.davinci.configs.keys') }}" class="btn btn-primary mt-4 mr-4" style="padding-left: 25px; padding-right: 25px;">{{ __('Store additional OpenAI API Keys') }}</a>
												<a href="{{ route('admin.davinci.configs.fine-tune') }}" class="btn btn-primary mt-4" style="width: 223px;">{{ __('Fine Tune Models') }}</a>
											</div>							
										</div>

										<div class="row">
											<h6 class="fs-12 font-weight-bold mb-4 mt-4">{{ __('OpenAI Voiceover Settings') }}</h6>

											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label class="custom-switch">
														<input type="checkbox" name="enable-openai-std" class="custom-switch-input" @if ( config('settings.enable.openai_std')  == 'on') checked @endif>
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">{{ __('Activate OpenAI Standard Voices') }}</span>
													</label>
												</div>
											</div>	
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label class="custom-switch">
														<input type="checkbox" name="enable-openai-nrl" class="custom-switch-input" @if ( config('settings.enable.openai_nrl')  == 'on') checked @endif>
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">{{ __('Activate OpenAI Neural Voices') }}</span>
													</label>
												</div>
											</div>							
										</div>	
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/anthropic.jpeg')}}" class="fw-2 mr-2" alt="">{{ __('Anthropic') }}</h6>

										<div class="row">
											<div class="col-lg-12 col-sm-12 no-gutters">
												<div class="row">							
													<div class="col-sm-12">
														<div class="input-box">								
															<h6>{{ __('Anthropic API Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
															<div class="form-group">							    
																<input type="text" class="form-control @error('anthropic-api-key') is-danger @enderror" id="anthropic-api-key" name="anthropic-api-key" value="{{ config('anthropic.api_key') }}" autocomplete="off">
																@error('anthropic-api-key')
																	<p class="text-danger">{{ $errors->first('anthropic-api-key') }}</p>
																@enderror												
															</div> 
														</div> 
													</div>
												</div>												
											</div>							
										</div>
			
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/gcp-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('Google Gemini') }}</h6>

										<div class="row">
											<div class="col-lg-12 col-sm-12 no-gutters">
												<div class="row">							
													<div class="col-sm-12">
														<div class="input-box">								
															<h6>{{ __('Gemini API Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
															<div class="form-group">							    
																<input type="text" class="form-control @error('gemini-api-key') is-danger @enderror" id="gemini-api-key" name="gemini-api-key" value="{{ config('gemini.api_key') }}" autocomplete="off">
																@error('gemini-api-key')
																	<p class="text-danger">{{ $errors->first('gemini-api-key') }}</p>
																@enderror												
															</div> 
														</div> 
													</div>
												</div>												
											</div>							
										</div>
			
									</div>
								</div>
								
								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/stability-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('Stable Diffusion') }}</h6>

										<div class="row">
											<div class="col-lg-12 col-md-6 col-sm-12 no-gutters">
												<div class="row">							
													<div class="col-md-6 col-sm-12">
														<div class="input-box mb-0">								
															<h6>{{ __('Stable Diffusion API Key') }} <span class="text-muted">({{ __('Main API Key') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
															<div class="form-group">							    
																<input type="text" class="form-control @error('stable-diffusion-key') is-danger @enderror" id="stable-diffusion-key" name="stable-diffusion-key" value="{{ config('services.stable_diffusion.key') }}" autocomplete="off">
																@error('stable-diffusion-key')
																	<p class="text-danger">{{ $errors->first('stable-diffusion-key') }}</p>
																@enderror												
															</div> 
														</div> 
													</div>

													<div class="col-md-6 col-sm-12">
														<div class="input-box">
															<h6>{{ __('Personal Stable Diffusion API Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('If enabled, all users will be required to include their Personal Stable Diffusion API keys in their profile pages. You can also enable it via Subscription plans only.') }}"></i></h6>
															<select id="personal-sd-api" name="personal-sd-api" class="form-select">
																<option value="allow" @if (config('settings.personal_sd_api') == 'allow') selected @endif>{{ __('Allow') }}</option>
																<option value="deny" @if (config('settings.personal_sd_api') == 'deny') selected @endif>{{ __('Deny') }}</option>																																																																																																								
															</select>
														</div>
													</div>

													<div class="col-md-6 col-sm-12">
														<div class="input-box mb-0">								
															<h6>{{ __('SD API Key Usage Model') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
															<select id="sd-key-usage" name="sd-key-usage" class="form-select" data-placeholder="{{ __('Set API Key Usage Model') }}">
																<option value="main" @if (config('settings.sd_key_usage') == 'main') selected @endif>{{ __('Only Main API Key') }}</option>
																<option value="random" @if (config('settings.sd_key_usage') == 'random') selected @endif>{{ __('Random API Key') }}</option>																																																																																																									
															</select>
														</div> 
													</div>
												</div>
												<a href="{{ route('admin.davinci.configs.keys') }}" class="btn btn-primary mt-4 mb-2" style="padding-left: 25px; padding-right: 25px; width: 223px;">{{ __('Store additional SD API Keys') }}</a>
											</div>							
										</div>
			
									</div>
								</div>	

								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/azure-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('Azure Voiceover Settings') }}</h6>

										<div class="form-group mb-3">
											<label class="custom-switch">
												<input type="checkbox" name="enable-azure" class="custom-switch-input" @if ( config('settings.enable.azure')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Activate Azure Voices') }}</span>
											</label>
										</div>

										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Azure Key') }}</h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-azure-key') is-danger @enderror" id="set-azure-key" name="set-azure-key" value="{{ config('services.azure.key') }}" autocomplete="off">
														@error('set-azure-key')
															<p class="text-danger">{{ $errors->first('set-azure-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- AZURE REGION -->
												<div class="input-box">	
													<h6>{{ __('Azure Region') }}</h6>
													<select id="set-azure-region" name="set-azure-region" class="form-select" data-placeholder="Select Azure Region:">			
														<option value="australiaeast" @if ( config('services.azure.region')  == 'australiaeast') selected @endif>Australia East (australiaeast)</option>
														<option value="brazilsouth" @if ( config('services.azure.region')  == 'brazilsouth') selected @endif>Brazil South (brazilsouth)</option>
														<option value="canadacentral" @if ( config('services.azure.region')  == 'canadacentral') selected @endif>Canada Central (canadacentral)</option>
														<option value="centralus" @if ( config('services.azure.region')  == 'centralus') selected @endif>Central US (centralus)</option>
														<option value="eastasia" @if ( config('services.azure.region')  == 'eastasia') selected @endif>East Asia (eastasia)</option>
														<option value="eastus" @if ( config('services.azure.region')  == 'eastus') selected @endif>East US (eastus)</option>
														<option value="eastus2" @if ( config('services.azure.region')  == 'eastus2') selected @endif>East US 2 (eastus2)</option>
														<option value="francecentral" @if ( config('services.azure.region')  == 'francecentral') selected @endif>France Central (francecentral)</option>
														<option value="centralindia" @if ( config('services.azure.region')  == 'centralindia') selected @endif>India Central (centralindia)</option>
														<option value="japaneast" @if ( config('services.azure.region')  == 'japaneast') selected @endif>Japan East (japaneast)</option>
														<option value="japanwest" @if ( config('services.azure.region')  == 'japanwest') selected @endif>Japan West (japanwest)</option>
														<option value="koreacentral" @if ( config('services.azure.region')  == 'koreacentral') selected @endif>Korea Central (koreacentral)</option>
														<option value="northcentralus" @if ( config('services.azure.region')  == 'northcentralus') selected @endif>North Central US (northcentralus)</option>
														<option value="northeurope" @if ( config('services.azure.region')  == 'northeurope') selected @endif>North Europe (northeurope)</option>
														<option value="southcentralus" @if ( config('services.azure.region')  == 'southcentralus') selected @endif>South Central US (southcentralus)</option>
														<option value="southeastasia" @if ( config('services.azure.region')  == 'southeastasia') selected @endif>Southeast Asia (southeastasia)</option>
														<option value="uksouth" @if ( config('services.azure.region')  == 'uksouth') selected @endif>UK South (uksouth)</option>
														<option value="westcentralus" @if ( config('services.azure.region')  == 'westcentralus') selected @endif>West Central US (westcentralus)</option>
														<option value="westeurope" @if ( config('services.azure.region')  == 'westeurope') selected @endif>West Europe (westeurope)</option>
														<option value="westus" @if ( config('services.azure.region')  == 'westus') selected @endif>West US (westus)</option>
														<option value="westus2" @if ( config('services.azure.region')  == 'westus2') selected @endif>West US 2 (westus2)</option>
													</select>
												</div> <!-- END AZURE REGION -->									
											</div>

										</div>
			
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/elevenlabs-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('ElevenLabs Voiceover Settings') }}</h6>

										<div class="form-group mb-3">
											<label class="custom-switch">
												<input type="checkbox" name="enable-elevenlabs" class="custom-switch-input" @if ( config('settings.enable.elevenlabs')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Activate ElevenLabs Voices') }}</span>
											</label>
										</div>

										<div class="row">
											<div class="col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('ElevenLabs API Key') }}</h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-elevenlabs-api') is-danger @enderror" id="set-elevenlabs-api" name="set-elevenlabs-api" value="{{ config('services.elevenlabs.key') }}" autocomplete="off">
														@error('set-elevenlabs-api')
															<p class="text-danger">{{ $errors->first('set-elevenlabs-api') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>								
										</div>
			
									</div>
								</div>	

								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/gcp-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('GCP Voiceover Settings') }}</h6>

										<div class="form-group mb-3">
											<label class="custom-switch">
												<input type="checkbox" name="enable-gcp" class="custom-switch-input" @if ( config('settings.enable.gcp')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Activate GCP Voices') }}</span>
											</label>
										</div>

										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('GCP Configuration File Path') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('gcp-configuration-path') is-danger @enderror" id="gcp-configuration-path" name="gcp-configuration-path" value="{{ config('services.gcp.key_path') }}" autocomplete="off">
														@error('gcp-configuration-path')
															<p class="text-danger">{{ $errors->first('gcp-configuration-path') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>	
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<div class="input-box">								
													<h6>{{ __('GCP Storage Bucket Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('gcp-bucket') is-danger @enderror" id="gcp-bucket" name="gcp-bucket" value="{{ config('services.gcp.bucket') }}" autocomplete="off">
														@error('gcp-bucket')
															<p class="text-danger">{{ $errors->first('gcp-bucket') }}</p>
														@enderror
													</div> 
												</div> 
											</div>							
										</div>
			
									</div>
								</div>	

								<div class="card shadow-0 mb-7">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/aws-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('Amazon Web Services') }}</h6>

										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group mb-3">
													<label class="custom-switch">
														<input type="checkbox" name="enable-aws-std" class="custom-switch-input" @if ( config('settings.enable.aws_std')  == 'on') checked @endif>
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">{{ __('Activate AWS Standard Voices') }}</span>
													</label>
												</div>
											</div>	
											<div class="col-md-6 col-sm-12">
												<div class="form-group mb-3">
													<label class="custom-switch">
														<input type="checkbox" name="enable-aws-nrl" class="custom-switch-input" @if ( config('settings.enable.aws_nrl')  == 'on') checked @endif>
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">{{ __('Activate AWS Neural Voices') }}</span>
													</label>
												</div>
											</div>	

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('AWS Access Key') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-aws-access-key') is-danger @enderror" id="aws-access-key" name="set-aws-access-key" value="{{ config('services.aws.key') }}" autocomplete="off">
														@error('set-aws-access-key')
															<p class="text-danger">{{ $errors->first('set-aws-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- SECRET ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('AWS Secret Access Key') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-aws-secret-access-key') is-danger @enderror" id="aws-secret-access-key" name="set-aws-secret-access-key" value="{{ config('services.aws.secret') }}" autocomplete="off">
														@error('set-aws-secret-access-key')
															<p class="text-danger">{{ $errors->first('set-aws-secret-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END SECRET ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Amazon S3 Bucket Name') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-aws-bucket') is-danger @enderror" id="aws-bucket" name="set-aws-bucket" value="{{ config('services.aws.bucket') }}" autocomplete="off">
														@error('set-aws-bucket')
															<p class="text-danger">{{ $errors->first('set-aws-bucket') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- AWS REGION -->
												<div class="input-box">	
													<h6>{{ __('Set AWS Region') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="set-aws-region" name="set-aws-region" class="form-select" data-placeholder="Select Default AWS Region:">			
														<option value="us-east-1" @if ( config('services.aws.region')  == 'us-east-1') selected @endif>{{ __('US East (N. Virginia) us-east-1') }}</option>
														<option value="us-east-2" @if ( config('services.aws.region')  == 'us-east-2') selected @endif>{{ __('US East (Ohio) us-east-2') }}</option>
														<option value="us-west-1" @if ( config('services.aws.region')  == 'us-west-1') selected @endif>{{ __('US West (N. California) us-west-1') }}</option>
														<option value="us-west-2" @if ( config('services.aws.region')  == 'us-west-2') selected @endif>{{ __('US West (Oregon) us-west-2') }}</option>
														<option value="ap-east-1" @if ( config('services.aws.region')  == 'ap-east-1') selected @endif>{{ __('Asia Pacific (Hong Kong) ap-east-1') }}</option>
														<option value="ap-south-1" @if ( config('services.aws.region')  == 'ap-south-1') selected @endif>{{ __('Asia Pacific (Mumbai) ap-south-1') }}</option>
														<option value="ap-northeast-3" @if ( config('services.aws.region')  == 'ap-northeast-3') selected @endif>{{ __('Asia Pacific (Osaka) ap-northeast-3') }}</option>
														<option value="ap-northeast-2" @if ( config('services.aws.region')  == 'ap-northeast-2') selected @endif>{{ __('Asia Pacific (Seoul) ap-northeast-2') }}</option>
														<option value="ap-southeast-1" @if ( config('services.aws.region')  == 'ap-southeast-1') selected @endif>{{ __('Asia Pacific (Singapore) ap-southeast-1') }}</option>
														<option value="ap-southeast-2" @if ( config('services.aws.region')  == 'ap-southeast-2') selected @endif>{{ __('Asia Pacific (Sydney) ap-southeast-2') }}</option>
														<option value="ap-northeast-1" @if ( config('services.aws.region')  == 'ap-northeast-1') selected @endif>{{ __('Asia Pacific (Tokyo) ap-northeast-1') }}</option>
														<option value="ap-northeast-1" @if ( config('services.aws.region')  == 'ap-south-2') selected @endif>{{ __('Asia Pacific (Hyderabad) ap-south-2') }}</option>
														<option value="ap-northeast-1" @if ( config('services.aws.region')  == 'ap-southeast-3') selected @endif>{{ __('Asia Pacific (Jakarta) ap-southeast-3') }}</option>
														<option value="eu-central-1" @if ( config('services.aws.region')  == 'eu-central-1') selected @endif>{{ __('Europe (Frankfurt) eu-central-1') }}</option>
														<option value="eu-central-1" @if ( config('services.aws.region')  == 'eu-central-2') selected @endif>{{ __('Europe (Zurich) eu-central-2') }}</option>
														<option value="eu-west-1" @if ( config('services.aws.region')  == 'eu-west-1') selected @endif>{{ __('Europe (Ireland) eu-west-1') }}</option>
														<option value="eu-west-2" @if ( config('services.aws.region')  == 'eu-west-2') selected @endif>{{ __('Europe (London) eu-west-2') }}</option>
														<option value="eu-south-1" @if ( config('services.aws.region')  == 'eu-south-1') selected @endif>{{ __('Europe (Milan) eu-south-1') }}</option>
														<option value="eu-south-1" @if ( config('services.aws.region')  == 'eu-south-1') selected @endif>{{ __('Europe (Spain) eu-south-2') }}</option>
														<option value="eu-west-3" @if ( config('services.aws.region')  == 'eu-west-3') selected @endif>{{ __('Europe (Paris) eu-west-3') }}</option>
														<option value="eu-north-1" @if ( config('services.aws.region')  == 'eu-north-1') selected @endif>{{ __('Europe (Stockholm) eu-north-1') }}</option>
														<option value="me-south-1" @if ( config('services.aws.region')  == 'me-south-1') selected @endif>{{ __('Middle East (Bahrain) me-south-1') }}</option>
														<option value="me-south-1" @if ( config('services.aws.region')  == 'me-central-1') selected @endif>{{ __('Middle East (UAE) me-central-1') }}</option>
														<option value="sa-east-1" @if ( config('services.aws.region')  == 'sa-east-1') selected @endif>{{ __('South America (São Paulo) sa-east-1') }}</option>
														<option value="ca-central-1" @if ( config('services.aws.region')  == 'ca-central-1') selected @endif>{{ __('Canada (Central) ca-central-1') }}</option>
														<option value="af-south-1" @if ( config('services.aws.region')  == 'af-south-1') selected @endif>{{ __('Africa (Cape Town) af-south-1') }}</option>
													</select>
												</div> <!-- END AWS REGION -->									
											</div>									
				
										</div>
			
									</div>
								</div>	

								<div class="card shadow-0 mb-7">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/storj-ssm.png')}}" class="fw-2 mr-2" alt="">{{ __('Storj Cloud') }}</h6>

										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Storj Access Key') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-storj-access-key') is-danger @enderror" id="storj-access-key" name="set-storj-access-key" value="{{ config('services.storj.key') }}" autocomplete="off">
														@error('set-storj-access-key')
															<p class="text-danger">{{ $errors->first('set-storj-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- SECRET ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Storj Secret Access Key') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-storj-secret-access-key') is-danger @enderror" id="storj-secret-access-key" name="set-storj-secret-access-key" value="{{ config('services.storj.secret') }}" autocomplete="off">
														@error('set-storj-secret-access-key')
															<p class="text-danger">{{ $errors->first('set-storj-secret-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END SECRET ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Storj Bucket Name') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-storj-bucket') is-danger @enderror" id="storj-bucket" name="set-storj-bucket" value="{{ config('services.storj.bucket') }}" autocomplete="off">
														@error('set-storj-bucket')
															<p class="text-danger">{{ $errors->first('set-storj-bucket') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>									
				
										</div>
			
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/dropbox-ssm.png')}}" class="fw-2 mr-2" alt="">{{ __('Dropbox') }}</h6>

										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Dropbox App Key') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-dropbox-app-key') is-danger @enderror" id="dropbox-app-key" name="set-dropbox-app-key" value="{{ config('services.dropbox.key') }}" autocomplete="off">
														@error('set-dropbox-app-key')
															<p class="text-danger">{{ $errors->first('set-dropbox-app-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- SECRET ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Dropbox Secret Key') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-dropbox-secret-key') is-danger @enderror" id="dropbox-secret-key" name="set-dropbox-secret-key" value="{{ config('services.dropbox.secret') }}" autocomplete="off">
														@error('set-dropbox-secret-key')
															<p class="text-danger">{{ $errors->first('set-dropbox-secret-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END SECRET ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Dropbox Access Token') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-dropbox-access-token') is-danger @enderror" id="dropbox-access-token" name="set-dropbox-access-token" value="{{ config('services.dropbox.token') }}" autocomplete="off">
														@error('set-dropbox-access-token')
															<p class="text-danger">{{ $errors->first('set-dropbox-access-token') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>									
				
										</div>
			
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/wasabi-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('Wasabi Cloud Storage') }}</h6>

										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Wasabi Access Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-wasabi-access-key') is-danger @enderror" id="wasabi-access-key" name="set-wasabi-access-key" value="{{ config('services.wasabi.key') }}" autocomplete="off">
														@error('set-wasabi-access-key')
															<p class="text-danger">{{ $errors->first('set-wasabi-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- SECRET ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Wasabi Secret Access Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-wasabi-secret-access-key') is-danger @enderror" id="wasabi-secret-access-key" name="set-wasabi-secret-access-key" value="{{ config('services.wasabi.secret') }}" autocomplete="off">
														@error('set-wasabi-secret-access-key')
															<p class="text-danger">{{ $errors->first('set-wasabi-secret-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END SECRET ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Wasabi Bucket Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-wasabi-bucket') is-danger @enderror" id="wasabi-bucket" name="set-wasabi-bucket" value="{{ config('services.wasabi.bucket') }}" autocomplete="off">
														@error('set-wasabi-bucket')
															<p class="text-danger">{{ $errors->first('set-wasabi-bucket') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- AWS REGION -->
												<div class="input-box">	
													<h6>{{ __('Set Wasabi Region') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="set-wasabi-region" name="set-wasabi-region" class="form-select" data-placeholder="Select Default Wasabi Region:">			
														<option value="us-west-1" @if ( config('services.wasabi.region')  == 'us-west-1') selected @endif>{{ __('US Oregon us-west-1') }}</option>
														<option value="us-central-1" @if ( config('services.wasabi.region')  == 'us-central-1') selected @endif>{{ __('US Texas us-central-1') }}</option>
														<option value="us-east-1" @if ( config('services.wasabi.region')  == 'us-east-1') selected @endif>{{ __('US N.Virginia us-east-1') }}</option>
														<option value="us-east-2" @if ( config('services.wasabi.region')  == 'us-east-2') selected @endif>{{ __('US N.Virginia us-east-2') }}</option>
														<option value="ap-northeast-1" @if ( config('services.wasabi.region')  == 'ap-northeast-1') selected @endif>{{ __('Asia Pacific Tokyo ap-northeast-1') }}</option>
														<option value="ap-northeast-2" @if ( config('services.wasabi.region')  == 'ap-northeast-2') selected @endif>{{ __('Asia Pacific Osaka ap-northeast-2') }}</option>
														<option value="ap-southeast-1" @if ( config('services.wasabi.region')  == 'ap-southeast-1') selected @endif>{{ __('Asia Pacific Singapore ap-southeast-1') }}</option>
														<option value="ap-southeast-2" @if ( config('services.wasabi.region')  == 'ap-southeast-2') selected @endif>{{ __('Asia Pacific Sydney ap-southeast-2') }}</option>
														<option value="ca-central-1" @if ( config('services.wasabi.region')  == 'ca-central-1') selected @endif>{{ __('Canada Toronto ca-central-1') }}</option>
														<option value="eu-central-1" @if ( config('services.wasabi.region')  == 'eu-central-1') selected @endif>{{ __('Europe Amsterdam eu-central-1') }}</option>
														<option value="eu-central-2" @if ( config('services.wasabi.region')  == 'eu-central-2') selected @endif>{{ __('Europe Frankfurt eu-central-2') }}</option>
														<option value="eu-west-1" @if ( config('services.wasabi.region')  == 'eu-west-1') selected @endif>{{ __('Europe London eu-west-1') }}</option>
														<option value="eu-west-2" @if ( config('services.wasabi.region')  == 'eu-west-2') selected @endif>{{ __('Europe Paris eu-west-2') }}</option>
													</select>
												</div> <!-- END AWS REGION -->									
											</div>								
				
										</div>
			
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/cloudflare-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('Cloudflare R2 Storage') }}</h6>

										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<!-- ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Cloudflare R2 Access Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-r2-access-key') is-danger @enderror" id="r2-access-key" name="set-r2-access-key" value="{{ config('services.r2.key') }}" autocomplete="off">
														@error('set-r2-access-key')
															<p class="text-danger">{{ $errors->first('set-r2-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<!-- SECRET ACCESS KEY -->
												<div class="input-box">								
													<h6>{{ __('Cloudflare R2 Secret Access Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-r2-secret-access-key') is-danger @enderror" id="r2-secret-access-key" name="set-r2-secret-access-key" value="{{ config('services.r2.secret') }}" autocomplete="off">
														@error('set-r2-secret-access-key')
															<p class="text-danger">{{ $errors->first('set-r2-secret-access-key') }}</p>
														@enderror
													</div> 
												</div> <!-- END SECRET ACCESS KEY -->
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<div class="input-box">								
													<h6>{{ __('Cloudflare R2 Bucket Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-r2-bucket') is-danger @enderror" id="r2-bucket" name="set-r2-bucket" value="{{ config('services.r2.bucket') }}" autocomplete="off">
														@error('set-r2-bucket')
															<p class="text-danger">{{ $errors->first('set-r2-bucket') }}</p>
														@enderror
													</div> 
												</div> 
											</div>		
											
											<div class="col-lg-6 col-md-6 col-sm-12">								
												<div class="input-box">								
													<h6>{{ __('Cloudflare R2 Endpoint') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-r2-endpoint') is-danger @enderror" id="r2-endpoint" name="set-r2-endpoint" value="{{ config('services.r2.endpoint') }}" autocomplete="off">
														@error('set-r2-endpoint')
															<p class="text-danger">{{ $errors->first('set-r2-endpoint') }}</p>
														@enderror
													</div> 
												</div> 
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">								
												<div class="input-box">								
													<h6>{{ __('Cloudflare R2 Public URL') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-r2-url') is-danger @enderror" id="r2-url" name="set-r2-url" value="{{ config('services.r2.url') }}" autocomplete="off">
														@error('set-r2-url')
															<p class="text-danger">{{ $errors->first('set-r2-url') }}</p>
														@enderror
													</div> 
												</div> 
											</div>
				
										</div>
			
									</div>
								</div>

								<div class="card shadow-0 mb-7">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><img src="{{theme_url('img/csp/serper.png')}}" class="fw-2 mr-2" alt="">{{ __('Serper Settings') }}</h6>

										<div class="row">
											<div class="col-sm-12">
												<div class="input-box">								
													<h6>{{ __('Serper API Key') }} <span class="text-muted">({{ __('Required for Real-Time Internet Access') }})</span></h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('set-serper-api') is-danger @enderror" id="set-serper-api" name="set-serper-api" value="{{ config('services.serper.key') }}" autocomplete="off">
														@error('set-serper-api')
															<p class="text-danger">{{ $errors->first('set-serper-api') }}</p>
														@enderror
													</div> 												
												</div> 
											</div>
										</div>			
									</div>
								</div>

								<div class="card shadow-0">							
									<div class="card-body">
										<h6 class="fs-12 font-weight-bold mb-4"><i class="fw-2 mr-2 fa-brands fa-youtube text-danger"></i>{{ __('Youtube Settings') }}</h6>

										<div class="row">
											<div class="col-sm-12">
												<div class="input-box">								
													<h6>{{ __('Youtube API Key') }}</h6>
													<div class="form-group">							    
														<input type="text" class="form-control @error('youtube-api') is-danger @enderror" id="youtube-api" name="youtube-api" value="{{ $settings->youtube_api }}" autocomplete="off">
														@error('youtube-api')
															<p class="text-danger">{{ $errors->first('youtube-api') }}</p>
														@enderror
													</div> 												
												</div> 
											</div>
										</div>												
									</div>
								</div>

								<!-- SAVE CHANGES ACTION BUTTON -->
								<div class="border-0 text-center mb-2 mt-1">
									<button type="button" class="btn ripple btn-primary" style="min-width: 200px;" id="api-settings">{{ __('Save') }}</button>							
								</div>
							</form>
						</div>

						<div class="tab-pane fade" id="extended" role="tabpanel" aria-labelledby="extended-tab">

							<div class="row">

								@if (App\Services\HelperService::extensionPlagiarism())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/plagiarism')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/plagiarism.png')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('AI Plagiarism and Content Detector') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionFlux())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/flux')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/flux.png')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('Fal AI') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Flux Pro API keys')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionPebblely())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/pebblely')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/pebblely.webp')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('AI Product Photography') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Pebblely API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionVoiceClone())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/voice-clone')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/elevenlabs-sm.png')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('Voice Clone') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Elevenlabs API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionSoundStudio())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/sound-studio')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<i class="fa-sharp fa-solid fa-photo-film-music mr-4" style="font-size: 40px!important;"></i>											
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('Sound Studio') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Sound Studio service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionPhotoStudio())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/photo-studio')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/stability-sm.png')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('AI Photo Studio') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Stability API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionVideoImage())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/video-image')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/stability-sm.png')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('AI Video') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Stability API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionWordpressIntegration())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/integration/wordpress')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/wordpress.png')}}" class="mr-4" alt="" style="width: 70px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('Wordpress Integration') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Wordpress API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif

								@if (App\Services\HelperService::extensionAvatar())
									<div class="col-md-6 col-sm-12">
										<div class="card shadow-0 mb-6" onclick="window.location.href='{{ url('/app/admin/davinci/configs/avatar')}}'">
											<div class="card-body p-5 d-flex">
												<div class="extension-icon">
													<img src="{{theme_url('img/csp/heygen.png')}}" class="mr-4" alt="" style="width: 40px;">												
												</div>
												<div class="extension-title">
													<div class="d-flex">
														<h6 class="fs-15 font-weight-bold mb-3">{{ __('AI Avatar') }}</h6>
													</div>
													<p class="fs-12 mb-0 text-muted">{{ __('Heygen API keys and service configurations')}}</p>
												</div>
											</div>							
										</div>
									</div>
								@endif
							</div>
						</div>

						<div class="tab-pane fade" id="trial" role="tabpanel" aria-labelledby="trial-tab">
							<form id="trial-features-form" action="{{ route('admin.davinci.configs.store.trial') }}" method="POST" enctype="multipart/form-data">
								@csrf
								
								<div class="card shadow-0 mb-7">							
									<div class="card-body">

										<h6 class="fs-12 font-weight-bold mb-6 text-center mt-4"><i class="fa fa-gift text-warning fs-14 mr-2"></i>{{ __('Free Trial Features') }} <span class="text-muted">({{ __('Free Tier User Group Only') }})</span></h6>

										<div class="row">			

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('Templates Category Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="templates-user" name="templates-user" class="form-select">
														<option value="all" @if (config('settings.templates_access_user') == 'all') selected @endif>{{ __('All Templates') }}</option>	
														<option value="free" @if (config('settings.templates_access_user') == 'free') selected @endif>{{ __('Only Free Templates') }}</option>																																									
														<option value="standard" @if (config('settings.templates_access_user') == 'standard') selected @endif> {{ __('Up to Standard Templates') }}</option>	
														<option value="professional" @if (config('settings.templates_access_user') == 'professional') selected @endif> {{ __('Up to Professional Templates') }}</option>	
														<option value="premium" @if (config('settings.templates_access_user') == 'premium') selected @endif> {{ __('Up to Premium Templates') }} ({{ __('All') }})</option>																																																													
													</select>
												</div>
											</div>				
											
											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Chat Package Type Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="chats" name="chat-user" class="form-select">
														<option value="all" @if (config('settings.chats_access_user') == 'all') selected @endif>{{ __('All Chat Types') }}</option>
														<option value="free" @if (config('settings.chats_access_user') == 'free') selected @endif>{{ __('Only Free Chat Types') }}</option>
														<option value="standard" @if (config('settings.chats_access_user') == 'standard') selected @endif> {{ __('Up to Standard Chat Types') }}</option>
														<option value="professional" @if (config('settings.chats_access_user') == 'professional') selected @endif> {{ __('Up to Professional Chat Types') }}</option>																																		
														<option value="premium" @if (config('settings.chats_access_user') == 'premium') selected @endif> {{ __('Up to Premium Chat Types') }}</option>																																																																																																									
													</select>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('Default AI Model for Chat Bots') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="default-model-user-bot" name="default-model-user-bot" class="form-select">			
														<option value="gpt-3.5-turbo-0125" @if ( config('settings.default_model_user_bot')  == 'gpt-3.5-turbo-0125') selected @endif>{{ __('GPT 3.5 Turbo') }}</option>												
														<option value="gpt-4" @if ( config('settings.default_model_user_bot')  == 'gpt-4') selected @endif>{{ __('GPT 4') }}</option>
														<option value="gpt-4o" @if ( config('settings.default_model_user_bot')  == 'gpt-4o') selected @endif>{{ __('GPT 4o') }}</option>
														<option value="gpt-4o-mini" @if ( config('settings.default_model_user_bot')  == 'gpt-4o-mini') selected @endif>{{ __('GPT 4o mini') }}</option>
														<option value="gpt-4-0125-preview" @if ( config('settings.default_model_user_bot')  == 'gpt-4-0125-preview') selected @endif>{{ __('GPT 4 Turbo') }}</option>
														<option value="gpt-4-turbo-2024-04-09" @if ( config('settings.default_model_user_bot')  == 'gpt-4-turbo-2024-04-09') selected @endif>{{ __('GPT 4 Turbo with Vision') }}</option>
														<option value="o1-preview" @if ( config('settings.default_model_user_bot')  == 'o1-preview') selected @endif>{{ __('o1 preview') }}</option>
														<option value="o1-mini" @if ( config('settings.default_model_user_bot')  == 'o1-mini') selected @endif>{{ __('o1 mini') }}</option>
														<option value="claude-3-opus-20240229" @if ( config('settings.default_model_user_bot')  == 'claude-3-opus-20240229') selected @endif>{{ __('Claude 3 Opus') }}</option>
														<option value="claude-3-5-sonnet-20241022" @if ( config('settings.default_model_user_bot')  == 'claude-3-5-sonnet-20241022') selected @endif>{{ __('Claude 3.5 Sonnet') }}</option>
														<option value="claude-3-5-haiku-20241022" @if ( config('settings.default_model_user_bot')  == 'claude-3-5-haiku-20241022') selected @endif>{{ __('Claude 3.5 Haiku') }}</option>
														<option value="gemini_pro" @if ( config('settings.default_model_user_bot')  == 'gemini_pro') selected @endif>{{ __('Gemini Pro') }}</option>
														@foreach ($models as $model)
															<option value="{{ $model->model }}" @if ( config('settings.default_model_user_bot')  == $model->model) selected @endif>{{ $model->description }} ({{ __('Fine Tune Model')}})</option>
														@endforeach
													</select>
												</div>								
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('Default AI Model for Templates') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<select id="default-model-user-template" name="default-model-user-template" class="form-select">	
														<option value="gpt-3.5-turbo-0125" @if ( config('settings.default_model_user_template')  == 'gpt-3.5-turbo-0125') selected @endif>{{ __('GPT 3.5 Turbo') }}</option>												
														<option value="gpt-4" @if ( config('settings.default_model_user_template')  == 'gpt-4') selected @endif>{{ __('GPT 4') }}</option>
														<option value="gpt-4o" @if ( config('settings.default_model_user_template')  == 'gpt-4o') selected @endif>{{ __('GPT 4o') }}</option>
														<option value="gpt-4o-mini" @if ( config('settings.default_model_user_template')  == 'gpt-4o-mini') selected @endif>{{ __('GPT 4o mini') }}</option>
														<option value="gpt-4-0125-preview" @if ( config('settings.default_model_user_template')  == 'gpt-4-0125-preview') selected @endif>{{ __('GPT 4 Turbo') }}</option>
														<option value="gpt-4-turbo-2024-04-09" @if ( config('settings.default_model_user_template')  == 'gpt-4-turbo-2024-04-09') selected @endif>{{ __('GPT 4 Turbo with Vision') }}</option>														
														<option value="o1-preview" @if ( config('settings.default_model_user_template')  == 'o1-preview') selected @endif>{{ __('o1 preview') }}</option>
														<option value="o1-mini" @if ( config('settings.default_model_user_template')  == 'o1-mini') selected @endif>{{ __('o1 mini') }}</option>
														<option value="claude-3-opus-20240229" @if ( config('settings.default_model_user_template')  == 'claude-3-opus-20240229') selected @endif>{{ __('Claude 3 Opus') }}</option>
														<option value="claude-3-5-sonnet-20241022" @if ( config('settings.default_model_user_template')  == 'claude-3-5-sonnet-20241022') selected @endif>{{ __('Claude 3.5 Sonnet') }}</option>
														<option value="claude-3-5-haiku-20241022" @if ( config('settings.default_model_user_template')  == 'claude-3-5-haiku-20241022') selected @endif>{{ __('Claude 3.5 Haiku') }}</option>
														<option value="gemini_pro" @if ( config('settings.default_model_user_template')  == 'gemini_pro') selected @endif>{{ __('Gemini Pro') }}</option>
														@foreach ($models as $model)
															<option value="{{ $model->model }}" @if ( config('settings.default_model_user_template')  == $model->model) selected @endif>{{ $model->description }} ({{ __('Fine Tune Model')}})</option>
														@endforeach
													</select>
												</div>								
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('Available AI Models') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Only listed models will be available for non-subscribers. Make sure your default models above are actually included in this list.') }}."></i></h6>
													<select class="form-select" id="models-list" name="models_list[]" multiple>
														<option value='gpt-3.5-turbo-0125' @foreach ($all_models as $key=>$value) @if($value == 'gpt-3.5-turbo-0125') selected @endif @endforeach>{{ __('GPT 3.5 Turbo') }}</option>																															
														<option value='gpt-4' @foreach ($all_models as $key=>$value) @if($value == 'gpt-4') selected @endif @endforeach>{{ __('GPT 4') }}</option>																																																																																																																																																																																																																		
														<option value='gpt-4o' @foreach ($all_models as $key=>$value) @if($value == 'gpt-4o') selected @endif @endforeach>{{ __('GPT 4o') }}</option>																																																																																																																																																																																																																		
														<option value="gpt-4o-mini" @foreach ($all_models as $key=>$value) @if($value == 'gpt-4o-mini') selected @endif @endforeach>{{ __('GPT 4o mini') }}</option>
														<option value='gpt-4-0125-preview' @foreach ($all_models as $key=>$value) @if($value == 'gpt-4-0125-preview') selected @endif @endforeach>{{ __('GPT 4 Turbo') }}</option>																																																																																																																											
														<option value='gpt-4-turbo-2024-04-09' @foreach ($all_models as $key=>$value) @if($value == 'gpt-4-turbo-2024-04-09') selected @endif @endforeach>{{ __('GPT 4 Turbo with Vision') }}</option>																																																																																																																											
														<option value="o1-preview"  @foreach ($all_models as $key=>$value) @if($value == 'o1-preview') selected @endif @endforeach>{{ __('o1 preview') }}</option>
														<option value="o1-mini"  @foreach ($all_models as $key=>$value) @if($value == 'o1-mini') selected @endif @endforeach>{{ __('o1 mini') }}</option>
														<option value="claude-3-opus-20240229" @foreach ($all_models as $key=>$value) @if($value == 'claude-3-opus-20240229') selected @endif @endforeach>{{ __('Claude 3 Opus') }}</option>
														<option value="claude-3-5-sonnet-20241022" @foreach ($all_models as $key=>$value) @if($value == 'claude-3-5-sonnet-20241022') selected @endif @endforeach>{{ __('Claude 3.5 Sonnet') }}</option>
														<option value="claude-3-5-haiku-20241022" @foreach ($all_models as $key=>$value) @if($value == 'claude-3-5-haiku-20241022') selected @endif @endforeach>{{ __('Claude 3.5 Haiku') }}</option>
														<option value="gemini_pro" @foreach ($all_models as $key=>$value) @if($value == 'gemini_pro') selected @endif @endforeach>{{ __('Gemini Pro') }}</option>
														@foreach ($models as $model)
															<option value="{{ $model->model }}" @foreach ($all_models as $key=>$value) @if($value == $model->model) selected @endif @endforeach>{{ $model->description }} ({{ __('Fine Tune Model')}})</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Voiceover Vendors Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Only listed TTS voices of the listed vendors will be available for the subscriber. Make sure to include respective vendor API keys in the Davinci settings page.') }}."></i></h6>
													<select class="form-select" id="voiceover-vendors" name="voiceover_vendors[]" multiple>
														<option value='aws' @foreach ($vendors as $key=>$value) @if($value == 'aws') selected @endif @endforeach>{{ __('AWS') }}</option>																															
														<option value='azure' @foreach ($vendors as $key=>$value) @if($value == 'azure') selected @endif @endforeach>{{ __('Azure') }}</option>																																																														
														<option value='gcp' @foreach ($vendors as $key=>$value) @if($value == 'gcp') selected @endif @endforeach>{{ __('GCP') }}</option>																																																														
														<option value='openai' @foreach ($vendors as $key=>$value) @if($value == 'openai') selected @endif @endforeach>{{ __('OpenAI') }}</option>																																																														
														<option value='elevenlabs' @foreach ($vendors as $key=>$value) @if($value == 'elevenlabs') selected @endif @endforeach>{{ __('ElevenLabs') }}</option>																																																																																																																											
													</select>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Writer Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="writer-user-access" class="custom-switch-input" @if ( config('settings.writer_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Article Wizard Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="wizard-user-access" class="custom-switch-input" @if ( config('settings.wizard_access_user')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('Smart Editor Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="smart-editor-user-access" class="custom-switch-input" @if ( config('settings.smart_editor_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI ReWriter Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="rewriter-user-access" class="custom-switch-input" @if ( config('settings.rewriter_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Vision Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="vision-user-access" class="custom-switch-input" @if ( config('settings.vision_access_user')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI File Chat Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="chat-file-user-access" class="custom-switch-input" @if ( config('settings.chat_file_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Web Chat Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="chat-web-user-access" class="custom-switch-input" @if ( config('settings.chat_web_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>
				
											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('AI Chat Image Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="chat-image-user-access" class="custom-switch-input" @if ( config('settings.chat_image_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('Brand Voice Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="brand-voice-user-access" class="custom-switch-input" @if ( config('settings.brand_voice_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div> 						
											</div>	

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">
													<h6>{{ __('Internet Real Time Data Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="internet-user-access" class="custom-switch-input" @if ( config('settings.internet_user_access')  == 'allow') checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('AI Youtube Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="youtube-user-access" class="custom-switch-input" @if ($settings->youtube_feature_free_tier) checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div> 						
											</div>	

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="input-box">	
													<h6>{{ __('AI RSS Feature Access') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span></h6>
													<div class="form-group">
														<label class="custom-switch">
															<input type="checkbox" name="rss-user-access" class="custom-switch-input" @if ($settings->rss_feature_free_tier) checked @endif>
															<span class="custom-switch-indicator"></span>
														</label>
													</div>
												</div> 						
											</div>	

											<div class="row">

												<h6 class="fs-12 font-weight-bold mb-6 mt-4 text-center"><i class="fa fa-gift text-warning fs-14 mr-2"></i>{{ __('Welcome Credits & Limits for Non-Subscribers') }}</h6>

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of GPT 3.5 Turbo Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('gpt-3-turbo') is-danger @enderror" value={{ config('settings.free_gpt_3_turbo_credits') }} name="gpt-3-turbo">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>
					
												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of GPT 4 Turbo Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('gpt-4-turbo') is-danger @enderror" value={{ config('settings.free_gpt_4_turbo_credits') }} name="gpt-4-turbo">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of GPT 4o Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('gpt-4o') is-danger @enderror" value={{ config('settings.free_gpt_4o_credits') }} name="gpt-4o">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of GPT 4o mini Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('gpt-4o-mini') is-danger @enderror" value="{{ $settings->gpt_4o_mini_credits }}" name="gpt-4o-mini">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>
					
												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of GPT 4 Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('gpt-4') is-danger @enderror" value={{ config('settings.free_gpt_4_credits') }} name="gpt-4">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>	

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of o1 preview Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('o1-preview') is-danger @enderror" value="{{ $settings->o1_preview_credits }}" name="o1-preview">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>
												
												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of o1 mini Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('o1-mini') is-danger @enderror" value="{{ $settings->o1_mini_credits }}" name="o1-mini">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>
					
												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of Fine Tune Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('fine-tune') is-danger @enderror" value={{ config('settings.free_fine_tune_credits') }} name="fine-tune">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>
					
												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of Claude 3 Opus Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('claude-3-opus') is-danger @enderror" value={{ config('settings.free_claude_3_opus_credits') }} name="claude-3-opus">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of Claude 3.5 Sonnet Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('claude-3-sonnet') is-danger @enderror" value={{ config('settings.free_claude_3_sonnet_credits') }} name="claude-3-sonnet">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of Claude 3.5 Haiku Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('claude-3-haiku') is-danger @enderror" value={{ config('settings.free_claude_3_haiku_credits') }} name="claude-3-haiku">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>

												<div class="col-sm-12 col-md-6">
													<div class="input-box">
														<h6>{{ __('Number of Gemini Pro Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">															
															<input type="number" class="form-control @error('gemini-pro') is-danger @enderror" value={{ config('settings.free_gemini_pro_credits') }} name="gemini-pro">
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited words') }}</span>									
														</div>
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">								
														<h6>{{ __('Number of Characters for AI Voiceover as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">							    
															<input type="number" class="form-control @error('set-free-chars') is-danger @enderror" id="set-free-chars" name="set-free-chars" placeholder="Ex: 1000" value="{{ config('settings.voiceover_welcome_chars') }}" required>
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited characters') }}.</span>
															@error('set-free-chars')
																<p class="text-danger">{{ $errors->first('set-free-chars') }}</p>
															@enderror
														</div> 
													</div>							
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">								
														<h6>{{ __('Number of Minutes for AI Speech to Text as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">							    
															<input type="number" class="form-control @error('set-free-minutes') is-danger @enderror" id="set-free-minutes" name="set-free-minutes" placeholder="Ex: 1000" value="{{ config('settings.whisper_welcome_minutes') }}" required>
															<span class="text-muted fs-10">{{ __('Set as -1 for unlimited minutes') }}.</span>
															@error('set-free-minutes')
																<p class="text-danger">{{ $errors->first('set-free-minutes') }}</p>
															@enderror
														</div> 
													</div>							
												</div>	

												<div class="col-lg-6 col-md-6 col-sm-12">							
													<div class="input-box">								
														<h6>{{ __('Number of Image Credits as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
														<div class="form-group">							    
															<input type="number" class="form-control" id="image_credits" name="image_credits" value="{{ $settings->image_credits }}">
															<span class="text-muted fs-10">{{ __('Valid for all image vendors') }}. {{ __('Set as -1 for unlimited images') }}.</span>
														</div> 
														@error('image_credits')
															<p class="text-danger">{{ $errors->first('image_credits') }}</p>
														@enderror
													</div> 						
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">	
														<h6>{{ __('Maximum Result Length') }} <span class="text-muted">({{ __('In Words') }}) ({{ __('For Non-Subscribers') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('OpenAI has a hard limit based on Token limits for each model. Refer to OpenAI documentation to learn more. As a recommended by OpenAI, max result length is capped at 1500 words.') }}"></i></h6>
														<input type="number" class="form-control @error('max-results-user') is-danger @enderror" id="max-results-user" name="max-results-user" placeholder="Ex: 10" value="{{ config('settings.max_results_limit_user') }}" required>
														@error('max-results-user')
															<p class="text-danger">{{ $errors->first('max-results-user') }}</p>
														@enderror
													</div>								
												</div>
												
												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">	
														<h6>{{ __('Maximum Allowed PDF File Size') }} <span class="text-muted">({{ __('In MB') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Set the maximum PDF file size limit for free tier user for AI File Chat feature') }}"></i></h6>
														<input type="number" class="form-control @error('max-pdf-size') is-danger @enderror" id="max-pdf-size" name="max-pdf-size" placeholder="Ex: 10" min="0.1" step="0.1" value="{{ config('settings.chat_pdf_file_size_user') }}" required>
														@error('max-pdf-size')
															<p class="text-danger">{{ $errors->first('max-pdf-size') }}</p>
														@enderror
													</div>								
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">	
														<h6>{{ __('Maximum Allowed CSV File Size') }} <span class="text-muted">({{ __('In MB') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Set the maximum CSV file size limit for free tier user for AI File Chat feature') }}"></i></h6>
														<input type="number" class="form-control @error('max-csv-size') is-danger @enderror" id="max-csv-size" name="max-csv-size" placeholder="Ex: 10" min="0.1" step="0.1" value="{{ config('settings.chat_csv_file_size_user') }}" required>
														@error('max-csv-size')
															<p class="text-danger">{{ $errors->first('max-csv-size') }}</p>
														@enderror
													</div>								
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">	
														<h6>{{ __('Maximum Allowed Word File Size') }} <span class="text-muted">({{ __('In MB') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Set the maximum Word file size limit for free tier user for AI File Chat feature') }}"></i></h6>
														<input type="number" class="form-control @error('max-word-size') is-danger @enderror" id="max-word-size" name="max-word-size" placeholder="Ex: 10" min="0.1" step="0.1" value="{{ config('settings.chat_word_file_size_user') }}" required>
														@error('max-word-size')
															<p class="text-danger">{{ $errors->first('max-word-size') }}</p>
														@enderror
													</div>								
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">
													<div class="input-box">	
														<h6>{{ __('Team Members Quantity') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
														<input type="number" class="form-control @error('team-members-quantity') is-danger @enderror" id="team-members-quantity" name="team-members-quantity" placeholder="Ex: 5" value="{{ config('settings.team_members_quantity_user') }}">
													</div> 						
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12">							
													<div class="input-box">								
														<h6>{{ __('Image/Video/Voiceover Results Storage Period') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('After set days file results will be deleted via CRON task') }}."></i></h6>
														<div class="form-group">							    
															<input type="number" class="form-control" id="file-result-duration" name="file-result-duration" value="{{ config('settings.file_result_duration_user') }}">
															<span class="text-muted fs-10">{{ __('In Days') }}. {{ __('Set as -1 for unlimited storage duration') }}.</span>
														</div> 
														@error('file-result-duration')
															<p class="text-danger">{{ $errors->first('file-result-duration') }}</p>
														@enderror
													</div> 						
												</div>
		
												<div class="col-lg-6 col-md-6 col-sm-12">							
													<div class="input-box">								
														<h6>{{ __('Generated Text Content Results Storage Period') }} <span class="text-muted">({{ __('For Non-Subscribers') }})</span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('After set days results will be deleted from database via CRON task') }}."></i></h6>
														<div class="form-group">							    
															<input type="number" class="form-control" id="document-result-duration" name="document-result-duration" value="{{ config('settings.document_result_duration_user') }}">
															<span class="text-muted fs-10">{{ __('In Days') }}. {{ __('Set as -1 for unlimited storage duration') }}.</span>
														</div> 
														@error('document-result-duration')
															<p class="text-danger">{{ $errors->first('document-result-duration') }}</p>
														@enderror
													</div> 						
												</div>												
											</div>

											
										</div>	
									</div>
								</div>

								<!-- SAVE CHANGES ACTION BUTTON -->
								<div class="border-0 text-center mb-2 mt-1">
									<button type="button" class="btn ripple btn-primary" style="min-width: 200px;" id="trial-settings">{{ __('Save') }}</button>							
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
	<script src="{{theme_url('js/admin-config.js')}}"></script>
	<script type="text/javascript">
		let list = "{{ config('settings.voiceover_free_tier_vendors') }}"
		list = list.split(', ')
		let models = "{{ config('settings.free_tier_models') }}"
		models = models.split(', ')
		let images = "{{ $settings->image_vendors }}"
		images = images.split(', ')

		$(function(){
			$("#voiceover-vendors").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(list).trigger('change.select2');

			$("#models-list").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(models).trigger('change.select2');

			$("#image-vendors").select2({
				theme: "bootstrap-5",
				containerCssClass: "select2--small",
				dropdownCssClass: "select2--small",
			}).val(images).trigger('change.select2');
		});

		$('#general-settings').on('click',function(e) {

			const form = document.getElementById("general-features-form");
			let data = new FormData(form);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: "POST",
				url: $('#general-features-form').attr('action'),
				data: data,
				processData: false,
				contentType: false,
				success: function(data) {

					if (data['status'] == 200) {
						toastr.success('{{ __('Settings were successfully updated') }}');
					}

				},
				error: function(data) {
					toastr.error('{{ __('There was an issue with saving the settings') }}');
				}
			}).done(function(data) {})
		});


		$('#api-settings').on('click',function(e) {

			const form = document.getElementById("api-features-form");
			let data = new FormData(form);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: "POST",
				url: $('#api-features-form').attr('action'),
				data: data,
				processData: false,
				contentType: false,
				success: function(data) {

					if (data['status'] == 200) {
						toastr.success('{{ __('Settings were successfully updated') }}');
					}

				},
				error: function(data) {
					toastr.error('{{ __('There was an issue with saving the settings') }}');
				}
			}).done(function(data) {})
		});


		$('#trial-settings').on('click',function(e) {

			const form = document.getElementById("trial-features-form");
			let data = new FormData(form);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: "POST",
				url: $('#trial-features-form').attr('action'),
				data: data,
				processData: false,
				contentType: false,
				success: function(data) {

					if (data['status'] == 200) {
						toastr.success('{{ __('Settings were successfully updated') }}');
					}

				},
				error: function(data) {
					toastr.error('{{ __('There was an issue with saving the settings') }}');
				}
			}).done(function(data) {})
		});
	</script>
@endsection