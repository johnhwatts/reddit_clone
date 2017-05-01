@extends('layouts.master')

@section('content')

		<h1>Posts</h1>

		    @foreach($posts as $post)
		        <article class="col-md-4">
		            <h3><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></h3>
		            <p>{{ $post->url }}</p>
		            <p>{{ $post->content }}</p>
					<p>Posted by: <strong>{{ $post->user->name }}</strong></p>
		            <p>on: <strong>{{ $post->created_at->setTimezone('America/Chicago')->toDayDateTimeString() }}</strong></p>
		            @if($post->created_at != $post->updated_at)
		                <p>Edited {{ $post->updated_at->setTimezone('America/Chicago')->diffForHumans() }}</p>
		            @endif

		        </article>
		    @endforeach

{!! $posts->render() !!}

@stop
