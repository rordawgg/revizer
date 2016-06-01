@extends("layout")

@section("title", $doc->title)

@section("content")

	<div id="doc-cont">
		<div class="author-info">
			<img src="http://www.gravatar.com/avatar/{{ $doc->user->profile->avatar }}?d=identicon&s=50" alt="">
			<span>
				{{ $doc->user->profile->username }} - {{ date("m/d/Y", time($doc->updated_at)) }}
				@if(!empty(Auth::user()->id) && ($doc->user_id === Auth::user()->id))
				    <div>
				        <a href="{{ url('/doc/' . $doc->id . '/edit') }}">Edit Document</a>
				    </div>
				@endif
			</span>
		</div>

		<header>
			<h1>{{ $doc->title }}</h1>
		</header>
		
		<div class="category">
			<div>{{ ucfirst($doc->cat->name) }}</div>
		</div>

		<div class="doc-info">
			<hr>
			<div class="des-crit-cont">
				<div class="description">
					<div><h5>Description</h5></div>
					<p>{{ $doc->description }}</p>
				</div>

				<div class="criteria">
					<div><h5>Criteria</h5></div>
					<p>{{ $doc->criteria }}</p>
				</div>
			</div>
			<hr>
		</div>

		<div class="body">
			<h3>Body</h3>
			<p><pre>{{ $doc->body }}</pre></p>
			<hr>
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