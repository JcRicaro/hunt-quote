@extends('_tpls.dashboard.tpl')

@section('title') Quote of the Day @stop

@section('header')
	<h1>
		Quote Of The Day
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Quote Of The Day</a></li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Quote Of The Days
			</h3>
			<div class="box-tools pull-right">
				@if ( $qotd->count() )
					{{ $qotd->links() }}
				@endif
			</div>
		</div>
		<div class="box-body">
			<a href="{{ URL::to('dashboard/qotd/create') }}" class="btn pull-right">
				<i class="fa fa-plus"></i> Create
			</a>
			
			<div class="clearfix"></div>

			@if ( $qotd->count() )
				<table class="table">
					<thead>
						<tr>
							<th>
								Quote
							</th>
							<th class="col-sm-2">
								
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($qotd as $day)
						<tr>
							<td>
								<h5> {{ $day->quote->content }} </h5>
								<p> &mdash;{{ $day->quote->author->getName() }} </p>
							</td>

							<td class="text-right">
								<a href="#" class="btn delete" title="Delete" data-id="{{ $day->id }}">
									<i class="fa fa-remove"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<h4>
					Oops, it seems that no Quote of the Day has been assigned even at least once.
					<a href="{{ URL::to('dashboard/qotd/create') }}">Assign one today!</a>
				</h4>
			@endif
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
							url : baseUrl + 'dashboard/qotd/' + self.data('id'),
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