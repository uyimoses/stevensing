<?php
//include action header
include "header_action.php";

$username = "";
$password = "";
$error = "none";
$id = -1;

if (isset($_POST["username"]) && $_POST["username"] != ""){
	$username = $_POST["username"];
}
if (isset($_POST["password"]) && $_POST["password"] != ""){
	$password = $_POST["password"];
}

//login
$result = $mysqli->query("SELECT * FROM users WHERE username = '" . addslashes($username) . "' AND password = '" . sha1($password) . "';");
if ($result){
	if ($row = $result->fetch_array()){
		$id = $row["user_id"];
		$_SESSION["user_id"] = $id;
	}
	else{
		$error = "data";
	}
}
else{
	$error = "server";
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'id': '" . addslashes($id) . "',\n";
echo "}";