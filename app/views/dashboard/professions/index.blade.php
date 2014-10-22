@extends('_tpls.dashboard.tpl')

@section('title') Professions @stop

@section('header')
	<h1>
		Professions
		<small>List of Professions</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
		<li>
			<a href="{{ URL::to('dashboard') }}">
				<i class="fa fa-dashboard"></i> Home
			</a>
		</li>
		<li class="active">
			Professions
		</li>
	</ol>
@stop


@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Professions List
			</h3>
			<div class="box-tools pull-right">
				{{ $data->links() }}
			</div>
		</div>
		@include('_tpls.dashboard._.flash')
		
		<div class="box-body">
			<a href="{{ URL::to('dashboard/professions/create') }}" class="btn pull-right">
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
							Author Count
						</th>
						<th class="col-sm-2">
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $profession)
					<tr>
						<td>
							{{ $profession->name }}
						</td>
						<td>
							{{ $profession->authors->count() }}
						</td>
						<td class="text-right">
							<a href="{{ URL::to('dashboard/professions/' . $profession->id . '/edit') }}" class="btn">
								<i class="fa fa-edit"></i>
							</a>
							<a href="#" class="btn delete" data-id="{{ $profession->id }}">
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
							url : baseUrl + 'dashboard/professions/' + self.data('id'),
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