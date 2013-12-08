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

$_SESSION["user_id"] = 10;

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
	$user_id = $_SESSION["user_id"];
	$sql = "SELECT * FROM profiles WHERE user_id = $user_id;";
	$result = $mysqli->query($sql);
	if($result){
		if ($row = $result->fetch_array()){
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$lastname=$row['lastname'];
			$gender=$row['gender'];
			$dob=$row['dob'];
			$major=$row['major'];
			$degree=$row['degree'];
			$year=$row['entry_year'];
			$semester=$row['entry_semester'];
			$picture_id=$row['picture_id'];

		}
		else{
			$error = "data";
		}
	}	
	else{
		$error = "server";
	}
	
	echo "{\n";
		echo "'error': '" . $error . "',\n";
		echo "'user_id': '" . $user_id . "',\n";
		echo "'firstname': '" . $firstname . "',\n";
		echo "'middlename': '" . $middlename . "',\n";
		echo "'lastname': '" . $lastname . "',\n";
		echo "'gender': '" . $gender . "',\n";
		echo "'dob': '" . $dob . "',\n";
		echo "'major': '" . $major . "',\n";
		echo "'degreee': '" . $degree . "',\n";
		echo "'year': '" . $year . "',\n";
		echo "'semester': '" . $semester . "',\n";
		echo "'picture_id': '" . $picture_id . "',\n";

		echo "}";
}
// else
// 	echo "<script>window.location.href='welcome'</script>";
