@extends("layout")

@section("title", $category->name)

@section("content")
<div id="cat-cont">
	<header>
		<h1>{{ $category->name }}</h1>
	</header>
	<hr/>
	@if(count($category->docs)==0)
		<h1>No Docs</h1>
	@endif

	@foreach($category->docs as $doc)
		<li>
			<a href="{{ url('/doc/', [$doc->id]) }}">{{ $doc->title }}</a>
		</li>
	@endforeach
</div>

@stop