<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Breast Cancer Pathology | Find a doctor">
	<meta name="author" content="Saijal, Roisha, Aayush, Ruby">
	<title>Breast Cancer Pathology <?php if($data['title']) echo '| ' . $data['title']; ?></title>
	<!-- Favicons-->
	<link rel="shortcut icon" href="/pathology/public/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="/pathology/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/pathology/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/pathology/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/pathology/img/apple-touch-icon-144x144-precomposed.png">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	
	<!-- BASE CSS -->
	<link href='/pathology/css/bootstrap.min.css' rel="stylesheet">
	<link href="/pathology/css/style.css" rel="stylesheet">
	<link href="/pathology/css/menu.css" rel="stylesheet">
	<link href="/pathology/css/vendors.css" rel="stylesheet">
	<!-- <link href="/pathology/css/icon_fonts/css/all_icons_min.css" rel="stylesheet"> -->
	
	<!-- CUSTOM CSS -->
	<link href="/pathology/css/custom.css" rel="stylesheet">
</head>
<body>
	<div id="page">		
	<?php

		if (isset($_SESSION['auth'])){
			$_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;
		}
		generate_csrf_token();
		check_remember_me();
	?>
