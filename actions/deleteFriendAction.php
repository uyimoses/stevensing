<?php

//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$friend_id = -1;

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

if ($error == "none"){
	$sql = "DELETE FROM friend_list WHERE user_id = " . addslashes($user_id)
		. " AND friend_id = " . addslashes($friend_id) . ";";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$sql = "DELETE FROM friend_list WHERE user_id = " . addslashes($friend_id)
		. " AND friend_id = " . addslashes($user_id) . ";";
		//echo $sql;
		$result = $mysqli->query($sql);
		if ($result ==  false){
			$error = "server";
		}
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'friend_id': '" . addslashes($friend_id) . "',\n";
echo "}";