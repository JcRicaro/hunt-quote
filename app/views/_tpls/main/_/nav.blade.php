<nav class="navbar navbar-gaws" role="navigation">
  <div class="container clearfix">
    <a href="{{ url('search?cx=partner-pub-5461625363696306%3A2929110835&cof=FORID%3A10&ie=UTF-8&q=huntquote&sa=Search&ref=&ss=') }}" class="btn btn-pogi navbar-link mobile-only" style="float: right; margin-top: 8px;">
      <i class="glyphicon glyphicon-search"> </i>
    </a>
    <a href="{{ url('/') }}" class="btn btn-pogi navbar-link mobile-only" style="float: right; margin-top: 8px; margin-right: 5px;">
      <i class="glyphicon glyphicon-home"> </i>
    </a>
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/banner.png') }}" width="150px" class="navbar-logo">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="nav navbar-nav">
        <li class="{{ activeOn('/', false) }}"><a href="{{ url('/') }}">Home</a></li>
        <li class="{{ activeOn('authors') }}"><a href="{{ route('authors.index') }}">Authors</a></li>
        <li class="{{ activeOn('topics') }}"><a href="{{ route('topics.index') }}">Topics</a></li>
        <li class="{{ activeOn('topics') }}"><a href="{{ route('quotes.otd') }}">Quote of the Day</a></li>
        <li class="{{ activeOn('quotes/photos', false) }}"><a href="{{ route('quotes.photos') }}">Pictures</a></li>
      </ul>

      @include('_tpls.main._.search')
    </div>
  </div>
</nav>