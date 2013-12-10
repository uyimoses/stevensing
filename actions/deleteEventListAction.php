<?php

//include action header
include "header_action.php";

$error = "none";
$event_id = -1;
$user_id = -1;

if (isset($_POST["event_id"]) && $_POST["event_id"] !== ""){
	$event_id = $_POST["event_id"];
}
else{
	$error = "data";
}

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "DELETE FROM event_list WHERE event_id = " 
		. addslashes($event_id). " AND user_id = " 
		. addslashes($user_id). ";";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'event_id': '" . $event_id . "',\n";
echo "'user_id': '" . $user_id. "',\n";
echo "}";