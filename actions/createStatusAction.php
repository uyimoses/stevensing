<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$error = "none";
$user_id = -1;
$status_id="";
$picture_id=""; 
$timestamp="";

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["entity_id"]) && $_POST["entity_id"] != ""){
	$entity_id = $_POST["entity_id"];
}
else{
	$error = "data";
}

if (isset($_POST["entity_type"]) && $_POST["entity_type"] != ""){
	$entity_type = $_POST["entity_type"];
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

if ($error == "none"){
	$sql = "INSERT INTO statuses (user_id, entity_id, entity_type, content, picture_id, timestamp) VALUES ('"
		. addslashes($user_id) . "', '" 
		. addslashes($entity_id) . "', '" 
		. addslashes($entity_type) . "', '"
		. addslashes($content) . "', '"
		. addslashes($picture_id) . "', '"
		. date("Y-m-d H:i:s",time()). "' );";
	echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'status_id': '" . $status_id . "',\n";
echo "'entity_id': '" . $entity_id . "',\n";
echo "'entity_type': '" . $entity_type . "',\n";
echo "'content': '" . $content . "',\n";
echo "'picture_id': '" . $picture_id. "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";