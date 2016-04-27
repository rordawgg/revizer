@extends("layout")

@section("title", "revisions")

@section("content")
	<h2>Revision of: {{ $doc->title }}</h2>
	<hr/>
	{{ $revision->description }}<br>
	{{ $revision->body }}



@stop