
@extends('layouts.master')

@section('content')
    <form action="{{ action('PostsController@store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
            @if ($errors->has('title'))
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            @endif
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" id="url" name="url" value="{{ old('url') }}" class="form-control">
            @if ($errors->has('url'))
                <div class="alert alert-warning" role="alert">
                    {{ $errors->first('url') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <div class="alert alert-warning" role="alert">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>
		
		<!-- Image upload -->
		<div>
	        @if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
				</div>
				<img src="{{ Session::get('path') }}">
			@endif

			<div class="control-group">
				 <label for="image">Image</label>
					<div>
						<span class="btn-primary btn-file">
							<span class="fileupload-new"></span>
							<input type="hidden" name="MAX_FILE_SIZE" value="1024000000" required/>
							<input type="file" name="image" id="image" required/>
						</span>

			   		</div>
					<img class="img-thumbnail thumbnail" id="preview" style="width: 200px; height: 150px;">
					<div>
						<button class="btn btn-primary" type="submit" style="margin-bottom: 5%;">
 							<i class="icon-user icon-white"></i>Save</button>
					</div>
			</div>
		</div>
		<input type="hidden" name="id" value="{{Auth::id()}}">
    </form>

	<!--JS to render image thumbnail-->

	 <script type="text/javascript">
	 document.getElementById("image").onchange = function () {
		 var reader = new FileReader();

		 reader.onload = function (e) {
			 // get loaded data and render thumbnail.
			 document.getElementById("preview").src = e.target.result;
		 };

		 // read the image file as a data URL.
		 reader.readAsDataURL(this.files[0]);

	 };
	 </script>
@stop
