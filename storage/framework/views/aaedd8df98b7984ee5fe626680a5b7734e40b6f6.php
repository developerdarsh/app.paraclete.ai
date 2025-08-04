

<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/datatable/datatables.min.css')); ?>" rel="stylesheet" />
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Fine Tune Models Manager')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.dashboard')); ?>"> <?php echo e(__('AI Management')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.configs')); ?>"> <?php echo e(__('AI Settings')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('Fine Tune Models')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>	
	<div class="row justify-content-center">
		<div class="col-lg-10 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('Fine Tune Models')); ?></h3>
					<a href="javascript:void(0)" id="createButton" data-bs-toggle="modal" data-bs-target="#finetuneModal"  class="btn btn-primary ripple text-right right"><?php echo e(__('Add New Fine Tune Model')); ?></a>
				</div>
				<div class="card-body pt-2">
					<!-- BOX CONTENT -->
					<div class="box-content">
						<!-- SET DATATABLE -->
						<table id='allTemplates' class='table' width='100%'>
								<thead>
									<tr>									
										<th width="5%"><?php echo e(__('Model Name')); ?></th> 
										<th width="7%"><?php echo e(__('Fine Tune Model')); ?></th>				
										<th width="5%"><?php echo e(__('Base Model')); ?></th> 	
										<th width="5%"><?php echo e(__('File Name')); ?></th> 													    		 						           	
										<th width="3%"><?php echo e(__('Bytes')); ?></th> 														    		 						           	
										<th width="3%"><?php echo e(__('Status')); ?></th>	    										 						           	
										<th width="3%"><?php echo e(__('Actions')); ?></th>
									</tr>
								</thead>
						</table> <!-- END SET DATATABLE -->
					</div> <!-- END BOX CONTENT -->

					<div class="col-md-12 col-sm-12 text-center mb-2">
						<a href="<?php echo e(route('admin.davinci.configs')); ?>" class="btn btn-cancel pl-7 pr-7 ripple"><?php echo e(__('Return')); ?></a>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="finetuneModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		  	<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body pl-5 pr-5">

					<h6 class="text-center font-weight-extra-bold fs-16"><i class="fa-solid fa-microchip-ai mr-2"></i> <?php echo e(__('Create Fine Tune Model')); ?></h6>

					<form id="" action="<?php echo e(route('admin.davinci.configs.fine-tune.create')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-sm-12 mt-4">
								<div class="input-box">	
									<h6><?php echo e(__('Model Name')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<input type="text" class="form-control <?php $__errorArgs = ['model-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" placeholder="<?php echo e(__('Name')); ?>" required>
									<?php $__errorArgs = ['model-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p class="text-danger"><?php echo e($errors->first('model-name')); ?></p>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>								
							</div>
							<div class="col-sm-12 mt-2">
								<div class="input-box">
									<h6><?php echo e(__('Target Base Model')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<select id="model" name="model" class="form-select">
										<option value='gpt-4o-mini-2024-07-18' selected >GPT 4o mini</option>
										<option value='gpt-3.5-turbo-0125' selected >GPT 3.5 Turbo</option>
										<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value=<?php echo e($model->model); ?>><?php echo e($model->description); ?> (Fine Tune Model)</option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>																														
									</select>
								</div>
							</div>
							<div class="col-sm-12 mt-2">
								<div class="input-box">
									<h6 class="font-weight-bold"><?php echo e(__('Description')); ?><span class="text-required"><i class="fa-solid fa-asterisk"></i></h6>
									<textarea class="form-control" name="description" rows="5" placeholder="<?php echo e(__('Provide short description of your fine tuned model')); ?>"></textarea> 
								</div>
							</div>
							<div class="col-sm-12 mt-2">
								<div class="input-box">
									<h6 class="mb-0"><?php echo e(__('Traning Data')); ?> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<span class="text-muted fs-12"><?php echo e(__('Add a jsonl file to use for training')); ?></span>
									<div id="image-drop-box">
										<div class="image-drop-area text-center mt-2 file-drop-border">
											<input type="file" class="main-image-input" name="file" id="file" accept=".jsonl" required>
											<div class="image-drop-icon">
												<i class="fa-solid fa-file-lines fs-40"></i>
											</div>
											<p class="text-dark fw-bold mb-2 mt-3">
												<?php echo e(__('Drag and drop your training file or')); ?>

												<a href="javascript:void(0);" class="text-primary"><?php echo e(__('Browse')); ?></a>
											</p>
											<p class="mb-0 file-name text-muted">
												<small>(.jsonl)</small>
											</p>
											<div>
												<img src="" id="main_image_preview">
											</div>
										</div>
									</div>
								</div>
							</div>		
						</div>
						<!-- ACTION BUTTON -->
						<div class="border-0 text-center">
							<button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>							
						</div>		
					</form>		
				</div>
		  	</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Data Tables JS -->
	<script src="<?php echo e(URL::asset('plugins/datatable/datatables.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";

			// INITILIZE DATATABLE
			var table = $('#allTemplates').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: {
					details: {type: 'column'}
				},
				colReorder: true,
				language: {
					"emptyTable": "<div><img id='no-results-img' src='<?php echo e(theme_url('img/files/no-result.png')); ?>'><br><?php echo e(__('No Fine Tuned Models yet')); ?></div>",
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
				ajax: "<?php echo e(route('admin.davinci.configs.fine-tune')); ?>",
				columns: [
					{
						data: 'model_name',
						name: 'model_name',
						orderable: true,
						searchable: true
					},	
					{
						data: 'result_model',
						name: 'result_model',
						orderable: true,
						searchable: true
					},
					{
						data: 'base_model',
						name: 'base_model',
						orderable: true,
						searchable: true
					},
					{
						data: 'file_name',
						name: 'file_name',
						orderable: true,
						searchable: true
					},	
					{
						data: 'bytes',
						name: 'bytes',
						orderable: true,
						searchable: true
					},	
					{
						data: 'status',
						name: 'status',
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


			// DELETE MODEL
			$(document).on('click', '.deleteButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: '<?php echo e(__('Confirm Fine Tune Model Deletion')); ?>',
					text: '<?php echo e(__('It will permanently delete this fine tuned model and associated training file')); ?>',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: '<?php echo e(__('Delete')); ?>',
					reverseButtons: true,
				}).then((result) => {
					if (result.isConfirmed) {
						var formData = new FormData();
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: 'fine-tune/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('<?php echo e(__('Fine Tune Model Deleted')); ?>', '<?php echo e(__('Fine Tuned model has been successfully deleted')); ?>', 'success');	
									$("#allTemplates").DataTable().ajax.reload();								
								} else {
									Swal.fire('<?php echo e(__('Delete Failed')); ?>', '<?php echo e(__('There was an error while deleting this fine tuned model')); ?>', 'error');
								}      
							},
							error: function(data) {
								Swal.fire('Oops...','Something went wrong!', 'error')
							}
						})
					} 
				})
			});


			// ACTIVATE KEY
			$(document).on('click', '.activateButton', function(e) {

				e.preventDefault();

				var formData = new FormData();
				formData.append("id", $(this).attr('id'));

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: 'keys/activate',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'active') {
							Swal.fire('<?php echo e(__('API Key Activated')); ?>', '<?php echo e(__('API Key has been activated successfully')); ?>', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						} else {
							Swal.fire('<?php echo e(__('API Key Deactivated')); ?>', '<?php echo e(__('API Key has been deactivated successfully')); ?>', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						}      
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});

		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/davinci/configuration/fine-tune/index.blade.php ENDPATH**/ ?>