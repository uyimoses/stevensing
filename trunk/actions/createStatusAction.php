<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$user_id=-1;
$error="none";


if (isset($_POST["content"]) && $_POST["content"] !== ""){
	$content = $_POST["content"];
	if (strlen($content) > 600){
		$content_error = "Must be no more than 600 characters.";
		$error = "data";
	}
}

if ($error == "none"){
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		$user_id = $_SESSION["user_id"];
		$sql = "INSERT INTO profiles (status_id, entity_id, entity_type, content, picture_id, timestamp) VALUES (" 
			. $status_id . ", 
			1,
			1, '"
			. addslashes($content) . "', '"
			. addslashes($picture_id) . "', '"
			. $now()
			. "' WHERE user_id=". $user_id . ");";
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