<nav>
	<div id="logo-cont">
		<span>revizr</span>
		<a href="" class="search-btn u-pull-right">
			{{--<img src={{ asset("imgs/icons/search.svg") }} alt="">--}}
		</a>
	</div>

	<ul>
		<li><a href="{{ url("/home") }}">Home</a></li>
		<li><a href="{{ url("/doc") }}">Documents</a></li>
		<li class="dropdown">
			<a href="{{ url("/categories") }}">Categories</a>
			<ul class="dropdown-content">
				@foreach($cats as $cat)
					<li><a href="{{ url("/categories/" . $cat->name) }}">{{ ucfirst($cat->name) }}</a></li>
				@endforeach
			</ul>
		</li>
		<li><a href="{{ url("/user/me") }}">Profile</a></li>
		
		@if(Auth::guest())
			<li><a href="{{ url("/login") }}">Login</a></li>
			<li><a href="{{ url("/register") }}">Register</a></li>
		@else
			<li><a href="{{ url("/logout") }}">Logout</a></li>
		@endif
	</ul>
</nav>