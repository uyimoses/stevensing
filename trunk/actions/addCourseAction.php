<?php

//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$course_id = -1;

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["course_id"]) && $_POST["course_id"] !== ""){
	$course_id = $_POST["course_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "INSERT INTO course_list (user_id, course_id, timestamp, status) VALUES (" 
		. addslashes($course_id). ", "
		. addslashes($user_id). ", '"
		. $timestamp . "', " 
		. 1 . ");";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'course_id': '" . $course_id . "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";