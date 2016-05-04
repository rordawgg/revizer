@extends("layout")

@section("title", "revisions")

@section("content")
	<h2>Revision of: {{ $doc->title }}</h2>
	<hr/>
@if(Auth::check() && $doc->user_id === Auth::user()->id)
	<form method="post" action="{{ action("RevisionsController@revise", ["doc" => $doc->id, "revision" => $revision->id]) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="patch">
				<button	type="submit">Accept Revision</button>
	</form>
@endif
	<h4>Description: {{ $revision->description }}</h4>

	<p>{{ $revision->body }}</p>



@stop