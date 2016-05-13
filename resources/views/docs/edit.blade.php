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
			<label for="new-version">
				Create new version 
				<input value="true" name="new_version" id="new-version" type="radio">
			</label>
			<label for="update-old">
				Update current version 
				<input checked="checked" value="false" name="new_version" id="update-old" type="radio">
			</label>
			<button	type="submit">Update Doc</button>
</form>

<form action={{ url("/doc/" . $doc->id . "/delete") }} method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="delete">
	<button type="submit">DELETE</button>
</form>

@stop