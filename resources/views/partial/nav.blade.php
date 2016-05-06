<nav>
	<ul>
		<li><a href="{{ url("/home") }}">Home</a></li>
		<li><a href="{{ url("/doc") }}">Documents</a></li>
		<li><a href="{{ url("/categories") }}">Categories</a></li>
		<li><a href="{{ url("/user/me") }}">Profile</a></li>
		
		@if(Auth::guest())
			<li><a href="{{ url("/login") }}">Login</a></li>
			<li><a href="{{ url("/register") }}">Register</a></li>
		@else
			<li><a href="{{ url("/logout") }}">Logout</a></li>
		@endif
	</ul>
</nav>