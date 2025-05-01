@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Amazon Bedrock') }}</h4>
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
					<form action="{{ route('admin.davinci.configs.bedrock.store') }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="card shadow-0 mb-6">							
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Amazon Bedrock Access Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" name="amazon_bedrock_access_key" value="{{ $extension->amazon_bedrock_access_key }}" autocomplete="off">
											</div> 												
										</div> 
									</div>
									<div class="col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Amazon Bedrock Secret Access Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" name="amazon_bedrock_secret_key" value="{{ $extension->amazon_bedrock_secret_key }}" autocomplete="off">
											</div> 												
										</div> 
									</div>
									<div class="col-sm-12">
										<!-- AWS REGION -->
										<div class="input-box">	
											<h6>{{ __('Amazon Bedrock Region') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="set-aws-region" name="amazon_bedrock_region" class="form-select" data-placeholder="Select AWS Region:">			
												<option value="us-east-1" @if ( $extension->amazon_bedrock_region  == 'us-east-1') selected @endif>{{ __('US East (N. Virginia) us-east-1') }}</option>
												<option value="us-east-2" @if ( $extension->amazon_bedrock_region == 'us-east-2') selected @endif>{{ __('US East (Ohio) us-east-2') }}</option>
												<option value="us-west-1" @if ( $extension->amazon_bedrock_region == 'us-west-1') selected @endif>{{ __('US West (N. California) us-west-1') }}</option>
												<option value="us-west-2" @if ( $extension->amazon_bedrock_region == 'us-west-2') selected @endif>{{ __('US West (Oregon) us-west-2') }}</option>
												<option value="ap-east-1" @if ( $extension->amazon_bedrock_region == 'ap-east-1') selected @endif>{{ __('Asia Pacific (Hong Kong) ap-east-1') }}</option>
												<option value="ap-south-1" @if ( $extension->amazon_bedrock_region == 'ap-south-1') selected @endif>{{ __('Asia Pacific (Mumbai) ap-south-1') }}</option>
												<option value="ap-northeast-3" @if ( $extension->amazon_bedrock_region == 'ap-northeast-3') selected @endif>{{ __('Asia Pacific (Osaka) ap-northeast-3') }}</option>
												<option value="ap-northeast-2" @if ( $extension->amazon_bedrock_region == 'ap-northeast-2') selected @endif>{{ __('Asia Pacific (Seoul) ap-northeast-2') }}</option>
												<option value="ap-southeast-1" @if ( $extension->amazon_bedrock_region == 'ap-southeast-1') selected @endif>{{ __('Asia Pacific (Singapore) ap-southeast-1') }}</option>
												<option value="ap-southeast-2" @if ( $extension->amazon_bedrock_region == 'ap-southeast-2') selected @endif>{{ __('Asia Pacific (Sydney) ap-southeast-2') }}</option>
												<option value="ap-northeast-1" @if ( $extension->amazon_bedrock_region == 'ap-northeast-1') selected @endif>{{ __('Asia Pacific (Tokyo) ap-northeast-1') }}</option>
												<option value="ap-northeast-1" @if ( $extension->amazon_bedrock_region == 'ap-south-2') selected @endif>{{ __('Asia Pacific (Hyderabad) ap-south-2') }}</option>
												<option value="ap-northeast-1" @if ( $extension->amazon_bedrock_region == 'ap-southeast-3') selected @endif>{{ __('Asia Pacific (Jakarta) ap-southeast-3') }}</option>
												<option value="eu-central-1" @if ( $extension->amazon_bedrock_region == 'eu-central-1') selected @endif>{{ __('Europe (Frankfurt) eu-central-1') }}</option>
												<option value="eu-central-1" @if ( $extension->amazon_bedrock_region == 'eu-central-2') selected @endif>{{ __('Europe (Zurich) eu-central-2') }}</option>
												<option value="eu-west-1" @if ( $extension->amazon_bedrock_region == 'eu-west-1') selected @endif>{{ __('Europe (Ireland) eu-west-1') }}</option>
												<option value="eu-west-2" @if ( $extension->amazon_bedrock_region == 'eu-west-2') selected @endif>{{ __('Europe (London) eu-west-2') }}</option>
												<option value="eu-south-1" @if ( $extension->amazon_bedrock_region == 'eu-south-1') selected @endif>{{ __('Europe (Milan) eu-south-1') }}</option>
												<option value="eu-south-1" @if ( $extension->amazon_bedrock_region == 'eu-south-1') selected @endif>{{ __('Europe (Spain) eu-south-2') }}</option>
												<option value="eu-west-3" @if ( $extension->amazon_bedrock_region == 'eu-west-3') selected @endif>{{ __('Europe (Paris) eu-west-3') }}</option>
												<option value="eu-north-1" @if ( $extension->amazon_bedrock_region == 'eu-north-1') selected @endif>{{ __('Europe (Stockholm) eu-north-1') }}</option>
												<option value="me-south-1" @if ( $extension->amazon_bedrock_region == 'me-south-1') selected @endif>{{ __('Middle East (Bahrain) me-south-1') }}</option>
												<option value="me-south-1" @if ( $extension->amazon_bedrock_region == 'me-central-1') selected @endif>{{ __('Middle East (UAE) me-central-1') }}</option>
												<option value="sa-east-1" @if ( $extension->amazon_bedrock_region == 'sa-east-1') selected @endif>{{ __('South America (São Paulo) sa-east-1') }}</option>
												<option value="ca-central-1" @if ( $extension->amazon_bedrock_region == 'ca-central-1') selected @endif>{{ __('Canada (Central) ca-central-1') }}</option>
												<option value="af-south-1" @if ( $extension->amazon_bedrock_region == 'af-south-1') selected @endif>{{ __('Africa (Cape Town) af-south-1') }}</option>
											</select>
										</div> <!-- END AWS REGION -->									
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


