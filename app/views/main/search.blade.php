@extends('_tpls.main.tpl')

@section('styles')
	<style>
		#cse-hosted {
			background-color: #FFFFFF !important;
		}

		.gsc-control-cse {
			border-color: #ddd;
		}
	</style>
@stop

@section('title') {{ $query }} @stop

@section('content')
	<div id="cse-search-results"></div>
	<script type="text/javascript">
	  var googleSearchIframeName = "cse-search-results";
	  var googleSearchFormName = "cse-search-box";
	  var googleSearchFrameWidth = 800;
	  var googleSearchDomain = "www.google.com";
	  var googleSearchPath = "/cse";
	</script>
	<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
@stop