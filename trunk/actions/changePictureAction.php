<?php

//include action header
include "header_action.php";

$error = "none";
$url = "";
$user_id = 0;
$picture_error = "";
$picture_name = "";

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
	$user_id = $_SESSION["user_id"];
}
else{
	$error = "server";
}

if (isset($_POST["picture_name"]) && $_POST["picture_name"] != ""){
	$picture_name = strip_tags($_POST["picture_name"]);
}
else{
	$error = "server";
}


if ($error = "none") {
	//echo $picture_name;
	$temp = explode(".", $picture_name);
	$extension = end($temp);
	$old = "../upload/picture/". $picture_name;
	$url = "../upload/picture/" . $user_id .".". $extension;
	//echo $url;
	@unlink($url);
	if (rename($old, $url) ==  false){
		$error = "data";
	}
	else{
		$url = str_replace("..", ".", $url);
		$sql = "UPDATE profiles SET picture_id = '" 
			. addslashes($url) 
			. "' WHERE user_id = " 
			. addslashes($user_id) . ";";
		// echo $sql;
		$result = $mysqli->query($sql);
		if ($result ==  false){
			$error = "server";
		}
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'picture_error': '" . $picture_error . "',\n";
echo "'url': '" . addslashes($url) . "',\n";
echo "}";
include "footer_action.php";