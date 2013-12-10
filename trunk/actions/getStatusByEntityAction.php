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
	$entity_type = $_POST["type"];
}
else{
	$error = "data";
}

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$entity_id = $_POST["id"];
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
echo "'entity_id': '" . $entity_id . "',\n";
echo "'entity_type': '" . $entity_type . "',\n";
echo "'status_list': [\n";
foreach ($statuses as $index => $status) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'status_id': '" . $status["status_id"] . "',\n";
	echo "'content': '" . $status["content"] . "',\n";
	echo "'timestamp': '" . $status["timestamp"] . "',\n";
	if ($entity_type == 1){
		echo "'user_id': '" . $status["user_id"] . "',\n";
		echo "'firstname': '" . $status["firstname"] . "',\n";
		echo "'lastname': '" . $status["lastname"] . "',\n";
		echo "'picture_id': '" . $status["picture_id"] . "',\n";
	}
	else{
		echo "'course_id': '" . $status["course_id"] . "',\n";
		echo "'department': '" . $status["department"] . "',\n";
		echo "'number': '" . $status["number"] . "',\n";
		echo "'name': '" . $status["name"] . "',\n";
	}
	echo "}\n";
}
echo "]\n";
echo "}";