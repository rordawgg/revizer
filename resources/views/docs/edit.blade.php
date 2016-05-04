@extends("layout")

@section("title", $doc->title)

@section("content")

<form method="post" action="{{ action('DocsController@edit', $doc->id) }}">
   
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_method" value="patch">
		
			<input name="title" value="{{ $doc->title }}"/>
			<input name="description" value="{{ $doc->description }}"/>
			<input name="criteria" value="{{ $doc->criteria }}"/>
			<textarea name="body">{{ $doc->body }}</textarea>
			<button	type="submit">Update Doc</button>
</form>

@stop