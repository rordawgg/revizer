<div class="author-info">
	<img src="http://www.gravatar.com/avatar/{{ $doc->user->profile->avatar }}?d=identicon&s=50" alt="">
	<span>
		{{ $doc->user->profile->username }} - {{ date("m/d/Y", time($doc->updated_at)) }}
		@if(!empty(Auth::user()->id) && ($doc->user_id === Auth::user()->id))
		    <div>
		        <a href="{{ url('/doc/' . $doc->id . '/edit') }}">Edit Document</a>
		    </div>
		@endif
	</span>
</div>