@extends('_tpls.main.tpl')

@section('title') {{ $author->getName() }} @stop
@section('meta')
	<meta name="title" content="Quotes by {{ $author->getName() }}">
	<meta name="keywords" content="<?php meta_author($author); ?>">
	<meta property="og:title" content="Quotes by {{ $author->getName() }}" />
	<meta property="og:description" content="Enjoy the best {{ $author->getName() }} at HuntQuote. Quotations by {{ $author->getName() }}{{ meta_authorDesc($author->professions, $author->nationality) }}Born {{ date('M d, y', $author->birth_date->timestamp) }}. Share with your friends.">
	<meta name="description" content="Enjoy the best {{ $author->getName() }} at HuntQuote. Quotations by {{ $author->getName() }}{{ meta_authorDesc($author->professions, $author->nationality) }}Born {{ date('M d, y', $author->birth_date->timestamp) }}. Share with your friends.">
@stop


@section('content')
	<div class="row">
		<div class="col-md-8">
			<h3> {{ $author->getName() }}'s Quotes </h3>
			<hr>
		
			@include('_tpls.main._.social')

			@if ( $quotes->count() )

				@if ( $photos->count() )
					@include('main.authors.show.carousel')
				@endif				

				{{ $quotes->links() }}

				<div class="row">
					@foreach($quotes->chunk(2) as $chunk)
						<div class="col-md-4">
							@foreach($chunk as $quote)
									<a class="panel panel-default panel-quote" href="{{ route('quotes.show', $quote->id) }}">
										@if ( $quote->hasPhoto() )
											<div class="panel-thumbnail" style="background-image: url({{ $quote->photoURL }});">
											</div>
										@endif
										<div class="panel-body">
											<h4> {{ $quote->content }} </h4>
										</div>
									</a>						
								</li>
							@endforeach
						</div>
					@endforeach
				</div>

			@else

				<h5> No quotes by {{ $author->name }}. Back to <a href="{{ route('authors.index') }}">list</a>. </h5>

			@endif
		</div>

		<div class="col-md-4">
			<h3> Biography </h3>
			<hr>

			<div>
				Nationality: <a href="{{ route('nationalities.show', $author->nationality->getSlug()) }}"> {{ $author->nationality->name }} </a>
			</div>

			<div>
				Profession:
				@foreach($author->professions as $index => $profession)
					<a href="{{ route('professions.show', $profession->getSlug() ) }}"> {{ $profession->name }} </a>

					@if ( $index < $author->professions->count() - 1 )
						,
					@endif
				@endforeach
			</div>

			<div>
				Born: {{ $author->birth_date->format('M d, Y') }}
			</div>

			<div>
				Died: {{ $author->death_date->format('M d, Y') }}
			</div>

			@include('_tpls.main._.ads')
		</div>
	</div>
@stop