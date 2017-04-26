@extends('layouts.master')

@section('content')
		<h1>A post</h1>
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
		</table>
@stop
