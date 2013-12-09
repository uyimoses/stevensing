<?php
//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$error = "none";
$user_id = -1;

$action = "edit";
require "checkProfile.php";

if (isset($_POST["user_id"]) && $_POST["user_id"] != ""){
	$user_id = $_POST["user_id"];
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "UPDATE profiles SET
		firstname='". addslashes($firstname) . "',
		middlename='". addslashes((isset($middlename))?$middlename:"") . "',
		lastname='". addslashes($lastname) . "',
		gender='". addslashes($gender) . "',
		dob='". addslashes($dob) . "', 
		major='". addslashes($major) . "', 
		degree='". addslashes($degree) . "',
		entry_year='". addslashes($year) . "',
		entry_semester='". addslashes($semester). "'
		WHERE user_id = ". addslashes($user_id) . "
		;";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result ==  false){
		$error = "server";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'id': '" . $user_id . "',\n";
echo "'firstname_error': '" . $firstname_error . "',\n";
echo "'middlename_error': '" . $middlename_error . "',\n";
echo "'lastname_error': '" . $lastname_error . "',\n";
echo "'gender_error': '" . $gender_error . "',\n";
echo "'dob_error': '" . $dob_error . "',\n";
echo "'major_error': '" . $major_error . "',\n";
echo "'degree_error': '" . $degree_error . "',\n";
echo "'year_error': '" . $year_error . "',\n";
echo "'semester_error': '" . $semester_error . "'\n";
echo "}";