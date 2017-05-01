@extends('layouts.master')

@section('content')
		<h1>Posts</h1>
	<table class= "table">
		<tr>
			<td>
				Title
			</td>
			<td>
				Content
			</td>
			<td>
				URL
			</td>

		</tr>
		@foreach ($posts as $post)
		<tr>

			<td>
			{{$post->title}}
			</td>
			<td>
				{{$post->content}}
			</td>
			<td>
				{{$post->url}}
			</td>

		</tr>
		@endforeach
	</table>

{!! $posts->render() !!}

@stop
