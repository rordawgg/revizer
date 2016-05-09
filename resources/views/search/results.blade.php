@extends('layout')
	@section('content')


		@if((count($docs) === 0) && (count($revisions) === 0) &&(count($profiles) === 0))
			<h1>No results</h1>
		@else
			<section>
				<h2>Documents</h2>

				@foreach($docs as $doc)
		            <h3><a href="/doc/{{ $doc->id }}">{{ $doc->title }}</a></h3>
		            <p>{{ $doc->description }}</p>
				@endforeach
			</section>

			<hr>

			<section>
				<h2>Revisions</h2>

				@foreach($revisions as $revision)
		            <p><a href="/doc/{{ $revision->doc_id }}/revision/{{ $revision->id }}">{{ $revision->description }}</a></p>              
				@endforeach
			</section>

			<hr>

			<section>
				<h2>Profiles</h2>

				@foreach($profiles as $profile)
		            <p><a href="/user/{{ $profile->username }}">{{ $profile->username }}</a></p>              
				@endforeach
			</section>

		@endif

	@stop
