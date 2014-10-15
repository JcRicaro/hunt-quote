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
						<th>
							Profession
						</th>
						<th class="col-sm-1">
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $author)
					<tr>
						<td>
							{{ $author->name }}
						</td>
						<td>
							{{ $author->profession->name }}
						</td>
						<td>
							<a href="{{ URL::to('dashboard/authors/' . $author->id . '/edit') }}">
								<i class="fa fa-edit"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop