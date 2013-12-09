<?php
//include action header
include "header_action.php";

$error = "none";
$user_id = -1;
$status = -1;
$friends = array();

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if (isset($_POST["status"]) && $_POST["status"] != ""){
	$status = $_POST["status"];
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
echo "'user_id': '" . $user_id . "',\n";
echo "'status': '" . $status . "',\n";
echo "'friend_list': [\n";
foreach ($friends as $index => $friend) {
	if ($index!=0)
		echo ",\n";
	echo "{\n";
	echo "'user_id': '" . $friend["friend_id"] . "',\n";
	echo "'timestamp': '" . $friend["timestamp"] . "',\n";
	echo "'firstname': '" . $friend["firstname"] . "',\n";
	echo "'middlename': '" . $friend["middlename"] . "',\n";
	echo "'lastname': '" . $friend["lastname"] . "',\n";
	echo "'gender': '" . $friend["gender"] . "',\n";
	echo "'dob': '" . $friend["dob"] . "',\n";
	echo "'major': '" . $friend["major"] . "',\n";
	echo "'degree': '" . $friend["degree"] . "',\n";
	echo "'year': '" . $friend["entry_year"] . "',\n";
	echo "'semester': '" . $friend["entry_semester"] . "'\n";
	echo "}\n";
}
echo "]\n";
echo "}";