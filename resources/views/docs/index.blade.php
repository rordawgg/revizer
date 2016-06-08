@extends("layout")

@section("title", $title)

@section("content")

<header>
	<h1>{{ ucfirst($title) }}</h1>
</header>

<div class="doc-list">

	<hr>
	@if(count($docs)==0)
		<h1>No Docs</h1>
	@endif

	<div>
		<a class="full-width-link" href="{{ url('/doc/add') }}">Add Document</a>
	</div>

	<ul class="list">
		@foreach($docs as $doc)
			<li class="listing">
				<a href="{{ url('/doc', [$doc->id]) }}">{{ $doc->title }}</a>
			</li>
		@endforeach
	</ul>

	{!! $docs->render() !!}
</div>

@stop