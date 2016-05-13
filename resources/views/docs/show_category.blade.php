@extends("layout")

@section("title", $category->name)

@section("content")
<h2>{{ $category->name }}</h2>
<hr/>
@if(count($category->docs)==0)
	<h1>No Docs</h1>
@endif

@foreach($category->docs as $doc)
	<li>
		<a href="{{ url('/doc/', [$doc->id]) }}">{{ $doc->title }}</a>
	</li>
@endforeach

@stop