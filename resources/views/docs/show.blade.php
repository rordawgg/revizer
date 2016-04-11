@extends("layout")

@section("title")
<h1></h1>
@stop

@section("content")

{{ $doc->all() }}

@stop