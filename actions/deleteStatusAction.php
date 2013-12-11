<?php

//include action header
include "header_action.php";

$error = "none";
$status_id = -1;
$entity_id = -1;

if (isset($_POST["status_id"]) && $_POST["status_id"] !== ""){
	$status_id = strip_tags($_POST["status_id"]);
}
else{
	$error = "data";
}

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] !== ""){
	$entity_id = $_SESSION["user_id"];
}
else{
	$error = "server";
}

if ($error == "none"){
	$sql = "DELETE FROM statuses WHERE status_id = " 
		. addslashes($status_id). " AND entity_id = "
		. $entity_id . ";";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'status_id': '" . addslashes($status_id) . "',\n";
echo "'entity_id': '" . addslashes($entity_id) . "',\n";
echo "}";