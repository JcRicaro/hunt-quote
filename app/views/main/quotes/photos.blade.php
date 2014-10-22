@extends('_tpls.main.tpl')

@section('title') Quote Pictures @stop

@section('meta')
	<meta name="title" content="Picture Quotes from various authors">
	<meta name="keywords" content="{{ meta_quotePhotos($quotes) }}">
	<meta name="description" content="Get typographical pictures or vintage, picture quotes from various authors here at HuntQuote!" />
	<meta property="og:title" content="Picture Quotes from various authors" />
	<meta property="og:description" content="Get typographical pictures or vintage, picture quotes from various authors here at HuntQuote!" />
@stop

@section('content')
	<h3> Picture Quotes </h3>
	<hr>

	@include('_tpls.main._.social')

	<p> Can't think of the author's name but know their occupation? Our collection of authors by profession to find quotes by your favorite writer, president, poet, philosopher, musician and more. </p>


	{{ $quotes->links() }}

	<div class="row photo-quote-list">
		@foreach($quotes as $quote)
			<div class="col-md-3 photo-quote-item">
				<a href="{{ route('quotes.show', $quote->getSlug()) }}"
					style="background-image: url({{ $quote->photoURL }});"
					class="photo-quote"
				>
				</a>
			</div>
		@endforeach
	</div>

@stop