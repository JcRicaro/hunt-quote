@extends('_tpls.dashboard.tpl')

@section('title') Authors @stop

@section('header')
	<h1>
	    Authors
	    <small>List of authors</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Authors</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Author List
			</h3>
			<div class="box-tools pull-right">
				{{ $data->links() }}
			</div>
		</div>
		<div class="box-body">
			<a href="{{ URL::to('dashboard/authors/create') }}" class="btn pull-right">
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
							Profession
						</th>
						<th class="col-sm-2">
							Nationality
						</th>
						<th class="col-sm-2">
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $author)
					<tr>
						<td>
							{{ $author->getName() }}
						</td>
						<td>
							<ul class="list-unstyled">
								@foreach($author->professions as $profession)
								<li>{{ $profession->name }}</li>
								@endforeach
							</ul>
						</td>
						<td> {{ $author->nationality->name }} </td>
						<td class="text-right">
							<a href="{{ URL::to('dashboard/authors/' . $author->id . '/edit') }}" class="btn">
								<i class="fa fa-edit"></i>
							</a>
							<a href="#" class="btn delete" data-id="{{ $author->id }}">
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
							url : baseUrl + 'dashboard/authors/' + self.data('id'),
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