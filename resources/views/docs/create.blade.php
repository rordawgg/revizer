@extends("layout")

@section("title", $doc->title)

@section("content")

<form method="post" action="/doc/{{ $doc->id }}/create">
   
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			Title:<input name="title"/>
			Description:<input name="description"/>
			Criteria:<input name="criteria"/>
			Body:<textarea name="body"></textarea>
			<button	type="submit">Create Doc</button>
</form>

@stop