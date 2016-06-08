@extends("layout")

@section("title", "Revisions")

@section("content")
	<div id="rev-cont">
		@include("partial.rev_author_info")
		
		<header class="rev-doc-head">
			<div class="sm-sub-head"><h5>Revision of:</h5></div>
			<h2>{{ $doc->title }}</h2>
		</header>

		<hr/>
	@if(Auth::check() && $doc->user_id === Auth::user()->id)
		<form method="post" action="{{ url('/doc/' . $doc->id . '/revision/' . $revision->id) }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_method" value="patch">
			<button	type="submit">Accept Revision</button>
		</form>
	@endif

	<div class="rev-info">
		@if(Auth::check() && $revision->user_id === Auth::user()->id)
			<form action={{ url("/doc/" . $doc->id . "/revision/" . $revision->id . "/delete") }} method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="delete">
				<button type="submit">DELETE</button>
			</form>
		@endif

		<div class="description">
			<div class="sm-sub-head"><h5>Description</h5></div>
			<p>{{ $revision->description }}</p>
			<hr>
		</div>

		<div class="diff-cont">
			<div class="sm-sub-head"><h5>Differences</h5></div>
			<p><pre>{!! $diff !!}</p></pre>
		</div>
	</div>
</div>
@stop