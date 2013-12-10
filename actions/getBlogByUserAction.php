<?php

//include action header
include "header_action.php";

//validation
$error = "none";
$user_id = -1;
$blogs = array();

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM blogs INNER JOIN profiles WHERE profiles.user_id = blogs.user_id AND blogs.user_id = ". addslashes($user_id) . ";";
	$result = $mysqli->query($sql);
	if($result){ 	
		while($row = $result->fetch_array()){
	 		array_push($blogs, $row);
		}
	}
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . $user_id . "',\n";
echo "'blog_list': [\n";
foreach ($blogs as $index => $blog) {
	if($index != 0)
		echo ",\n";
	echo "{\n";
	echo "'blog_id': '" . $blog["blog_id"] . "',\n";
	echo "'title': '" . $blog["title"] . "',\n";
	echo "'content': '" . $blog["content"] . "',\n";
	echo "'timestamp': '" . $blog["timestamp"] . "',\n";
	echo "'user_id': '" . $blog["user_id"] . "',\n";
	echo "'firstname': '" . $blog["firstname"] . "',\n";
	echo "'lastname': '" . $blog["lastname"] . "',\n";
	echo "'picture_id': '" . $blog["picture_id"] . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";