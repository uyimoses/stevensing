<?php

//include action header
include "header_action.php";

//validation
$error = "none";
$course_id = -1;
$resources = array();

if (isset($_POST["course_id"]) && $_POST["course_id"] != ""){
	$course_id = strip_tags($_POST["course_id"]);
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM resources WHERE course_id = ". addslashes($course_id) . ";";
	$result = $mysqli->query($sql);
	if($result){
		while($row = $result->fetch_array()){
	 		array_push($resources, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'resource_list': [\n";
foreach ($resources as $index => $resource) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'resource_id': '" . addslashes($resource["resource_id"]) . "',\n";
	echo "'user_id': '" . addslashes($resource["user_id"]) . "',\n";
	echo "'url': '" . addslashes($resource["url"]) . "',\n";
	echo "'title': '" . addslashes($resource["title"]) . "',\n";
	echo "'catalog': '" . addslashes($resource["catalog"]) . "',\n";
	echo "'timestamp': '" . addslashes($resource["timestamp"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";

include "footer_action.php";