@extends('layouts.master')

@section('content')
		<h1>Create a new post</h1>
		<form action="{{ action('PostsController@store') }}" method="POST">
			@include('partials.posts-form')
			<input type="submit" class="btn btn-default" value="Create post">
			{{ method_field('POST') }}
		</form>
@stop
