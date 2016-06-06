@extends('layout')

@section("title", "Edit " . $user->profile->username . " Profile")

@section("content")

<form method="post" action="{{ url('/user/me') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="patch">

	<legend>Profile Information:</legend>
		<br>
	    First Name: <input name="first_name" value="{{ $user->profile->first_name }}"/><br>
	    Last Name: <input name="last_name" value="{{ $user->profile->last_name }}"/><br>
	    Update Password: <input name="password" type="password" value=""/><br>
	    Confirm Password: <input type="password" name="password_confirmation"><br>
	</fieldset>	
	<button	type="submit">Update</button>
</form>

@stop