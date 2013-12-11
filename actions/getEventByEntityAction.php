<?php

//include action header
include "header_action.php";

//include data
//include "datas.php";

//validation
$error = "none";
$entity_type = -1;
$entity_id = -1;
$events = array();

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
	$sql = "SELECT * FROM events WHERE entity_id = ". addslashes($entity_id) . " 
				AND entity_type = ". addslashes($entity_type) . ";";
	$result = $mysqli->query($sql);
	if($result){ 	
		while($row = $result->fetch_array()){
	 		array_push($events, $row);
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
echo "'event_list': [\n";
foreach ($events as $index => $event) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'event_id': '" . addslashes($event["event_id"]) . "',\n";
	echo "'event_title': '" . addslashes($event["title"]) . "',\n";
	echo "'content': '" . addslashes($event["content"]) . "',\n";
	echo "'start_time': '" . addslashes($event["starttime"]) . "',\n";
	echo "'end_time': '" . addslashes($event["endtime"]) . "',\n";
	echo "'number': '" . addslashes($event["number"]) . "',\n";
	echo "'timestamp': '" . addslashes($event["timestamp"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";