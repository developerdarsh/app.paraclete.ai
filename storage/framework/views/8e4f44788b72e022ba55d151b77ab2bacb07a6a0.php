

<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>	
	<div class="row justify-content-center mt-5-7">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body pt-5">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-12">
							<h4 class="page-title mb-0"><i class="text-primary mr-2 fs-16 fa-solid fa-aperture"></i> <?php echo e(__('AI Avatar')); ?></h4>
							<h6 class="text-muted"><?php echo e(__('Create videos with AI')); ?></h6>
							<a id="save-button" class="avatar-action-btn text-center mt-5" href="<?php echo e(route('user.extension.avatar')); ?>"><i class="fa-solid fa-clapperboard-play mr-4"></i><?php echo e(__('Create Video')); ?></a>
							<ul class="avatar-menu mt-3">
								<li class="slide">
									<a class="side-menu__item active" href="<?php echo e(route('user.extension.avatar.results')); ?>">
									<span class="side-menu__icon    fa-solid fa-photo-film"></span>
									<span class="side-menu__label"><?php echo e(__('Video Results')); ?></span></a>
								</li>
							</ul>
							<ul class="avatar-menu">								
								<li class="side-item side-item-category mt-1 fs-12 text-muted"><?php echo e(__('Assets')); ?></li>
								<li class="slide">
									<a class="side-menu__item" href="<?php echo e(route('user.extension.avatar.list.images')); ?>">
									<span class="side-menu__icon fa-solid fa-user-tie-hair"></span>
									<span class="side-menu__label"><?php echo e(__('Image Avatars')); ?></span></a>
								</li>
								<li class="slide">
									<a class="side-menu__item" href="<?php echo e(route('user.extension.avatar.list.videos')); ?>">
									<span class="side-menu__icon fa-solid fa-camcorder"></span>
									<span class="side-menu__label"><?php echo e(__('Video Avatars')); ?></span></a>
								</li>
								<li class="slide">
									<a class="side-menu__item" href="<?php echo e(route('user.extension.avatar.voices')); ?>">
									<span class="side-menu__icon fa-solid fa-message-lines"></span>
									<span class="side-menu__label"><?php echo e(__('AI Voices')); ?></span></a>
								</li>
								<li class="slide">
									<a class="side-menu__item" href="<?php echo e(route('user.extension.avatar.uploads')); ?>">
									<span class="side-menu__icon fa-solid fa-cloud-arrow-up"></span>
									<span class="side-menu__label"><?php echo e(__('Uploads')); ?></span></a>
								</li>
							</ul>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-12">
							<div class="">
								<div class="row p-4">

										<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($result->status == 'completed'): ?>
												<div class="col-md-3 col-sm-6">
													<div class="card p-4 shadow-0">
														<video controls>
															<source src="<?php echo e(URL::asset($result->video_url)); ?>" type="video/mp4">
														</video>	
														<div class="text-center mt-3 relative">
															<h6 class="mb-1 font-weight-semibold"><?php echo e($result->title); ?></h6>
															<p class="text-muted fs-12 mb-1"><?php echo e(date('M d, Y', strtotime($result->created_at))); ?></p>
															<p class="text-muted fs-12 mb-0"><?php echo e(gmdate("H:i:s", $result->duration)); ?></p>
															<a href="" class="avatar-result-delete" data-id="<?php echo e($result->id); ?>" data-tippy-content="<?php echo e(__('Delete Video Result')); ?>"><i class="fa-solid fa-trash-xmark"></i></a>	
														</div>	
																	
													</div>
												</div>
											<?php endif; ?>											
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($result->status == 'processing'): ?>
												<div class="col-md-3 col-sm-6">
													<div class="card p-4 shadow-0">
														<video controls>
															<source src="<?php echo e(URL::asset($result->video_url)); ?>" type="video/mp4">
														</video>	
														<div class="text-center mt-3">
															<h6 class="mb-1 font-weight-semibold"><?php echo e($result->title); ?></h6>
															<p class="text-muted fs-12 mb-1"><?php echo e(date('M d, Y', strtotime($result->created_at))); ?></p>
															<p class="text-muted fs-12 mb-0">00:00:00</p>
															<p class="text-muted fs-12 mb-0">(<?php echo e(__('Processing...')); ?>)</p>
														</div>					
													</div>
												</div>
											<?php endif; ?>											
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																			
								</div>	
							</div>								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";

			$(document).on('click', '.avatar-result-delete', function(e) {

				e.preventDefault();

				let formData = new FormData();
				formData.append("id", $(this).attr('data-id'));
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: '/app/user/avatar/result/delete',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						console.log(data)
						if (data == 200) {
							toastr.success('<?php echo e(__('Video result has been deleted successfully')); ?>');	
							window.location.reload();							
						} else {
							toastr.warning('<?php echo e(__('There was an error deleting the result file')); ?>');
						}      
					},
					error: function(data) {
						toastr.warning('<?php echo e(__('There was an error deleting the result file')); ?>');
					}
				})
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/user/avatar/results.blade.php ENDPATH**/ ?>