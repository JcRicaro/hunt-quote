@extends('_tpls.dashboard.tpl')

@section('title') New Topic @stop

@section('header')
	<h1>
		Topics
		<small>New Topic</small>
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
				<i class="fa fa-comments"></i> Topics
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
				New Topic
			</h3>
		</div>
		@include('_tpls.dashboard._.flash')
		{{ Form::open([
			'url' 		=> 'dashboard/topics',
			'method' 	=> 'post',
			'role' 		=> 'form'
		]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name Here']) }}
			</div>

			<div class="form-group">
				<div class="checkbox">
					<label for="">
						{{ Form::checkbox('is_holiday', true, null, ['class' => 'form-control']) }}
						&nbsp;
						Holiday
					</label>
				</div>
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