@extends('_tpls.dashboard.tpl')

@section('title') Edit User @stop

@section('header')
	<h1>
		Users
		<small>Edit</small>
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
				<i class="fa fa-paint-brush"></i> Users
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
				Edit User
			</h3>
		</div>

		@include('_tpls.dashboard._.flash')

		{{ Form::open([
			'url' 		=> 'dashboard/users/' . $user->id,
			'method' 	=> 'put',
			'role' 		=> 'form'
		]) }}

		<div class="box-body">
			<input type="hidden" value="{{ $user->id }}" name="id">
			
			<div class="form-group">
				<label> Username </label>
				<input type="text" class="form-control" name="username" value="{{ $user->username }}">
			</div>

			<div class="form-group">
				<label> Email </label>
				<input type="email" class="form-control" name="email" value="{{ $user->email }}">
			</div>

			<div class="form-group">
				<label> Password </label>
				<input type="password" class="form-control" name="password">
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