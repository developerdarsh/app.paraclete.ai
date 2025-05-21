@extends('layouts.app')

@section('css')
	<!-- Datepicker CSS -->
	<link href="{{URL::asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center"> 
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Edit Gift Card') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-sack-dollar mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.finance.dashboard') }}"> {{ __('Finance Management') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.finance.gifts') }}"> {{ __('Gift Cards') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-6 col-xm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Edit Gift Card') }}: <span class="text-info">{{ $id->code }}</span></h3>
				</div>
				<div class="card-body pt-5">									
					<form action="{{ route('admin.finance.gifts.update', $id) }}" method="POST" enctype="multipart/form-data">
						@method('PUT')
						@csrf

						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12">				
								<div class="input-box">	
									<h6>{{ __('Gift Card Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="name" name="name" value="{{ $id->name }}" required>
									</div>
									@error('name')
										<p class="text-danger">{{ $errors->first('name') }}</p>
									@enderror
								</div> 							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">						
								<div class="input-box">	
									<h6>{{ __('Status') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<select id="status" name="status" class="form-select" data-placeholder="{{ __('Select Promocode Status') }}:">			
										<option value="active" @if($id->status) selected @endif>{{ __('Active') }}</option>
										<option value="inactive" @if(!$id->status) selected @endif>{{ __('Inactive') }}</option>
									</select>
									@error('status')
										<p class="text-danger">{{ $errors->first('status') }}</p>
									@enderror	
								</div>						
							</div>
						
						</div>

						<div class="row mt-2">							

							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Amount') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Total money amount that will be added to user balance') }}"></i></h6>
									<div class="form-group">							    
										<input type="number" class="form-control" id="amount" name="amount" value="{{ $id->amount }}" required>
									</div> 
									@error('amount')
										<p class="text-danger">{{ $errors->first('amount') }}</p>
									@enderror
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Usage Quantity') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Total number of cards with the same code') }}"></i></h6>
									<div class="form-group">							    
										<input type="number" class="form-control" min="1" name="quantity" value="{{ $id->usages_left }}">
									</div> 
									@error('quantity')
										<p class="text-danger">{{ $errors->first('quantity') }}</p>
									@enderror
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Multi Usage by the same User') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Allow or Deny the same gift card usage by the same user multiple times') }}"></i></h6>
									<select id="multi_use" name="usage" class="form-select" data-placeholder="{{ __('Set Multi Usage by the same User') }}:">			
										<option value=1 @if($id->reusable) selected @endif>{{ __('Allow') }}</option>
										<option value=0 @if(!$id->reusable) selected @endif>{{ __('Deny') }}</option>
									</select> 
									@error('usage')
										<p class="text-danger">{{ $errors->first('usage') }}</p>
									@enderror
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">	
								<div class="input-box">	
									<h6>{{ __('Notes') }} <span class="text-muted">({{__('Optional')}})</span></h6>							
									<textarea class="form-control" name="notes" rows="1">{{ $id->details }}</textarea>	
								</div>											
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Valid Until') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group" id="datepicker-container">							    
										<input type="text" class="form-control" placeholder="YYYY-MM-DD" id="valid-until" name="valid-until" value="{{ $id->valid_until }}" required>
									</div> 
									@error('valid-until')
										<p class="text-danger">{{ $errors->first('valid-until') }}</p>
									@enderror
								</div> 						
							</div>

						</div>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-4">
							<a href="{{ route('admin.finance.gifts') }}" class="btn btn-cancel mr-2">{{ __('Cancel') }}</a>
							<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- Bootstrap Datepicker JS -->
	<script src="{{URL::asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>	
	<script>
		$(function(){

			'use strict';

			$('#datepicker-container input').datepicker({
				autoclose: true,
				todayHighlight: true,
				toggleActive: true,
				format: 'yyyy-mm-dd',
				orientation: "bottom"
			});
			
		});

	</script>
@endsection
