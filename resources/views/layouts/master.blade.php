<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
	<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	@include('partials.navbar')
	<main>
		<div class="container" style="margin-top: 10%">
			@if (Session::has('errorMessage'))
				<div class="alert alert-success">{{ session('errorMessage') }}</div>
			@endif
			@if (Session::has('successMessage'))
				<div class="alert alert-success">{{ session('successMessage') }}</div>
			@endif

			@yield('content')
		</div>
	</main>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
