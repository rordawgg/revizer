@extends("layout")

@section("title", "revisions")

@section("content")
	<h2>Revision of: {{ $doc->title }}</h2>
	<hr/>
@if(request()->user() && ($doc->user_id === request()->user()->id))
	<form method="post" action="{{ action("RevisionsController@revise", ["doc" => $doc->id, "revision" => $revision->id]) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="patch">
				<button	type="submit">Accept Revision</button>
	</form>
@endif
	{{ $revision->description }}<br>
	{{ $revision->body }}



@stop