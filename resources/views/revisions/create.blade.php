@extends("layout")

@section("title", "Revise")

@section("content")

<div id="doc-cont">

		<header class="rev-doc-head">
			<h1>{{ $doc->title }}</h1>
		</header>

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

		<div class="create-rev">
			<form method="post" action="{{ url('/doc/' . $doc->id . '/revision/create') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<textarea placeholder="Description" type="text" name="description" class="description-input"/></textarea>
				<textarea placeholder="Body" type="text" name="body" class="body-input">{{ $doc->body }}</textarea>
				<button	type="submit">REVIZE</button>
			</form>
		</div>
	</div>

@stop