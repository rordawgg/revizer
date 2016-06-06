@extends("layout")

@section("title", "Add Document")

@section("content")

<form method="post" action="{{ url('/doc') }}">
   
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			Title:<input name="title"/>
			Description:<input name="description"/>
			Category:<select name="category">
				@foreach($cats as $cat)
					<option value="{{ $cat->id }}">{{ ucfirst($cat->name) }}</option>
				@endforeach
			</select>
			Criteria:<input name="criteria"/>
			Body:<textarea name="body"></textarea>
			<button	type="submit">Create Doc</button>
</form>

@stop