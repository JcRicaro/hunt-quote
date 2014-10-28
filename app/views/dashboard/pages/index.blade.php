@extends('_tpls.dashboard.tpl')

@section('title') Pages @stop

@section('header')
	<section class="content-header">
        <h1>
            Pages
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pages</li>
        </ol>
    </section>
@stop

@section('content')
	
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Update Pages
			</h3>
		</div>
		<div class="box-body">
			@include('_tpls.dashboard._.flash')
			{{ Form::open(['route' => 'dashboard.pages.update', 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) }}

			<div class="form-group">
				{{ Form::label('', ' Authors Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="authors" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['authors']->value }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('', ' Topics Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="topics" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['topics']->value }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('', ' Nationalities Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="nationalities" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['nationalities']->value }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('', ' Professions Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="professions" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['professions']->value }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('', ' Tags Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="tags" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['tags']->value }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('', ' Quote of the Day Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="qotd" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['qotd']->value }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('', ' Picture Quotes Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="pictures" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['pictures']->value }}
					</textarea>
				</div>
			</div>
			
			<div class="form-group">
				{{ Form::label('', ' About Us ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea class="textarea" name="story" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{ $config['story']->value }}
					</textarea>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('', ' Terms Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="terms" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['terms']->value }}
					</textarea>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('selling_second', ' Privacy Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="privacy" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['privacy']->value }}
					</textarea>
				</div>
			</div>

			<div class="space-4"></div>

<!-- 			<div class="form-group">
				{{ Form::label('selling_third', ' Submission Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="submit" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['submit']->value }}
					</textarea>
				</div>
			</div> -->

			<div class="space-4"></div>

			<div class="form-group">
				{{ Form::label('buying_first', ' Inquiry Page ', ['class' => 'control-label no-padding-right col-sm-2']) }}
				<div class="col-sm-8">
					<textarea name="inquire" id="" cols="30" rows="10" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						{{  $config['inquire']->value }}
					</textarea>
				</div>
			</div>

			<div class="space-4"></div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="icon-ok bigger-110"></i>
						Submit
					</button>

					<button class="btn" type="reset">
						<i class="icon-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>

			{{ Form::close() }}
		</div>
	</div>
@stop

@section('styles')
	{{ HTML::style('assets/admin-lte/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
@stop

@section('scripts')
	{{ HTML::script('assets/admin-lte/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
	<script type="text/javascript">
		jQuery(function($)
		{
			$(".textarea").wysihtml5()
		})
	</script>
@stop