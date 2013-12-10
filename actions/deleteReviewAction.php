<?php

//include action header
include "header_action.php";

$error = "none";
$review_id = -1;
$timestamp = "";

if (isset($_POST["review_id"]) && $_POST["review_id"] !== ""){
	$review_id = $_POST["review_id"];
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
	$sql = "DELETE FROM reviews WHERE review_id = " 
		. addslashes($review_id). " AND timestamp = '"
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
echo "'review_id': '" . $review_id . "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";