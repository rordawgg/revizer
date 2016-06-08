@extends("layout")

@section("title", "Add Document")

@section("content")
	<div class="add-doc">
		<form method="post" action="{{ url('/doc') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<input placeholder="Title" type="text" name="title" class="title-input"/>
			<textarea placeholder="Description" type="text" name="description" class="description-input"/></textarea>
			<label>Category:&nbsp; <select type="text" name="category">
				@foreach($cats as $cat)
					<option value="{{ $cat->id }}">{{ ucfirst($cat->name) }}</option>
				@endforeach
			</select></label>
			<textarea placeholder="Criteria" type="text" name="criteria" class="criteria-input"/></textarea>
			<textarea placeholder="Body" type="text" name="body" class="body-input"></textarea>
			<button	type="submit">Create Doc</button>
		</form>
	</div>

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