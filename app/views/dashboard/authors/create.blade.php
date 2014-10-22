@extends('_tpls.dashboard.tpl')

@section('title') New Author @stop

@section('header')
	<h1>
	    Authors
	    <small>New Author</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="{{ URL::to('dashboard/authors') }}"><i class="fa fa-pencil"></i> Authors</a></li>
	    <li class="active">New</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				New Author
			</h3>
		</div>
		@include('_tpls.dashboard._.flash')
		{{ Form::open([
				'url' 		=> 'dashboard/authors',
				'method' 	=> 'post',
				'role' 		=> 'form',
				'files'		=> 'true'
			]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('firstname', 'First Name') }}
				{{ Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Enter First Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('middlename', 'Middle Name') }}
				{{ Form::text('middlename', null, ['class' => 'form-control', 'placeholder' => 'Enter Middle Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('lastname', 'Last Name') }}
				{{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Enter Last Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('professions', 'Professions') }}
				{{ Form::select('professions[]', $professions, null, ['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
			</div>

			<div class="form-group">
				{{ Form::label('nationality_id', 'Nationality') }}
				{{ Form::select('nationality_id', $nationalities, null, ['class' => 'form-control']) }}
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