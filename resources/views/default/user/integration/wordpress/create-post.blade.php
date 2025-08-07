@extends('layouts.app')

@section('css')
    <link href="{{URL::asset('plugins/air-datepicker/air-datepicker.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Publish to Wordpress') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-id-badge mr-2 fs-12"></i>{{ __('User') }}</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.integration')}}"> {{ __('Integrations') }}</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.integration.wordpress')}}"> {{ __('Wordpress') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{ url('#') }}"> {{ __('Publish') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="card border-0 pl-6 pr-6">
				<div class="card-body">	
					<form id="publish-form" action="{{ route('user.integration.wordpress.post.store') }}" method="post" enctype="multipart/form-data" class="mt-24"> 		
						@csrf	
						<div class="row mt-4 justify-content-center">	
                            <div class="col-md-6 col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{__('Select WordPress Website')}} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
                                        <select name="website_id" id="website_id" class="form-select" required>
                                            <option value="null">-- {{__('Select Website')}} --</option>
                                            @foreach($websites as $website)
                                                @php $credentials = json_decode($website->credentials); @endphp
                                                <option value="{{ $website->id }}" {{ old('website_id') == $website->id ? 'selected' : '' }}>
                                                    {{$credentials->domain}} ({{ $credentials->url }})
                                                </option>
                                            @endforeach
                                        </select>
									</div> 
								</div> 
							</div>	
                            <div class="col-md-6 col-sm-12">
                                <div class="input-box">								
									<div class="form-group">
                                        <h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Post Status') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							    
                                        <select name="status" id="status" class="form-select">
                                            <option value="publish" selected>{{__('Publish')}}</option>
                                            <option value="draft" >{{__('Draft')}}</option>
                                            <option value="pending">{{__('Pending Review')}}</option>
                                            <option value="private">{{__('Private')}}</option>
                                        </select>
                                    </div> 
								</div>
                            </div>				
							<div class="col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Post Title') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							    
										<input type="text" class="form-control @error('title') is-danger @enderror" id="title" name="title" value="{{ $content->title }}" required>
									</div> 
								</div> 
							</div>
							<div class="col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Post Slug (URL)') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							    
										<input type="text" class="form-control @error('slug') is-danger @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="my-post-url">
                                        <span class="fs-10 text-muted">{{__('Click on input field to generate automatically from title')}}</span>
									</div> 
								</div> 
							</div>
                            <div class="col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Post Excerpt') }}</h6>							    
										<textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="4" placeholder="{{__('A brief summary of your post')}}">{{ old('excerpt') }}</textarea>
                                        <span class="fs-10 text-muted">{{__('Excerpts are short summaries of your post shown in search results and archives')}}</span>
									</div> 
								</div> 
							</div>
                            <div class="col-md-6 col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('SEO Title') }}</h6>							    
                                        <input type="text" name="custom_fields[seo_title]" id="seo_title" class="form-control" value="{{ old('custom_fields.seo_title') }}">
                                        <span class="text-muted fs-10">{{__('Custom title tag for SEO purposes. Leave empty to use post title')}}</span>
									</div> 
								</div> 
							</div>
                            <div class="col-md-6 col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('SEO Description') }}</h6>							    
                                        <input type="text" name="custom_fields[seo_description]" id="seo_description" class="form-control" value="{{ old('custom_fields.seo_description') }}">
                                        <span class="text-muted fs-10">{{__('Custom meta description for SEO purposes')}}</span>
									</div> 
								</div> 
							</div>
                            <div class="col-md-6 col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Categories') }}</h6>							    
                                        <input type="text" name="categories" id="categories" class="form-control" value="{{ old('categories') }}">
                                        <span class="text-muted fs-10">{{__('Comma seperated list of categories')}}</span>
									</div> 
								</div> 
							</div>
                            <div class="col-md-6 col-sm-12">								
								<div class="input-box">								
									<div class="form-group">
										<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Tags') }}</h6>							    
                                        <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
                                        <span class="text-muted fs-10">{{__('Comma seperated list of tags')}}</span>
									</div> 
								</div> 
							</div>
                            <div class="col-sm-12">
                                <div class="input-box">								
									<div class="form-group">
                                        <h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Featured Image') }}</h6>
                                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                                        <span class="fs-10 text-muted">{{__('Recommended size: 1200×628 pixels')}}</span>                                    
                                    </div>
                                </div>
                                <div class="input-box">								
									<div class="form-group">
                                        <div class="mb-5" id="imagePreviewContainer" style="display: none;">
                                            <h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Image Preview') }}</h6>
                                            <div class="border rounded p-2 text-center bg-light">
                                                <img id="imagePreview" src="#" alt="Featured image preview" class="preview-image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="schedule-post-box">
                                    <div class="input-box">	
                                        <h6 class="mb-2">{{ __('Schedule') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
                                        <div class="schedule-pox-box-inner">
                                            <div class="row">
                                                <div class="col-md-7 col-sm-12">
                                                    <h4 class="font-weight-bold mb-0">{{__('When to publish')}}</h4>
                                                    <small class="text-muted fs-10">{{ __('Choose date and time to publish your post') }}</small>
                                                </div>
                                                <div class="col-md-5 col-sm-12">														
                                                    <select id="publish_option" name="publish_option" class="form-select" onchange="setScheduleOption()">												
                                                        <option value='immediately'>{{ __('Immediately') }}</option>
                                                        <option value='specific_date'>{{ __('Schedule Date & Time') }}</option>
                                                    </select>														
                                                </div>
                                            </div>
                                            <div id="schedule-time" class="mt-3 pt-3 hidden" style="border-top: 1px solid #ebecf1;">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="input-box mb-2">
                                                            <h6 class="mb-2">{{ __('Schedule Date & Time') }}</h6>
                                                            <input type="text" id="schedule_date" name="schedule_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>				
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>

						<div class="row">	
                            <div class="col-sm-12">	
                                <h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Post Content') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							    				
                                <div id="template-textarea" class="show-text-result">					
                                    <div class="form-control" name="content" rows="25" id="tinymce-editor">{!! $content->result_text !!}</div>	
                                </div>	
                            </div>								
						</div>


						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-center mb-5 mt-5">
							<button type="submit" class="btn ripple btn-primary" style="min-width: 200px;">{{ __('Publish') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script src="{{URL::asset('plugins/air-datepicker/air-datepicker.js')}}"></script>
<script src="{{URL::asset('plugins/markdown/markdown-it.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="{{URL::asset('plugins/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
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

	$(document).ready(function() {

		"use strict";

        const editorContent = $('#tinymce-editor').html();
        
        // Directly convert markdown to HTML before inserting into textarea
        let htmlContent = editorContent;
        try {
            // Decode HTML entities if needed
            const decodedContent = $('<div/>').html(editorContent).text();
            htmlContent = marked.parse(decodedContent);
        } catch (error) {
            console.error('Error pre-processing markdown:', error);
        }
        
        // Replace with textarea containing the HTML content
        $('#tinymce-editor').replaceWith('<textarea id="tinymce-editor" name="content" rows="25" class="form-control">' + htmlContent + '</textarea>');

 
		const tinymceOptions = {
			selector: '#tinymce-editor',
			content_style: `
					body h1 { font-size: 20px}
					body h2 { font-size: 18px }
					body h3, h4, h5 { font-size: 16px }
					body p { font-size: 14px; }

					body .gradient-typing-indicator {
						display: inline-flex;
						align-items: center;
						font-weight: 500;
						font-size: 12px;
						background: transparent;
					}

					body .typing-text {
						background: linear-gradient(to right, #007bff, #bf7fff);
						background-size: 200% auto;
						background-clip: text;
						-webkit-background-clip: text;
						color: transparent;
						animation: gradientFlow 2s linear infinite;
						font-weight: 600;
					}

					body .typing-dots {
						display: inline-flex;
						margin-left: 2px;
					}

					body .typing-dots span {
						animation: typingDot 1.4s infinite;
						display: inline-block;
						width: 5px;
						height: 5px;
						border-radius: 50%;
						margin: 0 2px;
						background: linear-gradient(to right, #007bff, #bf7fff);
					}

					body .typing-dots span:nth-child(2) {
						animation-delay: 0.2s;
					}

					body .typing-dots span:nth-child(3) {
						animation-delay: 0.4s;
					}

					@keyframes gradientFlow {
						0% {
							background-position: 0% center;
						}
						50% {
							background-position: 100% center;
						}
						100% {
							background-position: 0% center;
						}
					}

					@keyframes typingDot {
						0%, 60%, 100% {
							transform: scale(1);
							opacity: 0.8;
						}
						30% {
							transform: scale(1.5);
							opacity: 1;
						}
					}
				`,
			menubar: false,
			statusbar: false,
			toolbar_sticky: false,
			draggable_modal: true,
			plugins: [
				'advlist', 'autolink', 'lists', 'charmap', 'preview', 'anchor', 'wordcount', 'autosave', 'link', 'image', 'code',
			],
			toolbar: 'AIMain AIOptions | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | forecolor backcolor emoticons | image link code | blockquote | undo redo',

		};


		tinyMCE.init( tinymceOptions );


        new AirDatepicker('#schedule_date', {
			dateFormat: 'dd/MM/yyyy',
			navTitles: {
				days: '<strong>yyyy</strong> <i>MMMM</i>',
				months: 'Select month of <strong>yyyy</strong>'    
			},
			selectedDates: [new Date()],
			minDate: [new Date()],
			timepicker: true,
		});


	});
	



    // Auto-generate slug from title
    $('#title').on('blur', function() {
        if ($('#slug').val() === '') {
            const title = $(this).val();
            if (title) {
                const slug = title
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/(^-|-$)/g, '');
                $('#slug').val(slug);
            }
        }
    });

    // Featured image preview
    $('#featured_image').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').show();
            }
            reader.readAsDataURL(file);
        } else {
            $('#imagePreviewContainer').hide();
        }
    });

    function setScheduleOption() {
		var select = document.getElementById("publish_option").value;
		console.log(select)
		switch (select) {
			case 'immediately':
				$('#schedule-time').addClass('hidden');
				break;
			case 'specific_date':
				$('#schedule-time').removeClass('hidden');
				break;
			default:
				$('#schedule-time').addClass('hidden');
				break;
		}
	}


</script>
@endsection
