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

	<p> {{ $page }} </p>


	{{ $quotes->links() }}

	<div class="row photo-quote-list">
		@foreach($quotes as $quote)
			<div class="col-md-3 col-xs-12 photo-quote-item">
				<div class="panel panel-default">
					<a href="{{ route('quotes.show', $quote->getSlug()) }}"
						style="background-image: url({{ $quote->photoURL }});"
						class="photo-quote"
					>
					</a>
					<div class="panel-footer">
						<div class="pw-widget pw-size-small">
							<a class="pw-button-facebook"></a>
							<a class="pw-button-twitter"></a>
							<a class="pw-button-tumblr"></a>
						</div>
						<script src="http://i.po.st/static/v3/post-widget.js#publisherKey=[publisherKey]&retina=true">
						</script>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@stop