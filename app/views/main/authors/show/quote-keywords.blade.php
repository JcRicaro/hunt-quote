@foreach($quote->tags as $index => $tag)
	<a href="{{ route('tags.show', $tag->name) }}">{{ $tag->name }}</a>{{ ( $index < count($quote->tags) - 1 ) ? ',' : '' }}
@endforeach