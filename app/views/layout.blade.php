<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Laravel PHP Framework</title>
		<style>
			@import url(//fonts.googleapis.com/css?family=Lato:700);

			body {
				margin:0;
				font-family:'Lato', sans-serif;
				text-align:center;
				color: #999;
			}

			

			a, a:visited {
				text-decoration:none;
			}

			h1 {
				font-size: 32px;
				margin: 16px 0 0 0;
			}
		</style>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		@include('navigation')
		<div class="welcome">
			@yield('content')
		</div>
	</body>
</html>
