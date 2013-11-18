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
	<link rel="stylesheet" href="./stylesheets/friends.css">
	<link rel="stylesheet" href="./stylesheets/courseinfo.css">
	<link rel="stylesheet" href="./stylesheets/editprofile.css">
	<link rel="stylesheet" href="./stylesheets/courselist.css">
	<link rel="stylesheet" href="./stylesheets/searchlist.css"
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="./js/common.js"></script>
	<title>Stevensing</title>
</head>
<body>
	<section class="content">
		<header>
			<div class="container">
				<a href="./index.php">
					<div class="span-4 border" id="stevensing_logo" title="Stevensing"></div>
				</a>
				<nav class="span-10" id="main_menu">
					<ul>
						<a href="./homepage.php">
							<li>Home</li>
						</a>
						<a href="./friends.php">
							<li>Friends</li>
						</a>
						<a href="./courses.php">
							<li>Courses</li>
						</a>
					</ul>
				</nav>
				<div class="span-4" id="account_menu">
					<div>
						<span>Account</span>
						<div id="account_menu_icon"></div>
					</div>
					<ul>
						<a href="#">
							<li>Settings</li>
						</a>
						<a href="#">
							<li>Support</li>
						</a>
						<a href="./index.php">
							<li>Log out</li>
						</a>
					</ul>
				</div>
				<div class="span-6 last" id="search_box">
					<form action="#" method="get">
						<input type="text" name="search_text" placeholder="Name, Course...">
						<a href="searchresult.php" id="search_button">Search</a>
					</form>
				</div>
			</div>
		</header>
		<section class="container">