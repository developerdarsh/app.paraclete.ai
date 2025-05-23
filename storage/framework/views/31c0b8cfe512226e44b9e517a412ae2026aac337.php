

<?php $__env->startSection('content'); ?>
	<div class="row justify-content-center mt-24">
		<div class="col-lg-10 col-md-12 col-sm-12">
			<div class="card border-0 p-5 pt-4">
				<div class="card-body">
					<div class="row ">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="border-0 templates-nav-header">
								<div class="card-body">
									<div class="text-center">
										<h3 class="page-title"><?php echo e(__('Marketplace')); ?></h3>										
										<h6 class="mb-5 fs-12 text-muted"><?php echo e(__('Select and install your preferred extension with one click')); ?></h6>
									</div>
				
									<div class="templates-nav-menu mt-7 mb-6 ml-auto mr-auto" id="marketplace-nav" style="max-width: 600px">
										<div class="template-nav-menu-inner">
											<ul class="nav nav-tabs" id="myTab" role="tablist">
												<li class="nav-item ml-auto mr-auto" role="presentation">
													<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><?php echo e(__('All')); ?></button>
												</li>	
												<li class="nav-item ml-auto mr-auto category-check" role="presentation">
													<button class="nav-link" id="installed-tab" data-bs-toggle="tab" data-bs-target="#installed" type="button" role="tab" aria-controls="installed" aria-selected="false"><?php echo e(__('Installed')); ?></button>
												</li>	
												<li class="nav-item ml-auto mr-auto category-check" role="presentation">
													<button class="nav-link" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" type="button" role="tab" aria-controls="paid" aria-selected="false"><?php echo e(__('Paid')); ?></button>
												</li>						
												<li class="nav-item ml-auto mr-auto category-check" role="presentation">
													<button class="nav-link" id="free-tab" data-bs-toggle="tab" data-bs-target="#free" type="button" role="tab" aria-controls="free" aria-selected="false"><?php echo e(__('Free')); ?></button>
												</li>																												
											</ul>
										</div>
									</div>					
								</div>
							</div>
						</div>
				
						<div class="col-lg-12 col-md-12 col-sm-12">

				
									<div class="tab-content extensions" id="myTabContent">
				
										<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
											<div class="row" id="templates-panel">				
													
												<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="col-lg-4 col-md-6 col-sm-12">
														<div class="card shadow-0 theme" id="XXXXX-card" onclick="window.location.href='<?php echo e(url('app/admin/marketplace/purchase')); ?>/<?php echo e($extension['slug']); ?>'">																
															<div class="card-body">
																<div class="theme-icon mb-3">
																	<div><?php echo $extension['banner']; ?> 
																		<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if($detail->slug == $extension['slug']): ?>
																				<?php if($detail->installed): ?>
																					<span class="fs-12" style="vertical-align: middle"><i class="fa-solid fa-circle-check ml-2 mr-1"></i> <?php echo e(__('Installed')); ?></span>
																				<?php endif; ?>
																			<?php endif; ?>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

																		<?php if($extension['is_free']): ?>
																			<span class="free-available-extension"><?php echo e(__('Free')); ?></span>
																		<?php endif; ?>

																		<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if($detail->slug == $extension['slug']): ?>
																				<?php if((float)$detail->version < (float)$extension['version']): ?>
																					<span class="update-available-extension"><?php echo e(__('Update Available')); ?></span>
																				<?php endif; ?>
																			<?php endif; ?>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	</div>
																</div>
																<div class="theme-name mb-5">
																	<h6 class="fs-18 mb-0 font-weight-bold"><?php echo e($extension['name']); ?> <i class="fa-solid fa-star mr-1 ml-2 fs-11 text-yellow" style="vertical-align: middle"></i><span class="text-muted fs-14" style="font-weight: 400">5.0</span></h6>																	
																</div>
																<div class="theme-info mb-5">
																	<p class="fs-13 mb-2"><?php echo e($extension['short_description']); ?></p>
																</div>	
																<div class="theme-tags">
																	<?php if($extension['tags'] != ""): ?>
																		<?php $__currentLoopData = explode(',', $extension['tags']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
																			<span class="fs-12 text-muted mr-2"><i class="fa-solid fa-period mr-1" style="vertical-align: text-top"></i> <?php echo e($tag); ?></span>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<?php endif; ?>
																</div>
															</div>
														</div>						
													</div>	
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</div>	
										</div>	
										
										<div class="tab-pane fade" id="installed" role="tabpanel" aria-labelledby="installed-tab">
											<div class="row" id="templates-panel">
												<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($detail->slug == $extension['slug']): ?>
															<?php if($detail->installed): ?>
																<div class="col-lg-4 col-md-6 col-sm-12">
																	<div class="card shadow-0 theme" id="XXXXX-card" onclick="window.location.href='<?php echo e(url('app/admin/marketplace/purchase')); ?>/<?php echo e($extension['slug']); ?>'">																
																		<div class="card-body">
																			<div class="theme-icon mb-3">
																				<div><?php echo $extension['banner']; ?> 
																					<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																						<?php if($detail->slug == $extension['slug']): ?>
																							<?php if($detail->installed): ?>
																								<span class="fs-12" style="vertical-align: middle"><i class="fa-solid fa-circle-check ml-2 mr-1"></i> <?php echo e(__('Installed')); ?></span>
																							<?php endif; ?>
																						<?php endif; ?>
																					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

																					<?php if($extension['is_free']): ?>
																						<span class="free-available-extension"><?php echo e(__('Free')); ?></span>
																					<?php endif; ?>

																					<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																						<?php if($detail->slug == $extension['slug']): ?>
																							<?php if((float)$detail->version < (float)$extension['version']): ?>
																								<span class="update-available-extension"><?php echo e(__('Update Available')); ?></span>
																							<?php endif; ?>
																						<?php endif; ?>
																					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																				</div>
																			</div>
																			<div class="theme-name mb-5">
																				<h6 class="fs-18 mb-0 font-weight-bold"><?php echo e($extension['name']); ?> <i class="fa-solid fa-star mr-1 ml-2 fs-11 text-yellow" style="vertical-align: middle"></i><span class="text-muted fs-14" style="font-weight: 400">5.0</span></h6>																	
																			</div>
																			<div class="theme-info mb-5">
																				<p class="fs-13 mb-2"><?php echo e($extension['short_description']); ?></p>
																			</div>	
																			<div class="theme-tags">
																				<?php if($extension['tags'] != ""): ?>
																					<?php $__currentLoopData = explode(',', $extension['tags']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
																						<span class="fs-12 text-muted mr-2"><i class="fa-solid fa-period mr-1" style="vertical-align: text-top"></i> <?php echo e($tag); ?></span>
																					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																				<?php endif; ?>
																			</div>
																		</div>
																	</div>							
																</div>
															<?php endif; ?>															
														<?php endif; ?>																		
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										</div>

										<div class="tab-pane fade" id="free" role="tabpanel" aria-labelledby="free-tab">
											<div class="row" id="templates-panel">
												<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($extension['is_free']): ?>
														<div class="col-lg-4 col-md-6 col-sm-12">
															<div class="card shadow-0 theme" id="XXXXX-card" onclick="window.location.href='<?php echo e(url('app/admin/marketplace/purchase')); ?>/<?php echo e($extension['slug']); ?>'">																
																<div class="card-body">
																	<div class="theme-icon mb-3">
																		<div><?php echo $extension['banner']; ?> 
																			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<?php if($detail->slug == $extension['slug']): ?>
																					<?php if($detail->installed): ?>
																						<span class="fs-12" style="vertical-align: middle"><i class="fa-solid fa-circle-check ml-2 mr-1"></i> <?php echo e(__('Installed')); ?></span>
																					<?php endif; ?>
																				<?php endif; ?>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

																			<?php if($extension['is_free']): ?>
																				<span class="free-available-extension"><?php echo e(__('Free')); ?></span>
																			<?php endif; ?>

																			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<?php if($detail->slug == $extension['slug']): ?>
																					<?php if((float)$detail->version < (float)$extension['version']): ?>
																						<span class="update-available-extension"><?php echo e(__('Update Available')); ?></span>
																					<?php endif; ?>
																				<?php endif; ?>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		</div>
																	</div>
																	<div class="theme-name mb-5">
																		<h6 class="fs-18 mb-0 font-weight-bold"><?php echo e($extension['name']); ?> <i class="fa-solid fa-star mr-1 ml-2 fs-11 text-yellow" style="vertical-align: middle"></i><span class="text-muted fs-14" style="font-weight: 400">5.0</span></h6>																	
																	</div>
																	<div class="theme-info mb-5">
																		<p class="fs-13 mb-2"><?php echo e($extension['short_description']); ?></p>
																	</div>	
																	<div class="theme-tags">
																		<?php if($extension['tags'] != ""): ?>
																			<?php $__currentLoopData = explode(',', $extension['tags']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
																				<span class="fs-12 text-muted mr-2"><i class="fa-solid fa-period mr-1" style="vertical-align: text-top"></i> <?php echo e($tag); ?></span>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php endif; ?>
																	</div>
																</div>
															</div>						
														</div>	
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										</div>

										<div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab">
											<div class="row" id="templates-panel">
												<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if(!$extension['is_free']): ?>
														<div class="col-lg-4 col-md-6 col-sm-12">
															<div class="card shadow-0 theme" id="XXXXX-card" onclick="window.location.href='<?php echo e(url('app/admin/marketplace/purchase')); ?>/<?php echo e($extension['slug']); ?>'">																
																<div class="card-body">
																	<div class="theme-icon mb-3">
																		<div><?php echo $extension['banner']; ?> 
																			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<?php if($detail->slug == $extension['slug']): ?>
																					<?php if($detail->installed): ?>
																						<span class="fs-12" style="vertical-align: middle"><i class="fa-solid fa-circle-check ml-2 mr-1"></i> <?php echo e(__('Installed')); ?></span>
																					<?php endif; ?>
																				<?php endif; ?>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

																			<?php if($extension['is_free']): ?>
																				<span class="free-available-extension"><?php echo e(__('Free')); ?></span>
																			<?php endif; ?>

																			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<?php if($detail->slug == $extension['slug']): ?>
																					<?php if((float)$detail->version < (float)$extension['version']): ?>
																						<span class="update-available-extension"><?php echo e(__('Update Available')); ?></span>
																					<?php endif; ?>
																				<?php endif; ?>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		</div>
																	</div>
																	<div class="theme-name mb-5">
																		<h6 class="fs-18 mb-0 font-weight-bold"><?php echo e($extension['name']); ?> <i class="fa-solid fa-star mr-1 ml-2 fs-11 text-yellow" style="vertical-align: middle"></i><span class="text-muted fs-14" style="font-weight: 400">5.0</span></h6>																	
																	</div>
																	<div class="theme-info mb-5">
																		<p class="fs-13 mb-2"><?php echo e($extension['short_description']); ?></p>
																	</div>	
																	<div class="theme-tags">
																		<?php if($extension['tags'] != ""): ?>
																			<?php $__currentLoopData = explode(',', $extension['tags']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
																				<span class="fs-12 text-muted mr-2"><i class="fa-solid fa-period mr-1" style="vertical-align: text-top"></i> <?php echo e($tag); ?></span>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php endif; ?>
																	</div>
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
	</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/classic/admin/marketplace/index.blade.php ENDPATH**/ ?>