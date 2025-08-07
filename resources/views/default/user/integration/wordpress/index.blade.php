@extends('layouts.app')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />	
@endsection

@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7 justify-content-center">
	<div class="page-leftheader text-center">
		<h4 class="page-title mb-0"><i class="text-primary mr-2 fs-16 fa-brands fa-wordpress"></i>{{ __('Wordpress Integration') }}</h4>
		<h6 class="text-muted">{{ __('Posts your contents directly to your favorite CMS') }}</h6>
		<ol class="breadcrumb mb-2 justify-content-center">
			<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-id-badge mr-2 fs-12"></i>{{ __('User') }}</a></li>
			<li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.integration')}}"> {{ __('Integrations') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.integration.wordpress')}}"> {{ __('Wordpress') }}</a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
@endsection
@section('content')	
	<div class="row justify-content-center">
		<div class="col-lg-10 col-md-12 col-sm-12">
			<div class="card border-0 p-6">
				<div class="card-body pt-2">
					<h6 class="mb-5 text-muted fs-14">{{ __('You can connect') }} {{ $website_number }} {{ __('wordpress websites') }}</h6>
					<div class="row">
						@if ($wordpress)
							@foreach ($websites as $website)
								@foreach (json_decode($website->credentials, true) as $key => $value)
									@if ($key == 'domain')
										<div class="col-3">
											<div class="cms-box text-center">	
												@if ($website->status)
													<span class="cms-status cms-active">{{ __('Activated') }}</span>
												@else
													<span class="cms-status cms-deactive">{{ __('Not Activated') }}</span>
												@endif																
												<img class="cms-image mb-2 w-30" src="{{ theme_url('img/csp/wordpress-icon.webp') }}" alt="">							
												<h5 class="cms-title font-weight-semibold fs-14 mb-4">{{ $value }}</h5>
												<a href="{{ route('user.integration.wordpress.website.edit', [$website->id]) }}" class="cms-action ripple btn btn-primary pl-6 pr-6 fs-12">{{ __('Configure') }}</a>
											</div>
										</div>	
									@endif									
								@endforeach																		
							@endforeach	
						@endif
						<div class="col-3">
							<div class="cms-box text-center">																	
								<div><i class="fa-solid fa-rectangle-history-circle-plus text-muted fs-40 mb-7 mt-5"></i></div>							
								<a href="{{ route('user.integration.wordpress.website.create') }}" class="cms-action ripple btn btn-cancel pl-6 pr-6 fs-12">{{ __('Add New Domain') }}</a>
							</div>
						</div>	
					</div>		
					
					<hr class="mb-6 mt-6">

					<div class="row">

					<h6 class="mb-5 text-muted fs-14">{{ __('Active scheduled posts') }}</h6>
					{{-- <h6 class="mb-5 text-muted fs-14">{{ __('You can have') }} {{ $post_number }} {{ __('active posts scheduled') }}</h6> --}}

					<table id='postsTable' class='table' width='100%'>
						<thead>
							<tr>
								<th width="5%">{{ __('WP Domain') }}</th>
								<th width="15%">{{ __('Post Title') }}</th> 
								<th width="5%">{{ __('Post Status') }}</th>									 
								<th width="5%">{{ __('Created On') }}</th> 
								<th width="5%">{{ __('Publish') }}</th>																           								    						           	
								<th width="5%">{{ __('Publish Status') }}</th>																           								    						           	
								<th width="5%">{{ __('Actions') }}</th>
							</tr>
						</thead>
					</table>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- Data Tables JS -->
	<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
	<script type="text/javascript">
	var table;
		$(function () {

			"use strict";

			let table = $('#postsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				colReorder: true,
				"order": [[ 3, "desc" ]],	
				language: {
					"emptyTable": "<div><img id='no-results-img' src='{{ theme_url('img/files/no-result.png') }}'><br>{{ __('There are no posts scheduled yet') }}</div>",
					"info": "{{ __('Showing page') }} _PAGE_ {{ __('of') }} _PAGES_",
					search: "<i class='fa fa-search search-icon'></i>",
					lengthMenu: '_MENU_ ',
					paginate : {
						first    : '<i class="fa fa-angle-double-left"></i>',
						last     : '<i class="fa fa-angle-double-right"></i>',
						previous : '<i class="fa fa-angle-left"></i>',
						next     : '<i class="fa fa-angle-right"></i>'
					}
				},
				pagingType : 'full_numbers',
				processing: true,
				serverSide: true,
				ajax: "{{ route('user.integration.wordpress') }}",
				columns: [
					{
						data: 'website_name',
						name: 'website_name',
						orderable: true,
						searchable: true
					},
					{
						data: 'title',
						name: 'title',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-post-status',
						name: 'custom-post-status',
						orderable: true,
						searchable: true
					},
					{
						data: 'created-on',
						name: 'created-on',
						orderable: true,
						searchable: true
					},				
					{
						data: 'publish',
						name: 'publish',
						orderable: true,
						searchable: true
					},	
					{
						data: 'custom-status',
						name: 'custom-status',
						orderable: true,
						searchable: true
					},									
					{
						data: 'actions',
						name: 'actions',
						orderable: false,
						searchable: false
					},
				]
			});


			// DELETE SYNTHESIZE RESULT
			$(document).on('click', '.deleteResultButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: '{{ __('Confirm Post Deletion') }}',
					text: '{{ __('It will permanently delete this scheduled post') }}',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: '{{ __('Delete') }}',
					reverseButtons: true,
				}).then((result) => {
					if (result.isConfirmed) {
						var formData = new FormData();
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: '/app/user/integration/wordpress/post/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									toastr.success(__('Selected post has been successfully deleted'));	
									$("#postsTable").DataTable().ajax.reload();								
								} else {
									toastr.error(__('There was an error while deleting this post'));	
								}      
							},
							error: function(data) {
								Swal.fire('Oops...','{{ __('Something went wrong') }}!', 'error')
							}
						})
					} 
				})
			});
		});
	</script>
@endsection
