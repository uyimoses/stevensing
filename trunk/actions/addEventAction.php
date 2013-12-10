<?php

//include action header
include "header_action.php";

$error = "none";
$title_error = "";
$content_error = "";
$starttime_error = "";
$endtime_error = "";
$number_error = "";
$id = -1;
$type = -1;
$event_id = -1;
$title = "";
$content = "";
$starttime = "";
$endtime = "";
$number = 0;
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$id = $_POST["id"];
}
else{
	$error = "data";
}

if (isset($_POST["type"]) && $_POST["type"] != ""){
	$type = $_POST["type"];
}
else{
	$error = "data";
}

if (isset($_POST["title"]) && $_POST["title"] !== ""){
	$title = $_POST["title"];
	if (strlen($title) > 200){
		$title_error = "Must be no more than 200 characters.";
		$error = "data";
	}
}
else{
	$content_error = "You should set a title.";
	$error = "data";
}

if (isset($_POST["content"]) && $_POST["content"] !== ""){
	$content = $_POST["content"];
	if (strlen($content) > 600){
		$content_error = "Must be no more than 600 characters.";
		$error = "data";
	}
}
else{
	$content_error = "You should set a content.";
	$error = "data";
}

if (isset($_POST["starttime"]) && $_POST["starttime"] !== ""){
	$starttime = $_POST["starttime"];
	if (preg_match("/^([1-9][0-9]{3})-((0[1-9])|(1[012]))-((0[1-9])|([12][0-9])|(3[01])) (([01][0-9])|(2[0-3])):([0-5][0-9]):([0-5][0-9])$/", $starttime) == 0){
		$starttime_error = "Invalid time.";
		$error = "data";
	}
}
else{
	$starttime_error = "You should set a starttime.";
	$error = "data";
}

if (isset($_POST["endtime"]) && $_POST["endtime"] !== ""){
	$endtime = $_POST["endtime"];
	if (preg_match("/^([1-9][0-9]{3})-((0[1-9])|(1[012]))-((0[1-9])|([12][0-9])|(3[01])) (([01][0-9])|(2[0-3])):([0-5][0-9]):([0-5][0-9])$/", $starttime) == 0){
		$endtime_error = "Invalid time.";
		$error = "data";
	}
	else if ($starttime != ""){
		if (strtotime($endtime) < strtotime($starttime)){
			$endtime_error = "End time should be later than start time.";
			$error = "data";
		}
	}
}

if (isset($_POST["number"]) && $_POST["number"] !== ""){
	$number = $_POST["number"];
	if (preg_match("/^[1-9]([0-9]*)$/", $number) == 0){
		$number_error = "Invalid number.";
		$error = "data";
	}
	else if (strlen($number)>4){
		$number_error = "Too many members.";
		$error = "data";
	}
}

if ($error == "none"){
	$sql = "INSERT INTO events (entity_id, entity_type, title, content, starttime, endtime, number, timestamp) VALUES ('"
		. addslashes($id) . "', '" 
		. addslashes($type) . "', '"
		. addslashes(strip_tags($title)) . "', '"
		. addslashes(strip_tags($content)) . "', '"
		. addslashes($starttime) . "', '"
		. addslashes((isset($endtime))?$endtime:"") . "', '"
		. addslashes((isset($number))?$number:"") . "', '"
		. $timestamp. "' );";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$event_id = $mysqli->insert_id;
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'title_error': '" . $title_error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'starttime_error': '" . $starttime_error . "',\n";
echo "'endtime_error': '" . $endtime_error . "',\n";
echo "'number_error': '" . $number_error . "',\n";
echo "'event_id': '" . $event_id . "',\n";
echo "'entity_id': '" . $id . "',\n";
echo "'entity_type': '" . $type . "',\n";
echo "'title': '" . $title . "',\n";
echo "'content': '" . $content . "',\n";
echo "'starttime': '" . $starttime . "',\n";
echo "'endtime': '" . $endtime . "',\n";
echo "'number': '" . $number . "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";