@extends('layout')

	@section('title', "Results")
	@section('content')
		@if(count($results) === 0)
			<h1>No results</h1>
		@else		
			@if(isset($results['docs']))
				<section>
					<a href={{ url('search/?keyword=' . request()->input('keyword') . '&type=' . 'docs') }}><h2>Documents</h2></a>

					@foreach($results['docs'] as $doc)
			            <h3><a href="{{ url('/doc/' . $doc->id) }}">{{ $doc->title }}</a></h3>
			            <p>{{ $doc->description }}</p>
					@endforeach
				</section>
			@endif
			@if(isset($results['revisions']))
				<hr>
				<section>
					<a href={{ url('search/?keyword=' . request()->input('keyword') . '&type=' . 'revisions') }}><h2>Revisions</h2></a>

					@foreach($results['revisions'] as $revision)
			            <p><a href="{{ url('/doc/' . $revision->doc_id . '/revision/' . $revision->id) }}">{{ $revision->description }}</a></p>              
					@endforeach
				</section>
			@endif
			@if(isset($results['profiles']))
				<hr>

				<section>
					<a href={{ url('search/?keyword=' . request()->input('keyword') . '&type=' . 'profiles') }}><h2>Profiles</h2></a>

					@foreach($results['profiles'] as $profile)
			            <p><a href="{{ url('/user/' . $profile->username) }}">{{ $profile->username }}</a></p>              
					@endforeach
				</section>

			@endif
		@endif		

	@stop
