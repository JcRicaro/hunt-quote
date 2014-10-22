@extends('_tpls.main.ads')

@section('title') Authors @stop
@section('meta')
	<meta name="title" content="Authors starting with letter {{ strtoupper($character) }}">
	<meta name="keywords" content="<?php meta_authorAlpha($authors) ?>">
	<meta name="description" content="Find your favorite authors starting with letter {{ strtoupper($character) }}" />
	<meta property="og:title" content="Authors starting with letter {{ strtoupper($character) }}" />
	<meta property="og:description" content="Find your favorite authors starting with letter {{ strtoupper($character) }}" />
@stop

@section('sub-content')
	@if ( $authors->count() )
	
		<h3> Quotes by '{{ strtoupper($character) }}' authors </h3>
		<hr>

		@include('_tpls.main._.social')

		<table class="table table-hover">
			<thead>
				<tr>
					<th> Author </th>
					<th> Profession </th>
				</tr>
			</thead>

			<tbody>
				@foreach($authors as $author)
					<tr class="author-row">
						<td>
							<a href="{{ route('authors.show', [$author->getIndex(), $author->getSlug()]) }}">
								{{ $author->getName() }}
							</a>
						</td>
						<td>
							@foreach($author->professions as $index => $profession)
							<a href="{{ route('professions.show', $profession->getSlug()) }}">{{ $profession->name }}</a>
							
							@if ( $index < $author->professions->count() - 1 )
								,&nbsp;
							@endif
							@endforeach
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	@else

		<h4> No results for '{{ strtoupper($character) }}' </h4>
		<hr>

	@endif
@stop