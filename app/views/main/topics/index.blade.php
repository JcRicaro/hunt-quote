@extends('_tpls.main.tpl')

@section('title') Topics @stop
@section('meta')
	<meta name="title" content="Quote Topics">
	<meta name="keywords" content="{{ meta_topicIndex($topics) }}">
	<meta name="description" content="Find your favorite authors' quotes according to topic" />
	<meta property="og:title" content="Quotes Topics" />
	<meta property="og:description" content="Find your favorite authors' quotes according to topic, whether it be seasonal or not!" />
@stop

@section('content')
	<h3> Quote Topics </h3>
	<hr>

	@include('_tpls.main._.social')

	<p class="col-md-11"> Looking for a quote from your favorite topic? Our quote collections are organized by topic to help you find the perfect quote. Enjoy quotes on popular topics like: Love, Life, Friendship, Success, Wisdom. </p>

	<div class="row">
		<div class="col-md-9">
			@foreach($topics as $index => $topic)
				@if ( $index % 16 == 0)
					<div class="col-md-3">
						<ul class="list-unstyled">
				@endif

				<li> <a href="{{ route('topics.show', $topic->getSlug() ) }}"> {{ $topic->name }} </a> </li>

				@if ( $index % 16 == 15 || $index == count($topics) - 1 )
						</ul>
					</div>
				@endif
			@endforeach
		</div>
	</div>

	<h3> Holiday Quotes </h3>
	<hr>

	<div class="row">
		<div class="col-md-9">
			@foreach($holidays as $index => $holiday)
				@if ( $index % 3 == 0)
					<div class="col-md-3">
						<ul class="list-unstyled">
				@endif

				<li> <a href="{{ route('topics.show', $holiday->getSlug()) }}"> {{ $holiday->name }} </a> </li>

				@if ( $index % 3 == 2 || $index == count($holidays) - 1 )
						</ul>
					</div>
				@endif
			@endforeach
		</div>
	</div>
@stop