@extends('layouts.app')

@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

	<div class="row mt-24">
		<div class="col-lg-12 col-md-12 col-sm-12 p-4">
			<div id="chat-search-panel">
				<h3 class="card-title mb-3 ml-2 fs-20 super-strong"><i class="fa-solid fa-message-captions mr-2 text-primary"></i>{{ __('AI Chat Assistants') }}</h3>
				<h6 class="text-muted mb-3 ml-2">{{ __('Find your AI assistant quickly! Get ready to explore our fantastic lineup of AI chat assistants') }}</h6>
				@if (config('settings.custom_chats') == 'anyone')
					<a href="{{ route('user.chat.custom') }}" class="btn btn-primary ripple rtl-main-button" id="create-ai-button" style="text-transform: none;">{{ __('Custom Chat Assistants') }}</a>
				@else
					@if ($check)
						<a href="{{ route('user.chat.custom') }}" class="btn btn-primary ripple rtl-main-button" id="create-ai-button" style="text-transform: none;">{{ __('Custom Chat Assistants') }}</a>
					@endif	
				@endif	
				<div class="search-template">
					<div class="input-box">								
						<div class="form-group">							    
							<input type="text" class="form-control" id="search-template" placeholder="{{ __('Search for your AI assistant...') }}">
						</div> 
					</div> 
				</div>
				
			</div>

			<div class="templates-nav-menu chat-nav-menu">
				<div class="template-nav-menu-inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">{{ __('All AI Chats') }}</button>
						</li>
						@foreach ($categories as $category)
							@if (strtolower($category->code) != 'other')
								<li class="nav-item category-check" role="presentation">
									<button class="nav-link" id="{{ $category->code }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $category->code }}" type="button" role="tab" aria-controls="{{ $category->code }}" aria-selected="false">{{ __($category->name) }}</button>
								</li>
							@endif									
						@endforeach	
						@foreach ($categories as $category)
							@if (strtolower($category->code) == 'other')
								<li class="nav-item category-check" role="presentation">
									<button class="nav-link" id="{{ $category->code }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $category->code }}" type="button" role="tab" aria-controls="{{ $category->code }}" aria-selected="false">{{ __($category->name) }}</button>
								</li>
							@endif									
						@endforeach				
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

						@foreach ($favorite_chats as $chat)
							<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
								<div class="chat-boxes text-center">
									<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
									@if($chat->category == 'professional') 
										<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
									@elseif($chat->category == 'free')
										<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
									@elseif($chat->category == 'premium')
										<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
									@endif
									<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats') }}/{{ $chat->chat_code }}'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						@endforeach

						@foreach ($favorite_chats_custom as $chat)
							<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
								<div class="chat-boxes text-center">
									<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
									@if($chat->category == 'professional') 
										<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
									@elseif($chat->category == 'free')
										<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
									@elseif($chat->category == 'premium')
										<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
									@endif
									<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats/custom') }}/{{ $chat->chat_code }}'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						@endforeach

						@foreach ($other_chats as $chat)
							<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
								<div class="chat-boxes text-center">
									<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
									@if($chat->category == 'professional') 
										<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
									@elseif($chat->category == 'free')
										<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
									@elseif($chat->category == 'premium')
										<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
									@endif
									<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats') }}/{{ $chat->chat_code }}'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						@endforeach

						@foreach ($custom_chats as $chat)
							<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
								<div class="chat-boxes text-center">
									<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
									@if($chat->category == 'professional') 
										<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
									@elseif($chat->category == 'free')
										<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
									@elseif($chat->category == 'premium')
										<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
									@endif
									<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats/custom') }}/{{ $chat->chat_code }}'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						@endforeach

						@foreach ($public_custom_chats as $chat)
							<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
								<div class="chat-boxes text-center">
									<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
									@if($chat->category == 'professional') 
										<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
									@elseif($chat->category == 'free')
										<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
									@elseif($chat->category == 'premium')
										<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
									@endif
									<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats/custom') }}/{{ $chat->chat_code }}'">
										<div class="card-body pt-3">
											<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
											<div class="template-title">
												<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
											</div>
											<div class="template-info">
												<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
											</div>							
										</div>
									</div>
								</div>							
							</div>
						@endforeach
					</div>
				</div>

				@foreach ($categories as $category)
					<div class="tab-pane fade" id="{{ $category->code }}" role="tabpanel" aria-labelledby="{{ $category->code }}-tab">
						<div class="row" id="templates-panel">
							@foreach ($favorite_chats as $chat)
								@if ($chat->group == $category->code)
									<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
										<div class="chat-boxes text-center">
											<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											@if($chat->category == 'professional') 
												<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
											@elseif($chat->category == 'free')
												<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
											@elseif($chat->category == 'premium')
												<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
											@endif
											<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats') }}/{{ $chat->chat_code }}'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								@endif
							@endforeach

							@foreach ($favorite_chats_custom as $chat)
								@if ($chat->group == $category->code)
									<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
										<div class="chat-boxes text-center">
											<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											@if($chat->category == 'professional') 
												<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
											@elseif($chat->category == 'free')
												<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
											@elseif($chat->category == 'premium')
												<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
											@endif
											<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats/custom') }}/{{ $chat->chat_code }}'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								@endif
							@endforeach

							@foreach ($other_chats as $chat)
								@if ($chat->group == $category->code)
									<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
										<div class="chat-boxes text-center">
											<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											@if($chat->category == 'professional') 
												<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
											@elseif($chat->category == 'free')
												<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
											@elseif($chat->category == 'premium')
												<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
											@endif
											<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats') }}/{{ $chat->chat_code }}'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								@endif
							@endforeach

							@foreach ($custom_chats as $chat)
								@if ($chat->group == $category->code)
									<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
										<div class="chat-boxes text-center">
											<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											@if($chat->category == 'professional') 
												<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
											@elseif($chat->category == 'free')
												<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
											@elseif($chat->category == 'premium')
												<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
											@endif
											<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats/custom') }}/{{ $chat->chat_code }}'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								@endif								
							@endforeach
							
							@foreach ($public_custom_chats as $chat)
								@if ($chat->group == $category->code)
									<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $chat->chat_code }}">
										<div class="chat-boxes text-center">
											<a id="{{ $chat->chat_code }}" @if($chat->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $chat->chat_code }}-icon" class="@if($chat->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											@if($chat->category == 'professional') 
												<p class="fs-8 btn btn-pro"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> 
											@elseif($chat->category == 'free')
												<p class="fs-8 btn btn-free"><i class="fa-sharp fa-solid fa-gift mr-2"></i>{{ __('Free') }}</p> 
											@elseif($chat->category == 'premium')
												<p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-gem mr-2"></i>{{ __('Premium') }}</p> 
											@endif
											<div class="card @if($chat->category == 'professional') professional @elseif($chat->category == 'premium') premium @elseif($chat->favorite) favorite @else border-0 @endif" id="{{ $chat->chat_code }}-card" onclick="window.location.href='{{ url('app/user/chats/custom') }}/{{ $chat->chat_code }}'">
												<div class="card-body pt-3">
													<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="{{ URL::asset($chat->logo) }}"></div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($chat->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($chat->sub_name) }}</p>
													</div>							
												</div>
											</div>
										</div>							
									</div>
								@endif
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection

@section('js')
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
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
							Swal.fire('{{ __('Chat Bot Removed from Favorites') }}', '{{ __('Selected chat bot has been successfully removed from favorites') }}', 'success');
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
							Swal.fire('{{ __('Chat Bot Added to Favorites') }}', '{{ __('Selected chat bot has been successfully added to favorites') }}', 'success');
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
						Swal.fire('{{ __('Favorite Setting Issue') }}', '{{ __('There as an issue with setting favorite status for this chat bot') }}', 'warning');
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
							Swal.fire('{{ __('Chat Bot Removed from Favorites') }}', '{{ __('Selected chat bot has been successfully removed from favorites') }}', 'success');
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
							Swal.fire('{{ __('Chat Bot Added to Favorites') }}', '{{ __('Selected chat bot has been successfully added to favorites') }}', 'success');
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
						Swal.fire('{{ __('Favorite Setting Issue') }}', '{{ __('There as an issue with setting favorite status for this chat bot') }}', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}

		function changeChat(value) {
			let url = '{{ url('app/user/chats') }}/' + value;
			window.location.href=url;
		}

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
	</script>
@endsection
