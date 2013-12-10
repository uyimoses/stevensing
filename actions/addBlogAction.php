<?php

//include action header
include "header_action.php";

//validation
$user_id = -1;
$blog_id = -1;
$error = "none";
$title_error = "";
$content_error = "";
$timestamp = date("Y-m-d H:i:s",time());


if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["title"]) && $_POST["title"] !== ""){
	$title = $_POST["title"];
	if (strlen($title) > 200){
		$title_error = "Must be no more than 600 characters.";
		$error = "data";
	}
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
echo "'title': '" . $title. "',\n";
echo "'content': '" . $content. "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";