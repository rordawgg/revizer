@if(Session::has("alert"))
	<div class="alert {{ session('alert')['level'] }}">{{ Session::get('alert')['message'] }}</div>
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