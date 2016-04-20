@extends('layout')
	@section('content')


		@if(count($search) === 0)
			<h1>No results</h1>
		@endif
		@foreach($search as $doc)
		        <article>
		            
		            <h3><a href="/doc/{{ $doc->id }}">{{ $doc->title }}</a></h3>
		            <p>{{ $doc->criteria }}</p>
		            
		            <ul>
		                <li>Revisions (num)</li>
		                <li>Comments (num)</li>
		                <li>Votes (num)</li>
		            </ul>
		            <hr/>
		        </article>
		@endforeach

	@stop
