@extends('_tpls.main.tpl')

@section('title') {{ $author->getName() }} @stop

@section('meta')
	@include('main.authors.show.meta')
@stop


@section('content')
	<div class="row">
		<div class="col-md-8">
			@include('main.authors.show.heading')
		
			@include('_tpls.main._.social')

			@if ( $quotes->count() )
				@if ( $photos->count() )
					@include('main.authors.show.carousel')
				@endif				

				{{ $quotes->links() }}

				@include('main.authors.show.quotes')
			@else
				@include('main.authors.show.fallback')
			@endif
		</div>

		<div class="col-md-4">
			@include('main.authors.show.biography')
		</div>
	</div>
@stop