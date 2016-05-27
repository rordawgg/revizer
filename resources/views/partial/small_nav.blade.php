<nav id="sm-nav">
	<ul>
		<li id="nav-menu-cont">
			<a id="nav-menu-btn">
				<div></div>
			</a>
			<div id="sm-nav-dropdown">
				<ul>
					<li><a href="{{ url("/home") }}">Home</a></li>
					<li><a href="{{ url("/doc") }}">Documents</a></li>
					<li><a href="{{ url("/categories") }}">Categories</a></li>
					@if(Auth::guest())
						<li><a href="{{ url("/login") }}">Login</a></li>
						<li><a href="{{ url("/register") }}">Register</a></li>
					@else
						<li><a href="{{ url("/logout") }}">Logout</a></li>
					@endif
				</ul>
			</div>
		</li>
		<li>
			<a id="search-menu-btn" class="search-btn" href="{{ url('/search') }}">
				<img src={{ asset("img/icons/search.svg") }} alt="">
			</a>
		</li>
		@if(Auth::check())
			<li>
				<a id="grav-menu-btn" href="{{ url("/user/me") }}">
					<div>
					<img src="http://www.gravatar.com/avatar/{{ Auth::user()->profile->avatar }}?d=identicon&s=200" alt="">
					</div>
				</a>
			</li>
		@endif
	</ul>
</nav>