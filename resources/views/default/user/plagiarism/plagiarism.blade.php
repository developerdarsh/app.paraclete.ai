@extends('layouts.app')
@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />

@endsection

@section('content')

<form id="main-form" action="" method="post" enctype="multipart/form-data" class="mt-24">		
	@csrf
	<div class="row">	
		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0" id="template-input">
				<div class="card-body p-6 pb-0">

					<div class="row text-center">
						<div class="template-view text-center">
							<div class="template-icon mb-2 d-flex justify-content-center">
								<div>
									<i class="fa-solid fa-shield-check blog-icon"></i>
								</div>
								<div>
									<h6 class="mt-1 ml-3 fs-16 number-font">{{ __('AI Plagiarism Checker') }}</h6>
								</div>									
							</div>								
							<div class="template-info">
								<p class="fs-12 text-muted mb-4">{{ __('Check your text with a comprehensive online database to detect potential plagiarism.') }}</p>
							</div>
						</div>
					</div>

					<div class="row">	
						<div class="col-sm-12">								
							<div class="input-box">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Target Text') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>									
								<div class="form-group">						    
									<span id="text-length" style="display: none">5000</span>
									<textarea rows="30" cols="50" type="text" class="form-control @error('text') is-danger @enderror" id="text" name="text" placeholder="{{ __('Include your text that you would like to check for plagiarism...') }}" required></textarea>
									@error('text')
										<p class="text-danger">{{ $errors->first('text') }}</p>
									@enderror

									<div
									class="hidden h-[600px] overflow-y-scroll rounded-xl border"
									id="content_result"
									name="content_result"
								></div>
								</div> 
							</div> 
						</div>
					</div>						

					<div class="card-footer border-0 text-center p-0">
						<div class="w-100 pt-2 pb-2">
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary pl-7 pr-7 fs-12 pt-2 pb-2" id="generate" style="min-width:200px">{{ __('Scan for Plagiarism') }}</button>
							</div>
						</div>							
					</div>	
			
				</div>
			</div>			
		</div>

		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0" id="template-output">
				<div class="card-body pl-7 pr-7">
					<div class="text-center mt-6">
						<h4 class="font-weight-bold">{{ __('AI Plagiarism Report') }}</h6>
					</div>
					<div class="pt-2" style="position: relative">
						<div id="status-bar"></div>
						<span id="zero-percent" class="text-muted">0%</span>
						<span id="hundred-percent" class="text-muted">100%</span>
						<div class="text-center mt-4">
							<p class="fs-14 font-weight-bold" id="check-status"><span class="text-success">100%</span> {{ __('Unique Text') }}</p>								
						</div>
					</div>
					<div style="border-top: 1px solid #ebecf1; border-bottom: 1px solid #ebecf1" class="pt-4 pb-2">
						<h6 class="font-weight-bold text-muted fs-14">{{ __('Report Details') }}</h6>						
						<p id="total-results" class=" fs-14 font-weight-bold"></p>
						<div class="scan-results"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<template id="result-template">
	<div class="result-box">
		<div class="result-values">
			<p class="result-index">1</p>
			<a class="url-mame fs-14 font-weight-bold" href="#" target="_blank">
				<span class="url-link"></span>
			</a>
		</div>
		<div class="result-output">
			<p class="text-muted">{{ __('Match') }}</p>
			<p class="result-percent">50%</p>
		</div>
	</div>
</template>
@endsection

@section('js')
<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{URL::asset('plugins/progressbar/progressbar.min.js')}}"></script>
<script src="{{URL::asset('plugins/character-count/jquery-simple-txt-counter.min.js')}}"></script>
<script type="text/javascript">
	$(function () {
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

		"use strict";

		if (document.getElementById('text')) {
			let value = document.getElementById('text-length').innerHTML;
			$('#text').simpleTxtCounter({
				maxLength: value,
				countElem: '<div class="form-text"></div>',
				lineBreak: false,
			});
		} 

		var bar = new ProgressBar.Line('#status-bar', {
			strokeWidth: 15,
			easing: 'easeInOut',
			duration: 1400,
			color: '#FFEA82',
			trailColor: '#eee',
			trailWidth: 15,
			svgStyle: {width: '100%', height: '100%'},
			from: {color: '#ef4b4b'},
			to: {color: '#38cb89'},
			step: (state, bar) => {
				bar.path.setAttribute('stroke', state.color);
			}
		});

		bar.animate(1.0);  // Number from 0.0 to 1.0

		
		// SUBMIT FORM
		$('#main-form').on('submit', function(e) {

			e.preventDefault();

			let input = document.getElementById('text').value;
			let length = input.trim().length;

			if (length < 100) {
				toastr.warning('{{ __('Please enter at least 100 characters') }}');
			} else {
				let form = $(this);

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'POST',
					url: 'plagiarism/process',
					data: form.serialize(),
					beforeSend: function() {
						$('#generate').prop('disabled', true);
						let btn = document.getElementById('generate');					
						btn.innerHTML = loading;  
						document.querySelector('#loader-line')?.classList?.remove('hidden');   
						$(".scan-results").empty();    
					},
					complete: function() {
						$('#generate').prop('disabled', false);
						let btn = document.getElementById('generate');					
						btn.innerHTML = '{{ __('Scan for Plagiarism') }}';
						document.querySelector('#loader-line')?.classList?.add('hidden'); 
						 
					},
					success: function (data) {		

						if (data['status'] == 200) {
							let response = data['report'];

							if (data['percentage'] != 0) {
								bar.destroy();   
								bar = new ProgressBar.Line('#status-bar', {
									strokeWidth: 15,
									easing: 'easeInOut',
									duration: 1400,
									color: '#FFEA82',
									trailColor: '#eee',
									trailWidth: 15,
									svgStyle: {width: '100%', height: '100%'},
									from: {color: '#38cb89'},
									to: {color: '#ef4b4b'},
									step: (state, bar) => {
										bar.path.setAttribute('stroke', state.color);
									}
								});       

								bar.animate(data['percentage']/100);

								$('#check-status').html('<span class="text-danger">'+data['percentage']+'%</span> {{ __('Plagiarized') }}');
								
							} else {
								bar.destroy(); 
								bar = new ProgressBar.Line('#status-bar', {
									strokeWidth: 15,
									easing: 'easeInOut',
									duration: 1400,
									color: '#FFEA82',
									trailColor: '#eee',
									trailWidth: 15,
									svgStyle: {width: '100%', height: '100%'},
									from: {color: '#ef4b4b'},
									to: {color: '#38cb89'},
									step: (state, bar) => {
										bar.path.setAttribute('stroke', state.color);
									}
								});

								bar.animate(1.0);
							}

							let sources = response.data.report_data.sources;

							for (let i = 0; i < sources.length; i++) {
								sources[i].index = i;
							}

							sources.sort((a, b) => {
								return b.plagiarism_percent - a.plagiarism_percent;
							});
							
							$("#total-results").text("Results Found (" + Math.max(sources.length) + ")");

							for (let i = 0; i < sources.length && i < 5; i++) {
								let resultTemplate = document.querySelector("#result-template").content.cloneNode(true);
								$(resultTemplate.querySelector('.result-index')).text(i + 1);
								$(resultTemplate.querySelector('.url-name')).attr('href', sources[i].link.urls[0]);
								$(resultTemplate.querySelector('.url-link')).text(sources[i].link.name);								
								$(resultTemplate.querySelector('.result-percent')).text(sources[i]
									.plagiarism_percent + "%");
								$(".scan-results").append(resultTemplate);
							}

							let nodes = response.data.report_data.nodes;

							let content = $("#text").text();

							let reContent = "";

							function getColorByNumber(number) {
								const green = Math.floor(255 * (1 - number / 100));
								const red = Math.floor(255 * number / 100);
								const rgbColor = `rgba(${red}, ${green}, 0, 0.7)`;

								return rgbColor;
							}

							for (let i = 0; i < nodes.length; i++) {
								let tColor = "#FFC7001A";
								for (let j = Math.min(5, sources.length) - 1; j >= 0; j--) {
									for (let k = 0; k < nodes[i].sources.length; k++) {
										if (nodes[i].sources[k] == sources[j].index) {
											tColor = "#FF01011A"
										}
									}
								}
								reContent += (
									"<span style='background-color: " + tColor + "'>" + " " + nodes[i].text.replace(/\n/g, "<br>") + '</span>');
							}
							reContent += ""
							$("#content_result").removeClass('hidden');
							$("#content_result").html(reContent);
							$("#text").hide();


							toastr.success('{{ __('Analyze task successfully completed') }}');
			
						} else {						
							toastr.error(data['message']);
						}

					},
					error: function(data) {
						$('#generate').prop('disabled', false);
						let btn = document.getElementById('generate');					
						btn.innerHTML = '{{ __('Scan for Plagiarism') }}';
						document.querySelector('#loader-line')?.classList?.add('hidden');  
					}
				});
			}			
		});
	});


</script>
@endsection