@extends("layout")

@section("title", "Categories")

@section("content")
<h2>Categories</h2>
<hr/>
@if(count($cats)==0)
	<h1>No Categories</h1>
@endif

@foreach($cats as $cat)
	<li>
		<a href="{{ url("categories/" . $cat->name ) }}">{{ ucfirst($cat->name) }}</a>
	</li>
@endforeach

@stop