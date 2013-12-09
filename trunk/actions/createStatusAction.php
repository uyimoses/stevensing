<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$user_id=-1;
$error="none";

$_SESSION["user_id"] = 10;

if (isset($_POST["question"]) && $_POST["question"] !== ""){
	$question = $_POST["question"];
	if (strlen($question) > 600){
		$question_error = "Must be no more than 600 characters.";
		$error = "data";
	}
}


if ($error == "none"){
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		$id = $mysqli->insert_id;
		$sql = "INSERT INTO profiles (status_id, entity_id, entity_type, content, picture_id, timestamp) VALUES (" 
			. $id . ", '"
			. addslashes($entity_id) . "', '" 
			. addslashes($entity_type) . "', '"
			. addslashes($content) . "', '"
			. addslashes($picture_id) . "', '"
			. $now()
			. "');";
		//echo $sql;
		$result = $mysqli->query($sql);
		if ($result ==  false){
			$error = "server";
		}
	}
	else{
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'status_id': '" . $id . "',\n";
echo "'entity_id_error': '" . $entity_id_error . "',\n";
echo "'entity_type_error': '" . $entity_type_error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'picture_id_error': '" . $picture_id_error . "',\n";
echo "'timestamp_error': '" . $timestamp_error . "',\n";
echo "}";