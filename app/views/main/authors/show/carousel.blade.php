<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators"> 
    @foreach($photos as $index => $quote)
      <li data-target="#carousel-example-generic" data-slide-to="{{ $index }}"></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach($photos as $index => $quote)
      <div class="item {{ ($index == 0) ? 'active' : '' }}">
        <img src="{{ $quote->photoURL }}" alt="...">
        <div class="carousel-caption">
          {{ $quote->content }}
        </div>
      </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>