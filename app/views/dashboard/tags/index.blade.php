@extends('_tpls.dashboard.tpl')

@section('title') Tags @stop

@section('header')
	<h1>
		Tags
		<small>List of tags</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Tags</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Tag List
			</h3>
			<div class="box-tools pull-right">
				{{ $data->links() }}
			</div>
		</div>
		<div class="box-body">
			@include('_tpls.dashboard._.flash')
			<a href="{{ URL::to('dashboard/tags/create') }}" class="btn pull-right">
				<i class="fa fa-plus"></i> Create
			</a>
			
			<div class="clearfix"></div>

			<table class="table">
				<thead>
					<tr>
						<th>
							Name
						</th>
						<th class="col-sm-2">
							Topics
						</th>
						<th class="col-sm-2">
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $tag)
					<tr>
						<td>
							{{ $tag->name }}
						</td>
						<td>
							{{ $tag->quotes->count() }}
							
						</td>
						<td class="text-right">
							<a href="{{ URL::to('dashboard/tags/' . $tag->id . '/edit') }}" class="btn" title="Edit">
								<i class="fa fa-edit"></i>
							</a>
							<a href="#" class="btn delete" title="Delete" data-id="{{ $tag->id }}">
								<i class="fa fa-remove"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('scripts')
	{{ HTML::script('assets/admin-lte/js/plugins/bootbox/bootbox.min.js') }}

	<script type="text/javascript">
		jQuery(function($)
		{
			$('.delete').click(function()
			{
				var self = $(this);

				bootbox.confirm("Are you sure?", function(result) {
					if(result)
					{
						$.ajax({
							url : baseUrl + 'dashboard/tags/' + self.data('id'),
							type : 'delete',
							success: function(data) {
								if(data.status)
									location.reload()
							},
							data: 'json'
						})
					}
				});

				return false;
			})
		})
	</script>
@stop