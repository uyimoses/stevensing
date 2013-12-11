<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

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

if (isset($_POST["department"]) && $_POST["department"] !== ""){
	$department = strip_tags($_POST["department"]);
	if (!array_key_exists($major, $majors)){
		$department_error = "Your department is invalid.";
		$error = "data";
	}
}
else{
	$department_error = "You should set a department.";
	$error = "data";
}

if (isset($_POST["number"]) && $_POST["number"] !== ""){
	$number = strip_tags($_POST["number"]);
	if (preg_match("/^[1-9]([0-9]*)$/", $number) == 0){
		$number_error = "Invalid number.";
		$error = "data";
	}
	else if (strlen($number) > 4){
		$number_error = "Too many members.";
		$error = "data";
	}
}

if (isset($_POST["name"]) && $_POST["name"] !== ""){
	$name = strip_tags($_POST["name"]);
	if (strlen($name) > 100){
		$name_error = "Must be no more than 100 characters.";
		$error = "data";
	}
}
else{
	$name_error = "You should set a name.";
	$error = "data";
}

if (isset($_POST["description"]) && $_POST["description"] !== ""){
	$description = strip_tags($_POST["description"]);
	if (strlen($description) > 6000){
		$description_error = "Must be no more than 6000 characters.";
		$error = "data";
	}
}

if (isset($_POST["professor"]) && $_POST["professor"] !== ""){
	$professor = strip_tags($_POST["professor"]);
	if (strlen($professor) > 100){
		$professor_error = "Must be no more than 100 characters.";
		$error = "data";
	}
}

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
	$user_id = $_SESSION["user_id"];
}
else{
	$error = "server";
}


if ($error == "none"){
	$sql = "INSERT INTO courses (department, name, number, description, professor) VALUES ('"
		. addslashes($department) . "', '"
		. addslashes($name) . "', "
		. addslashes($number) . ", '"
		. addslashes($description) . "', '"
		. addslashes($professor) . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$course_id = $mysqli->insert_id;
		$sql = "INSERT INTO course_list (course_id, user_id, role) VALUES ('"
		. addslashes($course_id) . "', '" 
		. addslashes($user_id) . "', '"
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
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'department': '" . addslashes($department) . "',\n";
echo "'number': '" . addslashes($number) . "',\n";
echo "'name': '" . addslashes($name) . "',\n";
echo "'description': '" . addslashes($description) . "',\n";
echo "'professor': '" . addslashes($professor) . "',\n";

echo "}";

include "footer_action.php";