@extends('_tpls.main.tpl')

@section('title') {{ $topic->name }} @stop
@section('meta') @stop

@section('content')
	<h3> {{ $topic->name }} Quotes </h3>
	<hr>

	<div class="row">
		<div class="col-md-8">
			@if ( $photos->count() )
				@include('main.topics.show.carousel')
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
		</div>
	</div>
@stop