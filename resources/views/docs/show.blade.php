@extends("layout")

@section("title", $doc->title)

@section("content")

	<div id="doc-cont">
		@if(!empty(Auth::user()->id) && ($doc->user_id === Auth::user()->id))
		    <div>
		        <a href="{{ action('DocsController@edit', $doc->id) }}">Edit</a>
		    </div>
		@endif
		<header>
			<h1>{{ $doc->title }}</h1>
		</header>

		<div class="description">
			<h2>Description</h2>
			<p>{{ $doc->description }}</p>
		</div>

		<div class="criteria">
			<h2>Criteria</h2>
			<p>{{ $doc->criteria }}</p>
		</div>

		<div class="body">
			<p>{{ $doc->body }}</p>
		</div>
	</div>

	<div id="rev-cont">
		<a href="{{ action('RevisionsController@create', ['doc' => $doc->id]) }}">REVISE</a>
	</div>


<h1>Revisions</h1>
	@if(count($doc->revisions)!==0)
		@include('docs.revisions')
	@else
		<h1>No revisions</h1>
	@endif		

@stop