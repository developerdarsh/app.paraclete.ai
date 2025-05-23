@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Google Adsense Code') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}"> {{ __('Frontend Management') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.settings.adsense') }}"> {{ __('Google Adsense') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Code') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<!-- SUPPORT REQUEST -->
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-8 col-sm-12">
			<div class="card overflow-hidden border-0">
				<h3 class="card-title text-center">{{ __('Edit Google Adsense Code') }}: <span class="font-weight-bold text-primary">{{ $id->type }}</span></h3>
				<div class="card-body">									
					<form id="" action="{{ route('admin.settings.adsense.update', [$id->id]) }}" method="POST" enctype="multipart/form-data">
						@method('PUT')
						@csrf

						<div class="row mt-2">							
							<div class="col-lg-12 col-md-6 col-sm-12">							
								<div class="input-box">	
									<h6>{{ __('Adsense Status') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
			  						<select id="smtp-encryption" name="status" class="form-select" data-placeholder="{{ __('Adsense Status') }}:">			
										<option value=1 @if ($id->status == true) selected @endif>{{ __('Activate') }}</option>
										<option value=0 @if ($id->status == false) selected @endif>{{ __('Deactivate') }}</option>
									</select>
								</div> 							
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-lg-12 col-md-12 col-sm-12">	
								<div class="input-box">	
									<h6>{{ __('Adsense Code') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							
									<textarea class="form-control" name="code" rows="12" id="richtext" required>{{ $id->code }}</textarea>
									@error('code')
										<p class="text-danger">{{ $errors->first('code') }}</p>
									@enderror	
								</div>											
							</div>
						</div>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<a href="{{ route('admin.settings.adsense') }}" class="btn btn-cancel mr-2 pl-7 pr-7">{{ __('Return') }}</a>
							<button type="submit" class="btn btn-primary pl-7 pr-7">{{ __('Save') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
	<!-- END SUPPORT REQUEST -->
@endsection
