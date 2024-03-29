<?php

//include action header
include "header_action.php";

$error = "none";
$title_error = "";
$content_error = "";
$user_id = -1;
$blog_id = -1;
$title = "";
$content = "";
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = strip_tags($_POST["user_id"]);
}
else{
	$error = "data";
}
if (isset($_POST["blog_id"]) && $_POST["blog_id"] !== ""){
	$blog_id = strip_tags($_POST["blog_id"]);
}
else{
	$error = "data";
}


if (isset($_POST["title"]) && $_POST["title"] !== ""){
	$title = strip_tags($_POST["title"]);
	if (strlen($title) > 200){
		$title_error = "Must be no more than 200 characters.";
		$error = "data";
	}
	else if (strlen($title) <= 0){
		$title_error = "Don't use html tags";
		$error = "data";
	}
}
else{
	$title_error = "You should set a title.";
	$error = "data";
}

if (isset($_POST["content"]) && $_POST["content"] !== ""){
	$content = strip_tags($_POST["content"]);
	if (strlen($content) > 600){
		$content_error = "Must be no more than 600 characters.";
		$error = "data";
	}
	else if (strlen($content) <= 0){
		$content_error = "Don't use html tags";
		$error = "data";
	}
}
else{
	$content_error = "You shouldn't leave the content empty.";
	$error = "data";
}

if ($error == "none"){
	$sql = "UPDATE blogs 
			SET user_id = '". addslashes($user_id). "',
				title ='". addslashes(strip_tags($title)) ."',
				content ='". addslashes(strip_tags($content)) ."',
				timestamp = '". $timestamp ."'
				WHERE blog_id = ". addslashes($blog_id) . "
				;";
			
	
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	// else{
	// 	$blog_id = $mysqli->insert_id;
	// }
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'title_error': '" . addslashes($title_error) . "',\n";
echo "'content_error': '" . addslashes($content_error) . "',\n";
echo "'blog_id': '" . addslashes($blog_id) . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'title': '" . addslashes($title) . "',\n";
echo "'content': '" . addslashes($content) . "',\n";
echo "'timestamp': '" . addslashes($timestamp) . "',\n";
echo "}";

include "footer_action.php";