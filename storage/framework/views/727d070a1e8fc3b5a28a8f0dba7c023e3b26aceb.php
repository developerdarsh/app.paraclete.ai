
<?php $__env->startSection('css'); ?>
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/highlight/highlight.dark.min.css')); ?>" rel="stylesheet" />
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
	<form id="openai-form" action="" method="GET" enctype="multipart/form-data" class="mt-24">		
		<?php echo csrf_field(); ?>
		<div class="text-center"><a class="info-btn-alt" data-bs-toggle="modal" data-bs-target="#info-alert-model" href="javascript:void(0)">How It works ?</a></div>
		<div class="row justify-content-md-center">	
			<div class="col-sm-12 text-center">
				<h3 class="card-title fs-20 mb-3 super-strong">
					<svg width="30px" height="30px" viewBox="0 -43.5 1111 1111" class="icon mr-2" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
						<g id="SVGRepo_bgCarrier" stroke-width="0"/>						
						<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>						
						<g id="SVGRepo_iconCarrier">						
						<path d="M672.914286 144.091429c-1.462857-0.731429 212.114286 196.022857 212.114285 196.022857V775.314286h87.771429v-452.022857s-264.777143-264.045714-266.24-264.777143H277.942857c-48.274286 0-87.771429 39.497143-87.771428 87.771428h87.771428s397.897143-0.731429 394.971429-2.194285z m-394.971429 711.68v-629.028572h-87.771428v629.028572c0 48.274286 39.497143 87.771429 87.771428 87.771428h607.085714c48.274286 0 87.771429-39.497143 87.771429-87.771428h-87.771429-607.085714z" fill="#007bff"/>						
						<path d="M365.714286 504.685714h424.228571v263.314286h-424.228571z" fill="#A8C8E6"/>						
						<path d="M365.714286 680.228571h424.228571v87.771429h-424.228571z" fill="#61B6F2"/>						
						<path d="M365.714286 504.685714h424.228571v87.771429h-424.228571z" fill="#FC830A"/>						
						<path d="M869.668571 345.234286l-12.434285-33.645715-2.925715 51.2 43.885715-40.96h-237.714286l43.885714 43.885715 0.731429-263.314286h-14.628572l-31.451428 30.72 210.651428 212.114286z m-161.645714-287.451429h-90.697143l-0.731428 351.085714h322.56l6.582857-111.908571-237.714286-239.177143z" fill="#007bff"/>						
						</g>						
					</svg>
				  <?php echo e(__('AI File Chat')); ?>

				</h3>
				<h6 class="mb-0 fs-12 text-muted"><?php echo e(__('Analyze the content of your Word/PDF/CSV documents with the help of AI')); ?></h6>
				<div class="mb-4" id="balance-status">
					<?php if (isset($component)) { $__componentOriginal221f5bfb272fac1e0cede7f43069a34d3b82f6b9 = $component; } ?>
<?php $component = App\View\Components\BalanceChat::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('balance-chat'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BalanceChat::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal221f5bfb272fac1e0cede7f43069a34d3b82f6b9)): ?>
<?php $component = $__componentOriginal221f5bfb272fac1e0cede7f43069a34d3b82f6b9; ?>
<?php unset($__componentOriginal221f5bfb272fac1e0cede7f43069a34d3b82f6b9); ?>
<?php endif; ?>
				</div>
			</div>

			<div class="chat-main-container">
				<div class="chat-sidebar-container">
					<div class="chat-sidebar-search">	
						<div class="input-box relative">				
							<input id="chat-search" class="form-control" type="text" placeholder="<?php echo e(__('Search')); ?>">	
							<i class="fa-solid fa-magnifying-glass fs-14 text-muted chat-search-icon"></i>	
						</div>			
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-12 text-center pb-3">									
							<input type="file" class="pdf-input" style="display: none;" name="file" id="file" accept=".pdf, .csv, .docx">							
							<a class="btn btn-primary ripple pt-1 pb-1 pl-4 pr-4 mt-3" id="upload-pdf-button" href="javascript:void(0);"><i class="fa-solid fa-plus fs-8 mr-2"></i> <?php echo e(__('Upload Document')); ?></a>
						</div>
					</div>

					<div class="chat-sidebar-messages pt-0 mb-4">				
						<?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>						
							<?php if($loop->first): ?> <input type="hidden" name="_chat_id" value="<?php echo e($chat->id); ?>" /><?php endif; ?>
							<div class="chat-sidebar-message <?php if($loop->first): ?> selected-message <?php endif; ?>" id="<?php echo e($chat->id); ?>">
								<h6 class="chat-title mb-2 chat-small" id="title-<?php echo e($chat->id); ?>">
									<?php if($chat->type == 'pdf'): ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" class="mr-1" viewBox="0 0 75.320129 92.604164">
											<g transform="translate(53.548057 -183.975276) scale(1.4843)">
											<path fill="#ff2116" d="M-29.632812 123.94727c-3.551967 0-6.44336 2.89347-6.44336 6.44531v49.49804c0 3.55185 2.891393 6.44532 6.44336 6.44532H8.2167969c3.5519661 0 6.4433591-2.89335 6.4433591-6.44532v-40.70117s.101353-1.19181-.416015-2.35156c-.484969-1.08711-1.275391-1.84375-1.275391-1.84375a1.0584391 1.0584391 0 0 0-.0059-.008l-9.3906254-9.21094a1.0584391 1.0584391 0 0 0-.015625-.0156s-.8017392-.76344-1.9902344-1.27344c-1.39939552-.6005-2.8417968-.53711-2.8417968-.53711l.021484-.002z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/>
											<path fill="#f5f5f5" d="M-29.632812 126.06445h28.3789058a1.0584391 1.0584391 0 0 0 .021484 0s1.13480448.011 1.96484378.36719c.79889772.34282 1.36536982.86176 1.36914062.86524.0000125.00001.00391.004.00391.004l9.3671868 9.18945s.564354.59582.837891 1.20899c.220779.49491.234375 1.40039.234375 1.40039a1.0584391 1.0584391 0 0 0-.002.0449v40.74609c0 2.41592-1.910258 4.32813-4.3261717 4.32813H-29.632812c-2.415914 0-4.326172-1.91209-4.326172-4.32813v-49.49804c0-2.41603 1.910258-4.32813 4.326172-4.32813z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/>
											<path fill="#ff2116" d="M-23.40766 161.09299c-1.45669-1.45669.11934-3.45839 4.39648-5.58397l2.69124-1.33743 1.04845-2.29399c.57665-1.26169 1.43729-3.32036 1.91254-4.5748l.8641-2.28082-.59546-1.68793c-.73217-2.07547-.99326-5.19438-.52872-6.31588.62923-1.51909 2.69029-1.36323 3.50626.26515.63727 1.27176.57212 3.57488-.18329 6.47946l-.6193 2.38125.5455.92604c.30003.50932 1.1764 1.71867 1.9475 2.68743l1.44924 1.80272 1.8033728-.23533c5.72900399-.74758 7.6912472.523 7.6912472 2.34476 0 2.29921-4.4984914 2.48899-8.2760865-.16423-.8499666-.59698-1.4336605-1.19001-1.4336605-1.19001s-2.3665326.48178-3.531704.79583c-1.202707.32417-1.80274.52719-3.564509 1.12186 0 0-.61814.89767-1.02094 1.55026-1.49858 2.4279-3.24833 4.43998-4.49793 5.1723-1.3991.81993-2.86584.87582-3.60433.13733zm2.28605-.81668c.81883-.50607 2.47616-2.46625 3.62341-4.28553l.46449-.73658-2.11497 1.06339c-3.26655 1.64239-4.76093 3.19033-3.98386 4.12664.43653.52598.95874.48237 2.01093-.16792zm21.21809-5.95578c.80089-.56097.68463-1.69142-.22082-2.1472-.70466-.35471-1.2726074-.42759-3.1031574-.40057-1.1249.0767-2.9337647.3034-3.2403347.37237 0 0 .993716.68678 1.434896.93922.58731.33544 2.0145161.95811 3.0565161 1.27706 1.02785.31461 1.6224.28144 2.0729-.0409zm-8.53152-3.54594c-.4847-.50952-1.30889-1.57296-1.83152-2.3632-.68353-.89643-1.02629-1.52887-1.02629-1.52887s-.4996 1.60694-.90948 2.57394l-1.27876 3.16076-.37075.71695s1.971043-.64627 2.97389-.90822c1.0621668-.27744 3.21787-.70134 3.21787-.70134zm-2.74938-11.02573c.12363-1.0375.1761-2.07346-.15724-2.59587-.9246-1.01077-2.04057-.16787-1.85154 2.23517.0636.8084.26443 2.19033.53292 3.04209l.48817 1.54863.34358-1.16638c.18897-.64151.47882-2.02015.64411-3.06364z"/>
											<path fill="#2c2c2c" d="M-20.930423 167.83862h2.364986q1.133514 0 1.840213.2169.706698.20991 1.189489.9446.482795.72769.482795 1.75625 0 .94459-.391832 1.6233-.391833.67871-1.056548.97958-.65772.30087-2.02913.30087h-.818651v3.72941h-1.581322zm1.581322 1.22447v3.33058h.783664q1.049552 0 1.44838-.39184.405826-.39183.405826-1.27345 0-.65772-.265887-1.06355-.265884-.41282-.587747-.50378-.314866-.098-1.000572-.098zm5.50664-1.22447h2.148082q1.560333 0 2.4909318.55276.9375993.55276 1.4133973 1.6443.482791 1.09153.482791 2.42096 0 1.3994-.4338151 2.49793-.4268149 1.09153-1.3154348 1.76324-.8816233.67172-2.5189212.67172h-2.267031zm1.581326 1.26645v7.018h.657715q1.378411 0 2.001144-.9516.6227329-.95858.6227329-2.5539 0-3.5125-2.6238769-3.5125zm6.4722254-1.26645h5.30372941v1.26645H-4.2075842v2.85478h2.9807225v1.26646h-2.9807225v4.16322h-1.5813254z" font-family="Franklin Gothic Medium Cond" letter-spacing="0" style="line-height:125%;-inkscape-font-specification:'Franklin Gothic Medium Cond'" word-spacing="4.26000023"/>
											</g>
									  	</svg>
									<?php elseif($chat->type == 'csv'): ?>
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"  class="mr-1" xmlns:xlink="http://www.w3.org/1999/xlink" 
											viewBox="0 0 303.188 303.188" width="20px" height="20px" xml:space="preserve">
											<g>
												<polygon style="fill:#E4E4E4;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>
												<polygon style="fill:#007934;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>
												<g>
													<g>
														<path style="fill:#A4A9AD;" d="M114.872,227.984c-2.982,0-5.311,1.223-6.982,3.666c-1.671,2.444-2.507,5.814-2.507,10.109
															c0,8.929,3.396,13.393,10.188,13.393c2.052,0,4.041-0.285,5.967-0.856c1.925-0.571,3.86-1.259,5.808-2.063v10.601
															c-3.872,1.713-8.252,2.57-13.14,2.57c-7.004,0-12.373-2.031-16.107-6.094c-3.734-4.062-5.602-9.934-5.602-17.615
															c0-4.803,0.904-9.023,2.714-12.663c1.809-3.64,4.411-6.438,7.808-8.395c3.396-1.957,7.39-2.937,11.98-2.937
															c5.016,0,9.808,1.09,14.378,3.27l-3.841,9.871c-1.713-0.805-3.428-1.481-5.141-2.031
															C118.681,228.26,116.841,227.984,114.872,227.984z"/>
														<path style="fill:#A4A9AD;" d="M166.732,250.678c0,2.878-0.729,5.433-2.191,7.665c-1.459,2.232-3.565,3.967-6.315,5.205
															c-2.751,1.237-5.977,1.856-9.681,1.856c-3.089,0-5.681-0.217-7.775-0.65c-2.095-0.434-4.274-1.191-6.538-2.27v-11.172
															c2.391,1.227,4.877,2.186,7.458,2.872c2.582,0.689,4.951,1.032,7.109,1.032c1.862,0,3.227-0.322,4.095-0.969
															c0.867-0.645,1.302-1.476,1.302-2.491c0-0.635-0.175-1.19-0.524-1.666c-0.349-0.477-0.91-0.958-1.682-1.444
															c-0.772-0.486-2.83-1.48-6.173-2.983c-3.026-1.375-5.296-2.708-6.809-3.999s-2.634-2.771-3.364-4.443s-1.095-3.65-1.095-5.936
															c0-4.273,1.555-7.605,4.666-9.997c3.109-2.391,7.384-3.587,12.822-3.587c4.803,0,9.7,1.111,14.694,3.333l-3.841,9.681
															c-4.337-1.989-8.082-2.984-11.234-2.984c-1.63,0-2.814,0.286-3.555,0.857s-1.111,1.28-1.111,2.127
															c0,0.91,0.471,1.725,1.412,2.443c0.941,0.72,3.496,2.031,7.665,3.936c3.999,1.799,6.776,3.729,8.331,5.792
															C165.955,244.949,166.732,247.547,166.732,250.678z"/>
														<path style="fill:#A4A9AD;" d="M199.964,218.368h14.027l-15.202,46.401H184.03l-15.139-46.401h14.092l6.316,23.519
															c1.312,5.227,2.031,8.865,2.158,10.918c0.148-1.481,0.443-3.333,0.889-5.555c0.443-2.222,0.835-3.967,1.174-5.236
															L199.964,218.368z"/>
													</g>
												</g>
												<polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/>
												<g>
													<rect x="134.957" y="80.344" style="fill:#007934;" width="33.274" height="15.418"/>
													<rect x="175.602" y="80.344" style="fill:#007934;" width="33.273" height="15.418"/>
													<rect x="134.957" y="102.661" style="fill:#007934;" width="33.274" height="15.419"/>
													<rect x="175.602" y="102.661" style="fill:#007934;" width="33.273" height="15.419"/>
													<rect x="134.957" y="124.979" style="fill:#007934;" width="33.274" height="15.418"/>
													<rect x="175.602" y="124.979" style="fill:#007934;" width="33.273" height="15.418"/>
													<rect x="94.312" y="124.979" style="fill:#007934;" width="33.273" height="15.418"/>
													<rect x="134.957" y="147.298" style="fill:#007934;" width="33.274" height="15.418"/>
													<rect x="175.602" y="147.298" style="fill:#007934;" width="33.273" height="15.418"/>
													<rect x="94.312" y="147.298" style="fill:#007934;" width="33.273" height="15.418"/>
													<g>
														<path style="fill:#007934;" d="M127.088,116.162h-10.04l-6.262-10.041l-6.196,10.041h-9.821l10.656-16.435L95.406,84.04h9.624
															l5.8,9.932l5.581-9.932h9.909l-10.173,16.369L127.088,116.162z"/>
													</g>
												</g>
											</g>
										</svg>
									<?php elseif($chat->type == 'docx'): ?>
										<svg width="20px" height="20px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
											<g id="SVGRepo_bgCarrier" stroke-width="0"/>										
											<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>										
											<g id="SVGRepo_iconCarrier">										
											<defs>										
											<linearGradient id="a" x1="4.494" y1="-1712.086" x2="13.832" y2="-1695.914" gradientTransform="translate(0 1720)" gradientUnits="userSpaceOnUse">										
											<stop offset="0" stop-color="#2368c4"/>										
											<stop offset="0.5" stop-color="#1a5dbe"/>										
											<stop offset="1" stop-color="#1146ac"/>										
											</linearGradient>										
											</defs>										
											<title>file_type_word</title>										
											<path d="M28.806,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5l11.069,3.25L30,9.5V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#41a5ee"/>										
											<path d="M30,9.5H8.512V16l11.069,1.95L30,16Z" style="fill:#2b7cd3"/>										
											<path d="M8.512,16v6.5L18.93,23.8,30,22.5V16Z" style="fill:#185abd"/>										
											<path d="M9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5H8.512v5.309A1.192,1.192,0,0,0,9.705,29Z" style="fill:#103f91"/>										
											<path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate"/>										
											<path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"/>										
											<path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"/>										
											<path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"/>										
											<path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)"/>										
											<path d="M6.9,17.988c.023.184.039.344.046.481h.028c.01-.13.032-.287.065-.47s.062-.338.089-.465l1.255-5.407h1.624l1.3,5.326a7.761,7.761,0,0,1,.162,1h.022a7.6,7.6,0,0,1,.135-.975l1.039-5.358h1.477l-1.824,7.748H10.591L9.354,14.742q-.054-.222-.122-.578t-.084-.52H9.127q-.021.189-.084.561c-.042.249-.075.432-.1.552L7.78,19.871H6.024L4.19,12.127h1.5l1.131,5.418A4.469,4.469,0,0,1,6.9,17.988Z" style="fill:#fff"/>										
											</g>										
										</svg>
									<?php endif; ?>
									
									  <?php echo e(__($chat->title)); ?>

								</h6>
								<a class="chat-url chat-small fs-10 text-muted" href="<?php echo e($chat->url); ?>" target="_blank"><i class="fa-solid fa-link fs-10 mr-2 text-muted"></i><?php echo e($chat->url); ?></a>
								<div class="chat-info mt-2">
									<div class="chat-count fs-10"><span><?php echo e($chat->messages); ?></span> <?php echo e(__('messages')); ?></div>
									<div class="chat-date fs-10"><?php echo e(\Carbon\Carbon::parse($chat->updated_at)->diffForhumans()); ?></div>
								</div>
								<div class="chat-actions d-flex">
									<a href="#" class="chat-edit fs-12" id="<?php echo e($chat->id); ?>"><i class="   fa-solid fa-pen-to-square" data-tippy-content="<?php echo e(__('Edit Name')); ?>"></i></a>
									<a href="#" class="chat-delete fs-12 ml-2" id="<?php echo e($chat->id); ?>"><i class="   fa-solid fa-trash" data-tippy-content="<?php echo e(__('Delete Chat')); ?>"></i></a>
								</div>
							</div>						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>												
					</div>
				</div>

				<div class="chat-message-container" id="chat-system">
					<div class="card-header">
						<div class="w-100 pt-2 pb-2">						
							<div class="d-flex">
								<div class="overflow-hidden mr-4"><img alt="Avatar" class="chat-avatar" src="<?php echo e(URL::asset('/chats/csv.jpg')); ?>"></div>
								<div class="widget-user-name"><span class="font-weight-bold"><?php echo e(__('AI File Bot')); ?></span><br><span class="text-muted"><?php echo e(__('Document Analyst Expert')); ?></span></div>
							</div>
						</div>
						<div class="text-right">											
							<a id="expand" class="template-button" href="#"><i class="fa-solid fa-bars table-action-buttons table-action-buttons-big edit-action-button" data-tippy-content="<?php echo e(__('Show Chat Conversations')); ?>"></i></a>
							<div class="btn-group" id="chat-export-button">
								<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" id="export" data-bs-display="static" aria-expanded="false" data-tippy-content="<?php echo e(__('Export Chat Conversation')); ?>"><i class="fa-solid fa-bars table-action-buttons table-action-buttons-big edit-action-button"></i></button>
								<div class="dropdown-menu" aria-labelledby="export" data-popper-placement="bottom-start">						
									<a class="dropdown-item" id="export-txt" onclick="exportTXT();"><i class="fa-solid fa-text-size fs-13 text-muted mr-2"></i><?php echo e(__('Text File')); ?></a>								
									<a class="dropdown-item" id="export-word" onclick="exportWord();"><i class="   fa-solid fa-file-word fs-13 text-muted mr-2"></i><?php echo e(__('MS Word')); ?></a>
									<a class="dropdown-item" id="export-pdf" onclick="exportPDF();"><i class="   fa-solid fa-file-pdf fs-13 text-muted mr-2"></i><?php echo e(__('PDF File')); ?></a>
								</div>
							</div>							
						</div>
					</div>
					<div class="card-body pl-0 pr-0">
						<div class="row">						
							<div class="col-md-12 col-sm-12" >									
								<div id="chat-container">
									<div class="msg left-msg" id="intro-drop-box">
										<div class="message-img" style="background-image: url('/chats/csv.jpg')"></div>
										<div class="message-bubble">					
											<div class="msg-text"><?php echo e(__('Hey there, I can help you get any insights out of your Word/PDF/CSV documents, what would you like to know?')); ?></div>
										</div>
									</div>
									<div id="image-drop-box">
										<div class="image-drop-area text-center">
											<div class="msg left-msg text-center mt-9">
												<div class="message-img" style="background-image: url('/chats/filebot.jpg')"></div>
												<div class="message-bubble">					
													<div class="msg-text"><?php echo e(__('Hey there, I can help you with analyzing any Word/PDF/CSV documents that share with me')); ?></div>
													<div class="msg-text"><?php echo e(__('Select and upload your documents to get started')); ?></div>
												</div>
											</div>											
										</div>
									</div>
									<div id="progress-drop-box" class="mt-9 text-center">
										<p id="progress-text" class="mt-8"></p>
									</div>									
									<div id="dynamic-inputs"></div>
									<div id="generating-status" class="text-center">
										<img src='<?php echo e(theme_url("img/svgs/code.svg")); ?>'>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">						
							<div class="col-sm-12">									
								<div class="input-box mb-0">								
									<div class="chat-controllers">										
										<textarea type="message" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="1" id="message" name="message" placeholder="<?php echo e(__('Type your message here...')); ?>"></textarea>
										<div class="chat-button-box"><a class="btn chat-button-icon" href="javascript:void(0)" id="mic-button"><i class="fa-solid fa-microphone"></i></a></div>
										<div class="chat-button-box no-margin-right"><a class="btn chat-button-icon" href="javascript:void(0)" id="stop-button"><i class="fa-solid fa-circle-stop"></i></a></div>
										<div><button class="btn ripple chat-button" id="chat-button"><?php echo e(__('Send')); ?> <i class="fa-solid fa-paper-plane-top ml-1"></i></button></div>										
									</div> 
									<div class="flex mt-3">
										<a class="btn btn-primary-chat fs-11 text-muted mb-2" href="javascript:void(0)" id="ai-model" data-bs-toggle="modal" data-bs-target="#aiModel">
											<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>
											<span><?php echo e(__('GPT-3.5 Turbo')); ?></span>
										</a>
										<?php if($brands_feature): ?>
											<a class="btn btn-primary-chat fs-11 text-muted mb-2" href="javascript:void(0)" id="brand-voice" data-bs-toggle="modal" data-bs-target="#brandVoice"><i class="fa-solid fa-signature mr-1"></i> <span><?php echo e(__('Brand Voice')); ?></span></a>
										<?php endif; ?>	
										<a class="btn btn-primary-chat fs-11 text-muted mb-2" href="javascript:void(0)" id="prompt-button-main" data-bs-toggle="modal" data-bs-target="#promptModal"><i class="fa-solid fa-notebook"></i> <span><?php echo e(__('Prompt Library')); ?></span></a>
									</div>
									<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<p class="text-danger"><?php echo e($errors->first('message')); ?></p>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div class="modal fade" id="promptModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		  	<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body pl-5 pr-5">
					<h6 class="text-center font-weight-extra-bold fs-16"><i class="fa-solid fa-notebook text-primary mr-2"></i> <?php echo e(__('Prompt Library')); ?></h6>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 p-4">
							<div id="chat-search-panel">
								<div class="search-template">
									<div class="input-box">								
										<div class="form-group prompt-search-bar-dark">							    
											<input type="text" class="form-control" id="search-template" placeholder="<?php echo e(__('Search for prompts...')); ?>">
										</div> 
									</div> 
								</div>
							</div>
						</div>	
					</div>				
					
					<div class="prompts-panel">
			
						<div class="tab-content" id="myTabContent">
			
							<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
								<div class="row" id="templates-panel">			
									<?php $__currentLoopData = $prompts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prompt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-md-6 col-sm-12" id="<?php echo e($prompt->group); ?>">
											<div class="prompt-boxes">
												<div class="card border-0" onclick='applyPrompt("<?php echo e(__($prompt->prompt)); ?>")'>
													<div class="card-body pt-3">
														<div class="template-title">
															<h6 class="mb-2 fs-15 number-font"><?php echo e(__($prompt->title)); ?></h6>
														</div>
														<div class="template-info">
															<p class="fs-13 text-muted mb-2"><?php echo e(__($prompt->prompt)); ?></p>
														</div>							
													</div>
												</div>
											</div>							
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
			
						</div>
					</div>
					
				</div>
		  	</div>
		</div>
	</div>

	<div class="modal fade" id="brandVoice" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		  	<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body pl-5 pr-5">
					<h6 class="text-center font-weight-extra-bold fs-16 mb-4"><i class="fa-solid fa-signature text-primary mr-2"></i> <?php echo e(__('Brand Voice')); ?></h6>			
					
					<div class="prompts-panel">
			
						<div class="tab-content" id="myTabContent">
			
							<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
								<div class="row" id="templates-panel">			
									<div class="col-sm-12">
										<div class="form-group mb-5">	
											<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Select Company')); ?></h6>								
											<select id="company" name="company" class="form-select"  onchange="updateService(this)">		
												<option value="none"> <?php echo e(__('Select your Company / Brand')); ?></option>
												<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($brand->id); ?>"> <?php echo e(__($brand->name)); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									
											</select>
										</div>
									</div>
		
									<div class="col-sm-12">
										<div class="form-group mb-5">
											<h6 class="fs-11 mb-2 font-weight-semibold"><?php echo e(__('Select Product / Service')); ?> </h6>
											<select id="service" name="service" class="form-select">
												<option value="none"><?php echo e(__('Select your Product / Service')); ?></option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">	
								<button type="button" class="btn-primary ripple btn pl-7 pr-7" data-bs-dismiss="modal"><?php echo e(__('Apply')); ?></button>
							</div>							
						</div>
					</div>
					
				</div>
		  	</div>
		</div>
	</div>

	<div class="modal fade" id="aiModel" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		  	<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body pl-5 pr-5">
					<h6 class="text-center font-weight-extra-bold fs-16 mb-4"><i class="fa-solid fa-microchip-ai text-primary mr-2"></i> <?php echo e(__('AI Models')); ?></h6>			
					
					<div class="prompts-panel">			
						<div class="tab-content" id="myTabContent">			
							<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
								<div class="flex" id="templates-panel">			
									<div class="row chat-model-box pl-5 pr-5 pt-2 pb-2">
										<?php if (isset($component)) { $__componentOriginal58c9e4f4ce17f2361b9300aef31f8b0b0b4021df = $component; } ?>
<?php $component = App\View\Components\OpenaiModelsChat::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('openai-models-chat'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\OpenaiModelsChat::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58c9e4f4ce17f2361b9300aef31f8b0b0b4021df)): ?>
<?php $component = $__componentOriginal58c9e4f4ce17f2361b9300aef31f8b0b0b4021df; ?>
<?php unset($__componentOriginal58c9e4f4ce17f2361b9300aef31f8b0b0b4021df); ?>
<?php endif; ?>
									</div>	
								</div>
							</div>
							<div class="text-center mt-3">	
								<button type="button" class="btn-primary ripple btn pl-7 pr-7" data-bs-dismiss="modal"><?php echo e(__('Apply')); ?></button>
							</div>							
						</div>
					</div>
					
				</div>
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
						<!--ARCADE EMBED START-->
						<div style="position: relative; padding-bottom: calc(56.25% + 41px); height: 0; width: 100%;"><iframe src="https://demo.arcade.software/aKjnRpd0YYbI86MyRm0K?embed&embed_mobile=tab&embed_desktop=inline&show_copy_link=true" title="AI File Chat" frameborder="0" loading="lazy" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="clipboard-write" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; color-scheme: light;" ></iframe></div>
						<!--ARCADE EMBED END-->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/pdf/html2canvas.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/pdf/jspdf.umd.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/highlight/highlight.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/highlight/showdown.min.js')); ?>"></script>
<script src="<?php echo e(theme_url('js/export-chat.js')); ?>"></script>
<script type="text/javascript">
	const main_form = get("#openai-form");
	const input_text = get("#message");
	const msgerChat = get("#chat-container");
	const dynamicList = get("#dynamic-inputs");
	const msgerSendBtn = get("#chat-button");
	const bot_avatar = "<?php echo e(URL::asset('/chats/csv.jpg')); ?>";	
	const user_avatar = "<?php echo e(theme_url(auth()->user()->profile_photo_path)); ?>";	
	const mic = document.querySelector('#mic-button');
	var fileExtension = '';
	let eventSource = null;
	let isTranscribing = false;
	let start_chat = false;
	let chat_code = "<?php echo e($chat_code); ?>";	
	let chat_model = "<?php echo e($default_model); ?>";
	let active_id;
	let proceed_further = true;
	var pdf_fileLimit = "<?php echo e($pdf_limit); ?>"; 
	var csv_fileLimit = "<?php echo e($csv_limit); ?>"; 
	var word_fileLimit = "<?php echo e($word_limit); ?>"; 
	let loading = `<span class="loading">
    <span style="background-color: #fff;"></span>
    <span style="background-color: #fff;"></span>
    <span style="background-color: #fff;"></span>
    </span>`;
	let loading_dark = `<span class="loading">
    <span style="background-color: #1e1e2d;"></span>
    <span style="background-color: #1e1e2d;"></span>
    <span style="background-color: #1e1e2d;"></span>
    </span>`;

	// Process deault conversation
	$(document).ready(function() {
		$(".chat-sidebar-message").first().focus().trigger('click');

		let check_messages = document.querySelectorAll('.chat-sidebar-message').length;
		if (check_messages == 0) {
			$('#intro-drop-box').addClass('block-display');
			$('#dynamic-inputs').html('');
			$('#image-drop-box').removeClass('hidden');
			$('#progress-drop-box').addClass('hidden');
			$('#intro-drop-box').addClass('block-display');
		}

		let model = '';
		let logo = '';

		switch (chat_model) {
			case 'gpt-3.5-turbo-0125':
				model = 'GPT 3.5 Turbo';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4':
				model = 'GPT 4';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4o':
				model = 'GPT 4o';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4o-mini':
				model = 'GPT 4o mini';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4-0125-preview':
				model = 'GPT 4 Turbo';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4-turbo-2024-04-09':
				model = 'GPT 4 Turbo Vision';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'o1-preview':
				model = 'o1 preview';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'o1-mini':
				model = 'o1 mini';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			default:
				model = 'Fine Tuned';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
		}

		let ai = document.getElementById('ai-model');
		ai.innerHTML = logo + model;
	});


	// Show chat history for conversation
	$(document).on('click', ".chat-sidebar-message", function (e) { 

		$('.chat-sidebar-message').removeClass('selected-message');
		$(this).addClass('selected-message');
		$('#dynamic-inputs').html('');
		$('#image-drop-box').addClass('hidden');
		$('#progress-drop-box').addClass('hidden');
		$('#generating-status').addClass('show-chat-loader');
		$('#intro-drop-box').removeClass('block-display');
		active_id = this.id;
		let code = makeid(10);

		$('.chat-sidebar-container').removeClass('extend');

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'POST',
			url: '/app/user/chat/file/conversation',
			data: { 'chat_id': active_id,},
			success: function (data) {

				$('#dynamic-inputs').html('');
				$('#generating-status').removeClass('show-chat-loader');
	
				start_chat = true;
				$('#dynamic-inputs').html('');
				$('#image-drop-box').addClass('hidden');
				$('#progress-drop-box').addClass('hidden');
				$('#intro-drop-box').removeClass('block-displays');
			
				for (const key in data['messages']) {

					if(data['messages'][key]['role'] == 'user') {
						appendMessage(user_avatar, "right", data['messages'][key]['content'], '');
					}

					if (data['messages'][key]['role'] == 'bot') {
						appendMessageSpecial(bot_avatar, "left", data['messages'][key]['content'], '');
					}
				}		
				
				hljs.highlightAll();
			},
			error: function(data) {
				toastr.warning('<?php echo e(__('There was an issue while retrieving chat history')); ?>');
			}
		});
		
	});


	// Rename conversation title
	$(document).on('click', '.chat-edit', function(e) {

		e.preventDefault();

		Swal.fire({
			title: '<?php echo e(__('Rename Chat Title')); ?>',
			showCancelButton: true,
			confirmButtonText: '<?php echo e(__('Rename')); ?>',
			reverseButtons: true,
			input: 'text',
		}).then((result) => {
			if (result.value) {
				var formData = new FormData();
				formData.append("name", result.value);
				formData.append("chat_id", $(this).attr('id'));
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: '/app/user/chat/file/rename',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data['status'] == 'success') {
							toastr.success('<?php echo e(__('Chat title has been updated successfully')); ?>');
							document.getElementById("title-"+data['chat_id']).innerHTML =  result.value;
						} else {
							toastr.error('<?php echo e(__('Chat title was not updated correctly')); ?>');
						}      
					},
					error: function(data) {
						Swal.fire('Update Error', data.responseJSON['error'], 'error');
					}
				})
			} else if (result.dismiss !== Swal.DismissReason.cancel) {
				Swal.fire('<?php echo e(__('No Title Entered')); ?>', '<?php echo e(__('Make sure to provide a new chat title before updating')); ?>', 'warning')
			}
		})
	});


	// Delete conversation	
	$(document).on('click', '.chat-delete', function(e) {

		e.preventDefault();

		Swal.fire({
			title: '<?php echo e(__('Confirm Chat Deletion')); ?>',
			text: '<?php echo e(__('It will permanently delete this chat history')); ?>',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '<?php echo e(__('Delete')); ?>',
			reverseButtons: true,
		}).then((result) => {
			if (result.isConfirmed) {
				var formData = new FormData();
				formData.append("chat_id", $(this).attr('id'));
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: '/app/user/chat/file/delete',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						
						if (data['status'] == 'success') {
							toastr.success('<?php echo e(__('Chat history has been successfully deleted')); ?>');

							$("#" + active_id).remove();	
							$('#dynamic-inputs').html('');	
							$(".chat-sidebar-message").first().focus().trigger('click');
							let check_messages = document.querySelectorAll('.chat-sidebar-message').length;

							if (check_messages == 0) {
							
								$('#dynamic-inputs').html('');
								$('#image-drop-box').removeClass('hidden');
								$('#progress-drop-box').addClass('hidden');
								$('#intro-drop-box').addClass('hidden');
							}						
						} else if (data['status'] == 'empty') { 
							$('#dynamic-inputs').html('');	
								
						}else {
							toastr.warning('<?php echo e(__('There was an issue while deleting chat conversation')); ?>');
						}      
					},
					error: function(data) {
						Swal.fire('Oops...','Something went wrong!', 'error')
					}
				})
			} 
		})
	});

	// Check textarea input
	$(function () {		
		main_form.addEventListener("submit", event => {
			event.preventDefault();
			const message = input_text.value;
			
			if (!start_chat) {
				toastr.warning('<?php echo e(__('Upload a valid document before analyzing')); ?>');
				return;
			}

			if (!message) {
				toastr.warning('<?php echo e(__('Type your message first before sending')); ?>');
				return;
			}
			

			checkBalance('process', message);

			if (proceed_further) {
				appendMessage(user_avatar, "right", message, '');
				input_text.value = "";
				process(message)
			}
		});

	});


	// Send chat message
	function process(message) {
		msgerSendBtn.disabled = true
		let model = document.querySelector('input[name="model"]:checked').value;
		let company = document.getElementById("company").value;
		let service = document.getElementById("service").value;

		let formData = new FormData();
		formData.append('message', message);
		formData.append('chat_id', active_id);
		formData.append('model', model);
		formData.append('company', company);
		formData.append('service', service);
		let code = makeid(10);
		appendMessage(bot_avatar, "left", "", code);
        let $msg_txt = $("#" + code);
		let $div = $("#chat-bubble-" + code);
		const progress = document.getElementById(code);
		progress.innerHTML = loading_dark;

		const response = document.getElementById(code);
		const chatbubble = document.getElementById('chat-bubble-' + code);
		let msg = '';
		let i = 0;

		fetch('/app/user/chat/file/process', {
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method: 'POST', 
				body: formData
			})		
			.then(async (res) => {
			

                response.innerHTML = "";
                const reader = res.body.getReader();
                const decoder = new TextDecoder();

                let text = "";
                while (true) {
                    const { value, done } = await reader.read();
                    if (done) break;
                    text += decoder.decode(value, { stream: true });


					text = text.replace(/(?:\r\n|\r|\n)/g, '<br>');
							
                    response.innerHTML = text;
			
					msgerChat.scrollTop += 100;
                }

				msgerSendBtn.disabled = false
				//calculateCredits();
            })
            .catch((e) => {
                console.log(e);
				msgerSendBtn.disabled = false
            });	

	}


	// Counter for words
	function animateValue(id, start, end, duration) {
		if (start === end) return;
		var range = end - start;
		var current = start;
		var increment = end > start? 1 : -1;
		var stepTime = Math.abs(Math.floor(duration / range));
		var obj = document.getElementById(id);
		var timer = setInterval(function() {
			current += increment;
			if (current > 0) {
				obj.innerHTML = current;
			} else {
				obj.innerHTML = 0;
			}
			
			if (current == end) {
				clearInterval(timer);
			}
		}, stepTime);
	}

	// Display chat messages (bot and user)
	function appendMessage(img, side, text, code) {
		let msgHTML;
		text = escape_html(text);
				
		if (side == 'left' && text == '') {
			msgHTML = `
			<div class="msg ${side}-msg">
			<div class="message-img" style="background-image: url(${img})"></div>
			<div class="message-bubble" id="chat-bubble-${code}" data-message="${text}">
				<div class="msg-text" id="${code}"></div>
				<a href="#" class="copy"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" fill="currentColor" width="20"> <path d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z"></path> </svg></a>
			</div>
			</div>`;
		} else {
			if (side == 'left') {
				msgHTML = `
				<div class="msg ${side}-msg">
				<div class="message-img" style="background-image: url(${img})"></div>
				<div class="message-bubble" id="chat-bubble-${code}" data-message="${text}">
					<div class="msg-text" id="${code}">${text}</div>
					<a href="#" class="copy"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" fill="currentColor" width="20"> <path d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z"></path> </svg></a>
				</div>
				</div>`;
			} else {
				msgHTML = `
				<div class="msg ${side}-msg">
				<div class="message-img" style="background-image: url(${img})"></div>
				<div class="message-bubble" id="chat-bubble-${code}">
					<div class="msg-text" id="${code}">${text}</div>
				</div>
				</div>`;				
			}
			
		}

		dynamicList.insertAdjacentHTML("beforeend", msgHTML);
		msgerChat.scrollTop += 500;
	}

	function appendMessageSpecial(img, side, text, code, code) {
		let msgHTML;
		let copy_text = text;
		text = escape_html(text);

		msgHTML = `
		<div class="msg ${side}-msg">
		<div class="message-img" style="background-image: url(${img})"></div>
		<div class="message-bubble" id="chat-bubble-${code}" data-message="${copy_text}">
			<div class="msg-text" id="${code}">${text}</div>
			<a href="#" class="copy"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" fill="currentColor" width="20"> <path d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z"></path> </svg></a>
		</div>
		</div>`;
			
		dynamicList.insertAdjacentHTML("beforeend", msgHTML);
		msgerChat.scrollTop += 500;
	}

	function get(selector, root = document) {
		return root.querySelector(selector);
	}

	// Generate a random value
	function makeid(length) {
		let result = '';
		const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		const charactersLength = characters.length;
		let counter = 0;
		while (counter < length) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
			counter += 1;
		}
		return result;
	}

	function nl2br (str, is_xhtml) {
     	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
     	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
  	} 

	$("#expand").on('click', function (e) {
        $('.chat-sidebar-container').toggleClass('extend');
    });


	// Search chat history
	$('#chat-search').on('keyup', function () {
        var search = $(this).val().toLowerCase();
        $('.chat-sidebar-messages').find('.chat-sidebar-message').each(function () {
            if ($(this).filter(function() {
                return $(this).find('h6').text().toLowerCase().indexOf(search) > -1;
            }).length > 0 || search.length < 1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });


	// Send via keyboard shortcuts
	$('#message').on('keypress', function (e) {
		if (e.keyCode == 13 && !e.shiftKey) {
			e.preventDefault();
			const message = input_text.value;
			if (!start_chat) {
				toastr.warning('<?php echo e(__('Upload a valid document before analyzing')); ?>');
				return;
			}
			
			if (!message) {
				toastr.warning('<?php echo e(__('Type your message first before sending')); ?>');
				return;
			}			

			checkBalance('process', message);

			if (proceed_further) {
				appendMessage(user_avatar, "right", message, '');
				input_text.value = "";
				process(message)
			}
		}
    });


	// Capture input text via microphone
    if(mic) {
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            const speechRecognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

            speechRecognition.continuous = true;

            speechRecognition.addEventListener('start', () => {
                $("#mic-button").find('i').removeClass('fa-microphone').addClass('fa-stop-circle');
            });

            speechRecognition.addEventListener('result', (event) => {
                const transcript = event.results[0][0].transcript;
                $("#message").val($("#message").val() + transcript + ' ');

                mic.click();
            });

            speechRecognition.addEventListener('end', () => {
                $("#mic-button").find('i').addClass('fa-microphone').removeClass('fa-stop-circle');
                isTranscribing = false;
            });

            mic.addEventListener('click', () => {
                if (!isTranscribing) {
                    speechRecognition.start();
                    isTranscribing = true;
                } else {
                    speechRecognition.stop();
                    isTranscribing = false;
                }
            });
        } else {
            console.log('Web Speech Recognition API not supported by this browser');
            $("#mic-button").hide()
        }
    }


	// Stop chat response
	$('#stop-button').on('click', function(e){
        e.preventDefault();

        if(eventSource){
            eventSource.close();
			msgerSendBtn.disabled = false
        }
    });


	// Apply prompt
	function applyPrompt(prompt) {
		$('#message').text(prompt);
	}


	// Search prompt
	$(document).on('keyup', '#search-template', function () {
		var searchTerm = $(this).val().toLowerCase();
		$('#templates-panel').find('> div').each(function () {
			if ($(this).filter(function() {
				return (($(this).find('h6').text().toLowerCase().indexOf(searchTerm) > -1) || ($(this).find('p').text().toLowerCase().indexOf(searchTerm) > -1));
			}).length > 0 || searchTerm.length < 1) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});


	function escape_html (str) {
        let converter = new showdown.Converter({openLinksInNewWindow: true});
        converter.setFlavor('github');
        str = converter.makeHtml(str);

        /* add copy button */
        str = str.replaceAll('</code></pre>', '</code><button type="button" class="copy-code" onclick="copyCode(this)"><span class="label-copy-code"><?php echo e(__('Copy')); ?></span></button></pre>');

        return str;
    }

	function copyCode(button) {
		const pre = button.parentElement;
		const code = pre.querySelector('code');
		const range = document.createRange();
		range.selectNode(code);
		window.getSelection().removeAllRanges();
		window.getSelection().addRange(range);
		document.execCommand("copy");
		window.getSelection().removeAllRanges();
		toastr.success('<?php echo e(__('Code has been copied successfully')); ?>');
	}

	$(document).on('click', ".copy", function (e) {

		var textArea = document.createElement("textarea");
		textArea.value = $(this).parents('.message-bubble').data('message');
		textArea.style.top = "0";
		textArea.style.left = "0";
		textArea.style.position = "fixed";
		document.body.appendChild(textArea);
		textArea.focus();
		textArea.select();

		try {
			document.execCommand('copy');
		} catch (err) {
		}

		document.body.removeChild(textArea);
		toastr.success('<?php echo e(__('Response has been copied successfully')); ?>');
	});

	var input_pdf = document.getElementById("file");

	input_pdf.addEventListener('change', function(){
		var files = input_pdf.files;
		var fileSize = files[0].size; 
		var fileName = files[0].name;
		fileExtension = fileName.split('.')[1]
		var fileSizeInKB = (fileSize/1024)/1024; 
		
		if (fileExtension == 'pdf') {
			if(fileSizeInKB < pdf_fileLimit){

				checkBalance('analyze', 'none');

				if (proceed_further) {
					analyze(files);
				}

			} else {   
				toastr.warning('<?php echo e(__('Selected PDF file is too big. ')); ?><?php echo e(__('Maximum allowed file size is ')); ?>'+pdf_fileLimit+'MB');
			}

		} else if (fileExtension == 'csv') {
			if(fileSizeInKB < csv_fileLimit){

				checkBalance('analyze', 'none');

				if (proceed_further) {
					analyze(files);
				}

			} else {   
				toastr.warning('<?php echo e(__('Selected CSV file is too big. ')); ?><?php echo e(__('Maximum allowed file size is ')); ?>'+csv_fileLimit+'MB');
			}
		} else if (fileExtension == 'docx') {
			if(fileSizeInKB < word_fileLimit){

				checkBalance('analyze', 'none');

				if (proceed_further) {
					analyze(files);
				}

			} else {   
				toastr.warning('<?php echo e(__('Selected Word file is too big. ')); ?><?php echo e(__('Maximum allowed file size is ')); ?>'+word_fileLimit+'MB');
			}
		}
		
	});

	function analyze(files) {

		msgerSendBtn.disabled = true
		let formData = new FormData();
		formData.append('file', files[0]);

        const progress = document.getElementById("progress-text");
        const btn = document.getElementById("upload-pdf-button");
        progress.style.marginTop = "8rem";
		progress.innerHTML = loading_dark;
		$('#dynamic-inputs').html('');
		$('#image-drop-box').addClass('hidden');
		$('#progress-drop-box').removeClass('hidden');
		$('#intro-drop-box').addClass('block-display');
        btn.innerHTML = loading;
		let new_chat_id = '';

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'post',
			url: '/app/user/chat/file/embedding',
			data: formData,
			processData: false,
			contentType: false,
			success: function (data) {
				if (data['status'] == 'success') {
					toastr.success('<?php echo e(__('Uploaded document has been analyzed')); ?>');
					new_chat_id = data['id'];
					$('#progress-drop-box').addClass('hidden');
					$('#intro-drop-box').removeClass('block-display');
					createConversationBox(new_chat_id);				
					start_chat = true;		
					msgerSendBtn.disabled = false;
					btn.innerHTML = "<?php echo e(__('Upload Document')); ?>";
					setTimeout(() => toastr.success('<?php echo e(__('You can start your chat session now')); ?>'), 2000);					
				} 

				if (data['status'] == 'error') {
					toastr.error(data['message']);
					msgerSendBtn.disabled = false;
					btn.innerHTML = "<?php echo e(__('Upload Document')); ?>";
				}
			},
			error: function(data) {
				toastr.error('<?php echo e(__('There was an error analyzing your document, please contact support')); ?>');
				progress.innerText = "";
				start_chat = false;
				msgerSendBtn.disabled = false;
				$('#progress-drop-box').addClass('hidden');
				$('#image-drop-box').removeClass('hidden');
				$('#intro-drop-box').addClass('block-display');
				btn.innerHTML = "<?php echo e(__('Upload Document')); ?>";
			}
		});

    }

	function checkBalance(task, message) {
		let model = document.querySelector('input[name="model"]:checked').value;
		
		var formData = new FormData();
		formData.append("task", task);
		formData.append("message", message);
		formData.append("model", model);

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'post',
			url: '/app/user/chat/file/check-balance',
			data: formData,
			processData: false,
			contentType: false,
			success: function (data) {
				if (data['status'] == 'success') {
					proceed_further = true;
				} else {
					toastr.warning(data['message']);
					proceed_further = false;
				}
			},
			error: function(data) {
				Swal.fire('Update Error', data.responseJSON['error'], 'error');
			}
		});

	}

	function createConversationBox(new_chat_id) {
		var formData = new FormData();
		formData.append("chat_id", new_chat_id);
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'post',
			url: '/app/user/chat/file/metainfo',
			data: formData,
			processData: false,
			contentType: false,
			success: function (data) {
				console.log(data)
				if (data['status'] == 'success') {

					var element = document.getElementById(active_id);
					if (element) {
						element.classList.remove("selected-message");
					}

					let id = data['id'];
					let title = data['title'];
					let url = data['url'];
					let icon = '';

					if (fileExtension == 'pdf') {
						icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" class="mr-1" viewBox="0 0 75.320129 92.604164"><g transform="translate(53.548057 -183.975276) scale(1.4843)"><path fill="#ff2116" d="M-29.632812 123.94727c-3.551967 0-6.44336 2.89347-6.44336 6.44531v49.49804c0 3.55185 2.891393 6.44532 6.44336 6.44532H8.2167969c3.5519661 0 6.4433591-2.89335 6.4433591-6.44532v-40.70117s.101353-1.19181-.416015-2.35156c-.484969-1.08711-1.275391-1.84375-1.275391-1.84375a1.0584391 1.0584391 0 0 0-.0059-.008l-9.3906254-9.21094a1.0584391 1.0584391 0 0 0-.015625-.0156s-.8017392-.76344-1.9902344-1.27344c-1.39939552-.6005-2.8417968-.53711-2.8417968-.53711l.021484-.002z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/><path fill="#f5f5f5" d="M-29.632812 126.06445h28.3789058a1.0584391 1.0584391 0 0 0 .021484 0s1.13480448.011 1.96484378.36719c.79889772.34282 1.36536982.86176 1.36914062.86524.0000125.00001.00391.004.00391.004l9.3671868 9.18945s.564354.59582.837891 1.20899c.220779.49491.234375 1.40039.234375 1.40039a1.0584391 1.0584391 0 0 0-.002.0449v40.74609c0 2.41592-1.910258 4.32813-4.3261717 4.32813H-29.632812c-2.415914 0-4.326172-1.91209-4.326172-4.32813v-49.49804c0-2.41603 1.910258-4.32813 4.326172-4.32813z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/><path fill="#ff2116" d="M-23.40766 161.09299c-1.45669-1.45669.11934-3.45839 4.39648-5.58397l2.69124-1.33743 1.04845-2.29399c.57665-1.26169 1.43729-3.32036 1.91254-4.5748l.8641-2.28082-.59546-1.68793c-.73217-2.07547-.99326-5.19438-.52872-6.31588.62923-1.51909 2.69029-1.36323 3.50626.26515.63727 1.27176.57212 3.57488-.18329 6.47946l-.6193 2.38125.5455.92604c.30003.50932 1.1764 1.71867 1.9475 2.68743l1.44924 1.80272 1.8033728-.23533c5.72900399-.74758 7.6912472.523 7.6912472 2.34476 0 2.29921-4.4984914 2.48899-8.2760865-.16423-.8499666-.59698-1.4336605-1.19001-1.4336605-1.19001s-2.3665326.48178-3.531704.79583c-1.202707.32417-1.80274.52719-3.564509 1.12186 0 0-.61814.89767-1.02094 1.55026-1.49858 2.4279-3.24833 4.43998-4.49793 5.1723-1.3991.81993-2.86584.87582-3.60433.13733zm2.28605-.81668c.81883-.50607 2.47616-2.46625 3.62341-4.28553l.46449-.73658-2.11497 1.06339c-3.26655 1.64239-4.76093 3.19033-3.98386 4.12664.43653.52598.95874.48237 2.01093-.16792zm21.21809-5.95578c.80089-.56097.68463-1.69142-.22082-2.1472-.70466-.35471-1.2726074-.42759-3.1031574-.40057-1.1249.0767-2.9337647.3034-3.2403347.37237 0 0 .993716.68678 1.434896.93922.58731.33544 2.0145161.95811 3.0565161 1.27706 1.02785.31461 1.6224.28144 2.0729-.0409zm-8.53152-3.54594c-.4847-.50952-1.30889-1.57296-1.83152-2.3632-.68353-.89643-1.02629-1.52887-1.02629-1.52887s-.4996 1.60694-.90948 2.57394l-1.27876 3.16076-.37075.71695s1.971043-.64627 2.97389-.90822c1.0621668-.27744 3.21787-.70134 3.21787-.70134zm-2.74938-11.02573c.12363-1.0375.1761-2.07346-.15724-2.59587-.9246-1.01077-2.04057-.16787-1.85154 2.23517.0636.8084.26443 2.19033.53292 3.04209l.48817 1.54863.34358-1.16638c.18897-.64151.47882-2.02015.64411-3.06364z"/><path fill="#2c2c2c" d="M-20.930423 167.83862h2.364986q1.133514 0 1.840213.2169.706698.20991 1.189489.9446.482795.72769.482795 1.75625 0 .94459-.391832 1.6233-.391833.67871-1.056548.97958-.65772.30087-2.02913.30087h-.818651v3.72941h-1.581322zm1.581322 1.22447v3.33058h.783664q1.049552 0 1.44838-.39184.405826-.39183.405826-1.27345 0-.65772-.265887-1.06355-.265884-.41282-.587747-.50378-.314866-.098-1.000572-.098zm5.50664-1.22447h2.148082q1.560333 0 2.4909318.55276.9375993.55276 1.4133973 1.6443.482791 1.09153.482791 2.42096 0 1.3994-.4338151 2.49793-.4268149 1.09153-1.3154348 1.76324-.8816233.67172-2.5189212.67172h-2.267031zm1.581326 1.26645v7.018h.657715q1.378411 0 2.001144-.9516.6227329-.95858.6227329-2.5539 0-3.5125-2.6238769-3.5125zm6.4722254-1.26645h5.30372941v1.26645H-4.2075842v2.85478h2.9807225v1.26646h-2.9807225v4.16322h-1.5813254z" letter-spacing="0" style="line-height:125%;-inkscape-font-specification:Franklin Gothic Medium Cond" word-spacing="4.26000023"/></g></svg>';
					} else if (fileExtension == 'csv') {
						icon = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"  class="mr-1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 303.188 303.188" width="20px" height="20px" xml:space="preserve"><g><polygon style="fill:#E4E4E4;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 "/><polygon style="fill:#007934;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/><g><g><path style="fill:#A4A9AD;" d="M114.872,227.984c-2.982,0-5.311,1.223-6.982,3.666c-1.671,2.444-2.507,5.814-2.507,10.109c0,8.929,3.396,13.393,10.188,13.393c2.052,0,4.041-0.285,5.967-0.856c1.925-0.571,3.86-1.259,5.808-2.063v10.601c-3.872,1.713-8.252,2.57-13.14,2.57c-7.004,0-12.373-2.031-16.107-6.094c-3.734-4.062-5.602-9.934-5.602-17.615c0-4.803,0.904-9.023,2.714-12.663c1.809-3.64,4.411-6.438,7.808-8.395c3.396-1.957,7.39-2.937,11.98-2.937c5.016,0,9.808,1.09,14.378,3.27l-3.841,9.871c-1.713-0.805-3.428-1.481-5.141-2.031C118.681,228.26,116.841,227.984,114.872,227.984z"/><path style="fill:#A4A9AD;" d="M166.732,250.678c0,2.878-0.729,5.433-2.191,7.665c-1.459,2.232-3.565,3.967-6.315,5.205c-2.751,1.237-5.977,1.856-9.681,1.856c-3.089,0-5.681-0.217-7.775-0.65c-2.095-0.434-4.274-1.191-6.538-2.27v-11.172c2.391,1.227,4.877,2.186,7.458,2.872c2.582,0.689,4.951,1.032,7.109,1.032c1.862,0,3.227-0.322,4.095-0.969c0.867-0.645,1.302-1.476,1.302-2.491c0-0.635-0.175-1.19-0.524-1.666c-0.349-0.477-0.91-0.958-1.682-1.444c-0.772-0.486-2.83-1.48-6.173-2.983c-3.026-1.375-5.296-2.708-6.809-3.999s-2.634-2.771-3.364-4.443s-1.095-3.65-1.095-5.936c0-4.273,1.555-7.605,4.666-9.997c3.109-2.391,7.384-3.587,12.822-3.587c4.803,0,9.7,1.111,14.694,3.333l-3.841,9.681c-4.337-1.989-8.082-2.984-11.234-2.984c-1.63,0-2.814,0.286-3.555,0.857s-1.111,1.28-1.111,2.127c0,0.91,0.471,1.725,1.412,2.443c0.941,0.72,3.496,2.031,7.665,3.936c3.999,1.799,6.776,3.729,8.331,5.792C165.955,244.949,166.732,247.547,166.732,250.678z"/><path style="fill:#A4A9AD;" d="M199.964,218.368h14.027l-15.202,46.401H184.03l-15.139-46.401h14.092l6.316,23.519c1.312,5.227,2.031,8.865,2.158,10.918c0.148-1.481,0.443-3.333,0.889-5.555c0.443-2.222,0.835-3.967,1.174-5.236L199.964,218.368z"/></g></g><polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/><g><rect x="134.957" y="80.344" style="fill:#007934;" width="33.274" height="15.418"/><rect x="175.602" y="80.344" style="fill:#007934;" width="33.273" height="15.418"/><rect x="134.957" y="102.661" style="fill:#007934;" width="33.274" height="15.419"/><rect x="175.602" y="102.661" style="fill:#007934;" width="33.273" height="15.419"/><rect x="134.957" y="124.979" style="fill:#007934;" width="33.274" height="15.418"/><rect x="175.602" y="124.979" style="fill:#007934;" width="33.273" height="15.418"/><rect x="94.312" y="124.979" style="fill:#007934;" width="33.273" height="15.418"/><rect x="134.957" y="147.298" style="fill:#007934;" width="33.274" height="15.418"/><rect x="175.602" y="147.298" style="fill:#007934;" width="33.273" height="15.418"/><rect x="94.312" y="147.298" style="fill:#007934;" width="33.273" height="15.418"/><g><path style="fill:#007934;" d="M127.088,116.162h-10.04l-6.262-10.041l-6.196,10.041h-9.821l10.656-16.435L95.406,84.04h9.624l5.8,9.932l5.581-9.932h9.909l-10.173,16.369L127.088,116.162z"/></g></g></g></svg>';
					} else if (fileExtension == 'docx') {
						icon = '<svg width="20px" height="20px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"><defs><linearGradient id="a" x1="4.494" y1="-1712.086" x2="13.832" y2="-1695.914" gradientTransform="translate(0 1720)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2368c4"/><stop offset="0.5" stop-color="#1a5dbe"/><stop offset="1" stop-color="#1146ac"/></linearGradient></defs><title>file_type_word</title><path d="M28.806,3H9.705A1.192,1.192,0,0,0,8.512,4.191h0V9.5l11.069,3.25L30,9.5V4.191A1.192,1.192,0,0,0,28.806,3Z" style="fill:#41a5ee"/><path d="M30,9.5H8.512V16l11.069,1.95L30,16Z" style="fill:#2b7cd3"/><path d="M8.512,16v6.5L18.93,23.8,30,22.5V16Z" style="fill:#185abd"/><path d="M9.705,29h19.1A1.192,1.192,0,0,0,30,27.809h0V22.5H8.512v5.309A1.192,1.192,0,0,0,9.705,29Z" style="fill:#103f91"/><path d="M16.434,8.2H8.512V24.45h7.922a1.2,1.2,0,0,0,1.194-1.191V9.391A1.2,1.2,0,0,0,16.434,8.2Z" style="opacity:0.10000000149011612;isolation:isolate"/><path d="M15.783,8.85H8.512V25.1h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"/><path d="M15.783,8.85H8.512V23.8h7.271a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.783,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"/><path d="M15.132,8.85H8.512V23.8h6.62a1.2,1.2,0,0,0,1.194-1.191V10.041A1.2,1.2,0,0,0,15.132,8.85Z" style="opacity:0.20000000298023224;isolation:isolate"/><path d="M3.194,8.85H15.132a1.193,1.193,0,0,1,1.194,1.191V21.959a1.193,1.193,0,0,1-1.194,1.191H3.194A1.192,1.192,0,0,1,2,21.959V10.041A1.192,1.192,0,0,1,3.194,8.85Z" style="fill:url(#a)"/><path d="M6.9,17.988c.023.184.039.344.046.481h.028c.01-.13.032-.287.065-.47s.062-.338.089-.465l1.255-5.407h1.624l1.3,5.326a7.761,7.761,0,0,1,.162,1h.022a7.6,7.6,0,0,1,.135-.975l1.039-5.358h1.477l-1.824,7.748H10.591L9.354,14.742q-.054-.222-.122-.578t-.084-.52H9.127q-.021.189-.084.561c-.042.249-.075.432-.1.552L7.78,19.871H6.024L4.19,12.127h1.5l1.131,5.418A4.469,4.469,0,0,1,6.9,17.988Z" style="fill:#fff"/></g></svg>';
					}
					
					$('.chat-sidebar-messages').prepend(`<div class="chat-sidebar-message selected-message" id=${id}>
						<h6 class="chat-title chat-small mb-2" id="title-${id}">
							${icon}${title}
						</h6>
						<a class="chat-url chat-small fs-10 text-muted" href="${url}"><i class="fa-solid fa-link fs-10 mr-2 text-muted"></i>${url}</a>
						<div class="chat-info mt-2">
							<div class="chat-count fs-10"><span>0</span> <?php echo e(__('messages')); ?></div>
							<div class="chat-date fs-10"><?php echo e(__('Now')); ?></div>
						</div>
						<div class="chat-actions d-flex">
							<a href="#" class="chat-edit fs-12" id="${id}"><i class="   fa-solid fa-pen-to-square" data-tippy-content="<?php echo e(__('Edit Name')); ?>"></i></a>
							<a href="#" class="chat-delete fs-12 ml-2"  id="${id}"><i class="   fa-solid fa-trash" data-tippy-content="<?php echo e(__('Delete Chat')); ?>"></i></a>
						</div>
					</div>`);

					active_id = data['id'];
	
				}    
			},
			error: function(data) {
				Swal.fire('Update Error', data.responseJSON['error'], 'error');
			}
		})
	}

	$('#upload-pdf-button').click(function() {
        $('#file').click();
    });

	function calculateCredits() {

		let current = document.getElementById('balance-number').innerHTML;

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'post',
			url: '/app/user/chat/file/credits',
			data: 'credit',
			processData: false,
			contentType: false,
			success: function (data) {
				console.log(data)
				if (data['credits'] != 'Unlimited') {
					animateValue("balance-number", parseInt(current.replace(/,/g, '')), data['credits'], 300);
				}
					
			},
			error: function(data) {
				console.log(data)
			}
		})
	}

	function updateService(input) {

		let brand = document.getElementById('brand-voice');
		let selected = input.options[input.selectedIndex].text;
		if (input.value != 'none') {
			brand.innerHTML = '<i class="fa-solid fa-signature mr-1"></i>' + selected;
		} else {
			brand.innerHTML = '<i class="fa-solid fa-signature mr-1"></i><?php echo e(__('Brand Voice')); ?>';
		}


		if (input.value != 'none') {

			let services = document.getElementById('service');			


			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'POST',
				url: '/app/user/templates/brand',
				data: { 'brand': input.value},
				success: function (data) {					
					if (data['status'] == 'success') {
						removeOptions(document.getElementById('service'));
						services.options.add( new Option("<?php echo e(__('Select your Product / Service')); ?>", 'none') )
						let result = data['products'];
						for(let i = 0; i < result.length; i++) {
							let obj = result[i];
							services.options.add( new Option(obj.name, i) )
						}
					} else {						
						
					}
				},
				error: function(data) {
					toastr.warning('<?php echo e(__('There was an issue')); ?>');
				}
			});
		}
	}

	function removeOptions(selectElement) {
		var i, L = selectElement.options.length - 1;
		for(i = L; i >= 0; i--) {
			selectElement.remove(i);
		}
	}

	function handleClick(radio) {

		let model = '';
		let logo = '';

		switch (radio.value) {
			case 'gpt-3.5-turbo-0125':
				model = 'GPT 3.5 Turbo';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4':
				model = 'GPT 4';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4o':
				model = 'GPT 4o';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4o-mini':
				model = 'GPT 4o mini';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4-0125-preview':
				model = 'GPT 4 Turbo';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'gpt-4-turbo-2024-04-09':
				model = 'GPT 4 Turbo Vision';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'o1-preview':
				model = 'o1 preview';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			case 'o1-mini':
				model = 'o1 mini';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
			default:
				model = 'Fine Tuned';
				logo = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 h-4 w-4 align-text-top"><g clip-path="url(#OpenAI_svg__a)"><path fill="currentColor" fill-rule="evenodd" d="M7.385.007a4.156 4.156 0 0 0-2.978 1.568c-.24.304-.463.699-.594 1.055l-.058.156-.219.056A4.031 4.031 0 0 0 .72 5.452a3.94 3.94 0 0 0 .23 3.13c.14.271.315.535.483.729l.12.139-.039.131a3.696 3.696 0 0 0-.159 1.133c0 .657.132 1.214.423 1.788a4.087 4.087 0 0 0 2.817 2.154c.49.1 1.106.116 1.516.039l.177-.033.214.201a4 4 0 0 0 1.561.935c.521.17.985.228 1.528.191 1.337-.092 2.469-.739 3.194-1.825.157-.236.244-.402.374-.718l.103-.249.111-.027a4.308 4.308 0 0 0 1.804-.94 4.082 4.082 0 0 0 1.24-2.16 3.994 3.994 0 0 0-.75-3.26c-.078-.1-.156-.2-.174-.225-.03-.042-.029-.06.03-.29.097-.378.128-.623.128-1.017 0-1.036-.386-1.985-1.132-2.78-.591-.63-1.53-1.096-2.445-1.214a5.048 5.048 0 0 0-1.183.022l-.179.034-.197-.19A4.116 4.116 0 0 0 8.645.125a4.586 4.586 0 0 0-1.26-.117Zm.872 1.098c.235.05.547.159.752.26.176.086.52.304.566.358.016.02-.373.25-1.648.975-.918.522-1.705.98-1.748 1.02a.593.593 0 0 0-.122.16c-.042.089-.043.109-.053 2.394l-.01 2.304-.64-.363c-.353-.2-.666-.379-.696-.398l-.055-.035V5.833c0-1.222.008-2.01.021-2.116a3.08 3.08 0 0 1 .588-1.466 3.82 3.82 0 0 1 .664-.642c.353-.247.856-.456 1.234-.513.09-.013.177-.027.193-.031.088-.021.815.01.954.04Zm3.819 1.232c1.554.275 2.64 1.657 2.514 3.198a2.432 2.432 0 0 1-.03.265c-.005.009-.615-.332-1.354-.756-2.133-1.222-2.065-1.185-2.171-1.2a.593.593 0 0 0-.185.01c-.051.013-.938.505-2.067 1.147a142.354 142.354 0 0 1-2.012 1.134c-.034.008-.036-.036-.036-.771 0-.718.003-.782.035-.81.068-.057 3.305-1.885 3.507-1.98.236-.11.552-.207.812-.246.285-.044.712-.04.986.01ZM3.63 7.971a.558.558 0 0 0 .133.16c.044.033.96.56 2.034 1.17a115.76 115.76 0 0 1 1.953 1.122c0 .027-1.333.77-1.38.77-.045 0-3.031-1.683-3.421-1.928a3.04 3.04 0 0 1-1.333-1.937 3.356 3.356 0 0 1 0-1.165c.095-.422.223-.728.439-1.045.36-.53.832-.905 1.452-1.154l.05-.02.011 1.963.01 1.965.052.099Zm8.7-2.226c1.896 1.08 1.735.985 1.947 1.146a2.955 2.955 0 0 1 1.169 2.35c0 .513-.097.927-.328 1.383a3.15 3.15 0 0 1-1.05 1.149c-.134.084-.54.29-.577.29-.008 0-.018-.875-.02-1.946l-.006-1.946-.047-.092a.654.654 0 0 0-.111-.153c-.036-.034-.952-.568-2.035-1.187-1.083-.62-1.98-1.137-1.995-1.15-.02-.018.123-.107.65-.406.371-.212.69-.384.708-.385.018 0 .781.426 1.695.947Zm-2.921.76.857.485v2.02l-.864.49c-.475.27-.871.494-.88.497a20.71 20.71 0 0 1-.896-.494l-.881-.5V6.995l.873-.497c.496-.283.886-.493.903-.487.017.006.416.228.888.495Zm2.259 1.29c.318.181.613.351.655.378l.076.048v1.947c0 2.075-.003 2.143-.102 2.53-.475 1.861-2.613 2.811-4.34 1.928-.205-.105-.555-.34-.54-.362.004-.008.758-.44 1.676-.962 1.097-.623 1.698-.975 1.752-1.028.162-.157.153-.003.153-2.575v-2.28l.046.023.624.353Zm-1.4 2.845v.797l-1.66.942c-.913.518-1.733.978-1.822 1.022a3.405 3.405 0 0 1-.742.247c-.183.04-.267.047-.598.047-.29 0-.429-.01-.558-.036-.982-.202-1.779-.814-2.193-1.683a2.683 2.683 0 0 1-.278-1.163c-.01-.278.01-.574.041-.604.005-.005.748.412 1.65.925.904.514 1.674.95 1.713.97a.511.511 0 0 0 .341.04c.062-.014.803-.425 2.095-1.16 1.1-.626 2.002-1.14 2.005-1.14.003-.001.005.357.005.796Z" clip-rule="evenodd"></path></g><defs><clipPath id="OpenAI_svg__a"><path fill="#fff" d="M.5 0h16v16H.5z"></path></clipPath></defs></svg>';
				break;
		}

		let ai = document.getElementById('ai-model');
		ai.innerHTML = logo + model;

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'POST',
			url: '/app/user/chat/model',
			data: { 'model': radio.value},
			success: function (data) {					
				let balance = document.getElementById('balance-number');
				let model = document.getElementById('model-name');
				balance.innerHTML =  data['balance'];
				model.innerHTML =  data['model'];

			},
			error: function(data) {
			}
		});

	}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/default/user/chat_file/index.blade.php ENDPATH**/ ?>