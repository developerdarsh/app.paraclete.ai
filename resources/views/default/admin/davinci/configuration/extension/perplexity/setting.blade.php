@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Perplexity AI') }}</h4>
			<ol class="breadcrumb mb-2 justify-content-center">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.davinci.configs')}}"> {{ __('AI Settings') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Extensions') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body pt-7 pl-7 pr-7 pb-6">									
					<form action="{{ route('admin.davinci.configs.perplexity.store') }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="card shadow-0 mb-6">							
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Perplexity API Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="perplexity_api" name="perplexity_api" value="{{ $extension->perplexity_api }}" autocomplete="off">
											</div> 												
										</div> 
									</div>

									<div class="col-sm-12">
										<div class="input-box mb-3">
											<h6>{{ __('Default Model for Real-Time Data Access') }} <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Real Time Data Access in AI Chat feature can use either Serper or Perplexity, here you can set default model that will be used in case if Perplexity is selected as Real-Time Data Access engine') }}."></i></h6>
											<select class="form-select" name="perplexity_realtime_model">
												<option value="sonar" @if($extension->perplexity_realtime_model == 'sonar') selected @endif>{{ __('Perplexity Sonar') }}</option>
												<option value="sonar-pro" @if($extension->perplexity_realtime_model == 'sonar-pro') selected @endif>{{ __('Perplexity Sonar Pro') }}</option>
												<option value="sonar-reasoning" @if($extension->perplexity_realtime_model == 'sonar-reasoning') selected @endif>{{ __('Perplexity Sonar Reasoning') }}</option>
												<option value="sonar-reasoning-pro" @if($extension->perplexity_realtime_model == 'sonar-reasoning-pro') selected @endif>{{ __('Perplexity Sonar Reasoning Pro') }}</option>											
											</select>
										</div>
									</div>	
								</div>										
							</div>
						</div>						

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<button type="submit" class="btn ripple btn-primary pl-8 pr-8 pt-2 pb-2">{{ __('Save') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
@endsection


