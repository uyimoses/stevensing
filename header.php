<?php
//create a mysqli connection
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
	<script src="./js/common.js"></script>

	<title>Welcome to Stevensing!</title>
</head>
<body>
	<section class="content">
		<header>
			<div class="container">
				<div class="span-4" id="stevensing_logo"></div>
				<nav class="span-14">
					<ul>
						<a href="./homepage.php"><li>
							Home
						</li></a>
						<a href="./friends.php"><li>
							Friends
						</li></a>
						<a href="./courses.php"><li>
							Courses
						</li></a>
					</ul>
				</nav>
				<div class="span-6 last">Search</div>
			</div>
		</header>
		<section class="container">