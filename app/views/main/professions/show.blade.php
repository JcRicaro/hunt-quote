@extends('_tpls.main.tpl')

@section('title') {{ $profession->name }} @stop
@section('meta') @stop

@section('content')
	@if ( $authors->count() )
		<h3> {{ $profession->name }} Quotes </h3>
		<hr>
		{{ $authors->links() }}
		<table class="table table-hover">
			<thead>
				<tr>
					<th> Name </th>
					<th> Birth </th>
					<th> Death </th>
				</tr>
			</thead>

			<tbody>
				@foreach($authors as $author)
					<tr>
						<td class="gaws-row" data-src="{{ route('authors.show', $author->id) }}"> {{ $author->name }} </td>
						<td class="gaws-row" data-src="{{ '' }}"> {{ date('Y', $author->birth_date->timestamp) }} </td>
						<td class="gaws-row" data-src="{{ '' }}"> {{ date('Y', $author->death_date->timestamp) }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<h4> No author is a {{ $profession->name }} </h4>
	@endif
@stop

@section('scripts')
	<script>
		$('.gaws-row').on('click', function() {
			window.location.href = $(this).data('src');
		});
	</script>
@stop