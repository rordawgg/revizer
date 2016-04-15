@extends("layout")

@section("title", "Add Document")

@section("content")

<form method="post" action="/doc/add">
   
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			Title:<input name="title"/>
			Description:<input name="description"/>
			Criteria:<input name="criteria"/>
			Body:<textarea name="body"></textarea>
			<button	type="submit">Create Doc</button>
</form>

@stop