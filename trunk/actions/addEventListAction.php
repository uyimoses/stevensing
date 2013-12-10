<?php

//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$event_id = -1;

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["event_id"]) && $_POST["event_id"] !== ""){
	$event_id = $_POST["event_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "INSERT INTO event_list (user_id, event_id) VALUES (" 
		. addslashes($user_id). ", '"
		. addslashes($event_id) . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$user_id = $mysqli->insert_id;
		$event_id = $mysqli->insert_id;
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'event_id': '" . $event_id . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "}";