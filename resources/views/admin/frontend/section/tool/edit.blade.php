@extends('layouts.app')

@section('css')
	<!-- RichText CSS -->
	<link href="{{URL::asset('plugins/richtext/richtext.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7 justify-content-center">
		<div class="page-leftheader text-center">
			<h4 class="page-title mb-0">{{ __('Edit Tool') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-globe mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}"> {{ __('Frontend Management') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.settings.tool') }}"> {{ __('AI Tools Section') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Edit Tool') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<!-- SUPPORT REQUEST -->
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-8 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Edit Tool') }}</h3>
				</div>
				<div class="card-body pt-5">									
					<form id="" action="{{ route('admin.settings.tool.update', [$id->id]) }}" method="POST" enctype="multipart/form-data">
						@method('PUT')
						@csrf

						<div class="row mb-5">    
							
							<div class="col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Tool Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="name" name="name" value="{{ $id->tool_name }}" required>
									</div> 
									@error('name')
										<p class="text-danger">{{ $errors->first('name') }}</p>
									@enderror	
								</div>						
							</div>
	
							<div class="col-md-6 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Tool Sub-Name') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="subname" name="subname" value="{{ $id->title_meta }}" required>
									</div> 
									@error('subname')
										<p class="text-danger">{{ $errors->first('subname') }}</p>
									@enderror	
								</div>						
							</div>

							<div class="col-sm-12 col-md-3">
							  	<div class="tool-banner-image overflow-hidden">
									<img class="rounded-circle" src="{{ URL::asset($id->image) }}" alt="Main Logo">
							  	</div>
							</div>
						
							<div class="col-sm-12 col-md-9">
							  	<div class="input-box">
									<label class="form-label fs-12">{{ __('Tool Banner') }} </label>
									<div class="input-group file-browser">									
										<input type="text" class="form-control border-right-0 browse-file"  readonly>
										<label class="input-group-btn">
										<span class="btn btn-primary special-btn">
											{{ __('Browse') }} <input type="file" name="logo" style="display: none;">
										</span>
									</label>
									</div>
									@error('logo')
									<p class="text-danger">{{ $errors->first('logo') }}</p>
									@enderror
								</div>
							</div>				
						  </div>

						<div class="row mt-2">	
							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Tool Status') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="col-md-12 col-sm-12 mt-2 mb-4 pl-0">
										<div class="form-group">
										  	<label class="custom-switch">
												<input type="checkbox" name="activate" class="custom-switch-input" @if($id->status) checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Activate Tool') }}</span>
										  	</label>
										</div>
									  </div>
								</div>						
							</div>						
							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Tool Title') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="title" name="title" value="{{ $id->title }}" required>
									</div> 
									@error('title')
										<p class="text-danger">{{ $errors->first('title') }}</p>
									@enderror	
								</div>						
							</div>	
							
							<div class="col-lg-12 col-md-12 col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Tool Image Footer') }}</h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="footer" name="footer" value="{{ $id->image_footer }}">
									</div> 
									@error('footer')
										<p class="text-danger">{{ $errors->first('footer') }}</p>
									@enderror	
								</div>						
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-lg-12 col-md-12 col-sm-12">	
								<div class="input-box">	
									<h6>{{ __('Tool Description') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>							
									<textarea class="form-control" name="description" rows="12" id="richtext" required>{{ $id->description }}</textarea>
									@error('description')
										<p class="text-danger">{{ $errors->first('description') }}</p>
									@enderror	
								</div>											
							</div>
						</div>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-center mb-2 mt-1">
							<a href="{{ route('admin.settings.tool') }}" class="btn btn-cancel mr-2 ripple pl-7 pr-7">{{ __('Return') }}</a>
							<button type="submit" class="btn btn-primary ripple pl-7 pr-7">{{ __('Update') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
	<!-- END SUPPORT REQUEST -->
@endsection

@section('js')
	<!-- RichText JS -->
	<script src="{{theme_url('js/avatar.js')}}"></script>
	<script src="{{URL::asset('plugins/richtext/jquery.richtext.min.js')}}"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";

			$('#richtext').richText({

				// text formatting
				bold: true,
				italic: true,
				underline: true,

				// text alignment
				leftAlign: true,
				centerAlign: true,
				rightAlign: true,
				justify: true,

				// lists
				ol: true,
				ul: true,

				// title
				heading: true,

				// fonts
				fonts: true,
				fontList: [
					"Arial", 
					"Arial Black", 
					"Comic Sans MS", 
					"Courier New", 
					"Geneva", 
					"Georgia", 
					"Helvetica", 
					"Impact", 
					"Lucida Console", 
					"Tahoma", 
					"Times New Roman",
					"Verdana"
				],
				fontColor: true,
				fontSize: true,

				// uploads
				imageUpload: false,
				fileUpload: false,

				// media
				videoEmbed: false,

				// link
				urls: true,

				// tables
				table: false,

				// code
				removeStyles: true,
				code: false,

				// colors
				colors: [],

				// dropdowns
				fileHTML: '',
				imageHTML: '',

				// translations
				translations: {
					'title': 'Title',
					'white': 'White',
					'black': 'Black',
					'brown': 'Brown',
					'beige': 'Beige',
					'darkBlue': 'Dark Blue',
					'blue': 'Blue',
					'lightBlue': 'Light Blue',
					'darkRed': 'Dark Red',
					'red': 'Red',
					'darkGreen': 'Dark Green',
					'green': 'Green',
					'purple': 'Purple',
					'darkTurquois': 'Dark Turquois',
					'turquois': 'Turquois',
					'darkOrange': 'Dark Orange',
					'orange': 'Orange',
					'yellow': 'Yellow',
					'imageURL': 'Image URL',
					'fileURL': 'File URL',
					'linkText': 'Link text',
					'url': 'URL',
					'size': 'Size',
					'responsive': 'Responsive',
					'text': 'Text',
					'openIn': 'Open in',
					'sameTab': 'Same tab',
					'newTab': 'New tab',
					'align': 'Align',
					'left': 'Left',
					'center': 'Center',
					'right': 'Right',
					'rows': 'Rows',
					'columns': 'Columns',
					'add': 'Add',
					'pleaseEnterURL': 'Please enter an URL',
					'videoURLnotSupported': 'Video URL not supported',
					'pleaseSelectImage': 'Please select an image',
					'pleaseSelectFile': 'Please select a file',
					'bold': 'Bold',
					'italic': 'Italic',
					'underline': 'Underline',
					'alignLeft': 'Align left',
					'alignCenter': 'Align centered',
					'alignRight': 'Align right',
					'addOrderedList': 'Add ordered list',
					'addUnorderedList': 'Add unordered list',
					'addHeading': 'Add Heading/title',
					'addFont': 'Add font',
					'addFontColor': 'Add font color',
					'addFontSize' : 'Add font size',
					'addImage': 'Add image',
					'addVideo': 'Add video',
					'addFile': 'Add file',
					'addURL': 'Add URL',
					'addTable': 'Add table',
					'removeStyles': 'Remove styles',
					'code': 'Show HTML code',
					'undo': 'Undo',
					'redo': 'Redo',
					'close': 'Close'
				},
						
				// privacy
				youtubeCookies: false,

				// developer settings
				useSingleQuotes: false,
				height: 0,
				heightPercentage: 0,
				id: "",
				class: "",
				useParagraph: false,
				maxlength: 0,
				callback: undefined,
				useTabForNext: false
			});

		});
	</script>
@endsection
