@extends('_tpls.main.tpl')

@section('title') Quote Submission @stop
@section('meta') @stop

@section('content')

	<div class="col-md-8">
		<h3> Submit a Quotation </h3>
		<hr>
		<p> If you would like to submit a quote, please follow our guidelines and complete the fields below. It will be reviewed and added to the site if we feel it is a good addition. </p>

		<h3> Who can be quoted? </h3>
		<hr>
		<p> BrainyQuote is interested in quotes by famous people and public figures – those who are in the news, and often the subjects of current interviews and news stories. We do not accept quotations from people, animals or other fictional characters from books, television shows, movies, cartoons, or the like. Quotes must be from famous people; if you are not famous, you will not be quoted. </p>

		<p> Quotable people are newsmakers - people that make headlines by their actions or who are headliners or special guests on major network news programs. People such as Colin Powell, Gordon Brown, Angela Merkel – who hold high-ranking public office – generals, mayors, governors, senators, CEOs, heads of major organizations, or famous names of people in the news, like celebrities, musicians, actors or sports stars. </p>

		<h3> What type of reference URL is required? </h3>
		<hr>
		<ol>
			<li> The URL provided should be from a major newspaper, magazine, journal or professional research site. </li>
			<li> The quote you provide MUST APPEAR on the web page URL you provide. </li>
			<li> We do not accept URL's to blogs, personal websites, or social media networking sites (Facebook, Twitter, LinkedIn). </li>
		</ol>

		@if ( Session::has('success') )
			<div class="alert alert-success">
				<p> {{ Session::get('success') }} </p>
			</div>
		@endif

		@if ( Session::has('error') )
			<div class="alert alert-danger">
				<p> {{ Session::get('error') }} </p>
			</div>
		@endif

		<form action="{{ route('quotes.submission.post') }}" method="POST">
			<div class="form-group">
				<label> Author </label>
				<input type="text" class="form-control" name="author">
			</div>

			<div class="form-group">
				<label> Quotation </label>
				<textarea class="form-control" name="content"></textarea>
			</div>

			<div class="form-group">
				<label> Reference Link </label>
				<input type="text" class="form-control" name="reference">
			</div>

			<button class="btn btn-success" type="submit"> Submit </button>
		</form>

	</div>
@stop