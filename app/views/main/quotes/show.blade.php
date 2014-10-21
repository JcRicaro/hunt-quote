@extends('_tpls.main.tpl')

@section('title') {{ $quote->preview }} @stop

@section('meta')
	<meta name="title" content="{{ $quote->preview }}">
	<meta name="keywords" content="<?php echo meta_quote($quote) ?>">
	<meta property="og:title" content="{{ $quote->preview }}">
@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-8 quote-panel">
			@if ( $quote->hasPhoto() )
				<div class="panel-thumbnail" style="background-image: url({{ $quote->photoURL }});"></div>
			@endif
			<div class="panel-body">
				<h2> {{ $quote->content }} </h2>
				<h4> &mdash; <a href="{{ route('authors.show', $author->id) }}"> {{ $author->name }}  </a> </h4>

				@if ( !$quote->hasPhoto() )
					<span class="yagab-icon yagab-before glyphicon glyphicon-pushpin"></span>
				@endif
			</div>
		</div>
	</div>

	@include('_tpls.main._.social')

	<div class="row">
		<div class="col-md-4">
			<h3> Biography </h3>
			<hr>

			<div>
				Nationality: <a href="{{ route('nationalities.show', $nationality->getSlug()) }}"> {{ $nationality->name }} </a>
			</div>

			<div>
				Author Profession:
				@foreach($professions as $index => $profession)
					<a href="{{ route('professions.show', $profession->id) }}"> {{ $profession->name }} </a>

					@if ( $index < $profession->count() - 1 )
						,
					@endif
				@endforeach
			</div>

			<div>
				Born: <a href="#"> {{ date('Y', $author->birth_date->timestamp) }} </a>
			</div>
		</div>

		<div class="col-md-4">
			<h3> Related Authors </h3>
			<hr>

			@if ( $related )
				<ul class="list-unstyled">				
					@foreach($related as $author)
						<li> <a href="{{ route('authors.show', $author->id) }}"> {{ $author->getName() }} </a> </li>
					@endforeach
				</ul>
			@else
				<h5> {{ $quote->author->getName() }} has no related authors. </h5>
			@endif
		</div>

		<div class="col-md-4">
			<h3> Topics </h3>
			<hr>

			@foreach($topics as $index => $topic)
				<a href="{{ route('topics.show', $topic->id) }}"> {{ $topic->name }} </a>

				@if( $index < $topics->count() - 1 ),&nbsp;@endif
			@endforeach
		</div>
	</div>
@stop