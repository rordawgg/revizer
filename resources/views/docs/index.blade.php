@extends("layout")

@section("title")
	All Docs
@stop

@section("content")

@if(count($docs)==0)
	<h1>No Docs</h1>
@endif

@foreach ($docs as $doc)
	<li>{{ $doc->title }}</li>
@endforeach

@stop