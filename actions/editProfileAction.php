<?php
//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$user_id=-1;
$error="none";


if (isset($_POST["firstname"]) && $_POST["firstname"] !== ""){
	$firstname = $_POST["firstname"];
	if (preg_match("/^([a-zA-Z-']+)$/", $firstname) == 0){
		$firstname_error = "Your first name is invalid.";
		$error = "data";
	}
}
else{
	$firstname_error = "You must set a first name.";
	$error = "data";
}

if (isset($_POST["middlename"]) && $_POST["middlename"] !== ""){
	$middlename = $_POST["middlename"];
	if (preg_match("/^([a-zA-Z-']+)$/", $middlename) == 0){
		$middlename_error = "Your middle name is invalid.";
		$error = "data";
	}
}

if (isset($_POST["lastname"]) && $_POST["lastname"] !== ""){
	$lastname = $_POST["lastname"];
	if (preg_match("/^([a-zA-Z-']+)$/", $lastname) == 0){
		$lastname_error = "Your last name is invalid.";
		$error = "data";
	}
}
else{
	$lastname_error = "You must set a last name.";
	$error = "data";
}

if (isset($_POST["gender"]) && $_POST["gender"] !== ""){
	$gender = $_POST["gender"];
	if ($gender !== "M" && $gender !== "F"){
		$gender_error = "Your gender is invalid.";
		$error = "data";
	}
}
else{
	$gender_error = "You must set a gender."; 
	$error = "data";
}

if (isset($_POST["dob"]) && $_POST["dob"] !== ""){
	$dob = $_POST["dob"];
	if (preg_match("/^([1-9][0-9]{3})-((0[1-9])|(1[012]))-((0[1-9])|([12][0-9])|(3[01]))$/i", $dob) == 0){
		$lastname_error = "Your birthday is invalid.";
		$error = "data";
	}
}
else{
	$dob_error = "You must set a birthday.";
	$error = "data";
}

if (isset($_POST["major"]) && $_POST["major"] !== ""){
	$major = $_POST["major"];
	if (!array_key_exists($major, $majors)){
		$major_error = "Your major is invalid.";
		$error = "data";
	}
}
else{
	$major_error = "You must select a major.";
	$error = "data";
}

if (isset($_POST["degree"]) && $_POST["degree"] !== ""){
	$degree = $_POST["degree"];
	if (!in_array($degree, $degrees)){
		$degree_error = "Your degree is invalid.";
		$error = "data";
	}
}
else{
	$degree_error = "You must set a degree.";
	$error = "data";
}

if (isset($_POST["year"]) && $_POST["year"] !== ""){
	$year = $_POST["year"];
	if (preg_match("/^([1-9][0-9]{3})$/i", $year) == 0 || $year > getdate()["year"]){
		$year_error = "Your entry year is invalid.";
		$error = "data";
	}
}
else{
	$year_error = "You must set a entry year.";
	$error = "data";
}

if (isset($_POST["semester"]) && $_POST["semester"] !== ""){
	$semester = $_POST["semester"];
	if (!array_key_exists($semester, $semesters)){
		$semester_error = "Your entry semester is invalid.";
		$error = "data";
	}
}
else{
	$semester_error = "You must select a entry semester.";
	$error = "data";
}

if ($error == "none"){
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		$user_id = $_SESSION["user_id"];
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
			WHERE user_id = ". $user_id . "
			;";
		//echo $sql;
		$result = $mysqli->query($sql);
		if ($result ==  false){
			$error = "server";
		}
	}
	else{
		$error = "server";
	}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . $user_id . "',\n";
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