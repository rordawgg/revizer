@extends("layout")

@section('content')

<div id="profile-cont">
    <header>
        @if(isset(Auth::user()->id) && $profile->user_id === Auth::user()->id)
            <div>
                <a href="{{ url('/user/me/edit') }}">Edit</a>
            </div>
        @endif
        
        <div class="lg-profile-pic">
            <img src="http://www.gravatar.com/avatar/{{ $profile->avatar }}?d=identicon&s=200" alt="Profile picture">
        </div>

        <h1>{{ $profile->username  }}</h1>
        
    </header>
</div>

<hr>

@if(!count($docs) == 0)
    @foreach($docs as $doc)
        <article>
            
            <h3><a href="{{ url('/doc/' . $doc->id) }}">{{ $doc->title }}</a></h3>
            <p>{{ $doc->criteria }}</p>
            
            <h4>Revisions: {{ $doc->revisions()->where("accepted", 0)->count() }}</h4>
            <hr/>
        </article>
    @endforeach
@else
<h1>No documents</h1>
@endif
{!! $docs->render() !!}

@stop