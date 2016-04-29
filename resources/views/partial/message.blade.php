@if(Session::has("flash_message"))
	<div style="background-color: red;" class="flash-message">{{ Session::get('flash_message') }}</div>
@endif