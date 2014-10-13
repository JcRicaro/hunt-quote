@extends('_tpls.main.tpl')

@section('title') Authors @stop
@section('meta') @stop

@section('content')
	<pre>
	{{ $authors}}
	</pre>
	@foreach($authors as $author)
		{{ $author->name }}
	@endforeach
@stop