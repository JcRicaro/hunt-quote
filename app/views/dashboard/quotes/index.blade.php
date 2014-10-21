@extends('_tpls.dashboard.tpl')

@section('title') Tags @stop

@section('header')
	<h1>
		Tags
		<small>List of quotes</small>
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Quotes</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Quote List
			</h3>
			<div class="box-tools pull-right">
				{{ $data->links() }}
			</div>
		</div>
		<div class="box-body">
			<a href="{{ URL::to('dashboard/quotes/create') }}" class="btn pull-right">
				<i class="fa fa-plus"></i> Create
			</a>
			
			<div class="clearfix"></div>

			<table class="table">
				<thead>
					<tr>
						<th class="col-sm-2">
							Author
						</th>
						<th>
							Quote
						</th>
						<th>
							Tags
						</th>
						<th>
							Topics
						</th>
						<th class="col-sm-2">
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $quote)
					<tr>
						<td>
							{{ $quote->author->getName() }}
						</td>
						<td>
							{{ $quote->content }}
						</td>
						<td>
							@foreach($quote->tags as $tag)
							<span class="label label-info">
								#{{ $tag->name }}
							</span>
							&nbsp;
							@endforeach
						</td>
						<td>
							@foreach($quote->topics as $topic)
							<span class="label label-info">
								{{ $topic->name }}	
							</span>
							&nbsp;
							@endforeach
						</td>
						<td class="text-right">
							<a href="{{ URL::to('dashboard/quotes/' . $quote->id . '/edit') }}" class="btn">
								<i class="fa fa-edit"></i>
							</a>
							<a href="#" class="delete btn" data-id="{{ $quote->id }}">
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
							url : baseUrl + 'dashboard/quotes/' + self.data('id'),
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