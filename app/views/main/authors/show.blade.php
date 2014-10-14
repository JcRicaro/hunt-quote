@extends('_tpls.main.tpl')

@section('title') {{ $author->name }} @stop
@section('meta') @stop

@section('content')
	<h3> {{ $author->name }}'s Quotes </h3>
	<hr>

	<div class="row">
		<div class="col-md-8">

			@if ( $quotes->count() )

				@if ( $photos->count() )
					@include('main.authors.show.carousel')
				@endif

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

			@else

				<h5> No quotes by {{ $author->name }}. Back to <a href="{{ route('authors.index') }}">list</a>. </h5>

			@endif
		</div>
	</div>
@stop