<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$course_id = -1;
$error = "none";
$department = "";
$number = 0;
$name = "";
$description = "";
$professor = "";
$score = 0;

if (isset($_POST["course_id"]) && $_POST["course_id"] != ""){
	$course_id = $_POST["course_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM courses WHERE course_id = " . addslashes($course_id) . ";";
	$result = $mysqli->query($sql);
	if($result){
		if ($row = $result->fetch_array()){
			$department = $row['department'];
			$number = $row['number'];
			$name = $row['name'];
			$description = $row['description'];
			$professor = $row['professor'];
			$_SESSION["department"] = $row['department'];
			$_SESSION["number"] = $row['number'];
			$_SESSION["name"] = $row['name'];

			$sql = "SELECT * FROM reviews WHERE course_id = " . addslashes($course_id) . ";";
		}
		else{
			$error = "data";
		}
	}	
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'department': '" . addslashes($department) . "',\n";
echo "'number': '" . addslashes($number) . "',\n";
echo "'name': '" . addslashes($name) . "',\n";
echo "'description': '" . addslashes($description) . "',\n";
echo "'professor': '" . addslashes($professor) . "',\n";
echo "'score': '" . addslashes($score) . "',\n"; 
echo "}";
