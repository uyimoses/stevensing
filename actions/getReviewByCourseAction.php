<?php

//include action header
include "header_action.php";

//validation
$error = "none";
$course_id = -1;
$reviews = array();

if (isset($_POST["course_id"]) && $_POST["course_id"] != ""){
	$course_id = strip_tags($_POST["course_id"]);
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM reviews INNER JOIN profiles WHERE profiles.user_id = reviews.user_id AND course_id = ". addslashes($course_id) . ";";
	$result = $mysqli->query($sql);
	if($result){ 	
		while($row = $result->fetch_array()){
	 		array_push($reviews, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'review_list': [\n";
foreach ($reviews as $index => $review) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'review_id': '" . addslashes($review["review_id"]) . "',\n";
	echo "'user_id': '" . addslashes($review["user_id"]) . "',\n";
	echo "'score': '" . addslashes($review["score"]) . "',\n";
	echo "'content': '" . addslashes($review["content"]) . "',\n";
	echo "'timestamp': '" . addslashes($review["timestamp"]) . "',\n";
	echo "'firstname': '" . addslashes($review["firstname"]) . "',\n";
	echo "'lastname': '" . addslashes($review["lastname"]) . "',\n";
	echo "'picture_id': '" . addslashes($review["picture_id"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";

include "footer_action.php";