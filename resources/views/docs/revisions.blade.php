@foreach($doc->revisions as $revision)
	<li>
		{{ $revision->body }}
	</li>
@endforeach