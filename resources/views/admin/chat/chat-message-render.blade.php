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