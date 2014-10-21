@extends('_tpls.dashboard.tpl')

@section('title') Edit Quote @stop

@section('header')
	<h1>
		Quotes
		<small>Edit Quote</small>
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
				<i class="fa fa-comment"></i> Quotes
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
				Edit Quote
			</h3>
		</div>
		{{ Form::open([
			'url' 		=> 'dashboard/quotes',
			'method' 	=> 'post',
			'role' 		=> 'form',
			'files'		=> 'true'
		]) }}
		<div class="box-body">
			<div class="form-group">
				{{ Form::label('authors', 'Authors') }}
				{{ Form::select('author_id', $authors, $quote->author->id, ['class' => 'form-control chosen-select']) }}
			</div>

			<div class="form-group">
				{{ Form::label('topics', 'Topics') }}
				{{ Form::select('topics[]', $topics, $quote->topics->lists('id'), ['class' => 'form-control chosen-select', 'multiple' => 'multiple']) }}
			</div>

			<div class="form-group">
				{{ Form::label('tags', 'Tags') }}
				{{ Form::select('tags[]', $tags, $quote->tags->lists('id'), ['class' => 'form-control chosen-select', 'multiple' => 'multiple']) }}
			</div>

			<div class="form-group">
				{{ Form::label('content', 'Quote') }}
				{{ Form::textarea('content', $quote->content, ['class' => 'form-control', 'placeholder' => 'Enter Quote Here']) }}
			</div>

			<div class="form-group">
				{{ Form::label('photo', 'Photo(optional)') }}
				<div class="clearfix"></div>

				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail">
						<img src="{{ $quote->hasPhoto() ? $quote->photoURL : 'http://placehold.it/300x300' }}" alt="...">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
					<div>
						<span class="btn btn-default btn-file">
							<span class="fileinput-new">
								Select image
							</span>
							<span class="fileinput-exists">
								Change
							</span>
							{{ Form::file('photo') }}
						</span>
						<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
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


@section('styles')
	{{ HTML::style('assets/admin-lte/css/chosen/chosen.min.css') }}
	{{ HTML::style('assets/admin-lte/css/jasny/jasny-bootstrap.min.css') }}
@stop

@section('scripts')
	{{ HTML::script('assets/admin-lte/js/plugins/chosen/chosen.jquery.min.js') }}
	{{ HTML::script('assets/admin-lte/js/plugins/jasny/jasny-bootstrap.min.js') }}

	<script type="text/javascript">
		jQuery(function($)
		{
			$(".chosen-select").chosen({max_selected_options: 5});
			$('.fileinput').fileinput()
		})
	</script>
@stop