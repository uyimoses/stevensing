<?php
//include mysqli connection
include "mysqli_connection.php";
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="./js/common.js"></script>
	<title>Welcome to Stevensing!</title>
</head>
<body>
	<section class="content">
		<header>
			<div class="container">
				<a href="/">
					<div class="span-4 border" id="stevensing_logo" title="Stevensing"></div>
				</a>
				<div class="span-20 last" id="login_bar">
					<form action="./homepage.php" method="post">
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