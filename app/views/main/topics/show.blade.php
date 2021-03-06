@extends('_tpls.main.ads')

@section('title') {{ $topic->name }} @stop
@section('meta')
	<meta name="title" content="Quote Topics">
	<meta name="keywords" content="{{ meta_topic($topic) }}">
	<meta name="description" content="Get all quotes falling under {{ $topic->name }}" />
	<meta property="og:title" content="Quotes Topics" />
	<meta property="og:description" content="Get all quotes falling under {{ $topic->name }}" />
@stop

@section('sub-content')

	@if ( $quotes->count() )

		<h3> {{ $topic->name }} Quotes </h3>
		<hr>

		@include('_tpls.main._.social')

		@if ( $photos->count() )
			@include('main.topics.show.carousel')
		@endif

		<div class="row">
			<div class="col-md-12">

			{{ $quotes->links() }}

			<div class="row">
				@foreach($quotes->chunk( ceil($quotes->count() / 2) ) as $chunk)
					<div class="col-md-6">
						@foreach($chunk as $quote)
							<div class="panel panel-default panel-quote">
								@if ( $quote->hasPhoto() )
									<a href="{{ route('quotes.show', $quote->id) }}" class="panel-thumbnail" style="background-image: url({{ $quote->photoURL }}); display: block;">
									</a>
								@endif
								<a href="{{ route('quotes.show', $quote->id) }}" class="panel-body" style="display: block;">
									<h4> {{ $quote->content }} </h4>
								</a>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-9">
											@foreach($quote->tags as $index => $tag)
												<a href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a>{{ ( $index < count($quote->tags) - 1 ) ? ',' : '' }}
											@endforeach
										</div>

										<div class="col-md-3">
											@include('_tpls.main._.social-sm')
										</div>
									</div>
								</div>
							</div>				
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