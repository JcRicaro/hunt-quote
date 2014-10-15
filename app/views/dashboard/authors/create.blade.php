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
		{{ Form::open([
				'url' 		=> 'dashboard/authors',
				'method' 	=> 'post',
				'role' 		=> 'form'
			]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('occupation', 'Occupation') }}
				{{ Form::text('profession_id', 1, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		{{ Form::close() }}
	</div>
@stop