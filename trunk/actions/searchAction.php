<?php
//include action header
include "header_action.php";

$error = "none";
$keyword = "";

$users = array();
$courses = array();

if (isset($_POST["keyword"]) && $_POST["keyword"] != ""){
	$keyword = strip_tags($_POST["keyword"]);
	if (strlen($keyword) <= 0){
		$keyword_error = "Don't use html tags";
		$error = "data";
	}
}
else{
	$keyword_error = "You should set a keyword";
	$error = "data";
}

if ($error == "none"){
	//search users
	$sql = "SELECT * FROM profiles WHERE firstname = '"
		. addslashes($keyword) . "' OR lastname = '"
		. addslashes($keyword) . "';";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		while ($row = $result->fetch_array()){
			array_push($users, $row);
		}
	}
	//search courses
	$keyword = str_replace("%", "", $keyword);
	$namefilter = "";
	if ($keyword != "")
		$namefilter = "name LIKE '%" . addslashes($keyword) . "%' OR ";
	$sql = "SELECT * FROM courses WHERE " . $namefilter . "number = '"
		. addslashes($keyword) . "';";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		while ($row = $result->fetch_array()){
			array_push($courses, $row);
		}
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'keyword': '" . addslashes($keyword) . "',\n";
echo "'user_list': [\n";
foreach ($users as $index => $user) {
	if ($index!=0)
		echo ",\n";
	echo "{\n";
	echo "'user_id': '" . addslashes($user["user_id"]) . "',\n";
	echo "'firstname': '" . addslashes($user["firstname"]) . "',\n";
	echo "'middlename': '" . addslashes($user["middlename"]) . "',\n";
	echo "'lastname': '" . addslashes($user["lastname"]) . "',\n";
	echo "'gender': '" . addslashes($user["gender"]) . "',\n";
	echo "'dob': '" . addslashes($user["dob"]) . "',\n";
	echo "'major': '" . addslashes($user["major"]) . "',\n";
	echo "'degree': '" . addslashes($user["degree"]) . "',\n";
	echo "'year': '" . addslashes($user["entry_year"]) . "',\n";
	echo "'semester': '" . addslashes($user["entry_semester"]) . "',\n";
	echo "'picture_id': '" . addslashes($user["picture_id"]) . "',\n";
	echo "}\n";
}
echo "],\n";
echo "'course_list': [\n";
foreach ($courses as $index => $course) {
	if ($index!=0)
		echo ",\n";
	echo "{\n";
	echo "'course_id': '" . addslashes($course["course_id"]) . "',\n";
	echo "'department': '" . addslashes($course["department"]) . "',\n";
	echo "'number': '" . addslashes($course["number"]) . "',\n";
	echo "'name': '" . addslashes($course["name"]) . "',\n";
	echo "'description': '" . addslashes($course["description"]) . "',\n";
	echo "'professor': '" . addslashes($course["professor"]) . "',\n";
	echo "}\n";
}
echo "]\n";
echo "}";

include "footer_action.php";

