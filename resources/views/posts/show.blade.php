@extends('layouts.master')

@section('content')

	<h3>{{ $post->title }}</h3>
	<article class= "col-md-4">
		<p><a href = "{{ ($post->url) }}">{{ $post->url }}</a></p>
		<p>{{ $post->content }}</p>
		<p>Posted by: <strong>{{ $post->user->name }}</strong></p>
		<p>on: <strong>{{ $post->created_at->setTimezone('America/Chicago')->toDayDateTimeString() }}</strong></p>

		@if($post->created_at != $post->updated_at)
			<p>Edited {{ $post->updated_at->setTimezone('America/Chicago')->diffForHumans() }}</p>
		@endif

		@if (Auth::id() == $post->created_by)
	 	<a class="btn btn-primary" href="{{ action('PostsController@edit', $post->id) }}">Edit</a>
		@endif
	</article>

	<div class= "col-md-4">
		<img src = "/uploads/images/{{ $post->image }}" class="img-responsive" id="showItemImage" alt="Image">
	</div>


@stop
