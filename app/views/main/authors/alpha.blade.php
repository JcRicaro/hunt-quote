@extends('_tpls.main.tpl')

@section('title') Authors @stop
@section('meta') @stop

@section('content')
	@if ( $authors->count() )
	
		<h3> Quotes by '{{ strtoupper($character) }}' authors </h3>
		<hr>

		{{ $authors->links() }}

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
						<td data-src="{{ route('authors.show', $author->id) }}"> {{ $author->name }} </td>
						<td data-src="{{ route('professions.show', $author->profession->id) }}"> {{ $author->profession->name }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>

	@else

		<h4> No results for '{{ strtoupper($character) }}' </h4>
		<hr>

	@endif
@stop

@section('scripts')
	<script>
		// For yolo
		$('.author-row > td').on('click', function (e) {
			window.location.href = $(this).data('src');
		});
	</script>
@stop