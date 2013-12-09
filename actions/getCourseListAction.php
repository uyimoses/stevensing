<?php
//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$courses = array();

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM course_list INNER JOIN courses WHERE course_list.user_id = " 
	. addslashes($user_id) . " AND course_list.course_id = courses.course_id;";
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
echo "'user_id': '" . $user_id . "',\n";
echo "'course_list': [\n";
foreach ($courses as $index => $course) {
	if ($index!=0)
		echo ",\n";
	echo "{\n";
	echo "'course_id': '" . $course["course_id"] . "',\n";
	echo "'state': '" . $course["state"] . "',\n";
	echo "'department': '" . $course["department"] . "',\n";
	echo "'number': '" . $course["number"] . "',\n";
	echo "'name': '" . $course["name"] . "',\n";
	echo "'description': '" . $course["description"] . "',\n";
	echo "'professor': '" . $course["professor"] . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";