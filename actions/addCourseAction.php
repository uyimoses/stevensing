<?php

//include action header
include "header_action.php";

$error = "none";
$name_error = "";
$professor_error = "";
$description_error = "";
$number_error = "";
$course_id = -1;
$name = "";
$professor = "";
$department = "";
$description = "";
$number = 0;

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$id = $_POST["id"];
}
else{
	$error = "data";
}

if (isset($_POST["professor"]) && $_POST["professor"] !== ""){
	$professor = $_POST["professor"];
	if (strlen($professor) > 100){
		$professor_error = "Must be no more than 100 characters.";
		$error = "data";
	}
}
else{
	$content_error = "You should set a professor.";
	$error = "data";
}

if (isset($_POST["name"]) && $_POST["name"] !== ""){
	$name = $_POST["name"];
	if (strlen($name) > 100){
		$name_error = "Must be no more than 100 characters.";
		$error = "data";
	}
}
else{
	$content_error = "You should set a name.";
	$error = "data";
}

if (isset($_POST["description"]) && $_POST["description"] !== ""){
	$description = $_POST["description"];
	if (strlen($description) > 6000){
		$description_error = "Must be no more than 6000 characters.";
		$error = "data";
	}
}
else{
	$description_error = "You should set a description.";
	$error = "data";
}


if (isset($_POST["number"]) && $_POST["number"] !== ""){
	$number = $_POST["number"];
	if (preg_match("/^[1-9]([0-9]*)$/", $number) == 0){
		$number_error = "Invalid number.";
		$error = "data";
	}
	else if (strlen($number)>4){
		$number_error = "Too many members.";
		$error = "data";
	}
}

if ($error == "none"){
	$sql = "INSERT INTO courses (professor, description, department, name, number) VALUES ('"
		. addslashes(strip_tags($professor)) . "', '"
		. addslashes(strip_tags($description)) . "', '"
		. addslashes(strip_tags($name)) . "', '"
		. addslashes($department) . "', '"
		. addslashes((isset($number))?$number:"") . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$course_id = $mysqli->insert_id;
		$sql = "INSERT INTO course_list (course_id, user_id, role) VALUES ('"
		. addslashes($course_id) . "', '" 
		. addslashes($id) . "', '" 
		. addslashes(2) . "');";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'name_error': '" . $name_error . "',\n";
echo "'description_error': '" . $description_error . "',\n";
echo "'professor_error': '" . $professor_error . "',\n";
echo "'number_error': '" . $number_error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'user_id': '" . addslashes($id) . "',\n";
echo "'name': '" . addslashes($name) . "',\n";
echo "'description': '" . addslashes($description) . "',\n";
echo "'professor': '" . addslashes($professor) . "',\n";
echo "'department': '" . addslashes($department) . "',\n";
echo "'number': '" . addslashes($number) . "',\n";
echo "}";