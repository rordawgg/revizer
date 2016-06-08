<div class="author-info">
	<img src="http://www.gravatar.com/avatar/{{ $revision->user->profile->avatar }}?d=identicon&s=50" alt="">
	<span>
		{{ $revision->user->profile->username }} - {{ date("m/d/Y", time($revision->updated_at)) }}
	</span>
</div>