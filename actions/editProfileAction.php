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
	$user_id = strip_tags($_POST["user_id"]);
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
echo "'user_id': '" . addslashes($user_id) . "',\n";


echo "'firstname': '" . addslashes($firstname) . "',\n";
echo "'middlename': '" . addslashes((isset($middlename))?$middlename:"") . "',\n";
echo "'lastname': '" . addslashes($lastname) . "',\n";
echo "'gender': '" . addslashes($gender) . "',\n";
echo "'dob': '" . addslashes($dob) . "',\n";
echo "'major': '" . addslashes($major) . "',\n";
echo "'degree': '" . addslashes($degree) . "',\n";
echo "'year': '" . addslashes($year) . "',\n";
echo "'semester': '" . addslashes($semester) . "',\n";


echo "'firstname_error': '" . addslashes($firstname_error) . "',\n";
echo "'middlename_error': '" . addslashes($middlename_error) . "',\n";
echo "'lastname_error': '" . addslashes($lastname_error) . "',\n";
echo "'gender_error': '" . addslashes($gender_error) . "',\n";
echo "'dob_error': '" . addslashes($dob_error) . "',\n";
echo "'major_error': '" . addslashes($major_error) . "',\n";
echo "'degree_error': '" . addslashes($degree_error) . "',\n";
echo "'year_error': '" . addslashes($year_error) . "',\n";
echo "'semester_error': '" . addslashes($semester_error) . "'\n";
echo "}";

include "footer_action.php";