@extends('_tpls.main.tpl')

@section('title') {{ $profession->name }} @stop

@section('meta')
	<meta name="title" content="{{ $profession->name }} Quotes">
	<meta name="keywords" content="{{ $profession->name }}, <?php meta_profession($authors) ?>">
	<meta property="og:title" content="{{ $profession->name }} Quotes" />	
@stop

@section('content')
	<div class="row">
		<div class="col-sm-8">
			@if ( $authors->count() )
				<h3> {{ $profession->name }} Quotes </h3>
				<hr>
				
				@include('_tpls.main._.social')

				{{ $authors->links() }}
				<table class="table table-hover">
					<thead>
						<tr>
							<th> Name </th>
							<th> Birth - Death </th>
						</tr>
					</thead>

					<tbody>
						@foreach($authors as $author)
							<tr>
								<td class="gaws-row">
									<a href="{{ route('authors.show', [$author->getIndeX(), $author->getSlug()]) }}">
										{{ $author->getName() }}
									</a>
								</td>
								<td class="gaws-row">
									{{ date('Y', $author->birth_date->timestamp) }} - {{ date('Y', $author->death_date->timestamp) }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<h4> No author is a {{ $profession->name }} </h4>
			@endif
		</div>
	</div>
@stop