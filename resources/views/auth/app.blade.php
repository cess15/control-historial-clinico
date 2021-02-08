<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">

<head>
	<title>CAFSI | CLMR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="/assets/css/app.css">
	<link rel="stylesheet" href="/assets/css/login.css">
	{!! NoCaptcha::renderJs() !!}
</head>

<body>
	@yield('content')
</body>
<script src="https://kit.fontawesome.com/0db7df2fff.js" crossorigin="anonymous"></script>
<script src="/assets/lte/plugins/jquery/jquery.min.js"></script>
<script src="/assets/js/login.js"></script>
<script src="/assets/lte/plugins/bootstrap/js/bootstrap.min.js"></script>

</html>