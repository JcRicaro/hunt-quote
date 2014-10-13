<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">HuntQuote</a>
  </div>

  <div class="collapse navbar-collapse" id="main-nav">
    <ul class="nav navbar-nav">
      <li class="{{ activeOn('/', false) }}"><a href="#">Home</a></li>
      <li class="{{ activeOn('authors') }}"><a href="#">Authors</a></li>
      <li class="{{ activeOn('topics') }}"><a href="#">Topics</a></li>
      <li class="{{ activeOn('topics') }}"><a href="#">Quote of the Day</a></li>
      <li class="{{ activeOn('topics') }}"><a href="#">Pictures</a></li>
    </ul>
  </div>
</nav>