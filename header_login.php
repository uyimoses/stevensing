<?php
//include mysqli connection
include "mysqli_connection.php";

//some datas
include "datas.php";

//start session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
// if (isset($_SESSION["user_id"])){
// 	echo "<script>window.location.href='home'</script>";
// }
?>
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
	<script>
		function login(){
			$.ajax({
				url: 'loginAction',
				type: 'POST',
				dataType: 'text',
				data: {
					"username": $("#username").val(),
					"password": $("#pwd").val()
				},
				success: function(data){
					console.log(data);
					var obj = eval('(' + data + ')');
					if (obj.error == "data"){
						alert("Invalid username or password.");
					}
					else if (obj.error == "server"){
						alert("Sorry. The Web Server is not avaliable for now.");
					}
					else if (obj.error == "none"){
						window.location.href = "home";
					}
					
				},
				error: function(data){

				}
			});
		}
	</script>
	<section class="content">
		<header>
			<div class="container">
				<a href="welcome">
					<div class="span-4 border" id="stevensing_logo" title="Stevensing"></div>
				</a>
				<div class="span-20 last" id="login_bar">
					<form name="loginForm">
						<div>
							<label for="username">Account</label>
							<input type="text" id="username" placeholder="xxxxxx@stevens.edu" required>
						</div>
						<div>
							<label for="password">Password</label><a href=#>Forgot it?</a>
							<input type="password" id="pwd" placeholder="********" required>
						</div>
						<div>
							<input type="button" value="Sign in" onclick="login();">
						</div>
					</form>
				</div>
			</div>
		</header>
		<section class="container">