@extends('_tpls.main.ads')

@section('title') Quotes of the Day @stop

@section('meta')
	<meta name="title" content="Featured quotes daily">
	<meta name="description" content="Get daily dose of philosophical, intellectual, lovely quotes by your favorites authors!" />
	<meta property="og:title" content="Featured quotes daily">
	<meta property="og:description" content="Get daily dose of philosophical, intellectual, lovely quotes by your favorites authors!" />
@stop

@section('sub-content')
	<h3> Quotes of the Day </h3>
	<hr>

	@include('_tpls.main._.social')

	<p> {{ $page }} </p>


	{{ $quotes->links() }}

	<div class="row photo-quote-list">
		@foreach($quotes as $index => $quote)
			<h3> {{ $quote->created_at->format('M d') }} Quote of the Day </h3>
			@if ( $quote->hasPhoto() )
				<div class="photo-quote-item">
					<a href="{{ route('quotes.show', $quote->getSlug()) }}"
						style="background-image: url({{ $quote->photoURL }});"
						class="photo-quote"
					>
					</a>
				</div>
			@else
				<a class="panel panel-default panel-quote">
					<div class="panel-body">
						{{ $quote->content }}
					</div>
				</a>
			@endif

			@if($index < $quotes->count() - 1)
				<hr>
			@endif
		@endforeach
	</div>

@stop