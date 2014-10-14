@extends('_tpls.main.tpl')

@section('title') {{ $topic->name }} @stop
@section('meta') @stop

@section('content')
	<h5> ./. {{ $topic->views }} </h5>
@stop