@extends('_tpls.main.tpl')

@section('title') Topics @stop
@section('meta') @stop

@section('content')
	<h3> Quote Topics </h3>
	<hr>

	<p class="col-md-11"> Looking for a quote from your favorite topic? Our quote collections are organized by topic to help you find the perfect quote. Enjoy quotes on popular topics like: Love, Life, Friendship, Success, Wisdom. </p>

	<div class="row">
		<div class="col-md-9">
			@foreach($topics as $index => $topic)
				@if ( $index % 16 == 0 )
					<div class="col-md-3">
						<ul class="list-unstyled">
				@endif

					<li> <a href="#"> {{ $topic->name }} </a> </li>

				@if ( $index + 1 % 16 == 0 || $index == count($topics) - 1 )
						</ul>
					</div>
				@endif
			@endforeach
		</div>
	</div>
@stop