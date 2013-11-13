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
			<div class="span-24 last big_title">
				Enjoy your campus life at Stevens!
			</div>
			<section class="span-15">
				<img src="./images/big_logo.png" alt="big_logo" title="Let's Stevensing!" id="big_logo">
			</section>
			<section class="span-6 last" id="quick_sign">
				<h1>
					We are Stevensing!
				</h1>
				<form action="#" method="post">
					<label for="email">Stevens Email</label>
					<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required>
					<label for="firstname">First Name</label>
					<input type="text" name="firstname" placeholder="First Name" required>
					<label for="lastname">Last Name</label>
					<input type="text" name="lastname" placeholder="Last Name" required>
					<label for="password">Create a Password</label>
					<input type="password" name="password" placeholder="At least 8 characters" required>
					<input type="submit" value="Join Us">
				</form>
			</section>
<?php

//include page footer
include "footer.php";