@extends('layout')

@section('content')

    <section>
    <h1>My Documents</h1>
    <hr/>
    @foreach($docs as $doc)
        <article>
            
            <h3><a href="{{ url('/doc', [$doc->id]) }}">{{ $doc->title }}</a></h3>
            <p>{{ $doc->criteria }}</p>

            <hr>
        </article>
    @endforeach
    </section>
    {!! $docs->render() !!}
@stop
