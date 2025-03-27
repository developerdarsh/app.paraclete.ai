@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Maintenance Mode') }}</h4>
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
					<form action="{{ route('admin.davinci.configs.maintenance.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="card shadow-0 mt-0 mb-7">							
							<div class="card-body">
								<div class="row">

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Maintenance Mode') }} <i class="ml-1 text-dark fs-12 fa-solid fa-circle-info" data-tippy-content="{{ __('Login and Registration will be disable for users. Admin can login via domainname/login url directly') }}"></i></h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="maintenance_feature" class="custom-switch-input" @if ($extension->maintenance_feature) checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Maintenance Page Header') }}</h6>
											<div class="form-group">							    
												<input type="text" class="form-control" name="maintenance_header" value="{{ $extension->maintenance_header }}" autocomplete="off">
											</div> 												
										</div> 
									</div>	

									<div class="col-sm-12">
										<div class="input-box">
											<h6>{{ __('Maintenance Banner') }}</h6>
											<div class="input-group file-browser">									
												<input type="text" class="form-control border-right-0 browse-file" placeholder="{{ __('Choose banner image...') }}" style="margin-right: 100px;" readonly>
												<label class="input-group-btn">
													<span class="btn btn-primary special-btn">
														{{ __('Browse') }} <input type="file" name="banner" style="display: none;" accept="image/png, image/jpeg, image/webp"> 
													</span>
												</label>
											</div>
										</div>
									</div>	

									<div class="col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Maintenance Page Body Message') }}</h6>
											<div class="form-group">							    
												<input type="text" class="form-control" name="maintenance_message" value="{{ $extension->maintenance_message }}" autocomplete="off">
											</div> 												
										</div> 
									</div>
									
									<div class="col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Maintenance Page Footer') }}</h6>
											<div class="form-group">							    
												<input type="text" class="form-control" name="maintenance_footer" value="{{ $extension->maintenance_footer }}" autocomplete="off">
											</div> 												
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

@section('js')
	<script src="{{theme_url('js/avatar.js')}}"></script>
@endsection


