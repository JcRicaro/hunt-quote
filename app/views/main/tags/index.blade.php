@extends('_tpls.main.ads')

@section('title') Authors @stop
@section('meta')
	<meta name="title" content="Quotes by Tags">
	<meta name="keywords" content="{{ meta_tagIndex($tags) }}">
	<meta name="description" content="Find great quotes by your favorite authors from Abraham Lincoln to Zsa Zsa Gabor." />
	<meta property="og:title" content="Authors by Letter" />
	<meta property="og:description" content="Find great quotes by your favorite authors from Abraham Lincoln to Zsa Zsa Gabor." />
@stop

@section('sub-content')
	<h3> Favorite Tags </h3>
	<hr>

	{{ $page }}

	@include('_tpls.main._.social')

	<p> {{ ''/*$page*/ }} </p>
	
	<div class="row">
		@foreach($tags as $letter => $chunk)
			@if ( $letter === $keyPositions['middle'] )
				</div>
			@endif

			@if ( $letter === $keyPositions['first'] || $letter === $keyPositions['middle'] )
				<div class="col-md-6">
			@endif

			<h4> {{ $letter }} </h4>
			<hr>
			<ul class="list-unstyled">
				@foreach($chunk as $tag)
				<li>
					<a href="{{ route('tags.show', $tag->name) }}"> {{ $tag->name }}</a>
				</li>
				@endforeach
			</ul>

			@if ( $letter == $keyPositions['last'] )
				</div>
			@endif
		@endforeach
	</div>
@stop