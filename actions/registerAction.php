<?php
//include mysqli connection
include "mysqli_connection.php";

//include data
include "datas.php";

//set timezone
date_default_timezone_set('UTC');

//valication
$email_error = "";
$password_error = "";
$question_error = "";
$answer_error = "";
$firstname_error = "";
$middlename_error = "";
$lastname_error = "";
$gender_error = "";
$dob_error = "";
$major_error = "";
$degree_error = "";
$year_error = "";
$semester_error = "";

if (isset($_POST["email"]) && $_POST["email"] !== ""){
	$email = $_POST["email"];
	if (preg_match("/^([a-zA-Z0-9]+)@stevens.edu$/i", $email) == 0){
		$email_error = "Your email address is invalid.";
	}
}
else
	$email_error = "You must set an email.";

if (isset($_POST["password"]) && $_POST["password"] !== ""){
	$password = $_POST["password"];
	if (strlen($password) < 8){
		$password_error = "Must be at least 8 characters.";
	}
	else{
		$password = sha1($password);
	}
}
else
	$password_error = "You must set a password.";

if (isset($_POST["question"]) && $_POST["question"] !== ""){
	$question = $_POST["question"];
	if (strlen($question) < 8){
		$question_error = "Must be at least 8 characters.";
	}
}
else
	$question_error = "You must set a question.";

if (isset($_POST["answer"]) && $_POST["answer"] !== ""){
	$answer = $_POST["answer"];
	if (strlen($answer) < 8){
		$answer_error = "Must be at least 8 characters.";
	}
}
else
	$answer_error = "You must set an answer.";

if (isset($_POST["firstname"]) && $_POST["firstname"] !== ""){
	$firstname = $_POST["firstname"];
	if (preg_match("/^([a-zA-Z-']+)$/", $firstname) == 0){
		$firstname_error = "Your first name is invalid.";
	}
}
else
	$firstname_error = "You must set a first name.";

$middlename = $_POST["middlename"];
if (preg_match("/^([a-zA-Z-']+)$/", $middlename) == 0 && $_POST["middlename"] !== ""){
	$middlename_error = "Your middle name is invalid.";
}

if (isset($_POST["lastname"]) && $_POST["lastname"] !== ""){
	$lastname = $_POST["lastname"];
	if (preg_match("/^([a-zA-Z-']+)$/", $lastname) == 0){
		$lastname_error = "Your last name is invalid.";
	}
}
else
	$lastname_error = "You must set a last name.";

if (isset($_POST["gender"]) && $_POST["gender"] !== ""){
	$gender = $_POST["gender"];
	if ($gender !== "M" && $gender !== "F"){
		$gender_error = "Your gender is invalid.";
	}
}
else
	$gender_error = "You must set a gender."; 

if (isset($_POST["dob"]) && $_POST["dob"] !== ""){
	$dob = $_POST["dob"];
	if (preg_match("/^((0[1-9])|(1[012]))\/((0[1-9])|([12][0-9])|(3[01]))\/([1-9][0-9]{3})$/i", $dob) == 0){
		$lastname_error = "Your birthday is invalid.";
	}
}
else
	$dob_error = "You must set a birthday.";

if (isset($_POST["major"]) && $_POST["major"] !== ""){
	$major = $_POST["major"];
	if (!array_key_exists($major, $majors)){
		$major_error = "Your major is invalid.";
	}
}
else
	$major_error = "You must select a major.";

if (isset($_POST["degree"]) && $_POST["degree"] !== ""){
	$degree = $_POST["degree"];
	if (!in_array($degree, $degrees)){
		$degree_error = "Your degree is invalid.";
	}
}
else
	$degree_error = "You must set a degree.";

if (isset($_POST["year"]) && $_POST["year"] !== ""){
	$year = $_POST["year"];
	if (preg_match("/^([1-9][0-9]{3})$/i", $year) == 0 || $year > getdate()["year"]){
		$year_error = "Your entry year is invalid.";
	}
}
else
	$year_error = "You must set a entry year.";

if (isset($_POST["semester"]) && $_POST["semester"] !== ""){
	$semester = $_POST["semester"];
	if (!in_array($semester, $semesters)){
		$semester_error = "Your entry semester is invalid.";
	}
}
else
	$semester_error = "You must select a entry semester.";




//output json text
echo "{";
echo "'email_error': '" . $email_error . "',\n";
echo "'password_error': '" . $password_error . "',\n";
echo "'question_error': '" . $question_error . "',\n";
echo "'answer_error': '" . $answer_error . "',\n";
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