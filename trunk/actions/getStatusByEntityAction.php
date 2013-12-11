<?php

//include action header
include "header_action.php";

//include data
//include "datas.php";

//validation
$error = "none";
$entity_type = -1;
$entity_id = -1;
$statuses = array();
$text = "";

if (isset($_POST["type"]) && $_POST["type"] != ""){
	$entity_type = strip_tags($_POST["type"]);
}
else{
	$error = "data";
}

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$entity_id = strip_tags($_POST["id"]);
}
else{
	$error = "data";
}

if ($entity_type == 1){
	$text = "INNER JOIN profiles WHERE profiles.user_id = " . addslashes($entity_id);
}
else if ($entity_type == 2){
	$text = "INNER JOIN courses WHERE courses.course_id = " . addslashes($entity_id);
}
else{
	$error = "server";
}

if ($error == "none"){
	$sql = "SELECT * FROM statuses " . $text . " AND statuses.entity_id = ". addslashes($entity_id) . " 
	AND statuses.entity_type = ". addslashes($entity_type) . ";";
	//echo $sql;
	$result = $mysqli->query($sql);
	if($result){
		while($row = $result->fetch_array()){
	 		array_push($statuses, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'entity_id': '" . addslashes($entity_id) . "',\n";
echo "'entity_type': '" . addslashes($entity_type) . "',\n";
echo "'status_list': [\n";
foreach ($statuses as $index => $status) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'status_id': '" . addslashes($status["status_id"]) . "',\n";
	echo "'content': '" . addslashes($status["content"]) . "',\n";
	echo "'timestamp': '" . addslashes($status["timestamp"]) . "',\n";
	if ($entity_type == 1){
		echo "'user_id': '" . addslashes($status["user_id"]) . "',\n";
		echo "'firstname': '" . addslashes($status["firstname"]) . "',\n";
		echo "'lastname': '" . addslashes($status["lastname"]) . "',\n";
		echo "'picture_id': '" . addslashes($status["picture_id"]) . "',\n";
	}
	else{
		echo "'course_id': '" . addslashes($status["course_id"]) . "',\n";
		echo "'department': '" . addslashes($status["department"]) . "',\n";
		echo "'number': '" . addslashes($status["number"]) . "',\n";
		echo "'name': '" . addslashes($status["name"]) . "',\n";
	}
	echo "}\n";
}
echo "]\n";
echo "}";