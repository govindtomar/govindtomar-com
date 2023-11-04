@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="chat-container">
					<div class="chat-header">
						<h5>{{ $receiver->name }}</h5>
					</div>
					<div class="chat-messages">
						<?php $lmi = 0; ?>
						@foreach($messages as $mess)
							@if($mess->sender_id == Auth::id())
								<div class="sender-message">
									<div class="message-width">
										<p class="message">{{ $mess->message }}</p>
									</div>									
								</div>								
							@else
								<div class="receiver-message">
									<div class="message-width">
										<p class="message">{{ $mess->message }}</p>
									</div>									
								</div>								
							@endif
							<?php $lmi = $mess->id; ?>
						@endforeach
						<p id="lmi">{{ $lmi }}</p>
					</div>					
					<div class="chat-form">
						<form action="" method="POST" id="send-message">
							@csrf
							<input type="hidden" name="rec" id="rec" value="{{ Crypt::encryptString($receiver->id) }}">
							<div class="form-group message-group">
								<input type="text" id="message" name="message" class="form-control">
								<button type="submit" class="btn-send"><img src="{{ asset('assets/admin/img/send.png') }}"></button>
							</div>
						</form>
					</div>
					<div class="chat-translation">
						<div class="translated-text">
							<p>translation...</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 offset-6">
						<div class="user-container">
							<ul>
								@foreach($users as $user)
									<li>
										<a href="{{ url('/admin/chat/'.Crypt::encryptString($user->id)) }}">{{ $user->name }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				{{-- <div class="row">
					
				</div> --}}
			</div>			
		</div>
	</div>
@endsection

