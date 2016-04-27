@extends("layout")

@section("title")
	All Docs
@stop

@section("content")
@include('partial.search')

@if(count($docs)==0)
	<h1>No Docs</h1>
@endif

@foreach($docs as $doc)
	<li>
		<a href="{{ action('DocsController@show', $doc->id) }}">{{ $doc->title }}</a>
	</li>
@endforeach

@stop