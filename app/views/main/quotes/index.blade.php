@extends('_tpls.main.tpl')

@section('title') Quotes @stop
@section('meta') @stop

@section('content')
	<h3> Professions </h3>
	<hr>

	<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

	<p> Can't think of the author's name but know their occupation? Our collection of authors by profession to find quotes by your favorite writer, president, poet, philosopher, musician and more. </p>


	@foreach($quotes as $quote)
	@endforeach
@stop