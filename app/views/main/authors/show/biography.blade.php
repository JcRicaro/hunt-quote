<h3> Biography </h3>
<hr>

<div>
	Nationality:
	<a href="{{ route('nationalities.show', $author->nationality->getSlug()) }}">
		{{ $author->nationality->name }}
	</a>
</div>

<div>
	Profession:
	@foreach($author->professions as $index => $profession)
		<a href="{{ route('professions.show', $profession->getSlug() ) }}"> {{ $profession->name }} </a>
			@if ( $index < $author->professions->count() - 1 ), @endif
	@endforeach
</div>

<div>
	Born: {{ $author->birth_date->format('M d, Y') }}
</div>

<div>
	Died: {{ $author->death_date->format('M d, Y') }}
</div>

@include('_tpls.main._.ads')