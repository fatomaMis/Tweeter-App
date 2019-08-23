<form>
	{{ csrf_field() }}


	@foreach($tweets as $tweet)
	<div class="media-right">
		<div class="col-xs-4">
			@include('tweets.tweet')
		</div>
		<div class="col-xs-8 approval">
			<label class="radio-inline">
				<input type="radio" name="approval-status-{{ $tweet->id }} " value= "1" 
				@if($tweet->approved)
					checked = "checked"
				@endif
				>
				Follow
			</label>

			<label class="radio-inline">
				<input type="radio" name="approval-status-{{ $tweet->id }} " value= "0" 
				@unless($tweet->approved)
				checked = "checked"
				@endif
				>
				UnFollow
			</label>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<a href="/delete-tweets/{{ $tweet->id }}">
				<button type="button" onclick="window.location='{{ url("/home") }}'">Delete Tweet</button>
				
			</a>

		</div>
	</div>

	<br>
	<br>

	@endforeach

	

</form>

{!! $tweets->links() !!}