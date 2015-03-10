<!DOCTYPE html>
<html lang="en">
<head>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jara Bygg</title>

	<link href="/css/app.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
     <link rel="stylesheet" href="/resources/demos/style.css">
     
     
     
     <!-- PICKER PICKER PICKER PICKER -->
     
     
     <link rel="stylesheet" href="/picker/default.css">
     <link rel="stylesheet" href="/picker/default.time.css">
     <link rel="stylesheet" href="/picker/default.date.css">
     
     
     
    
      <script src="/picker/picker.js"></script>
      <script src="/picker/picker.time.js"></script>
    <script src="/picker/picker.date.js"></script>
    <script src="/picker/legacy.js"></script>
  
    
     
     
     
     
     
     
     <!-- PICKER PICKER PICKER PICKER -->
     
     
     
     
     
     

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>

		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
</head>
<body>
<header> @include('header')</header>

	<div class="contents">@yield('content')</div>

<footer> @include('footer')</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
