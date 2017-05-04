@extends('layouts.master')

@section('content')

		<h1 style="text-align: center; margin-bottom: 5%;">Posts</h1>

				<div class="container">
					<div class="row" id="itemsPage">
						@foreach($posts as $post)
						<article class= "col-md-4">
							<h3><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></h3>
							<p>{{ substr($post->url, 0, 40) . "..." }}</p>
							<p>{{ substr($post->content, 0, 40) . "..." }}</p>
							<p>Posted by: <strong>{{ $post->user->name }}</strong></p>
							<p>on: <strong>{{ $post->created_at->setTimezone('America/Chicago')->toDayDateTimeString() }}</strong></p>
						</article>
						@endforeach
					</div>
				</div>

{!! $posts->render() !!}

@stop
