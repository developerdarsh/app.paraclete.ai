@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('View System Notification') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa-solid fa-message-exclamation mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.notifications')}}"> {{ __('Mass Notifications') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('View System Notification') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Notification') }} ID: <span class="text-info">{{ $notification->id }}</span></h3>
				</div>
				<div class="card-body pt-5">		

					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Type') }}: </h6>
							<span class="fs-14">@if ($notification->data['type'] == 'new-user')
													{{ __('New User') }}
												@elseif ($notification->data['type'] == 'new-payment')
													{{ __('New Payment') }}
												@endif() 												
							</span>
						</div>						
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Created On') }}: </h6>
							<span class="fs-14">{{ date_format($notification->created_at, 'd M Y H:i:s') }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Read On') }}: </h6>
							<span class="fs-14">{{ date_format($notification->read_at, 'd M Y H:i:s') }}</span>
						</div>
					</div>

					<div class="row pt-5">
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('User Name') }}: </h6>
							<span class="fs-14">{{ $notification->data['name'] }}</span>
						</div>						
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('User Email') }}: </h6>
							<span class="fs-14">{{ $notification->data['email'] }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Country') }}: </h6>
							<span class="fs-14">{{ $notification->data['country'] }}</span>
						</div>
					</div>

					<div class="row pt-7">
						<div class="col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Subject') }}: </h6>
							<p class="fs-14 font-italic text-muted">{{ $notification->data['subject'] }}</p>
						</div>
					</div>	

					<!-- SAVE CHANGES ACTION BUTTON -->
					<div class="border-0 text-center mb-2 mt-8">
						<a href="{{ route('admin.notifications.system') }}" class="btn btn-primary pl-7 pr-7">{{ __('Return') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

