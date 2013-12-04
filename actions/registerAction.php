<?php
//include mysqli connection
include "mysqli_connection.php"

//output json text
echo "{";
// echo "'email': '" . $_POST['email'] . "',";
// echo "'password': '" . $_POST['password'] . "',";
// echo "'question': '" . $_POST['question'] . "',";
// echo "'answer': '" . $_POST['answer'] . "',";
// echo "'firstname': '" . $_POST['firstname'] . "',";
// echo "'middlename': '" . $_POST['middlename'] . "',";
// echo "'lastname': '" . $_POST['lastname'] . "',";
// echo "'gender': '" . $_POST['gender'] . "',";
// echo "'dob': '" . $_POST['dob'] . "',";
// echo "'major': '" . $_POST['major'] . "',";
// echo "'degree': '" . $_POST['degree'] . "',";
// echo "'year': '" . $_POST['year'] . "',";
// echo "'semester': '" . $_POST['semester'] . "'";

//valication
if (isset($_POST["email"]))
	$email = $_POST["email"];
else
	$email_error = "You must set an email.";

if (isset($_POST["password"]))
	$password = $_POST["password"];
else
	$password_error = "You must set a password.";

if (isset($_POST["question"]))
	$question = $_POST["question"];
else
	$question_error = "You must set a question.";

if (isset($_POST["answer"]))
	$answer = $_POST["answer"];
else
	$answer_error = "You must set an answer.";

if (isset($_POST["firstname"]))
	$firstname = $_POST["firstname"];
else
	$firstname_error = "You must set a first name.";

$middlename = $_POST["middlename"];

if (isset($_POST["lastname"]))
	$lastname = $_POST["lastname"];
else
	$lastname_error = "You must set a last name.";

if (isset($_POST["gender"]))
	$gender = $_POST["gender"];
else
	$gender_error = "You must set a gender."; 

if (isset($_POST["dob"]))
	$dob = $_POST["dob"];
else
	$dob_error = "You must set a birthday.";

if (isset($_POST["major"]))
	$major = $_POST["major"];
else
	$major_error = "You must set a major.";

if (isset($_POST["degree"]))
	$degree = $_POST["degree"];
else
	$degree_error = "You must set a degree.";

if (isset($_POST["year"]))
	$year = $_POST["year"];
else
	$year_error = "You must set a entry year.";

if (isset($_POST["semester"]))
	$semester = $_POST["semester"];
else
	$semester_error = "You must set a entry semester.";



echo "}";