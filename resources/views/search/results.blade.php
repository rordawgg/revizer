@extends('layout')

	@section('title', "Results")
	@section('content')
	<div class="results-cont">
		@if(count($results) === 0)
			<h1>No results</h1>
		@else		
			@if(isset($results['docs']))
				<div class="list">
					<div class="sm-sub-head">
						<h4>
							<a href={{ url('search/?keyword=' . request()->input('keyword') . '&type=' . 'docs') }}>Documents</a>
						</h4>
					</div>
					<ul>
						@foreach($results['docs'] as $doc)
							<div class="listing">
					            <h4>
					            	<li><a href="{{ url('/doc/' . $doc->id) }}">{{ $doc->title }}</a></li>
					            </h4>
					            <p>{{ $doc->description }}</p>
				        	</div>
						@endforeach
					</ul>
				</div>
			@endif

			@if(isset($results['revisions']))
				<hr>
				<div class="list">
					<div class="sm-sub-head">
						<h4>
							<a href={{ url('search/?keyword=' . request()->input('keyword') . '&type=' . 'revisions') }}>Revisions</a>
						</h4>
					</div>
					<ul>
						@foreach($results['revisions'] as $revision)
							<div class="listing">
				            	<p>
				            		<li><a href="{{ url('/doc/' . $revision->doc_id . '/revision/' . $revision->id) }}">{{ $revision->description }}</a></li>
				            	</p> 
				            </div>             
						@endforeach
					</ul>
				</div>
			@endif

			@if(isset($results['profiles']))
				<hr>

				<div class="profile-list">
					<div class="sm-sub-head">
						<h4>
							<a href={{ url('search/?keyword=' . request()->input('keyword') . '&type=' . 'profiles') }}>Profiles</a>
						</h4>
					</div>
					<ul>
						@foreach($results['profiles'] as $profile)
				            	@include("partial.profile_results_pic")           
						@endforeach
					</ul>
				</div>
	</div>

			@endif
		@endif		

	@stop
