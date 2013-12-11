<?php

//include action header
include "header_action.php";

$error = "none";
$content_error = "";
$id = -1;
$type = -1;
$status_id = -1;
$content = "";
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$id = strip_tags($_POST["id"]);
	if (strlen($id) <= 0){
		$error = "data";
	}
}
else{
	$error = "data";
}

if (isset($_POST["type"]) && $_POST["type"] != ""){
	$type = strip_tags($_POST["type"]);
	if (strlen($type) <= 0){
		$error = "data";
	}
}
else{
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
	else{
		$title = str_replace("\n", "", $title)
	}
}
else{
	$content_error = "You cannot post an empty status.";
	$error = "data";
}

if ($error == "none"){
	$sql = "INSERT INTO statuses (entity_id, entity_type, content, timestamp) VALUES ('"
		. addslashes($id) . "', '" 
		. addslashes($type) . "', '"
		. addslashes(strip_tags($content)) . "', '"
		. $timestamp. "' );";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$status_id = $mysqli->insert_id;
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'content_error': '" . addslashes($content_error) . "',\n";
echo "'status_id': '" . addslashes($status_id) . "',\n";
echo "'entity_id': '" . addslashes($id) . "',\n";
echo "'entity_type': '" . addslashes($type) . "',\n";
echo "'content': '" . addslashes($content) . "',\n";
echo "'timestamp': '" . addslashes($timestamp) . "',\n";
echo "}";
include "footer_action.php";