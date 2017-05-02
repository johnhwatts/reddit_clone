@extends('layouts.master')

@section('content')
		<h1>Edit post</h1>
		<form action="{{ action('PostsController@update', [$post->id]) }}" method="POST">
	   	 {!! csrf_field() !!}
	   	 <div class="form-group">
	   		 <label for="title">Title</label>
	   		 <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control">
	   		 @if ($errors->has('title'))
	   			 {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
	   		 @endif
	   	 </div>
	   	 <div class="form-group">
	   		 <label for="url">URL</label>
	   		 <input type="text" id="url" name="url" value="{{ $post->url }}" class="form-control">
	   		 @if ($errors->has('url'))
	   			 <div class="alert alert-warning" role="alert">
	   				 {{ $errors->first('url') }}
	   			 </div>
	   		 @endif
	   	 </div>
	   	 <div class="form-group">
	   		 <label for="content">Content</label>
	   		 <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
	   		 @if ($errors->has('content'))
	   			 <div class="alert alert-warning" role="alert">
	   				 {{ $errors->first('content') }}
	   			 </div>
	   		 @endif
	   	 </div>
		 {{ method_field('PUT') }}
	   	 <input type="hidden" name="id" value="{{Auth::id()}}">
	   	 <input type="submit" value="Save" class="btn btn-primary">
	    </form>

		<!-- Delete post -->
		<form action="{{ action('PostsController@destroy', [$post->id]) }}" method="POST">
			<input type="submit" class="btn btn-danger" value="Delete">
			{!!csrf_field()!!}
			{{ method_field('DELETE') }}
		</form>

@stop
