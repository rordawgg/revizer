<div class="profile-listing">
	<div class="author-info">
		<img src="http://www.gravatar.com/avatar/{{ $profile->avatar }}?d=identicon&s=50" alt="">
		<span><a href={{ url('user/' . $profile->username)  }}>{{ $profile->username }}</a></span>
	</div>
</div>