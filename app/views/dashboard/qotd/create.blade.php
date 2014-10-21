@extends('_tpls.dashboard.tpl')

@section('title') Set Quote of the Day @stop

@section('header')
	<h1>
		Quote of the Day
		<small>New</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
		<li>
			<a href="{{ URL::to('dashboard') }}">
				<i class="fa fa-dashboard"></i> Dashboard
			</a>
		</li>
		<li>
			<a href="{{ URL::to('dashboard/professions') }}">
				<i class="fa fa-paint-brush"></i> Professions
			</a>
		</li>
		<li class="active">
			New
		</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Set today's Quote of the Day
			</h3>
		</div>

		@include('_tpls.dashboard._.flash')

		{{ Form::open([
			'url' 		=> 'dashboard/qotd',
			'method' 	=> 'post',
			'role' 		=> 'form'
		]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('quote_id', 'Quote') }}
				{{ Form::select('quote_id', $quotes, null, ['class' => 'chosen-select form-control']) }}
			</div>
		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
		</div>
		{{ Form::close() }}
	</div>
@stop


@section('styles')
	{{ HTML::style('assets/admin-lte/css/chosen/chosen.min.css') }}
@stop

@section('scripts')
	{{ HTML::script('assets/admin-lte/js/plugins/chosen/chosen.jquery.min.js') }}

	<script type="text/javascript">
		jQuery(function($)
		{
			$(".chosen-select").chosen({max_selected_options: 5});		
		})
	</script>
@stop