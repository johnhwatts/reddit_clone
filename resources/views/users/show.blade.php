@extends('layouts.master')

@section('content')


<h1 style="text-align: center; margin-bottom: 5%;">{{ $user->name }}</h1>

<div class="container">
	<div class="row" id="itemsPage">
		@foreach($user->posts as $post)
			<div class="col-sm-4" >
					<div class="panel panel-primary" >
						<div class="panel-heading" id="itemsPanelColor">
							<a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></div>
						<div class="panel-body">{{ $post->content }}</div>
						<div class="panel-body"><a href = "{{ ($post->url) }}">{{ $post->url }}</a></div>
						<div class="panel-footer">Posted by: <strong>{{ $post->user->name }}
							</strong> on: <strong>{{ $post->created_at->setTimezone('America/Chicago')->toDayDateTimeString() }}
							</strong>
						</div>
					</div>
				</a>
			</div>

		@endforeach


@stop
