@extends("layout")

@section("title", "Categories")

@section("content")
<h2>Categories</h2>
<hr/>
@if(count($categories)==0)
	<h1>No Categories</h1>
@endif

@foreach($categories as $category)
	<li>
		<a href="{{ action('DocsController@show_category', $category->id) }}">{{ $category->name }}</a>
	</li>
@endforeach

@stop