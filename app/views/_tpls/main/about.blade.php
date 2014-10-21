@extends('_tpls.main.tpl')

@section('content')	
	<div class="row">
		<div class="col-md-8">
			@yield('sub-content')
		</div>

		<div class="col-md-4">
			<div class="well well-sidebar">
				<label> About Us </label>
				<ul class="list-unstyled">
					<li {{ HTML::nav('about') }}> <a href="{{ route('pages.about') }}"> Story </a> </li>
					<li {{ HTML::nav('inquiry') }}> <a href="{{ route('pages.inquire') }}"> Inquire </a> </li>
					<li {{ HTML::nav('submit') }}> <a href="{{ route('pages.submit') }}"> Submit </a> </li>
					<li {{ HTML::nav('privacy') }}> <a href="{{ route('pages.privacy') }}"> Privacy </a> </li>
					<li {{ HTML::nav('terms') }}> <a href="{{ route('pages.terms') }}"> Terms </a> </li>
				</ul>
			</div>
		</div>
	</div>
@stop