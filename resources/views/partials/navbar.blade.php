<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- <a href="/index"><img src="img/uploads/SL.ico" id="logo"></a> -->
			<a class="navbar-brand" href="{{action('HomeController@showWelcome')}}" id="breaditName">Breadit</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav" id="navbar">
					<li><a href="{{action('HomeController@showWelcome')}}">Home</a></li>
					<li><a href="{{action('PostsController@index')}}">All Posts</a></li>
				<?php if (Auth::check()):?>
					<li><a href="{{action('UserController@show')}}">My Posts</a></li>
					<li><a href="{{action('PostsController@create')}}">Create Post</a></li>
					<li><a href="{{action('Auth\AuthController@getLogout')}}">Logout</a></li>
				<?php else: ?>
					<li><a href="{{action('Auth\AuthController@getRegister')}}">Signup</a></li>
					<li><a href="{{action('Auth\AuthController@getLogin')}}">Login</a></li>
				<?php endif;?>
			</ul>
			<form class="navbar-form navbar-right" id="search" method="get" action="{{action('PostsController@index')}}">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="user or keyword" required>
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
			</form>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
