<?php

//include action header
include "header_action.php";

$error = "none";
$title_error = "";
$content_error = "";
$course_id = -1;
$user_id = -1;
$review_id = -1;
$score = -1;
$content = "";
$timestamp = date("Y-m-d H:i:s", time());

if (isset($_POST["course_id"]) && $_POST["course_id"] !== ""){
	$course_id = $_POST["course_id"];
}
else{
	$error = "data";
}

if (isset($_POST["user_id"]) && $_POST["user_id"] !== ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["score"]) && $_POST["score"] !== ""){
	$score = $_POST["score"];
	if (preg_match("/^[0-5]$/", $score) ==  0){
		$score_error = "Must be 0-5.";
		$error = "data";
	}
}
else{
	$score_error = "You should set a score.";
	$error = "data";
}

if (isset($_POST["content"]) && $_POST["content"] !== ""){
	$content = $_POST["content"];
	if (strlen($content) > 3000){
		$content_error = "Must be no more than 3000 characters.";
		$error = "data";
	}
}
else{
	$content_error = "You cannot post an empty review.";
	$error = "data";
}

if ($error == "none"){
	$sql = "INSERT INTO reviews (course_id, user_id, score, content, timestamp) VALUES (" 
		. addslashes($course_id). ", "
		. addslashes($user_id). ", "
		. $score . ", '" 
		. addslashes(strip_tags($content)) . "', '"
		. $timestamp . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
	else{
		$review_id = $mysqli->insert_id;
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'score_error': '" . $title_error . "',\n";
echo "'content_error': '" . $content_error . "',\n";
echo "'review_id': '" . $review_id . "',\n";
echo "'course_id': '" . $course_id . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'score': '" . $score. "',\n";
echo "'content': '" . $content. "',\n";
echo "'timestamp': '" . $timestamp. "',\n";
echo "}";