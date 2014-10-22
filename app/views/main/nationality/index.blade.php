@extends('_tpls.main.ads')

@section('title') Quotes by Author Nationality @stop
@section('meta')
	<meta name="title" content="Authors by Nationality">
	<meta name="keywords" content="{{ meta_nationalityIndex($nationalities) }}">
	<meta property="description" content="Find your favorite authors according to their nationality here at HuntQuote!" />
	<meta property="og:title" content="Authors by Nationality" />
	<meta property="og:description" content="Find your favorite authors according to their nationality here at HuntQuote!" />
@stop

@section('sub-content')
	@if ( $nationalities->count() )
		<h3> Author by Nationality </h3>
		<hr>

		<ul class="list-unstyled gp-list">
			@foreach($nationalities as $nationality)
				<li> <a href="{{ route('nationalities.show', $nationality->getSlug()) }}"> {{ $nationality->name }} Quotes </a> </li>
			@endforeach
		</ul>
	@endif
@stop