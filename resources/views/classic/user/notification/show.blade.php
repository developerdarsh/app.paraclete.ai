@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('View Notification') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">{{ __('User') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{route('user.notifications')}}"> {{ __('Notifications') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('View Notification') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<!-- SUPPORT REQUEST -->
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden border-0">
				<h3 class="card-title text-center">{{ __('Notification') }} ID: <span class="text-info">{{ $notification->id }}</span></h3>
				<div class="card-body pt-5">		

					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Type') }}: </h6>
							<span class="fs-14">{{ $notification->data['type'] }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('User Action') }}: </h6>
							<span class="fs-14">{{ $notification->data['action'] }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Created On') }}: </h6>
							<span class="fs-14">{{ date_format($notification->created_at, 'd M Y H:i:s') }}</span>
						</div>
					</div>

					<div class="row pt-5">
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Sender') }}: </h6>
							<span class="fs-14">{{ ucfirst($notification->data['sender']) }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Read On') }}: </h6>
							<span class="fs-14">{{ date_format($notification->read_at, 'd M Y H:i:s') }}</span>
						</div>
					</div>	

					<div class="row pt-7">
						<div class="col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Subject') }}: </h6>
							<p class="fs-14 font-italic text-muted">{{ $notification->data['subject'] }}</p>
						</div>
						<div class="col-12 mt-2">
							<h6 class="font-weight-bold mb-1">{{ __('Message') }}: </h6>
							<p class="fs-14 font-italic text-muted">{{ $notification->data['message'] }}</p>
						</div>
					</div>	

					<div class="border-0 text-center mb-2 mt-8">
						<a href="{{ route('user.notifications') }}" class="btn btn-primary pl-7 pr-7 ripple">{{ __('Return') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END SUPPORT REQUEST -->
@endsection

