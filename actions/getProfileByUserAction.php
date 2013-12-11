<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$user_id=-1;
$error="none";
$firstname="";
$lastname="";
$middlename="";
$gender="";
$dob="";
$major="";
$degree="";
$year="";
$semester="";
$picture_id=-1;

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = strip_tags($_POST["user_id"]);
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM profiles WHERE user_id = " . addslashes($user_id) . ";";
	$result = $mysqli->query($sql);
	if($result){
		if ($row = $result->fetch_array()){
			$firstname = $row['firstname'];
			$middlename = $row['middlename'];
			$lastname = $row['lastname'];
			$gender = $row['gender'];
			$dob = $row['dob'];
			$major = $row['major'];
			$degree = $row['degree'];
			$year = $row['entry_year'];
			$semester = $row['entry_semester'];
			$picture_id = $row['picture_id'];
			$_SESSION["firstname"] = $row['firstname'];
			$_SESSION["lastname"] = $row['lastname'];
			$_SESSION["picture_id"] = $row['picture_id'];
		}
		else{
			$error = "data";
		}
	}	
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
echo "'firstname': '" . addslashes($firstname) . "',\n";
echo "'middlename': '" . addslashes($middlename) . "',\n";
echo "'lastname': '" . addslashes($lastname) . "',\n";
echo "'gender': '" . addslashes($gender) . "',\n";
echo "'dob': '" . addslashes($dob) . "',\n";
echo "'major': '" . addslashes($major) . "',\n";
echo "'degreee': '" . addslashes($degree) . "',\n";
echo "'year': '" . addslashes($year) . "',\n";
echo "'semester': '" . addslashes($semester) . "',\n";
echo "'picture_id': '" . addslashes($picture_id) . "',\n";
echo "}";
include "footer_action.php";
