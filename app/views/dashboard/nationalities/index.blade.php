@extends('_tpls.dashboard.tpl')

@section('title') Nationality @stop

@section('header')
	<h1>
	    Authors
	    <small>List of authors</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Nationality</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Nationality List
			</h3>
			<div class="box-tools pull-right">
				{{ $nationalities->links() }}
			</div>
		</div>
		<div class="box-body">
			<a href="{{ URL::to('dashboard/nationalities/create') }}" class="btn pull-right">
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
					@foreach($nationalities as $nationality)
					<tr>
						<td>
							{{ $nationality->name }}
						</td>
						<td>
							{{ $nationality->authors->count() }}
						</td>
						<td class="text-right">
							<a href="{{ URL::to('dashboard/nationalities/' . $nationality->id . '/edit') }}" class="btn">
								<i class="fa fa-edit"></i>
							</a>
							<a href="#" class="btn delete" data-id="{{ $nationality->id }}">
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
							url : baseUrl + 'dashboard/nationalities/' + self.data('id'),
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