@extends('layout')
	@section('content')

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
