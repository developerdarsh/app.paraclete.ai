@extends('layouts.app')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Orders') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fa-solid fa-money-check-pen mr-2 fs-12"></i>{{ __('User') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.purchases') }}"> {{ __('Orders') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')	
	<div class="row justify-content-center">
		<div class="col-lg-10 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('All My Orders') }}</h3>
				</div>
				<div class="card-body pt-2">
					<!-- SET DATATABLE -->
					<table id='myPaymentsTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="10%">{{ __('Order ID') }}</th>
									<th width="10%">{{ __('Status') }}</th>											
									<th width="10%">{{ __('Plan Name') }}</th>																																						
									<th width="10%">{{ __('Price') }}</th>																																						
									<th width="10%">{{ __('Type') }}</th>																																						
									<th width="10%">{{ __('Date') }}</th>
									<th width="5%">{{ __('Actions') }}</th>
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
			
			// INITILIZE DATATABLE
			var table = $('#myPaymentsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				colReorder: true,
				"order": [[ 4, "desc" ]],
				language: {
					"emptyTable": "<div><br>{{ __('You do not have any transactions yet') }}</div>",
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
				ajax: "{{ route('user.purchases') }}",
				columns: [
					{
						data: 'custom-order',
						name: 'custom-order',
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
						data: 'custom-plan-name',
						name: 'custom-plan-name',
						orderable: false,
						searchable: true
					},
					{
						data: 'custom-price',
						name: 'custom-price',
						orderable: true,
						searchable: true
					},	
					{
						data: 'custom-frequency',
						name: 'custom-frequency',
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
						data: 'actions',
						name: 'actions',
						orderable: true,
						searchable: true
					},					
				]
			});


			// UPLOAD INVOICE
			$(document).on('click', '.uploadConfirmation', function(e) {

				e.preventDefault();

				Swal.fire({
					title: '{{ __('Upload Payment Confirmation') }}',
					showCancelButton: true,
					confirmButtonText: '{{ __('Upload') }}',
					reverseButtons: true,	
					input: 'file',
				}).then((file) => {
					if (file.value) {
						var formData = new FormData();
						var file = $('.swal2-file')[0].files[0];
						formData.append("confirmation", file);
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: '/app/user/purchases/invoice/upload',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('{{ __('Confirmation Uploaded') }}', '{{ __('Payment confirmation has been successfully uploaded') }}', 'success');
								} else {
									Swal.fire('{{ __('Upload Error') }}', '{{ __('Make sure you are uploading an image or pdf file') }}', 'error');
								}      
							},
							error: function(data) {
								Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
							}
						})
					} else if (file.dismiss !== Swal.DismissReason.cancel) {
						Swal.fire('{{ __('No File Selected') }}', '{{ __('Make sure you are uploading an image or pdf file') }}', 'error')
					}
				})
			});

		});
	</script>
@endsection