@extends('_tpls.main.tpl')

@section('title') Professions @stop
@section('meta') @stop

@section('content')
	<h3> Professions </h3>
	<hr>

	<p> Can't think of the author's name but know their occupation? Our collection of authors by profession to find quotes by your favorite writer, president, poet, philosopher, musician and more. </p>


	<ul class="list-unstyled gp-list-2">
	@foreach($professions as $profession)
		<li> <a href="{{ route('professions.show', $profession->id) }}">{{ $profession->name }} </a> </li>
	@endforeach
	</ul>
@stop