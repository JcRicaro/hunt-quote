<!DOCTYPE html>
<html>
<head>
	<title>HuntQuote - @yield('title')</title>
	<meta charset="utf-8">
	@yield('meta')

	{{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/stylesheet.css') }}
	@yield('styles')
</head>
<body>
	<div class="container">
		@include('_tpls.main._.nav')

		<div class="panel panel-default">
			<div class="panel-body">
				@yield('content')
			</div>
		</div>
	</div>

	{{ HTML::script('vendor/jquery/dist/jquery.min.js') }}
	{{ HTML::script('vendor/bootstrap/dist/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/script.js') }}
	@yield('scripts')
</body>
</html>