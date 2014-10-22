@extends('_tpls.main.tpl')

@section('content')	
	<div class="row">
		<div class="col-md-8">
			@yield('sub-content')
		</div>

		<div class="col-md-4">
			@include('_tpls.main._.ads')
		</div>
	</div>
@stop

@section('styles')
	<?php /*<li {{ HTML::nav('submit') }}> <a href="{{ route('pages.submit') }}"> Submit </a> </li> -->*/ ?>
@stop