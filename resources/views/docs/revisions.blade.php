@foreach($doc->revisions as $revision)
	<li>
		<a href="{{ action('RevisionsController@show', ["doc" => $doc->id, "revision" => $revision->id]) }}">{{ $revision->body }}</a>
	</li>
@endforeach