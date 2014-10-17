@extends('_tpls.main.tpl')

@section('title') Authors @stop
@section('meta') @stop

@section('content')
	@if ( $authors->count() )
	
		<h3> Quotes by '{{ strtoupper($character) }}' authors </h3>
		<hr>

		

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
							@foreach($author->professions as $profession)
							<a href="{{ route('professions.show', $profession->getSlug()) }}">{{ $profession->name }}</a>
							&nbsp;
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