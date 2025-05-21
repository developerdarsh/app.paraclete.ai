

<?php $__env->startSection('page-header'); ?>
	<!-- EDIT PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('System Settings')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-sliders mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('General Settings')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('System Settings')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row justify-content-center">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('Clear Cache')); ?></h3>
				</div>
				<div class="card-body">
					<form id="clear-cache-form" method="POST" action="<?php echo e(route('admin.settings.system.cache')); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<h6 class="fs-14 mt-2"><?php echo e(__('Clear all application cache files')); ?></h6>
							</div>
						</div>
						<div class="card-footer text-center border-0 pb-2 pt-5">													
							<button id="clear-cache" type="button" class="btn btn-primary"><?php echo e(__('Clear Cache')); ?></button>						
						</div>		
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('Sitemap')); ?></h3>
				</div>
				<div class="card-body">
					<form id="generate-sitemap-form" method="POST" action="<?php echo e(route('admin.settings.system.sitemap')); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<h6 class="fs-14 mt-2"><?php echo e(__('Generated sitemap.xml file will be available at public folder')); ?></h6>
							</div>
						</div>
						<div class="card-footer text-center border-0 pb-2 pt-5">													
							<button id="generate-sitemap" type="button" class="btn btn-primary"><?php echo e(__('Generate Sitemap')); ?></button>						
						</div>		
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script type="text/javascript">
		let loading = `<span class="loading">
						<span style="background-color: #fff;"></span>
						<span style="background-color: #fff;"></span>
						<span style="background-color: #fff;"></span>
						</span>`;
		$('#clear-cache').on('click',function(e) {

			e.preventDefault();

			const form = document.getElementById("clear-cache-form");
			let data = new FormData(form);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: "POST",
				url: $('#clear-cache-form').attr('action'),
				data: data,
				processData: false,
				contentType: false,
				beforeSend: function() {
					$('#clear-cache').prop('disabled', true);
					let btn = document.getElementById('clear-cache');					
					btn.innerHTML = loading;  
					document.querySelector('#loader-line')?.classList?.remove('hidden');      
				},
				complete: function() {
					document.querySelector('#loader-line')?.classList?.add('hidden'); 
					$('#clear-cache').prop('disabled', false);
					$('#clear-cache').html('<?php echo e(__("Clear Cache")); ?>');            
				},
				success: function(data) {

					if (data['status'] == 200) {
						toastr.success('<?php echo e(__('Application cache was cleared successfully')); ?>');
					} else {
						toastr.error('<?php echo e(__('Cache was not cleared properly')); ?>');
					}

				},
				error: function(data) {
					toastr.error('<?php echo e(__('Cache was not cleared properly')); ?>');
				}
			}).done(function(data) {})
		});


		$('#generate-sitemap').on('click',function(e) {

			e.preventDefault();

			const form = document.getElementById("generate-sitemap-form");
			let data = new FormData(form);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: "POST",
				url: $('#generate-sitemap-form').attr('action'),
				data: data,
				processData: false,
				contentType: false,
				beforeSend: function() {
					$('#generate-sitemap').prop('disabled', true);
					let btn = document.getElementById('generate-sitemap');					
					btn.innerHTML = loading;  
					document.querySelector('#loader-line')?.classList?.remove('hidden');      
				},
				complete: function() {
					document.querySelector('#loader-line')?.classList?.add('hidden'); 
					$('#generate-sitemap').prop('disabled', false);
					$('#generate-sitemap').html('<?php echo e(__("Generate Sitemap")); ?>');            
				},
				success: function(data) {

					if (data['status'] == 200) {
						toastr.success('<?php echo e(__('Sitemap.xml file has been successfully generated')); ?>');
					} else {
						toastr.error(data['message']);
					}

				},
				error: function(data) {
					toastr.error('<?php echo e(__('There was an issue with generating sitemap.xml file')); ?>');
				}
			}).done(function(data) {})
		});
	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/settings/system/index.blade.php ENDPATH**/ ?>