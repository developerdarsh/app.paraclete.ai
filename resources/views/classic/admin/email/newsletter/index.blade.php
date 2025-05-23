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
			<h4 class="page-title mb-0">{{ __('Newsletter') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.email.newsletter')}}"> {{ __('Newsletter') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-12 col-xm-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{ __('All Newsletter Emails') }}</h3>
					<a href="{{ route('admin.email.newsletter.create') }}" id="createButton" class="btn btn-primary text-right right">{{ __('Create New Email') }}</a>
				</div>
				<div class="card-body pt-2">
					<!-- SET DATATABLE -->
					<table id='allNotificationsTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="10%">{{ __('Name') }}</th>
									<th width="20%">{{ __('Subject') }}</th>
									<th width="6%">{{ __('Actions') }}</th>
								</tr>
							</thead>
					</table> <!-- END SET DATATABLE -->
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
		$(function () {

			"use strict";
			
			var table = $('#allNotificationsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				colReorder: true,
				"order": [[ 0, "desc" ]],
				language: {
					"emptyTable": "<div><img id='no-results-img' src='{{ theme_url('img/files/no-notification.png') }}'><br>{{ __('There are no emails yet') }}</div>",
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
				ajax: "{{ route('admin.email.newsletter') }}",
				columns: [{
						data: 'name',
						name: 'name',
						orderable: true,
						searchable: true
					},					
					{
						data: 'subject',
						name: 'subject',
						render: $.fn.dataTable.render.text(),
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


			// DELETE CONFIRMATION 
			$(document).on('click', '.deleteNotificationButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: '{{ __('Confirm Email Deletion') }}',
					text: '{{ __('It will permanently delete this email') }}',
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
							url: '/app/admin/email/newsletter/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('{{ __('Email Deleted') }}', '{{ __('Email has been successfully deleted') }}', 'success');	
									$("#allNotificationsTable").DataTable().ajax.reload();								
								} else {
									Swal.fire('{{ __('Delete Failed') }}', '{{ __('There was an error while deleting this email') }}', 'error');
								}      
							},
							error: function(data) {
								Swal.fire({ type: 'error', title: 'Oops...', text: '{{ __("Something went wrong") }}!' })
							}
						})
					} 
				})
			});
	
		});
	</script>
@endsection