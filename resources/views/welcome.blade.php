@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to</div>
                    <div class="panel-body">
                    <h1>REVIZR</h1>
                    <div class="home-search">
                        <form action="{{ url('/search') }}" method="get">
                            <input placeholder="Search" type="text" name="keyword">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
