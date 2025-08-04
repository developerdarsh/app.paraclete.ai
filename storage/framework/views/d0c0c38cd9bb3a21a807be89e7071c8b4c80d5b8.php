<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- EDIT PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('Language Manager')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-sliders mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('General Settings')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('elseyyid.translations.home2')); ?>"> <?php echo e(__('Languages')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row justify-content-center">
		<div class="col-lg-8 col-mg-12 col-sm-12">
			<div class="card border-0">				
				<div class="card-body pt-7 pl-7 pr-7 pb-6">		
                    <?php echo $__env->make('langs::includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent('content_languages'); ?>						
				</div>
			</div>
		</div>
	</div>
    
	
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('scripts'); ?>
<?php $__env->startSection('js'); ?>
	<script>
        $(document).ready(function() {
            
            var local = "<?php echo e(LaravelLocalization::getCurrentLocale()); ?>";

            $('.language-card .custom-switch-input').click(function() {
                var formData = new FormData();
                formData.append('lang', $(this).attr('id'));
                formData.append('state', $(this).prop('checked') ? 1 : 0);

                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
                    },
                    url: "/app/admin/settings/languages/lang/save",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        toastr.success("<?php echo e(__('Saved successfully')); ?>");
                    },
                    error: function(data) {
                        var err = data.responseJSON.errors;
                        $.each(err, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/vendor/langs/layouts/app.blade.php ENDPATH**/ ?>