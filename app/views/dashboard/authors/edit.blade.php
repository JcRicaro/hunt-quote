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
		@include('_tpls.dashboard._.flash')
		{{ Form::open([
				'url' 		=> 'dashboard/authors/' . $data->id,
				'method' 	=> 'put',
				'role' 		=> 'form',
				'files'		=> 'true'
			]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('firstname', 'First Name') }}
				{{ Form::text('firstname', $data->firstname, ['class' => 'form-control', 'placeholder' => 'Enter First Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('middlename', 'Middle Name') }}
				{{ Form::text('middlename', $data->middlename, ['class' => 'form-control', 'placeholder' => 'Enter Middle Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('lastname', 'Last Name') }}
				{{ Form::text('lastname', $data->lastname, ['class' => 'form-control', 'placeholder' => 'Enter Last Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('professions', 'Professions') }}
				{{ Form::select('professions[]', $professions, $data->professions->lists('id'), ['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
			</div>

			<div class="form-group">
				{{ Form::label('nationality_id', 'Nationality') }}
				{{ Form::select('nationality_id', $nationalities, $data->nationality->id, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('birth_date', 'Birth Date') }}
				{{ Form::text('birth_date', $data->birth_date->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Enter date']) }}
			</div>


			<div class="form-group">
				{{ Form::label('death_date', 'Death Date') }}
				{{ Form::text('death_date', $data->death_date->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Enter date']) }}
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
	{{ HTML::style('assets/admin-lte/css/datepicker/datepicker3.css') }}
@stop

@section('scripts')
	{{ HTML::script('assets/admin-lte/js/plugins/chosen/chosen.jquery.min.js') }}
	{{ HTML::script('assets/admin-lte/js/plugins/datepicker/bootstrap-datepicker.js') }}

	<script type="text/javascript">
		jQuery(function($)
		{
			$(".chosen-select").chosen({max_selected_options: 5});		
			$('input[name=birth_date]').datepicker();
			$('input[name=death_date]').datepicker();
		})
	</script>
@stop