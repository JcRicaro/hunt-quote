@extends('_tpls.main.tpl')

@section('title') {{ $topic->name }} @stop
@section('meta') @stop

@section('content')

	@if ( $quotes->count() )

		<h3> {{ $topic->name }} Quotes </h3>
		<hr>

		@if ( $photos->count() )
			@include('main.topics.show.carousel')
		@endif

		<div class="row">
			<div class="col-md-8">

			{{ $quotes->links() }}

			<ul class="gp-list list-unstyled">
				@foreach($quotes as $quote)
					<li>
						<div class="panel panel-default">
							@if ( $quote->hasPhoto() )
								<div class="panel-thumbnail" style="background-image: url({{ $quote->photoURL }});">
								</div>
							@endif
							<div class="panel-body">
								<h4> {{ $quote->content }} </h4>
							</div>
						</div>						
					</li>
				@endforeach
			</ul>

			</div>
		</div>

	@else
		<h4> No quotes posted under {{ $topic->name }} </h4>
		<hr>
		<h5> Return to <a href="{{ route('authors.index') }}">List</a>.
		<div class="placeholder-div"></div>
	@endif
@stop