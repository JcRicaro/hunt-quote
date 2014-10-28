<div class="row">
	@foreach($quotes->chunk( ceil($quotes->count() / 2) ) as $chunk)
		<div class="col-md-6">
			@foreach($chunk as $quote)
				<div class="panel panel-default panel-quote">
					@if ( $quote->hasPhoto() )
						@include('main.authors.show.quote-photo')
					@endif
				
					<a href="{{ route('quotes.show', $quote->id) }}" class="panel-body" style="display: block;">
						<h4> {{ $quote->content }} </h4>
					</a>
				
					<div class="panel-footer">
						@include('main.authors.show.quote-footer')
					</div>
				</div>
			@endforeach
		</div>
	@endforeach
</div>