<?php

//include action header
include "header_action.php";

$error = "none";
$content_error = "";
$feed_id = -1;
$type = 0;
$user_id = -1;
$comment_id = -1;
$content = "";
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["type"]) && $_POST["type"] != ""){
	$type = $_POST["type"];
}
else{
	$error = "data";
}

if (isset($_POST["comment_id"]) && $_POST["comment_id"] != ""){
	$comment_id = $_POST["comment_id"];
}
else{
	$error = "data";
}


if (isset($_POST["feed_id"]) && $_POST["feed_id"] !== ""){
	$feed_id = $_POST["feed_id"];
}
else{
	$error = "data";
}

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["content"]) && $_POST["content"] !== ""){
	$content = $_POST["content"];
	if (strlen($content) > 600){
		$content_error = "Must be no more than 600 characters.";
		$error = "data";
	}
}
else{
	$content_error = "You cannot post an empty comment.";
	$error = "data";
}

if ($error == "none"){
	$sql = "UPDATE comments 
			SET
			feed_id = ". addslashes($feed_id). ", 
			user_id = ". addslashes($user_id). ", 
			feed_type = ". addslashes($type) . ", 
			content = '". addslashes(strip_tags($content)) ."', 
			timestamp = '". $timestamp . "'
			WHERE comment_id = ". addslashes($comment_id). "
			;";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'comment_id': '" . $comment_id . "',\n";
echo "'feed_id': '" . $feed_id . "',\n";
echo "'feed_type': '". $type ."',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'content': '" . $content. "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";