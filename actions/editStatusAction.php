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
	$id = $_POST["id"];
}
else{
	$error = "data";
}
if (isset($_POST["status_id"]) && $_POST["status_id"] != ""){
	$status_id = $_POST["status_id"];
}
else{
	$error = "data";
}
if (isset($_POST["type"]) && $_POST["type"] != ""){
	$type = $_POST["type"];
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
	$content_error = "You cannot post an empty status.";
	$error = "data";
}

if ($error == "none"){
	$sql = "UPDATE statuses
	 		SET  
	 	entity_id = ". addslashes($id) . ", 
		entity_type = " . addslashes($type) . ", 
		content = '". addslashes(strip_tags($content)) . "', 
		timestamp = '". $timestamp. "'
		WHERE status_id = ". addslashes($status_id) . "
		 ;";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	// else{
	// 	$status_id = $mysqli->insert_id;
	// }
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'status_id': '" . addslashes($status_id) . "',\n";
echo "'entity_id': '" . addslashes($id) . "',\n";
echo "'entity_type': '" . addslashes($type) . "',\n";
echo "'content': '" . addslashes($content) . "',\n";
echo "'timestamp': '" . addslashes($timestamp) . "',\n";
echo "}";