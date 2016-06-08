@extends("layout")

@section("title", $doc->title)

@section("content")

	<div id="doc-cont">
		@include("partial.doc_author_info")

		<header class="rev-doc-head">
			<h1>{{ $doc->title }}</h1>
		</header>
		
		<div class="category">
			<div>{{ ucfirst($doc->cat->name) }}</div>
		</div>

		<div class="doc-info">
			<hr>
			<div class="des-crit-cont">
				<div class="description">
					<div class="sm-sub-head"><h5>Description</h5></div>
					<p>{{ $doc->description }}</p>
				</div>

				<div class="criteria">
					<div class="sm-sub-head"><h5>Criteria</h5></div>
					<p>{{ $doc->criteria }}</p>
				</div>
			</div>
			<hr>
		</div>

		<div class="body">
			<div class="sm-sub-head"><h5>Body</h5></div>
			<p><pre>{{ $doc->body }}</pre></p>
			<hr>
		</div>
	</div>

	<div class="doc-rev-cont">
		@unless(request()->user() && (request()->user()->id === $doc->user_id))
			<a class="full-width-link" href="{{ url('/doc/' . $doc->id . '/revision/create') }}">REVISE</a>
		@endif

		@if(count($doc->revisions)!==0)
			@include('docs.revisions')
		@else
			<h1>No revisions</h1>
		@endif		
	</div>

@stop