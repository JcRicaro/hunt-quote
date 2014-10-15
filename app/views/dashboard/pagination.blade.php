@if ($paginator->getLastPage() > 1)
<?php $previousPage = ($paginator->getCurrentPage() > 1) ? $paginator->getCurrentPage() - 1 : 1; ?>  
<ul class="pagination pagination-sm no-margin">
	<li class="{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}">
		@if($paginator->getCurrentPage() == 1)
			<a href="#">«</a>
		@else
		<a href="{{ $paginator->getUrl($previousPage) }}" rel="prev">«</a>
		@endif		
	</li>
  	@for ($i = 1; $i <= $paginator->getLastPage(); $i++)
  	<li class="{{ ($paginator->getCurrentPage() == $i) ? ' active' : '' }}" >
      @if($paginator->getCurrentPage() == $i)
      <a href="#">
        {{ $i }}  
      </a>
      @else
      <a href="{{ $paginator->getUrl($i) }}">
      {{ $i }}
      </a>  
      @endif
  	</li>
  	@endfor

  	<li class="{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
  		@if($paginator->getCurrentPage() == $paginator->getLastPage())
  			<a href="#">»</a>
  		@else
  		<a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" rel="next">»</a>
		@endif
  	</li>
</ul>  
@endif