<?php
//create a mysqli connection
include "../mysqli_connection.php";
//some datas
include "../datas.php";

//set timezone
date_default_timezone_set('UTC');

//start session
session_start();

//////////////////////////////////for testing
$_SESSION["user_id"] = 1;
/////////////////////////////////////////////

?>
<!DOCTYPE html>
<html>
<head>
<?php
if (!isset($_SESSION["user_id"])){
	echo "<script>window.location.href='welcome'</script>";
}
?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./stylesheets/screen.css">
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="./stylesheets/ie.css">
	<![endif]-->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../stylesheets/common.css">
	<link rel="stylesheet" href="../stylesheets/friends.css">
	<link rel="stylesheet" href="../stylesheets/courseinfo.css">
	<link rel="stylesheet" href="../stylesheets/editprofile.css">
	<link rel="stylesheet" href="../stylesheets/courselist.css">
	<link rel="stylesheet" href="../stylesheets/searchlist.css">
	<link rel="stylesheet" href="../stylesheets/statuses.css">
	<link rel="stylesheet" href="../stylesheets/reply.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
	<script src="./js/common.js"></script>
	<title>Stevensing</title>
</head>
<body>
	<section class="content">
		<header>
			
		</header>
		<section class="container">