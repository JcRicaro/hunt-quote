@extends('_tpls.dashboard.tpl')

@section('title') New Tag @stop

@section('header')
	<h1>
	    Tags
	    <small>New Tag</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="{{ URL::to('dashboard/tags') }}"><i class="fa fa-pencil"></i> Tags</a></li>
	    <li class="active">New</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				New Tag
			</h3>
		</div>
		@include('_tpls.dashboard._.flash')
		{{ Form::open([
				'url' 		=> 'dashboard/tags/' . $data->id,
				'method' 	=> 'put',
				'role' 		=> 'form'
			]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'Enter Name Here']) }}
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		{{ Form::close() }}
	</div>
@stop