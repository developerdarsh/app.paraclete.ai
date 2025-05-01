

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0"><?php echo e(__('API Credit Management')); ?></h4>
			<p class="fs-12 text-muted mb-2"><?php echo e(__('Adjust the multiplier value accordingly if you wish to increase the charges associated with API consumption')); ?></p>
			<ol class="breadcrumb mb-2 justify-content-center">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.dashboard')); ?>"> <?php echo e(__('AI Management')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.davinci.configs')); ?>"> <?php echo e(__('AI Settings')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('API Credit Management')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>						
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body pt-6">									
					<form id="" action="<?php echo e(route('admin.davinci.configs.api.credit.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">	
									<h6><?php echo e(__('Credit Calculation Method')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<select id="model_charge_type" name="model_charge_type" class="form-select">			
										<option value="both" <?php if( $config->model_charge_type  == 'both'): ?> selected <?php endif; ?>><?php echo e(__('Count both Input and Output Tokens in the final cost')); ?></option>
										<option value="input" <?php if( $config->model_charge_type  == 'input'): ?> selected <?php endif; ?>><?php echo e(__('Count only Input Tokens')); ?></option>
										<option value="output" <?php if( $config->model_charge_type  == 'output'): ?> selected <?php endif; ?>><?php echo e(__('Count only Output Tokens')); ?></option>
									</select>
								</div>								
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">	
									<h6><?php echo e(__('Model Credits Naming')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<select id="model_credit_name" name="model_credit_name" class="form-select">			
										<option value="words" <?php if( $config->model_credit_name  == 'words'): ?> selected <?php endif; ?>><?php echo e(__('Use Words as model credits name')); ?></option>
										<option value="tokens" <?php if( $config->model_credit_name  == 'tokens'): ?> selected <?php endif; ?>><?php echo e(__('Use Tokens as model credits name')); ?></option>										
									</select>
								</div>	
							</div>

							<?php if(App\Services\HelperService::extensionCheckSaaS()): ?>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="input-box">	
										<h6><?php echo e(__('Show Disabled Models in AI Chat')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
										<select id="model_disabled_vendors" name="model_disabled_vendors" class="form-select">			
											<option value="hide" <?php if( $config->model_disabled_vendors  == 'hide'): ?> selected <?php endif; ?>><?php echo e(__('Hide')); ?></option>
											<option value="show" <?php if( $config->model_disabled_vendors  == 'show'): ?> selected <?php endif; ?>><?php echo e(__('Show')); ?></option>										
										</select>
									</div>	
								</div>
							<?php endif; ?>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('OpenAI Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('o3 mini')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>					
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="o3_mini_title" value="<?php echo e($credits->o3_mini_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="o3_mini_description" value="<?php echo e($credits->o3_mini_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('o3 mini')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="o3_mini_input_token" value="<?php echo e($credits->o3_mini_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('o3 mini')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="o3_mini_output_token" value="<?php echo e($credits->o3_mini_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="o3_mini_new" class="custom-switch-input" <?php if($credits->o3_mini_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('o1')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="o1_title" value="<?php echo e($credits->o1_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="o1_description" value="<?php echo e($credits->o1_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('o1')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="o1_input_token" value="<?php echo e($credits->o1_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('o1')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="o1_output_token" value="<?php echo e($credits->o1_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="o1_new" class="custom-switch-input" <?php if($credits->o1_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('o1 mini')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="o1_mini_title" value="<?php echo e($credits->o1_mini_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="o1_mini_description" value="<?php echo e($credits->o1_mini_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('o1 mini')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="o1_mini_input_token" value="<?php echo e($credits->o1_mini_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('o1 mini')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="o1_mini_output_token" value="<?php echo e($credits->o1_mini_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="o1_mini_new" class="custom-switch-input" <?php if($credits->o1_mini_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>			
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4.5')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_45_title" value="<?php echo e($credits->gpt_45_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_45_description" value="<?php echo e($credits->gpt_45_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4.5')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_45_input_token" value="<?php echo e($credits->gpt_45_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4.5')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_45_output_token" value="<?php echo e($credits->gpt_45_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_45_new" class="custom-switch-input" <?php if($credits->gpt_45_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4_title" value="<?php echo e($credits->gpt_4_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4_description" value="<?php echo e($credits->gpt_4_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4_input_token" value="<?php echo e($credits->gpt_4_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4_output_token" value="<?php echo e($credits->gpt_4_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_4_new" class="custom-switch-input" <?php if($credits->gpt_4_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4 Turbo')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4_turbo_title" value="<?php echo e($credits->gpt_4_turbo_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4_turbo_description" value="<?php echo e($credits->gpt_4_turbo_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4 Turbo')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4_turbo_input_token" value="<?php echo e($credits->gpt_4_turbo_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4 Turbo')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4_turbo_output_token" value="<?php echo e($credits->gpt_4_turbo_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_4_turbo_new" class="custom-switch-input" <?php if($credits->gpt_4_turbo_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4o')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_title" value="<?php echo e($credits->gpt_4o_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_description" value="<?php echo e($credits->gpt_4o_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_input_token" value="<?php echo e($credits->gpt_4o_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_output_token" value="<?php echo e($credits->gpt_4o_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_4o_new" class="custom-switch-input" <?php if($credits->gpt_4o_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4o mini')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_mini_title" value="<?php echo e($credits->gpt_4o_mini_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_mini_description" value="<?php echo e($credits->gpt_4o_mini_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o mini')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_mini_input_token" value="<?php echo e($credits->gpt_4o_mini_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o mini')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_mini_output_token" value="<?php echo e($credits->gpt_4o_mini_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 		
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_4o_mini_new" class="custom-switch-input" <?php if($credits->gpt_4o_mini_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4o Realtime')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_realtime_title" value="<?php echo e($credits->gpt_4o_realtime_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_realtime_description" value="<?php echo e($credits->gpt_4o_realtime_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o Realtime')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_realtime_input_token" value="<?php echo e($credits->gpt_4o_realtime_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o Realtime')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_realtime_output_token" value="<?php echo e($credits->gpt_4o_realtime_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_4o_realtime_new" class="custom-switch-input" <?php if($credits->gpt_4o_realtime_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 4o mini Realtime')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_mini_realtime_title" value="<?php echo e($credits->gpt_4o_mini_realtime_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_4o_mini_realtime_description" value="<?php echo e($credits->gpt_4o_mini_realtime_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o mini Realtime')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_mini_realtime_input_token" value="<?php echo e($credits->gpt_4o_mini_realtime_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 4o mini Realtime')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_4o_mini_realtime_output_token" value="<?php echo e($credits->gpt_4o_mini_realtime_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 		
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_4o_mini_realtime_new" class="custom-switch-input" <?php if($credits->gpt_4o_mini_realtime_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('GPT 3.5 Turbo')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_35_turbo_title" value="<?php echo e($credits->gpt_35_turbo_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gpt_35_turbo_description" value="<?php echo e($credits->gpt_35_turbo_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 3.5 Turbo')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_35_turbo_input_token" value="<?php echo e($credits->gpt_35_turbo_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('GPT 3.5 Turbo')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gpt_35_turbo_output_token" value="<?php echo e($credits->gpt_35_turbo_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gpt_35_turbo_new" class="custom-switch-input" <?php if($credits->gpt_35_turbo_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('Anthropic Claude Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Claude 3 Opus')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_3_opus_title" value="<?php echo e($credits->claude_3_opus_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_3_opus_description" value="<?php echo e($credits->claude_3_opus_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3 Opus')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_3_opus_input_token" value="<?php echo e($credits->claude_3_opus_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3 Opus')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_3_opus_output_token" value="<?php echo e($credits->claude_3_opus_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="claude_3_opus_new" class="custom-switch-input" <?php if($credits->claude_3_opus_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Claude 3.7 Sonnet')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_37_sonnet_title" value="<?php echo e($credits->claude_37_sonnet_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_37_sonnet_description" value="<?php echo e($credits->claude_37_sonnet_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3.7 Sonnet')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_37_sonnet_input_token" value="<?php echo e($credits->claude_37_sonnet_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3.7 Sonnet')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_37_sonnet_output_token" value="<?php echo e($credits->claude_37_sonnet_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="claude_37_sonnet_new" class="custom-switch-input" <?php if($credits->claude_37_sonnet_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Claude 3.5v2 Sonnet')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_35_sonnet_title" value="<?php echo e($credits->claude_35_sonnet_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_35_sonnet_description" value="<?php echo e($credits->claude_35_sonnet_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3.5v2 Sonnet')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_35_sonnet_input_token" value="<?php echo e($credits->claude_35_sonnet_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3.5v2 Sonnet')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_35_sonnet_output_token" value="<?php echo e($credits->claude_35_sonnet_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="claude_35_sonnet_new" class="custom-switch-input" <?php if($credits->claude_35_sonnet_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Claude 3.5 Haiku')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_35_haiku_title" value="<?php echo e($credits->claude_35_haiku_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="claude_35_haiku_description" value="<?php echo e($credits->claude_35_haiku_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3.5 Haiku')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_35_haiku_input_token" value="<?php echo e($credits->claude_35_haiku_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Claude 3.5 Haiku')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="claude_35_haiku_output_token" value="<?php echo e($credits->claude_35_haiku_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="claude_35_haiku_new" class="custom-switch-input" <?php if($credits->claude_35_haiku_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>			
								</div>											
							</div>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('Google Gemini Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Gemini 2.0 Flash')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gemini_20_flash_title" value="<?php echo e($credits->gemini_20_flash_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gemini_20_flash_description" value="<?php echo e($credits->gemini_20_flash_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Gemini 2.0 Flash')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gemini_20_flash_input_token" value="<?php echo e($credits->gemini_20_flash_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Gemini 2.0 Flash')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gemini_20_flash_output_token" value="<?php echo e($credits->gemini_20_flash_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 		
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gemini_20_flash_new" class="custom-switch-input" <?php if($credits->gemini_20_flash_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Gemini 1.5 Flash')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gemini_15_flash_title" value="<?php echo e($credits->gemini_15_flash_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gemini_15_flash_description" value="<?php echo e($credits->gemini_15_flash_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Gemini 1.5 Flash')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gemini_15_flash_input_token" value="<?php echo e($credits->gemini_15_flash_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Gemini 1.5 Flash')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gemini_15_flash_output_token" value="<?php echo e($credits->gemini_15_flash_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box mb-2">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gemini_15_flash_new" class="custom-switch-input" <?php if($credits->gemini_15_flash_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Gemini 1.5 Pro')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gemini_15_pro_title" value="<?php echo e($credits->gemini_15_pro_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="gemini_15_pro_description" value="<?php echo e($credits->gemini_15_pro_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Gemini 1.5 Pro')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gemini_15_pro_input_token" value="<?php echo e($credits->gemini_15_pro_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Gemini 1.5 Pro')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="gemini_15_pro_output_token" value="<?php echo e($credits->gemini_15_pro_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="gemini_15_pro_new" class="custom-switch-input" <?php if($credits->gemini_15_pro_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('DeepSeek Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('DeekSeek R1')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="deepseek_r1_title" value="<?php echo e($credits->deepseek_r1_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="deepseek_r1_description" value="<?php echo e($credits->deepseek_r1_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('DeekSeek R1')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="deepseek_r1_input_token" value="<?php echo e($credits->deepseek_r1_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('DeekSeek R1')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="deepseek_r1_output_token" value="<?php echo e($credits->deepseek_r1_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="deepseek_r1_new" class="custom-switch-input" <?php if($credits->deepseek_r1_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('DeekSeek V3')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="deepseek_v3_title" value="<?php echo e($credits->deepseek_v3_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="deepseek_v3_description" value="<?php echo e($credits->deepseek_v3_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('DeekSeek V3')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="deepseek_v3_input_token" value="<?php echo e($credits->deepseek_v3_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('DeekSeek V3')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="deepseek_v3_output_token" value="<?php echo e($credits->deepseek_v3_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="deepseek_v3_new" class="custom-switch-input" <?php if($credits->deepseek_v3_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>		
								</div>											
							</div>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('xAI Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Grok 2')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="grok_2_title" value="<?php echo e($credits->grok_2_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="grok_2_description" value="<?php echo e($credits->grok_2_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Grok 2')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="grok_2_input_token" value="<?php echo e($credits->grok_2_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Grok 2')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="grok_2_output_token" value="<?php echo e($credits->grok_2_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box mb-2">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="grok_2_new" class="custom-switch-input" <?php if($credits->grok_2_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Grok 2 Vision')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="grok_2_vision_title" value="<?php echo e($credits->grok_2_vision_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="grok_2_vision_description" value="<?php echo e($credits->grok_2_vision_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Grok 2 Vision')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="grok_2_vision_input_token" value="<?php echo e($credits->grok_2_vision_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Grok 2 Vision')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="grok_2_vision_output_token" value="<?php echo e($credits->grok_2_vision_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="grok_2_vision_new" class="custom-switch-input" <?php if($credits->grok_2_vision_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('Perplexity Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Sonar Reasoning Pro')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_reasoning_pro_title" value="<?php echo e($credits->sonar_reasoning_pro_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_reasoning_pro_description" value="<?php echo e($credits->sonar_reasoning_pro_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar Reasoning Pro')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_reasoning_pro_input_token" value="<?php echo e($credits->sonar_reasoning_pro_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar Reasoning Pro')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_reasoning_pro_output_token" value="<?php echo e($credits->sonar_reasoning_pro_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="sonar_reasoning_pro_new" class="custom-switch-input" <?php if($credits->sonar_reasoning_pro_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Sonar Reasoning')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_reasoning_title" value="<?php echo e($credits->sonar_reasoning_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_reasoning_description" value="<?php echo e($credits->sonar_reasoning_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar Reasoning')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_reasoning_input_token" value="<?php echo e($credits->sonar_reasoning_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar Reasoning')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_reasoning_output_token" value="<?php echo e($credits->sonar_reasoning_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="sonar_reasoning_new" class="custom-switch-input" <?php if($credits->sonar_reasoning_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Sonar Pro')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_pro_title" value="<?php echo e($credits->sonar_pro_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_pro_description" value="<?php echo e($credits->sonar_pro_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar Pro')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_pro_input_token" value="<?php echo e($credits->sonar_pro_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar Pro')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_pro_output_token" value="<?php echo e($credits->sonar_pro_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="sonar_pro_new" class="custom-switch-input" <?php if($credits->sonar_pro_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Sonar')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_title" value="<?php echo e($credits->sonar_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="sonar_description" value="<?php echo e($credits->sonar_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_input_token" value="<?php echo e($credits->sonar_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Sonar')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="sonar_output_token" value="<?php echo e($credits->sonar_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="sonar_new" class="custom-switch-input" <?php if($credits->sonar_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>
						</div>

						<hr>

						<h6 class="font-weight-bold text-center mb-6 mt-6 fs-14"><?php echo e(__('Amazon Nova Models')); ?></h6>

						<div class="row pl-5 pr-5">							
							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Nova Pro')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="nova_pro_title" value="<?php echo e($credits->nova_pro_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="nova_pro_description" value="<?php echo e($credits->nova_pro_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Nova Pro')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="nova_pro_input_token" value="<?php echo e($credits->nova_pro_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Nova Pro')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="nova_pro_output_token" value="<?php echo e($credits->nova_pro_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box mb-2">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="nova_pro_new" class="custom-switch-input" <?php if($credits->nova_pro_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Nova Lite')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="nova_lite_title" value="<?php echo e($credits->nova_lite_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="nova_lite_description" value="<?php echo e($credits->nova_lite_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Nova Lite')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="nova_lite_input_token" value="<?php echo e($credits->nova_lite_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Nova Lite')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="nova_lite_output_token" value="<?php echo e($credits->nova_lite_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box mb-2">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="nova_lite_new" class="custom-switch-input" <?php if($credits->nova_lite_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 no-gutters mt-5">
								<div class="row">	
									<h6 class="font-weight-bold fs-12"><?php echo e(__('Nova Micro')); ?> <span class="text-required"><i class="fa-solid fa-asterisk ml-1"></i></span></h6>
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="nova_micro_title" value="<?php echo e($credits->nova_micro_title); ?>" placeholder="Model Name">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box">			
											<div class="form-group">							    
												<input type="text" class="form-control" name="nova_micro_description" value="<?php echo e($credits->nova_micro_description); ?>" placeholder="Model Description">
											</div> 	
										</div>									
									</div> 
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Nova Micro')); ?> (<?php echo e(__('Input Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="nova_micro_input_token" value="<?php echo e($credits->nova_micro_input_token); ?>" placeholder="Input Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-md-6 col-sm-12">						
										<div class="input-box mb-2">	
											<h6 class="text-muted"><?php echo e(__('Nova Micro')); ?> (<?php echo e(__('Output Tokens')); ?>)</h6>		
											<div class="form-group">							    
												<input type="number" min="0.001" step="0.001" class="form-control" name="nova_micro_output_token" value="<?php echo e($credits->nova_micro_output_token); ?>" placeholder="Output Token Cost">
											</div> 	
										</div>									
									</div> 	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box mb-2">
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="nova_micro_new" class="custom-switch-input" <?php if($credits->nova_micro_new): ?> checked <?php endif; ?>>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-label text-muted fs-12"><?php echo e(__('Show as New Model')); ?></span>
												</label>
											</div>
										</div>
									</div>	
								</div>											
							</div>
						</div>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<button type="submit" class="btn ripple btn-primary pl-9 pr-9 pt-3 pb-3"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/admin/davinci/configuration/api.blade.php ENDPATH**/ ?>