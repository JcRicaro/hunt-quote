@extends('_tpls.main.ads')

@section('title') Authors @stop
@section('meta')
	<meta name="title" content="Authors by Letter">
	<meta name="keywords" content="<?php meta_authorIndex($authorsByLetter) ?>">
	<meta name="description" content="{{ $page }}" />
	<meta property="og:title" content="Authors by Letter" />
	<meta property="og:description" content="Find great quotes by your favorite authors from Abraham Lincoln to Zsa Zsa Gabor." />
@stop

@section('sub-content')
	<h3> Favorite Authors </h3>
	<hr>

	@include('_tpls.main._.social')

	<p> {{ $page }} </p>
	
	@foreach($authorsByLetter as $letter => $authors)
		@if ( $letter === $keyPositions['middle'] )
			</div>
		@endif

		@if ( $letter === $keyPositions['first'] || $letter === $keyPositions['middle'] )
			<div class="col-md-6">
		@endif

		<h4> {{ $letter }} </h4>
		<hr>
		<ul class="list-unstyled">
			@foreach($authors as $author)			
			<li>
				<a href="{{ route('authors.show', [$author->getIndex(), $author->getSlug()]) }}"> {{ $author->getName() }}</a>
			</li>
			@endforeach
		</ul>

		@if ( $letter == $keyPositions['last'] )
			</div>
		@endif
	@endforeach
@stop