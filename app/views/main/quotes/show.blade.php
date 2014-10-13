@extends('_tpls.main.tpl')

@section('title') {{ $quote->preview }} @stop
@section('meta') @stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-8 quote-panel">
			<div class="panel-body">
				<h2> {{ $quote->content }} </h2>
				<h4> &mdash; <a href="{{ route('authors.show', $author->id) }}"> {{ $author->name }}  </a> </h4>
				<span class="yagab-icon yagab-before glyphicon glyphicon-pushpin"></span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h3> Biography </h3>
			<hr>

			<div>
				Author Profession: <a href="{{ route('professions.show', $profession->id) }}"> {{ $profession->name }} </a>
			</div>

			<div>
				Born: <a href="#"> {{ date('Y', $author->birth_date->timestamp) }} </a>
			</div>

		</div>

		<div class="col-md-4">
			<h3> Topics </h3>
			<hr>

			@foreach($topics as $index => $topic)
				@if( $index > 1 ), @endif
				<a href="{{ route('topics.show', $topic->id) }}"> {{ $topic->name }} </a>
			@endforeach
		</div>
	</div>
@stop