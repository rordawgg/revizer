@foreach($revisions as $revision)
	<li>
		<a href="{{ url('/doc/' . $doc->id . '/revision/' . $revision->id) }}">{{ $revision->body }}</a>
	</li>
@endforeach