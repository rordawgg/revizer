@extends("layout")

@section('content')

@if($profile->user_id === Auth::user()->id)
    <div>
        <a href="{{ action('ProfileController@edit') }}">Edit</a>
    </div>
@endif
<h1>{{ $profile->username  }}</h1>
<img src="http://www.gravatar.com/avatar/{{ $profile->avatar }}?d=identicon&s=200" alt="">

 @foreach($docs as $doc)
        <article>
            
            <h3><a href="{{ action('DocsController@show', $doc->id) }}">{{ $doc->title }}</a></h3>
            <p>{{ $doc->criteria }}</p>
            
            <h4>Revisions: {{ $doc->revisions()->where("accepted", 0)->count() }}</h4>
            <hr/>
        </article>
    @endforeach


@stop