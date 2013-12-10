<?php

//include action header
include "header_action.php";

$error = "none";
$status_id = -1;
$timestamp = "";

if (isset($_POST["status_id"]) && $_POST["status_id"] !== ""){
	$status_id = $_POST["status_id"];
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
	$sql = "DELETE FROM statuses WHERE status_id = " 
		. addslashes($status_id). " AND timestamp = '"
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
echo "'status_id': '" . $status_id . "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";