@extends("layout")

@section("title", "Documents")

@section("content")
@include('partial.search')

@if(count($docs)==0)
	<h1>No Docs</h1>
@endif

<div>
	<a href="{{ action('DocsController@create') }}">ADD</a>
</div>

@foreach($docs as $doc)
	<li>
		<a href="{{ action('DocsController@show', $doc->id) }}">{{ $doc->title }}</a>
	</li>
@endforeach

@stop