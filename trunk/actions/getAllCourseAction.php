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
	echo "'department': '" . $course["department"] . "',\n";
	echo "'number': '" . $course["number"] . "',\n";
	echo "'name': '" . $course["name"] . "',\n";
	echo "'professor': '" . $course["professor"] . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";