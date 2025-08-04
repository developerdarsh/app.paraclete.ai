

<?php $__env->startSection('content'); ?>	
	<div class="row justify-content-center mt-5-7">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body pt-5">
					<div class="row">
						<div class="col-sm-12">
							<div class="avatar-banner">
								<h4 class="page-title mb-0 mt-2"><i class="text-primary mr-2 fs-16 fa-solid fa-aperture"></i> <?php echo e(__('AI Avatar')); ?></h4>
								<h6 class="text-muted"><?php echo e(__('Produce studio-quality videos in 175 languages without a camera or crew')); ?></h6>
								<img src="<?php echo e(URL::asset('extension/image-avatar.webp')); ?>" alt="" id="img-1">
								<img src="<?php echo e(URL::asset('extension/image-avatar-2.webp')); ?>" alt="" id="img-2">
								<img src="<?php echo e(URL::asset('extension/image-avatar-3.webp')); ?>" alt="" id="img-3">
								<div class="avatar-credits">
									<span class="text-muted fs-12"><?php echo e(__('Credits')); ?>: </span> <span class="fs-12 text-primary"><?php echo e($credits['image']); ?></span> <span class="text-muted fs-12"><?php echo e(__('Avatars from Image')); ?></span> <span class="text-muted fs-12">|</span> <span class="fs-12 text-primary"><?php echo e($credits['video']); ?></span> <span class="text-muted fs-12"><?php echo e(__('Avatars from Video')); ?></span>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-12">							
							<a id="save-button" class="avatar-action-btn text-center mt-6" href="<?php echo e(route('user.extension.avatar')); ?>"><i class="fa-solid fa-clapperboard-play mr-4"></i><?php echo e(__('Create Video')); ?></a>
							<ul class="avatar-menu mt-3">
								<li class="slide">
									<a class="side-menu__item" href="<?php echo e(route('user.extension.avatar.results')); ?>">
									<span class="side-menu__icon fa-solid fa-photo-film"></span>
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
							<div class="row">
								<div class="col-lg-6 col-sm-12">
									<div class="avatar-task-box">
										<a href="<?php echo e(route('user.extension.avatar.video.create')); ?>">
											<img src="<?php echo e(URL::asset('extension/avatar-video.png')); ?>" alt="">
										</a>
									</div>									
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="avatar-task-box">
										<a href="<?php echo e(route('user.extension.avatar.image.create')); ?>">
											<img src="<?php echo e(URL::asset('extension/avatar-image.png')); ?>" alt="">
										</a>
									</div>
								</div>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/user/avatar/index.blade.php ENDPATH**/ ?>