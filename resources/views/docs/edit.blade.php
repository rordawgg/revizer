@extends("layout")

@section("title", $doc->title)

@section("content")

<div class="edit-doc">
	<form method="post" action="{{ url('/doc/' . $doc->id . '/edit') }}"> 
		<input placeholder="Title" value="{{ $doc->title }}" type="text" name="title" class="title-input"/>
			<textarea placeholder="Description" type="text" name="description" class="description-input"/>{{ $doc->description }}</textarea>
			<textarea placeholder="Criteria" type="text" name="criteria" class="criteria-input"/>{{ $doc->criteria }}</textarea>
			<textarea placeholder="Body" type="text" name="body" class="body-input">{{ $doc->body }}</textarea>			
		<label class="version">
			Create new version 
			<input value="true" name="new_version" id="new-version" type="radio">&nbsp; 
			Update current version 
			<input checked="checked" value="false" name="new_version" id="update-old" type="radio">
		</label>
		<button	type="submit">Update Doc</button>
	</form>
</div>

<div class="edit-doc">
	<form action={{ url("/doc/" . $doc->id . "/delete") }} method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="delete">
		<button type="submit">DELETE</button>
	</form>
</div>
@stop