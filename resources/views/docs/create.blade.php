@extends("layout")

@section("title", "Add Document")

@section("content")

<form method="post" action="/doc">
   
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			Title:<input name="title"/>
			Description:<input name="description"/>
			Category:<select name="category">
				@foreach($cats as $cat)
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				@endforeach
			</select>
			Criteria:<input name="criteria"/>
			Body:<textarea name="body"></textarea>
			<button	type="submit">Create Doc</button>
</form>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop