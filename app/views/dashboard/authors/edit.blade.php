@extends('_tpls.dashboard.tpl')

@section('title') Edit Author @stop

@section('header')
	<h1>
	    Authors
	    <small>Edit Author</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="{{ URL::to('dashboard/authors') }}"><i class="fa fa-pencil"></i> Authors</a></li>
	    <li class="active">Edit</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Edit Author
			</h3>
		</div>
		{{ Form::open([
				'url' 		=> 'dashboard/authors/' . $data->id,
				'method' 	=> 'put',
				'role' 		=> 'form',
				'files'		=> 'true'
			]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'Enter Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('professions', 'Professions') }}
				{{ Form::select('professions[]', $professions, $data->professions->lists('id'), ['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
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