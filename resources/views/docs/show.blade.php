@extends("layout")

@section("title", $doc->title)

@section("content")

	<div id="doc-cont">
		@if(!empty(Auth::user()->id) && ($doc->user_id === Auth::user()->id))
		    <div>
		        <a href="{{ url('/doc/' . $doc->id . '/edit') }}">Edit</a>
		    </div>
		@endif
		<header>
			<h1>{{ $doc->title }}</h1>
		</header>

		<div class="category">
			<h2>Category</h2>
			<p>{{ ucfirst($doc->cat->name) }}</p>
		</div>

		<div class="description">
			<h2>Description</h2>
			<p>{{ $doc->description }}</p>
		</div>

		<div class="criteria">
			<h2>Criteria</h2>
			<p>{{ $doc->criteria }}</p>
		</div>

		<div class="body">
			<h2>Body</h2>
			<p>{{ $doc->body }}</p>
		</div>
	</div>
	
	@unless(request()->user() && (request()->user()->id === $doc->user_id))
		<div id="rev-cont">
			<a href="{{ url('/doc/' . $doc->id . '/revision/create') }}">REVISE</a>
		</div>
	@endif


<h1>Revisions</h1>
	@if(count($doc->revisions)!==0)
		@include('docs.revisions')
	@else
		<h1>No revisions</h1>
	@endif		

@stop