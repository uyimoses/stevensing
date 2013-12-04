<?php
//include mysqli connection
include "mysqli_connection.php";
include "datas.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./stylesheets/screen.css">
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="./stylesheets/ie.css">
	<![endif]-->
	<link rel="stylesheet" href="./stylesheets/common.css">
	<link rel="stylesheet" href="./stylesheets/register.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="./js/common.js"></script>
	<title>Welcome to Stevensing!</title>
</head>
<body>
	<section class="content">
		<header>
			<div class="container">
				<a href="welcome">
					<div class="span-4 border" id="stevensing_logo" title="Stevensing"></div>
				</a>
				<div class="span-20 last" id="login_bar">
					<form action="home" method="post">
						<div>
							<label for="username">Account</label>
							<input type="text" name="username" placeholder="xxxxxx@stevens.edu" required>
						</div>
						<div>
							<label for="password">Password</label><a href=#>Forgot it?</a>
							<input type="password" name="password" placeholder="********" required>
						</div>
						<div>
							<input type="submit" value="Sign in">
						</div>
					</form>
				</div>
			</div>
		</header>
		<section class="container">