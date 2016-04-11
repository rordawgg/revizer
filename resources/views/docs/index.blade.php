@extends("layout")

@section("title")
<h1>All Docs</h1>
@stop

@section("content")

@foreach ($docs as $doc)
<li>{{ $doc->title }}</li>
@endforeach

@stop