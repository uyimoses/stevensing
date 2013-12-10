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

if ($error == "none"){
	$sql = "SELECT * FROM statuses WHERE entity_id = ". addslashes($entity_id) . " 
				AND entity_type = ". addslashes($entity_type) . ";";
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
	echo "}\n";
}
echo "]\n";
echo "}";