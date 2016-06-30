<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['title'];?></title>
	<meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type  = "text/css" href = "libs/bootstrap/css/bootstrap.cerulean.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src = "libs/js/jquery-1.12.3.min.js"></script>
	<script src = "libs/bootstrap/js/bootstrap.min.js"></script>
	<link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">
	<?php 
		if($data['title']=="LMS - SLSC"){
			echo '<link rel="stylesheet" type = "text/css" href = "css/home.css">';
		}
	?>
	<!-- chart4php -->
	<script src = "libs/js/jquery.min.js"></script>
	<script src = "libs/js/chartphp.js"></script>
	<link rel = "stylesheet" href = "libs/js/chartphp.css">
</head>
<body>
