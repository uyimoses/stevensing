<?php

//include action header
include "header_action.php";

//validation
$error = "none";
$course_id = -1;
$resource = array();

if (isset($_POST["course_id"]) && $_POST["course_id"] != ""){
	$course_id = $_POST["course_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM resource WHERE course_id = ". addslashes($course_id) . ";";
	$result = $mysqli->query($sql);
	if($result){
		while($row = $result->fetch_array()){
	 		array_push($resource, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . $course_id . "',\n";
echo "'review_list': [\n";
foreach ($resource as $index => $review) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'review_id': '" . $review["review_id"] . "',\n";
	echo "'user_id': '" . $review["user_id"] . "',\n";
	echo "'score': '" . $review["score"] . "',\n";
	echo "'content': '" . $review["content"] . "',\n";
	echo "'timestamp': '" . $review["timestamp"] . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";