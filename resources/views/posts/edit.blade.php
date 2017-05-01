@extends('layouts.master')

@section('content')
		<h1>Edit post</h1>
		<form action="{{ action('PostsController@update') }}" method="POST">
			@include('partials.posts-form')
			<input type="submit" class="btn btn-danger" value="Edit">
			{{ method_field('PUT') }}
		</form>

		<form action="{{ action('PostsController@destroy', [1]) }}" method="post">
			<input type="submit" class="btn btn-primary" value="Delete">
			{!!csrf_field()!!}
			{{ method_field('DELETE') }}
		</form>

@stop
