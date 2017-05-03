@extends('layouts.master')

@section('content')

		<h1 style="text-align: center; margin-bottom: 5%;">Posts</h1>

		<div class="container">
			<div class="row" id="itemsPage">
				@foreach($posts as $post)
					<div class="col-sm-4" >
							<div class="panel panel-primary" >
								<div class="panel-heading" id="itemsPanelColor"><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></div>
								<div class="panel-body">{{ $post->content }}</div>
								<div class="panel-footer">{{ $post->url }}</div>
								<div class="panel-footer">Posted by: <strong>{{ $post->user->name }}</strong> on: <strong>{{ $post->created_at->setTimezone('America/Chicago')->toDayDateTimeString() }}</strong></div>
							</div>
						</a>
					</div>
				@endforeach



		    {!! $posts->render() !!}

@stop
