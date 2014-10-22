@extends('_tpls.dashboard.tpl')

@section('title') Edit Profession @stop

@section('header')
	<h1>
		Professions
		<small>Edit Profession</small>
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
			Edit
		</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Edit Profession
			</h3>
		</div>
		@include('_tpls.dashboard._.flash')
		{{ Form::open([
			'url' 		=> 'dashboard/professions/' . $data->id,
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
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
		</div>
		{{ Form::close() }}
	</div>
@stop