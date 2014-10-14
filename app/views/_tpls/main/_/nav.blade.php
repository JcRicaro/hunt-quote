<nav class="navbar navbar-gaws" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/img/banner.png') }}" width="150px" class="navbar-logo">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="nav navbar-nav">
        <li class="{{ activeOn('/', false) }}"><a href="{{ url('/') }}">Home</a></li>
        <li class="{{ activeOn('authors') }}"><a href="{{ url('authors') }}">Authors</a></li>
        <li class="{{ activeOn('topics') }}"><a href="{{ url('topics') }}">Topics</a></li>
        <li class="{{ activeOn('topics') }}"><a href="#">Quote of the Day</a></li>
        <li class="{{ activeOn('quotes/photos', false) }}"><a href="{{ route('quotes.photos') }}">Pictures</a></li>
      </ul>
    </div>
  </div>
</nav>