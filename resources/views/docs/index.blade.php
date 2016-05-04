@extends("layout")

@section("title", "Documents")

@section("content")

<div>
	<a href="{{ action('DocsController@create') }}">ADD</a>
</div>

@include('partial.search')

<hr>

@if(count($docs)==0)
	<h1>No Docs</h1>
@endif

@foreach($docs as $doc)
	<li>
		<a href="{{ action('DocsController@show', $doc->id) }}">{{ $doc->title }}</a>
	</li>
@endforeach

@stop