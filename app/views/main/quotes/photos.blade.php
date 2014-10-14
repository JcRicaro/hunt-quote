@extends('_tpls.main.tpl')

@section('title') Quote Pictures @stop
@section('meta') @stop

@section('content')
	<h3> Picture Quotes </h3>
	<hr>

	<p> Can't think of the author's name but know their occupation? Our collection of authors by profession to find quotes by your favorite writer, president, poet, philosopher, musician and more. </p>

	{{ $quotes->links() }}

	<div class="row photo-quote-list">
		@foreach($quotes as $quote)
			<div class="col-md-3 photo-quote-item">
				<a href="{{ route('quotes.show', $quote->id) }}"
					style="background-image: url({{ $quote->photoURL }});"
					class="photo-quote"
				>
				</a>
			</div>
		@endforeach
	</div>

@stop