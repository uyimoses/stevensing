<?php
//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$status = -1;
$friends = array();

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = strip_tags($_POST["user_id"]);
}
else{
	$error = "data";
}

if (isset($_POST["status"]) && $_POST["status"] != ""){
	$status = strip_tags($_POST["status"]);
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM friend_list INNER JOIN profiles WHERE friend_list.user_id = " 
	. addslashes($user_id) . " AND friend_list.friend_id = profiles.user_id AND friend_list.status = " 
	. addslashes($status) . ";";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		while ($row = $result->fetch_array()){
			array_push($friends, $row);
		}
	}
	else{
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'status': '" . addslashes($status) . "',\n";
echo "'friend_list': [\n";
foreach ($friends as $index => $friend) {
	if ($index!=0)
		echo ",\n";
	echo "{\n";
	echo "'user_id': '" . addslashes($friend["friend_id"]) . "',\n";
	echo "'timestamp': '" . addslashes($friend["timestamp"]) . "',\n";
	echo "'firstname': '" . addslashes($friend["firstname"]) . "',\n";
	echo "'middlename': '" . addslashes($friend["middlename"]) . "',\n";
	echo "'lastname': '" . addslashes($friend["lastname"]) . "',\n";
	echo "'gender': '" . addslashes($friend["gender"]) . "',\n";
	echo "'dob': '" . addslashes($friend["dob"]) . "',\n";
	echo "'major': '" . addslashes($friend["major"]) . "',\n";
	echo "'degree': '" . addslashes($friend["degree"]) . "',\n";
	echo "'year': '" . addslashes($friend["entry_year"]) . "',\n";
	echo "'semester': '" . addslashes($friend["entry_semester"]) . "',\n";
	echo "'picture_id': '" . addslashes($friend["picture_id"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";

include "footer_action.php";