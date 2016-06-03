@extends('layout')

@section('content')

    <div id="home-cont">
        <header>
            <h1>My Documents</h1>
        </header>

        <div class="doc-list">

            <hr>
            @if(count($docs)==0)
                <h1>No Docs</h1>
            @endif

            <div>
                <a class="full-width-link" href="{{ url('/doc/add') }}">Add Document</a>
            </div>

            <ul>
                @foreach($docs as $doc)
                    <li class="doc-listing">
                        <a href="{{ url('/doc', [$doc->id]) }}">{{ $doc->title }}</a>
                    </li>
                @endforeach
            </ul>

            {!! $docs->render() !!}
        </div>
    </div>
@stop
