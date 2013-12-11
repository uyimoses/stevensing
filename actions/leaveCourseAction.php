<?php

//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$course_id = -1;

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = strip_tags($_POST["user_id"]);
}
else{
	$error = "data";
}

if (isset($_POST["course_id"]) && $_POST["course_id"] !== ""){
	$course_id = strip_tags($_POST["course_id"]);
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "DELETE FROM course_list WHERE course_id = ". addslashes($course_id) . " AND user_id = " . addslashes($user_id) . ";";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "}";