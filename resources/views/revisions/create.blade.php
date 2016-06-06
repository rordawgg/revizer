@extends("layout")

@section("title", "Revise")

@section("content")

<div id="original-doc-set">
	<h1>{{ $doc->title }}</h1>
	<p>{{ $doc->description }}</p>
	<p>{{ $doc->criteria }}</p>
</div>

<form method="post" action="{{ url('/doc/' . $doc->id . '/revision/create') }}">
   
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			Description:<input name="description"/>
			Body:<textarea name="body">{{ $doc->body }}</textarea>
			<button	type="submit">REVISE</button>
</form>

@stop