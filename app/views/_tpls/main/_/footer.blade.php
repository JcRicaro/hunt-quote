<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="footer-logo-wrapper">
					<img src="{{ asset('assets/img/logo.png') }}" class="footer-logo">
				</div>
			</div>
			<div class="col-md-3">
				<h5 class="footer-head"> Site </h5>
				<hr>

				<ul class="list-unstyled footer-navigation">
					<li> <a href="{{ route('authors.index') }}"> Authors </a> </li>
					<li> <a href="{{ route('topics.index') }}"> Topics </a> </li>
					<li> <a href="{{ route('quotes.submission') }}"> Submission </a> </li>
					<li> <a href="{{ '/' }}"> Quote of the Day </a> </li>
					<li> <a href="{{ route('quotes.photos') }}"> Pictures </a> </li>
					<li> <a href="{{ route('professions.index') }}"> Professions </a> </li>
				</ul>

			</div>
		</div>
	</div>

	<div class="footer-copyright">	
		<p class="text-center">
			Copyright &copy; 2014 - {{ date('Y') }} HuntQuote.
		</p>
	</div>
</footer>