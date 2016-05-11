@extends("layout")

@section("title", $title)

@section("content")

<div>
	<a href="{{ action('DocsController@create') }}">ADD</a>
</div>

@include('partial.search')

<hr>
<h1>{{ $title }}</h1>
@if(count($docs)==0)
	<h1>No Docs</h1>
@endif

@foreach($docs as $doc)
	<li>
		<a href="{{ action('DocsController@show', $doc->id) }}">{{ $doc->title }}</a>
	</li>
@endforeach

@stop