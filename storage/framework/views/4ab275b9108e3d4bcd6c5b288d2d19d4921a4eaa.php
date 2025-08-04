

<?php $__env->startSection('content'); ?>	
	<div class="row justify-content-center mt-5-7">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body p-6">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-12">	
							<h4 class="page-title mb-0"><i class="text-primary mr-2 fs-16 fa-solid fa-aperture"></i> <?php echo e(__('AI Avatar')); ?></h4>
							<h6 class="text-muted"><?php echo e(__('Create videos with AI')); ?></h6>						
							<a id="save-button" class="avatar-action-btn text-center mt-5" href="<?php echo e(route('user.extension.avatar')); ?>"><i class="fa-solid fa-clapperboard-play mr-4"></i><?php echo e(__('Create Video')); ?></a>
							<ul class="avatar-menu mt-3">
								<li class="slide">
									<a class="side-menu__item" href="<?php echo e(route('user.extension.avatar.results')); ?>">
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
							<div class="row">
								<div class="col-lg-5 col-sm-12">
									<h6 class="fs-12 plan-title-bar"><span class="font-weight-bold"><?php echo e(__('Step 1')); ?></span> : <?php echo e(__('Select your Avatar Video')); ?></h6>
									<div class="avatar-images-border-line">
										<div class="row p-4">
											<?php $__currentLoopData = $avatars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if(in_array($avatar->avatar_id , $favorites)): ?>
													<div class="col-md-6 col-sm-12">
														<div class="card avatar-card mb-6" data-id="<?php echo e($avatar->avatar_id); ?>">
															<div class="avatar-card-box">
																<a href="#" class="avatar-favorite marked-favorite" data-id="<?php echo e($avatar->avatar_id); ?>"><i class="fa-solid fa-heart text-muted"></i></a>
																<div class="avatar-image-box">
																	<img src="<?php echo e($avatar->preview_image_url); ?>" class="avatar-image" id="<?php echo e($avatar->avatar_id); ?>_image">												
																</div>
																<div class="avatar-info text-center pt-4 pb-4">
																	<p class="mb-0 fs-10"><?php echo e($avatar->avatar_name); ?></p>
																</div>
															</div>							
														</div>
													</div>
												<?php endif; ?>										
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
											<?php $__currentLoopData = $avatars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if(!in_array($avatar->avatar_id , $favorites)): ?>
													<div class="col-md-6 col-sm-12">
														<div class="card avatar-card mb-6" data-id="<?php echo e($avatar->avatar_id); ?>">
															<div class="avatar-card-box">
																<a href="#" class="avatar-favorite" data-id="<?php echo e($avatar->avatar_id); ?>"><i class="fa-solid fa-heart text-muted"></i></a>
																<div class="avatar-image-box">
																	<img src="<?php echo e($avatar->preview_image_url); ?>" class="avatar-image" id="<?php echo e($avatar->avatar_id); ?>_image">												
																</div>
																<div class="avatar-info text-center pt-4 pb-4">
																	<p class="mb-0 fs-10"><?php echo e($avatar->avatar_name); ?></p>
																</div>
															</div>							
														</div>
													</div>
												<?php endif; ?>										
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									
										</div>	
									</div>								

								</div>

								<div class="col-lg-7 col-sm-12">
									<form id="generate-avatar-form" action="<?php echo e(route('user.extension.avatar.video.create.store')); ?>" method="POST" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>
										<div class="ml-5 mr-0 mb-5 mt-0">
											<div class="selected-avatar-image-box">
												<img src="" alt="" id="selected-avatar-image">
											</div>

											<h6 class="fs-12 plan-title-bar"><span class="font-weight-bold"><?php echo e(__('Step 2')); ?></span> : <?php echo e(__('Select your voice and enter script text')); ?></h6>
											<div class="avatar-input-text mb-6">
												<div id="form-group" class="mb-5">
													<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Audio Voice')); ?></h6>
													<div class="d-flex">
														<div class="flex w-100">
															<select id="voice" name="voice" class="form-select" onchange="voice_select()">
																<?php $__currentLoopData = $favorite_voices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<?php $__currentLoopData = $voices['data']['voices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<?php if($favorite == $voice['voice_id']): ?>
																			<option value=<?php echo e($voice['voice_id']); ?> data-src=<?php echo e($voice['preview_audio']); ?> id=<?php echo e($voice['voice_id']); ?>><?php echo e($voice['language']); ?> - <?php echo e($voice['name']); ?> (<?php echo e($voice['gender']); ?>) (<?php echo e(__('Favorite')); ?>)</option>
																		<?php endif; ?>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																<?php $__currentLoopData = $voices['data']['voices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<?php if(!in_array($voice['voice_id'], $favorite_voices)): ?>
																		<option value=<?php echo e($voice['voice_id']); ?> data-src=<?php echo e($voice['preview_audio']); ?> id=<?php echo e($voice['voice_id']); ?>><?php echo e($voice['language']); ?> - <?php echo e($voice['name']); ?> (<?php echo e($voice['gender']); ?>)</option>
																	<?php endif; ?>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
														</div>
														<div class="flex">
															<button class="btn btn-special create-project ml-4" type="button" onclick="previewPlay(this)" 
															<?php $__currentLoopData = $voices['data']['voices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<?php if($loop->first): ?>
																	src="<?php echo e($voice['preview_audio']); ?>" 
																<?php else: ?>
																	<?php break; ?>
																<?php endif; ?>																
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>															
															type="audio/mpeg" id="preview" data-tippy-content="<?php echo e(__('Preview Selected Voice')); ?>"><i class="fa-solid fa-volume-high"></i></button>
														</div>
													</div>
												</div>
												<div class="input-box mb-0">	
													<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Video Script Text')); ?></h6>									
													<div class="form-group">	
														<textarea class="form-control" name="text" id="text" rows="3" placeholder="Enter your text to voice script with up to 1500 characters long" required></textarea>
													</div>
												</div>
											</div>

											<h6 class="fs-12 plan-title-bar"><span class="font-weight-bold"><?php echo e(__('Step 3')); ?></span> : <?php echo e(__('Set Your Video Settings')); ?></h6>
											<div class="avatar-input-text">
												<div class="input-box mb-5">
													<div id="form-group">	
														<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Video Title')); ?></h6>
														<input id="title" name="title" type="text" class="form-control" placeholder="Provide title for the video">
													</div>
												</div>

												<div id="form-group" class="mb-5">
													<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Video Dimension')); ?></h6>
													<select id="dimension" name="dimension" class="form-select">													
														<option value="landscape"><?php echo e(__('Landscape')); ?></option>			
														<option value="portrait"><?php echo e(__('Portrait')); ?></option>			
													</select>
												</div>

												<div id="form-group" class="mb-5">
													<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Avatar Style')); ?></h6>
													<select id="avatar_style" name="avatar_style" class="form-select">													
														<option value="normal"><?php echo e(__('Normal')); ?></option>			
														<option value="closeUp"><?php echo e(__('closeUp')); ?></option>			
														<option value="circle"><?php echo e(__('Circle')); ?></option>			
													</select>
												</div>

												<div class="avatar-input-text">
													<div class="input-box mb-4">	
														<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Background Color')); ?></h6>
														<div class="form-group" style="position: relative">
															<input type="color" id="colorPicker" style="position: absolute; top: 8px; left: 1rem;width: 30px" value="#007bff">
															<input id="background_color" name="background_color" type="text" class="form-control" value="#007bff" style="padding-left: 3.5rem;">
														</div>
													</div>		

													<p class="text-muted fs-12 text-center mb-0"><?php echo e(__('or')); ?></p>
													<div id="form-group" class="mb-5">	
														<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Background Image')); ?></h6>
														<select id="background_image" name="background_image" class="form-select">																
															<option value="none"><?php echo e(__('None')); ?></option>
															<?php $__currentLoopData = $backgrounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $background): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($background->file_id); ?>"><?php echo e($background->original_name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
														</select>
													</div>

													<p class="text-muted fs-12 text-center mb-0"><?php echo e(__('or')); ?></p>
													<div class="input-box mb-0">
														<div id="form-group">	
															<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Background Image URL')); ?></h6>
															<input id="background_image_url" name="background_image_url" type="text" class="form-control" placeholder="Enter your image url link">
														</div>
													</div>
												</div>
		
											</div>
										</div>
										<div class="border-0 text-center mb-4 mt-1">
											<button type="button" class="btn ripple btn-primary pl-9 pr-9 pt-3 pb-3 fs-12" style="min-width: 300px;" id="generate"><?php echo e(__('Generate Video')); ?></button>							
										</div>	
									</form>
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
	let loading = `<span class="loading">
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					</span>`;
		$(function () {			

			"use strict";
			let avatar_id = '';
			const colorPicker = document.getElementById('colorPicker');
        	const colorValue = document.getElementById('background_color');

			colorPicker.addEventListener('input', function() {
				colorValue.value = colorPicker.value;
			});


			$(document).on('click', '.avatar-card', function(e) {
				avatar_id = $(this).attr('data-id');
				let source = avatar_id + "_image";
				let src = document.getElementById(source).src;
				
				document.getElementById("selected-avatar-image").src = src;
			});


			$(document).on('click', '.avatar-favorite', function(e) {

				e.preventDefault();

				let formData = new FormData();
				formData.append("id", $(this).attr('data-id'));
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: '/app/user/avatar/list/video-avatar/favorite',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'added') {
							toastr.success('<?php echo e(__('Avatar added to the favorite list successfully')); ?>');							
						} else if (data == 'removed') {
							toastr.success('<?php echo e(__('Avatar removed from favorite list successfully')); ?>');
						} else {
							toastr.warning('<?php echo e(__('There was an error editing avatar favorite status')); ?>');
						}      
					},
					error: function(data) {
						toastr.warning('<?php echo e(__('There was an error editing avatar favorite status')); ?>');
					}
				})
			});


			$('#generate').on('click',function(e) {

				e.preventDefault();

				const form = document.getElementById("generate-avatar-form");
				let formData = new FormData(form);
				if (avatar_id == '') {
					toastr.warning('<?php echo e(__('Make sure to select your avatar image first')); ?>');
				} else {
					formData.append("avatar_id", avatar_id);

					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						method: 'POST',
						url: $('#generate-avatar-form').attr('action'),
						data: formData,
						processData: false,
						contentType: false,
						beforeSend: function() {					
							$('#generate').prop('disabled', true);
							let btn = document.getElementById('generate');					
							btn.innerHTML = loading;  
							document.querySelector('#loader-line')?.classList?.remove('opacity-on');
						},		
						success: function(data) {

							$('#generate').prop('disabled', false);
							let btn = document.getElementById('generate');					
							btn.innerHTML = '<?php echo e(__('Generate Video')); ?>';
							document.querySelector('#loader-line')?.classList?.add('hidden'); 

							if (data == 200) {
								toastr.success('<?php echo e(__('Video generation task successfully created')); ?>');
							}

							if (data == 502) {
								toastr.success('<?php echo e(__('Not enough credits to generate Avatar from Video, please upgrade')); ?>');
							}

						},
						error: function(data) {
							toastr.error('<?php echo e(__('There was an issue with generating video task')); ?>');
						}
					}).done(function(data) {})
				}
				
			});
		});


		let audio = new Audio();
		let current = '';
		function voice_select() {
			let voice = document.getElementById("voice").value;
			let url = $('#' + voice).attr('data-src');
			document.getElementById('preview').setAttribute("src", url);
		}


		function previewPlay(element){

			let src = $(element).attr('src');
			let type = $(element).attr('type');
			let id = $(element).attr('id');

			let isPlaying = false;

			audio.src = src;
			audio.type= type;    

			if (current == id) {
				audio.pause();
				isPlaying = false;
				document.getElementById(id).innerHTML = '<i class="fa-solid fa-volume-high"></i>';
				current = '';

			} else {    
				if(isPlaying) {
					audio.pause();
					isPlaying = false;
					document.getElementById(id).innerHTML = '<i class="fa-solid fa-volume-high"></i>';
					current = '';
				} else {
					audio.play();
					isPlaying = true;
					if (current) {
						document.getElementById(current).innerHTML = '<i class="fa-solid fa-volume-high"></i>';
					}
					document.getElementById(id).innerHTML = '<i class="fa-solid fa-volume-slash"></i>';
					current = id;
				}
			}

			audio.addEventListener('ended', (event) => {
				document.getElementById(id).innerHTML = '<i class="fa-solid fa-volume-high"></i>';
				isPlaying = false;
				current = '';
			});      
				
		}
	</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/user/avatar/video.blade.php ENDPATH**/ ?>