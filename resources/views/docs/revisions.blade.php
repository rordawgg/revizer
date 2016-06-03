<ul class="revision-cont">
	@foreach($revisions as $revision)
		<li class="revision">
			<a href="{{ url('/doc/' . $doc->id . '/revision/' . $revision->id) }}">{{ $revision->body }}</a>
		</li>
	@endforeach
</ul>