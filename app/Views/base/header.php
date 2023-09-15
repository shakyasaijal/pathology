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
	<!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	<!-- BASE CSS -->
	<link href='/pathology/css/bootstrap.min.css' rel="stylesheet">
	<link href="/pathology/css/style.css" rel="stylesheet">
	<link href="/pathology/css/menu.css" rel="stylesheet">
	<link href="/pathology/css/vendors.css" rel="stylesheet">
	<link href="/pathology/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
	<!-- YOUR CUSTOM CSS -->
    <link href="/pathology/css/blog.css" rel="stylesheet">

	<link href="/pathology/css/custom.css" rel="stylesheet">
	
</head>
<body>
	<div id="page">		
	<?php
		if (check_logged_in()){
			echo '<a class="dropdown-item text-muted" href="/pathology/users/logout"><i class="fa fa-running pr-2"></i> Logout</a>';
		}

		if(isset($_SESSION['alert_failed'])){
			echo $_SESSION['alert_failed'];
			unset($_SESSION['alert_failed']);
		}

		if(isset($_SESSION['alert_success'])){
			echo $_SESSION['alert_success'];
			unset($_SESSION['alert_success']);
		}
	?>
