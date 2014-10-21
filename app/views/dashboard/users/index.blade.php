@extends('_tpls.dashboard.tpl')

@section('title') Users @stop

@section('header')
	<h1>
		Users
	</h1>
@stop

@section('breadcrumbs')
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				Users
			</h3>
			<div class="box-tools pull-right">
				@if ( $users->count() )
					{{ $users->links() }}
				@endif
			</div>
		</div>
		<div class="box-body">
			<a href="{{ URL::to('dashboard/users/create') }}" class="btn pull-right">
				<i class="fa fa-plus"></i> Create
			</a>
			
			<div class="clearfix"></div>

			@if ( $users->count() )
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
						@foreach($users as $user)
						<tr>
							<td>
								<h5> {{ $user->username }} </h5>
							</td>

							<td class="text-right">
								<a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn edit" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
								<a href="#" class="btn delete" title="Delete" data-id="{{ $user->id }}">
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