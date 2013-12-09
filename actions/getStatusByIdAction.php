<?php

//include action header
include "header_action.php";

//include data
//include "datas.php";

//validation
$user_id = -1;
$error = "none";
$firstname = "";
$lastname = "";
$middlename = "";
$picture_id = -1;
$status_content = "";
$statuses = array();

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM statuses WHERE entity_id = ". addslashes($user_id) . " AND entity_type = 1;";
	$result = $mysqli->query($sql);

	if($result){ 	
		while($row=$result->fetch_array()){
	 		array_push($statuses, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'status_list': [\n";
foreach ($statuses as $index => $status) {
	if($index != 0){
		echo ",\n";
	}
	echo "{\n";
	echo "'content': '" . $status["content"] . "',\n";
	echo "'content': '" . $status["picture_id"] . "',\n";
	echo "'content': '" . $status["timestamp"] . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";