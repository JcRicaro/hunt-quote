@extends('_tpls.main.ads')

@section('title') Professions @stop

@section('meta')
	<meta name="title" content="Authors by Profession">
	<meta name="keywords" content="<?php meta_professionIndex($professions) ?>">
	<meta name="description" content="Find your favorite authors by their profession here at HuntQuote!" />
	<meta property="og:title" content="Authors by Profession" />	
	<meta property="og:description" content="Find your favorite authors by their profession here at HuntQuote!" />
@stop

@section('sub-content')
	<h3> Professions </h3>
	<hr>

	@include('_tpls.main._.social')

	<p> {{ $page }} </p>


	<ul class="list-unstyled gp-list-2">
	@foreach($professions as $profession)
		<li> <a href="{{ route('professions.show', $profession->getSlug()) }}">{{ $profession->name }} </a> </li>
	@endforeach
	</ul>
@stop