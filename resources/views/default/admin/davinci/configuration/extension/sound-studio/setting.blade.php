@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Sound Studio') }}</h4>
			<ol class="breadcrumb mb-2 justify-content-center">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.davinci.configs')}}"> {{ __('AI Settings') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Extensions') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row justify-content-center">
		<div class="col-lg-9 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body pt-6">									
					<form action="{{ route('admin.davinci.configs.sound.studio.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="card mt-0 mb-7">							
							<div class="card-body">
								<div class="row">

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Sound Studio Feature') }}</h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="sound_studio_feature" class="custom-switch-input" @if ($extension->sound_studio_feature) checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Sound Studio Free Tier Access') }}</h6>
											<div class="form-group mt-3">
												<label class="custom-switch">
													<input type="checkbox" name="sound_studio_free_tier" class="custom-switch-input" @if ($extension->sound_studio_free_tier) checked @endif>
													<span class="custom-switch-indicator"></span>
												</label>
											</div>
										</div>
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Maximum Number of Audio Files to Merge') }} <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Maximum Limit is 20 Audio Files that can be merged in a single task.') }}"></i></h6>
											<div class="form-group">							    
												<input type="number" class="form-control @error('sound_studio_max_merge_files') is-danger @enderror" id="sound_studio_max_merge_files" name="sound_studio_max_merge_files" min="1" max="20" value="{{ $extension->sound_studio_max_merge_files }}" autocomplete="off">
												@error('sound_studio_max_merge_files')
													<p class="text-danger">{{ $errors->first('sound_studio_max_merge_files') }}</p>
												@enderror
											</div> 		
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Maximum Background Music Size') }} <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('Maximum size (in MB) of allowed background music upload for users. In Sound Studio settings page Admin can upload background audio files up to 100MB.') }}"></i></h6>
											<div class="form-group">							    
												<input type="number" class="form-control @error('sound_studio_max_audio_size') is-danger @enderror" min="1" id="sound_studio_max_audio_size" name="sound_studio_max_audio_size" value="{{ $extension->sound_studio_max_audio_size }}" autocomplete="off">
												@error('max-background-audio-size')
													<p class="text-danger">{{ $errors->first('sound_studio_max_audio_size') }}</p>
												@enderror
											</div> 		
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Windows FFmpeg Path') }} <i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('In case if you want to test locally on Windows OS, provide FFmpeg bin path. Note: You will need to install FFmpeg on your Windows OS by yourself.') }}"></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('windows-ffmpeg-path') is-danger @enderror" id="windows-ffmpeg-path" name="windows-ffmpeg-path" value="{{ config('settings.voiceover_windows_ffmpeg_path') }}" autocomplete="off">
												@error('windows-ffmpeg-path')
													<p class="text-danger">{{ $errors->first('windows-ffmpeg-path') }}</p>
												@enderror
											</div> 		
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<a href="{{ route('admin.davinci.configs.sound.audio') }}" class="btn btn-primary ripple mt-4 pl-6 pr-6">{{ __('Default Background Audio Tracks') }}</a>	
										</div>
									</div>	
								</div>		
							</div>
						</div>
						

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<button type="submit" class="btn ripple btn-primary pl-8 pr-8 pt-2 pb-2">{{ __('Save') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
@endsection


