<?php
//include action header
include "header_action.php";

$error = "none";
$courses = array();

if ($error == "none"){
	$sql = "SELECT * FROM courses;";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		while ($row = $result->fetch_array()){
			array_push($courses, $row);
		}
	}
	else{
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_list': [\n";
foreach ($courses as $index => $course) {
	if ($index!=0)
		echo ",\n";
	echo "{\n";
	echo "'department': '" . addslashes($course["department"]) . "',\n";
	echo "'number': '" . addslashes($course["number"]) . "',\n";
	echo "'name': '" . addslashes($course["name"]) . "',\n";
	echo "'professor': '" . addslashes($course["professor"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";

include "footer_action.php";