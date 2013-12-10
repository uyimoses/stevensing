<?php

//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$friend_id = -1;
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["friend_id"]) && $_POST["friend_id"] !== ""){
	$friend_id = $_POST["friend_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "INSERT INTO blogs (user_id, title, content, timestamp) VALUES (" 
		. addslashes($user_id). ", '"
		. addslashes(strip_tags($title)) . "', '" 
		. addslashes(strip_tags($content)) . "', '"
		. $timestamp . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$blog_id = $mysqli->insert_id;
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'title_error': '" . $title_error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'blog_id': '" . $blog_id . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'title': '" . $title. "',\n";
echo "'content': '" . $content. "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";