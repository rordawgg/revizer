@extends("layout")

@section("title", "Categories")

@section("content")
<div id="cat-cont">
	<header>
		<h1>Categories</h1>
	</header>

	<hr/>

	@if(count($cats)==0)
		<h1>No Categories</h1>
	@endif
	
	<ul class="cat-list">
		@foreach($cats as $cat)
			<li class="cat-listing">
				<a href="{{ url("categories/" . $cat->name ) }}">{{ ucfirst($cat->name) }}</a>
			</li>
		@endforeach
	</ul>
</div>

@stop