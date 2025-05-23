@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('New Customer Review') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-globe mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}"> {{ __('Frontend Management') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.settings.review') }}"> {{ __('Reviews Manager') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('New Customer Review') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<!-- SUPPORT REQUEST -->
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-8 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Create New Customer Review') }}</h3>
				</div>
				<div class="card-body pt-5">									
					<form id="" action="{{ route('admin.settings.review.store') }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="row mt-2">							
							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Customer Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
									</div> 
									@error('name')
										<p class="text-danger">{{ $errors->first('name') }}</p>
									@enderror	
								</div> 						
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Customer Location or Company Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}" required>
									</div> 
									@error('position')
										<p class="text-danger">{{ $errors->first('position') }}</p>
									@enderror	
								</div> 						
							</div>

							<div class="col-sm-12">
								<div class="input-box">
									<h6>{{ __('Customer Avatar') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="input-group file-browser">									
										<input type="text" class="form-control border-right-0 browse-file" placeholder="{{ __('Image File Name') }}" readonly required>
										<label class="input-group-btn">
											<span class="btn btn-primary special-btn">
												{{ __('Browse') }} <input type="file" name="image" style="display: none;">
											</span>
										</label>
									</div>
									@error('image')
										<p class="text-danger">{{ $errors->first('image') }}</p>
									@enderror
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Rating') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" placeholder="Ex: 5.0" required>
									</div> 
									@error('rating')
										<p class="text-danger">{{ $errors->first('rating') }}</p>
									@enderror	
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">	
									<h6>{{ __('Review Line Group') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
			  						<select id="faq-status" name="row" class="form-select" data-placeholder="{{ __('Select Review Line Group') }}:">			
										<option value="first" selected>{{ __('First') }}</option>
										<option value="second">{{ __('Second') }}</option>
									</select>
								</div> 							
							</div>

						</div>

						<div class="row mt-2">
							<div class="col-lg-12 col-md-12 col-sm-12">	
								<div class="input-box">	
									<h6>{{ __('Review Text') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							
									<textarea class="form-control" name="text" rows="12" id="richtext" required>{{ old('text') }}</textarea>
									@error('text')
										<p class="text-danger">{{ $errors->first('text') }}</p>
									@enderror	
								</div>											
							</div>
						</div>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<a href="{{ route('admin.settings.review') }}" class="btn btn-cancel mr-2 pl-7 pr-7">{{ __('Return') }}</a>
							<button type="submit" class="btn btn-primary pl-7 pr-7">{{ __('Create') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
	<!-- END SUPPORT REQUEST -->
@endsection

@section('js')
	<!-- File Uploader -->
	<script src="{{theme_url('js/file-upload.js')}}"></script>
@endsection
