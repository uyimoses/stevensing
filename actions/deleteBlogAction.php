<?php

//include action header
include "header_action.php";

$error = "none";
$blog_id = -1;
$timestamp = "";

if (isset($_POST["blog_id"]) && $_POST["blog_id"] !== ""){
	$blog_id = $_POST["blog_id"];
}
else{
	$error = "data";
}

if (isset($_POST["timestamp"]) && $_POST["timestamp"] !== ""){
	$timestamp = $_POST["timestamp"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "DELETE FROM blogs WHERE blog_id = " 
		. addslashes($blog_id) . " AND timestamp = '"
		. $timestamp . "';";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'blog_id': '" . $blog_id . "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";