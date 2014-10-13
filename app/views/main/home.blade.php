@extends('_tpls.main.tpl')

@section('title') Home @stop
@section('meta') @stop

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<h3> Popular Topics </h3>
					<hr>
					<ul class="list-unstyled">
						@foreach ($popularTopics as $topic)
							<li> <a href="#"> {{ $topic->name }} </a> </li>
						@endforeach
					</ul>
				</div>

				<div class="col-md-6">
					<h3> Popular Authors </h3>
					<hr>
					<ul class="list-unstyled">
						@foreach ($popularAuthors as $author)
							<li> <a href="#"> {{ $author->name }} </a> </li>
						@endforeach
					</ul>
				</div>
			</div>

			<h3> Picture Quotes </h3>
			<hr>
			<div class="row">
				@foreach($pictureQuotes as $quote)
					<div class="col-md-6">
						<a href="#"> <img src="{{ $quote->photoURL }}" class="img-responsive"> </a>
					</div>
				@endforeach
			</div>

			<h3> Authors to Explore </h3>
			<hr>
		</div>

		<div class="col-md-4">
			<h3> Quote of the Moment </h3>
			<hr>

			<h3> Today's Birthdays </h3>
			<hr>
			<ul class="list-unstyled">
				@foreach ($recentlyUpdatedAuthors as $author)
					<li> {{ $author->birth_date }} - <a href="#"> {{ $author->name }} </a> </li>
				@endforeach
			</ul>


			<h3> In The News </h3>
			<hr>
			<ul class="list-unstyled">
				@foreach($recentlyUpdatedAuthors as $author)
					<li> <a href="#"> {{ $author->name }} </a> </li>
				@endforeach
			</a>
		</div>
	</div>
@stop