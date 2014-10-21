@extends('_tpls.main.tpl')

@section('title') Quotes by Author Nationality @stop
@section('meta')
	<meta name="title" content="Quotes by Author Nationality">
	<meta name="keywords" content="{{ meta_nationalityIndex($nationalities) }}">
	<meta property="og:title" content="Quotes by Author Nationality" />
@stop

@section('content')
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