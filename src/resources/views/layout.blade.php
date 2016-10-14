<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>@yield('title')</title>
		<link href="{{url('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		@yield('css')
		<link rel="icon" type="image/png" href="{{url('assets/app/favicon.ico')}}" />
		<link rel="apple-touch-icon" href="{{url('assets/app/apple-touch-icon.png')}}">
		<!--[if IE]>
		<link rel="shortcut icon" type="image/x-icon" href="{{url('assets/app/favicon.ico')}}" />
		<![endif]-->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
	</head>
  	<body>
		@yield('content')
    	<script src="{{url('assets/libs/jquery/js/jquery-3.1.1.min.js')}}"></script>
    	<script src="{{url('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    	@yield('js')
	</body>
</html>