<?php

//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$friend_id = -1;
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = strip_tags($_POST["user_id"]);
}
else{
	$error = "data";
}

if (isset($_POST["friend_id"]) && $_POST["friend_id"] !== ""){
	$friend_id = strip_tags($_POST["friend_id"]);
}
else{
	$error = "data";
}

if ($error == "none" && $friend_id!=$user_id){
	$sql = "INSERT INTO friend_list (user_id, friend_id, timestamp, status) VALUES (" 
		. addslashes($friend_id) . ", "
		. addslashes($user_id) . ", '"
		. $timestamp . "', " 
		. 1 . ");";
	//echo $sql;
	$result = $mysqli->query($sql);
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'friend_id': '" . addslashes($friend_id) . "',\n";
echo "'timestamp': '" . addslashes($timestamp) . "',\n";
echo "}";