@extends('layouts.master')

@section('content')

		<h1>Posts</h1>


		        <table class="table table-bordered table-hover table-responsive">
		            <thead>
						<tr>
							<th>Title</th>
							<th>Content</th>
							<th>URL</th>
							<th>Posted by</th>
							<th>Posted</th>
							<th>Updated</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
					   <tr>
						 <td><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></td>
						 <td>{{ $post->content }}</td>
						 <td>{{ $post->url }}</td>
						 <td>{{ $post->user->name }}</td>
						 <td>{{ $post->created_at->setTimezone('America/Chicago')->toDayDateTimeString() }}</td>
						 @if($post->created_at != $post->updated_at)
						 <td>{{ $post->updated_at->setTimezone('America/Chicago')->diffForHumans() }}</td>
						 @endif
					 </tr>
					 @endforeach
				 </tbody>
		        </table>


		    {!! $posts->render() !!}

@stop
