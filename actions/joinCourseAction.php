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
	$sql = "INSERT INTO course_list (course_id, user_id, role) VALUES (" 
		. addslashes($course_id) . ", "
		. addslashes($user_id) . ", "
		. 1 . ");";
	//echo $sql;
	$result = $mysqli->query($sql);
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'role': '1'\n";
echo "}";

include "footer_action.php";