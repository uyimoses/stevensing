<?php

//include action header
include "header_action.php";

//include data
//include "datas.php";

//validation
$error = "none";
$feed_type = -1;
$feed_id = -1;
$comments = array();

if (isset($_POST["type"]) && $_POST["type"] != ""){
	$feed_type = $_POST["type"];
}
else{
	$error = "data";
}

if (isset($_POST["id"]) && $_POST["id"] != ""){
	$feed_id = $_POST["id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM comments WHERE feed_id = ". addslashes($feed_id) . " 
				AND feed_type = ". addslashes($feed_type) . ";";
	$result = $mysqli->query($sql);
	if($result){ 	
		while($row = $result->fetch_array()){
	 		array_push($comments, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'feed_id': '" . addslashes($feed_id) . "',\n";
echo "'feed_type': '" . addslashes($feed_type) . "',\n";
echo "'comment_list': [\n";
foreach ($comments as $index => $comment) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'comment_id': '" . addslashes($comment["comment_id"]) . "',\n";
	echo "'user_id': '" . addslashes($comment["user_id"]) . "',\n";
	echo "'content': '" . addslashes($comment["content"]) . "',\n";
	echo "'timestamp': '" . addslashes($comment["timestamp"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";