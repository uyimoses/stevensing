<?php
//create a mysqli connection
include "mysqli_connection.php";
//some datas
include "datas.php";

//set timezone
date_default_timezone_set('UTC');

//start session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
// if (!isset($_SESSION["user_id"])){
// 	echo "<script>window.location.href='welcome'</script>";
// }
?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./stylesheets/screen.css">
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="./stylesheets/ie.css">
	<![endif]-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="./stylesheets/common.css">
	<link rel="stylesheet" href="./stylesheets/friends.css">
	<link rel="stylesheet" href="./stylesheets/courseinfo.css">
	<link rel="stylesheet" href="./stylesheets/editprofile.css">
	<link rel="stylesheet" href="./stylesheets/courselist.css">
	<link rel="stylesheet" href="./stylesheets/searchlist.css">
	<link rel="stylesheet" href="./stylesheets/statuses.css">
	<link rel="stylesheet" href="./stylesheets/reply.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="./js/common.js"></script>
	<title>Stevensing</title>
</head>
<body>
	<section class="content">
		<header>
			<div class="container">
				<a href="welcome">
					<div class="span-4 border" id="stevensing_logo" title="Stevensing"></div>
				</a>
				<nav class="span-10" id="main_menu">
					<ul>
						<a href="home">
							<li>Home</li>
						</a>
						<a href="friends">
							<li>Friends</li>
						</a>
						<a href="courses">
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
						<a href="welcome">
							<li>Log out</li>
						</a>
					</ul>
				</div>
				<div class="span-6 last" id="search_box">
					<form action="searchresult" method="get">
						<input type="text" name="search_text" placeholder="Name, Course...">
						<a href="searchresult" id="search_button">Search</a>
					</form>
				</div>
			</div>
		</header>
		<section class="container">