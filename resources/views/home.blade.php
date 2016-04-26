@extends('layouts.app')

@section('content')
@include('partial.search')
    <section>
    <h1>My Documents</h1>
    <hr/>
    @foreach($user->docs as $doc)
        <article>
            
            <h3><a href="{{ action('DocsController@show', $doc->id) }}">{{ $doc->title }}</a></h3>
            <p>{{ $doc->criteria }}</p>
            
            <ul>
                <li>Revisions (num)</li>
                <li>Comments (num)</li>
                <li>Votes (num)</li>
            </ul>
            <hr/>
        </article>
    @endforeach
    </section>
@endsection
