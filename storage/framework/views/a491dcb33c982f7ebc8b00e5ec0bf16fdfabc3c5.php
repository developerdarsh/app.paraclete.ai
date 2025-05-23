

<?php $__env->startSection('css'); ?>
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
	<style>
	.info-btn-alt {
		font-size: 15px;
		background-color: rgb(126, 34, 206);
		color: rgb(255, 255, 255);
		padding-top: 0.5rem;
		padding-bottom: 0.5rem;
		padding-left: 1rem;
		padding-right: 1rem;
		border-radius: 0.5rem;
	}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row mt-24">
		<div class="col-lg-12 col-md-12 col-sm-12 p-4">
			<div id="chat-search-panel">
				<div class="text-center"><a class="info-btn-alt" data-bs-toggle="modal" data-bs-target="#info-alert-model" href="javascript:void(0)">How It works ?</a></div>
				<h3 class="card-title mb-3 ml-2 fs-20 super-strong"><i class="fa-solid fa-message-captions mr-2 text-primary"></i><?php echo e(__('AI Chat Assistants')); ?></h3>
				<h6 class="text-muted mb-3 ml-2"><?php echo e(__('Find your AI assistant quickly! Get ready to explore our fantastic lineup of AI chat assistants')); ?></h6>
				<?php if(config('settings.custom_chats') == 'anyone'): ?>
					<a href="<?php echo e(route('user.chat.custom')); ?>" class="btn btn-primary ripple rtl-main-button" id="create-ai-button" style="text-transform: none;"><?php echo e(__('Custom Chat Assistants')); ?></a>
				<?php else: ?>
					<?php if($check): ?>
						<a href="<?php echo e(route('user.chat.custom')); ?>" class="btn btn-primary ripple rtl-main-button" id="create-ai-button" style="text-transform: none;"><?php echo e(__('Custom Chat Assistants')); ?></a>
					<?php endif; ?>	
				<?php endif; ?>	
				<div class="search-template">
					<div class="input-box">								
						<div class="form-group">							    
							<input type="text" class="form-control" id="search-template" placeholder="<?php echo e(__('Search for your AI assistant...')); ?>">
						</div> 
					</div> 
				</div>
				
			</div>

			<div class="templates-nav-menu chat-nav-menu">
				<div class="template-nav-menu-inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><?php echo e(__('All AI Chats')); ?></button>
						</li>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if(strtolower($category->code) != 'other'): ?>
								<li class="nav-item category-check" role="presentation">
									<button class="nav-link" id="<?php echo e($category->code); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($category->code); ?>" type="button" role="tab" aria-controls="<?php echo e($category->code); ?>" aria-selected="false"><?php echo e(__($category->name)); ?></button>
								</li>
							<?php endif; ?>									
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if(strtolower($category->code) == 'other'): ?>
								<li class="nav-item category-check" role="presentation">
									<button class="nav-link" id="<?php echo e($category->code); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($category->code); ?>" type="button" role="tab" aria-controls="<?php echo e($category->code); ?>" aria-selected="false"><?php echo e(__($category->name)); ?></button>
								</li>
							<?php endif; ?>									
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
					</ul>
				</div>
			</div>	
		</div>	
	</div>

	<div class="">
		<div class="favorite-templates-panel">

			<div class="tab-content" id="myTabContent">

				<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
					<div class="row" id="templates-panel">

						<?php $__currentLoopData = $favorite_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
								<div class="chat-boxes text-center">
									<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
									<?php if($chat->category == 'professional'): ?> 
										<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
									<?php elseif($chat->category == 'free'): ?>
										<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
									<?php elseif($chat->category == 'premium'): ?>
										<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
									<?php endif; ?>
									<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats')); ?>/<?php echo e($chat->chat_code); ?>'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php $__currentLoopData = $favorite_chats_custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
								<div class="chat-boxes text-center">
									<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
									<?php if($chat->category == 'professional'): ?> 
										<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
									<?php elseif($chat->category == 'free'): ?>
										<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
									<?php elseif($chat->category == 'premium'): ?>
										<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
									<?php endif; ?>
									<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats/custom')); ?>/<?php echo e($chat->chat_code); ?>'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php $__currentLoopData = $other_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
								<div class="chat-boxes text-center">
									<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
									<?php if($chat->category == 'professional'): ?> 
										<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
									<?php elseif($chat->category == 'free'): ?>
										<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
									<?php elseif($chat->category == 'premium'): ?>
										<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
									<?php endif; ?>
									<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats')); ?>/<?php echo e($chat->chat_code); ?>'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php $__currentLoopData = $custom_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
								<div class="chat-boxes text-center">
									<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
									<?php if($chat->category == 'professional'): ?> 
										<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
									<?php elseif($chat->category == 'free'): ?>
										<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
									<?php elseif($chat->category == 'premium'): ?>
										<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
									<?php endif; ?>
									<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats/custom')); ?>/<?php echo e($chat->chat_code); ?>'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php $__currentLoopData = $public_custom_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
								<div class="chat-boxes text-center">
									<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
									<?php if($chat->category == 'professional'): ?> 
										<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
									<?php elseif($chat->category == 'free'): ?>
										<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
									<?php elseif($chat->category == 'premium'): ?>
										<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
									<?php endif; ?>
									<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats/custom')); ?>/<?php echo e($chat->chat_code); ?>'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>

				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="tab-pane fade" id="<?php echo e($category->code); ?>" role="tabpanel" aria-labelledby="<?php echo e($category->code); ?>-tab">
						<div class="row" id="templates-panel">
							<?php $__currentLoopData = $favorite_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($chat->group == $category->code): ?>
									<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
										<div class="chat-boxes text-center">
											<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<?php if($chat->category == 'professional'): ?> 
												<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
											<?php elseif($chat->category == 'free'): ?>
												<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
											<?php elseif($chat->category == 'premium'): ?>
												<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
											<?php endif; ?>
											<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats')); ?>/<?php echo e($chat->chat_code); ?>'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<?php $__currentLoopData = $favorite_chats_custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($chat->group == $category->code): ?>
									<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
										<div class="chat-boxes text-center">
											<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<?php if($chat->category == 'professional'): ?> 
												<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
											<?php elseif($chat->category == 'free'): ?>
												<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
											<?php elseif($chat->category == 'premium'): ?>
												<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
											<?php endif; ?>
											<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats/custom')); ?>/<?php echo e($chat->chat_code); ?>'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<?php $__currentLoopData = $other_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($chat->group == $category->code): ?>
									<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
										<div class="chat-boxes text-center">
											<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<?php if($chat->category == 'professional'): ?> 
												<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
											<?php elseif($chat->category == 'free'): ?>
												<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
											<?php elseif($chat->category == 'premium'): ?>
												<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
											<?php endif; ?>
											<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats')); ?>/<?php echo e($chat->chat_code); ?>'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<?php $__currentLoopData = $custom_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($chat->group == $category->code): ?>
									<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
										<div class="chat-boxes text-center">
											<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<?php if($chat->category == 'professional'): ?> 
												<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
											<?php elseif($chat->category == 'free'): ?>
												<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
											<?php elseif($chat->category == 'premium'): ?>
												<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
											<?php endif; ?>
											<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats/custom')); ?>/<?php echo e($chat->chat_code); ?>'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								<?php endif; ?>								
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							<?php $__currentLoopData = $public_custom_chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($chat->group == $category->code): ?>
									<div class="col-lg-3 col-md-6 col-sm-12" id="<?php echo e($chat->chat_code); ?>">
										<div class="chat-boxes text-center">
											<a id="<?php echo e($chat->chat_code); ?>" <?php if($chat->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($chat->chat_code); ?>-icon" class="<?php if($chat->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<?php if($chat->category == 'professional'): ?> 
												<p class="fs-8 btn btn-pro"><i class="  fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> 
											<?php elseif($chat->category == 'free'): ?>
												<p class="fs-8 btn btn-free"><i class="  fa-solid fa-gift mr-2"></i><?php echo e(__('Free')); ?></p> 
											<?php elseif($chat->category == 'premium'): ?>
												<p class="fs-8 btn btn-yellow"><i class="  fa-solid fa-gem mr-2"></i><?php echo e(__('Premium')); ?></p> 
											<?php endif; ?>
											<div class="card <?php if($chat->category == 'professional'): ?> professional <?php elseif($chat->category == 'premium'): ?> premium <?php elseif($chat->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($chat->chat_code); ?>-card" onclick="window.location.href='<?php echo e(url('app/user/chats/custom')); ?>/<?php echo e($chat->chat_code); ?>'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="<?php echo e(URL::asset($chat->logo)); ?>"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($chat->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($chat->sub_name)); ?></p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="info-alert-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h2></h2>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <!--ARCADE EMBED START--><div style="position: relative; padding-bottom: calc(56.25% + 41px); height: 0; width: 100%;"><iframe src="https://demo.arcade.software/GGkkeoTkGDrJsnFvKicG?embed&embed_mobile=tab&embed_desktop=inline&show_copy_link=true" title="AI Chat Assistants" frameborder="0" loading="lazy" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="clipboard-write" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color-scheme: light;" ></iframe></div><!--ARCADE EMBED END-->
                </div>
            </div>
            </div>
        </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script>
		function favoriteStatus(id) {

			let icon, card;
			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'chat/favorite',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('<?php echo e(__('Chat Bot Removed from Favorites')); ?>', '<?php echo e(__('Selected chat bot has been successfully removed from favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-solid");
							icon.classList.remove("fa-stars");
							icon.classList.add("fa-regular");
							icon.classList.add("fa-star");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.remove("favorite");
								card.classList.add('border-0');
							}							
						} else {
							Swal.fire('<?php echo e(__('Chat Bot Added to Favorites')); ?>', '<?php echo e(__('Selected chat bot has been successfully added to favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-regular");
							icon.classList.remove("fa-star");
							icon.classList.add("fa-solid");
							icon.classList.add("fa-stars");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.add('favorite');
								card.classList.remove('border-0');
							}
						}
														
					} else {
						Swal.fire('<?php echo e(__('Favorite Setting Issue')); ?>', '<?php echo e(__('There as an issue with setting favorite status for this chat bot')); ?>', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}

		function favoriteStatusCustom(id) {

			let icon, card;
			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'chat/favoritecustom',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('<?php echo e(__('Chat Bot Removed from Favorites')); ?>', '<?php echo e(__('Selected chat bot has been successfully removed from favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-solid");
							icon.classList.remove("fa-stars");
							icon.classList.add("fa-regular");
							icon.classList.add("fa-star");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.remove("favorite");
								card.classList.add('border-0');
							}							
						} else {
							Swal.fire('<?php echo e(__('Chat Bot Added to Favorites')); ?>', '<?php echo e(__('Selected chat bot has been successfully added to favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-regular");
							icon.classList.remove("fa-star");
							icon.classList.add("fa-solid");
							icon.classList.add("fa-stars");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.add('favorite');
								card.classList.remove('border-0');
							}
						}
														
					} else {
						Swal.fire('<?php echo e(__('Favorite Setting Issue')); ?>', '<?php echo e(__('There as an issue with setting favorite status for this chat bot')); ?>', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}

		function changeChat(value) {
			let url = '<?php echo e(url('app/user/chats')); ?>/' + value;
			window.location.href=url;
		}

		$(document).on('keyup', '#search-template', function () {

			var searchTerm = $(this).val().toLowerCase();
			let value = $(this).val().toLowerCase();
			let activeTab = $('.tab-pane.active'); // Get currently active tab
			let chats = activeTab.find('.col-lg-3'); // Target chat cards within active tab
			chats.filter(function () {
				let chatText = $(this).text().toLowerCase();
				$(this).toggle(chatText.indexOf(value) > -1);
			});	
			// $('#templates-panel').find('> div').each(function () {
			// 	if ($(this).filter(function() {
			// 		return (($(this).find('h6').text().toLowerCase().indexOf(searchTerm) > -1) || ($(this).find('p').text().toLowerCase().indexOf(searchTerm) > -1));
			// 	}).length > 0 || searchTerm.length < 1) {
			// 		$(this).show();
			// 	} else {
			// 		$(this).hide();
			// 	}
			// });
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/default/user/chat/index.blade.php ENDPATH**/ ?>