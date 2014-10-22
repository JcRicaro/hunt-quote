@extends('_tpls.main.tpl')

@section('title') Authors @stop
@section('meta')
	<meta name="title" content="Authors by Letter">
	<meta name="keywords" content="<?php meta_authorIndex($authorsByLetter) ?>">
	<meta name="description" content="Find great quotes by your favorite authors from Abraham Lincoln to Zsa Zsa Gabor." />
	<meta property="og:title" content="Authors by Letter" />
	<meta property="og:description" content="Find great quotes by your favorite authors from Abraham Lincoln to Zsa Zsa Gabor." />
@stop

@section('content')
	<h3> Favorite Authors </h3>
	<hr>

	@include('_tpls.main._.social')

	<p> Looking for quotes by our most popular authors? Gather wisdom from the ages as you browse favorite quotes by famous authors like: Aristotle, Abraham Lincoln, Thomas Jeferson, Oscar Wilde, and William Shakespeare. </p>
	
	@foreach($authorsByLetter as $letter => $authors)
		@if ( $letter === 'L' )
			</div>
		@endif

		@if ( $letter == 'A' || $letter == 'L' )
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

		@if ( $letter == 'Y' )
			</div>
		@endif
	@endforeach
@stop