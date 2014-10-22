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