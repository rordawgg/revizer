@if(Session::has("flash_message"))
	<div class="error">{{ Session::get('flash_message') }}</div>
@endif

@if (count($errors) > 0)
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif