@extends('_tpls.dashboard.tpl')

@section('title') Edit Author @stop

@section('header')
	<h1>
	    Nationality
	    <small>Edit Nationality</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="{{ URL::to('dashboard/nationalities') }}"><i class="fa fa-pencil"></i> Nationality</a></li>
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
				'url' 		=> 'dashboard/nationalities/' . $nationality->id,
				'method' 	=> 'put',
				'role' 		=> 'form',
				'files'		=> 'true'
			]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', $nationality->name, ['class' => 'form-control', 'placeholder' => 'Enter Name Here']) }}
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		{{ Form::close() }}
	</div>
@stop