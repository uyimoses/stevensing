<?php

//include action header
include "header_action.php";

$error = "none";
$content_error = "";
$feed_id = -1;
$type = -1;
$user_id = -1;
$comment_id = -1;
$content = "";
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["type"]) && $_POST["type"] != ""){
	$type = $_POST["type"];
}
else{
	$error = "data1";
}

if (isset($_POST["feed_id"]) && $_POST["feed_id"] !== ""){
	$feed_id = $_POST["feed_id"];
}
else{
	$error = "data2";
}

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data3";
}

if (isset($_POST["content"]) && $_POST["content"] !== ""){
	$content = $_POST["content"];
	if (strlen($content) > 600){
		$content_error = "Must be no more than 600 characters.";
		$error = "data4";
	}
}
else{
	$content_error = "You cannot post an empty comment.";
	$error = "data5";
}

if ($error == "none"){
	$sql = "INSERT INTO comments (feed_id, user_id, feed_type, content, timestamp) VALUES (" 
		. addslashes($feed_id). ", "
		. addslashes($user_id). ", "
		. addslashes($type) . ", '" 
		. addslashes(strip_tags($content)) . "', '"
		. $timestamp . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$comment_id = $mysqli->insert_id;
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'comment_id': '" . $comment_id . "',\n";
echo "'feed_id': '" . $feed_id . "',\n";
echo "'feed_type'". $type ."',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'content': '" . $content. "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";