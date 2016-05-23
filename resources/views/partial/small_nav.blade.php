<nav id="sm-nav">
	<ul>
		<li id="nav-menu-cont">
			<a id="nav-menu-btn" href="">
				<div></div>
			</a>
		</li>
		<li>
			<a id="search-menu-btn" href="{{ url('/search') }}">
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