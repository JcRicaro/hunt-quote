@extends('_tpls.main.tpl')

@section('title') {{ $topic->name }} @stop
@section('meta')
	<meta name="title" content="Quote Topics">
	<meta name="keywords" content="{{ meta_topic($topic) }}">
	<meta name="description" content="Get all quotes falling under {{ $topic->name }}" />
	<meta property="og:title" content="Quotes Topics" />
	<meta property="og:description" content="Get all quotes falling under {{ $topic->name }}" />
@stop

@section('content')

	@if ( $quotes->count() )

		<h3> {{ $topic->name }} Quotes </h3>
		<hr>

		@include('_tpls.main._.social')

		@if ( $photos->count() )
			@include('main.topics.show.carousel')
		@endif

		<div class="row">
			<div class="col-md-8">

			{{ $quotes->links() }}

			<div class="row">
				@foreach($quotes->chunk(4) as $chunk)
					<div class="col-md-4">
						@foreach($chunk as $quote)
							<a class="panel panel-default panel-quote" href="{{ route('quotes.show', $quote->id) }}">
								@if ( $quote->hasPhoto() )
									<div class="panel-thumbnail" style="background-image: url({{ $quote->photoURL }});">
									</div>
								@endif
								<div class="panel-body">
									<h4> {{ $quote->content }} </h4>
								</div>
							</a>						
						@endforeach
					</div>
				@endforeach
			</div>

			</div>
		</div>

	@else
		<h4> No quotes posted under {{ $topic->name }} </h4>
		<hr>
		<h5> Return to <a href="{{ route('authors.index') }}">List</a>.
		<div class="placeholder-div"></div>
	@endif
@stop