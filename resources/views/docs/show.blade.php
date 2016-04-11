@extends("layout")

@section("title", $doc->title)

@section("content")

{{ $doc->all() }}

@stop