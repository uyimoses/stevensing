<?php
//include action header
include "header_action.php";

$error = "none";
$user_id = -1;

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""{
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	
}