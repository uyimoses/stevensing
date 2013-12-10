<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$error = "none";
$id = -1;
$type = -1;
$status_id = -1;
$timestamp = date("Y-m-d H:i:s",time());
$content_error = "";

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$id = $_POST["id"];
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
	$content = strip_tags($_POST["content"]);
	if (strlen($content) > 600){
		$content_error = "Must be no more than 600 characters.";
		$error = "data";
	}
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "INSERT INTO statuses (entity_id, entity_type, content, timestamp) VALUES ('"
		. addslashes($id) . "', '" 
		. addslashes($type) . "', '"
		. addslashes($content) . "', '"
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
echo "'content_error': '" . $content_error . "'\n";
echo "'status_id': '" . $status_id . "',\n";
echo "'entity_id': '" . $id . "',\n";
echo "'entity_type': '" . $type . "',\n";
echo "'content': '" . $content . "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";