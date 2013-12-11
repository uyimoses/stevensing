<?php

//include action header
include "header_action.php";

$error = "none";
$comment_id = -1;
$timestamp = "";

if (isset($_POST["comment_id"]) && $_POST["comment_id"] !== ""){
	$comment_id = $_POST["comment_id"];
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
	$sql = "DELETE FROM comments WHERE comment_id = " 
		. addslashes($comment_id). " AND timestamp = '"
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
echo "'comment_id': '" . addslashes($comment_id) . "',\n";
echo "'timestamp': '" . addslashes($timestamp) . "',\n";
echo "}";