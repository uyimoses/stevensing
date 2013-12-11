<?php
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

if (isset($action)){
	if ($action == "register"){
		if (isset($_POST["email"]) && $_POST["email"] !== ""){
			$email = $_POST["email"];
			if (preg_match("/^([a-zA-Z0-9]+)@stevens.edu$/i", $email) == 0){
				$email_error = "Your email address is invalid.";
				$error = "data";
			}
			//check if email used
			$sql = "SELECT * FROM users WHERE username = '" . addslashes($email) . "';";
			echo $sql;
			$result = $mysqli->query($sql);
			if ($result){
				if ($row = $result->fetch_row()){
					$email_error = "This email is already used.";
					$error = "data";
				}
			}
			else{
				$error = "server";
			}
		}
		else{
			$email_error = "You must set an email.";
			$error = "data";
		}

		if (isset($_POST["password"]) && $_POST["password"] !== ""){
			$password = $_POST["password"];
			if (strlen($password) < 8){
				$password_error = "Must be at least 8 characters.";
				$error = "data";
			}
		}
		else{
			$password_error = "You must set a password.";
			$error = "data";
		}

		if (isset($_POST["question"]) && $_POST["question"] !== ""){
			$question = $_POST["question"];
			if (strlen($question) < 8){
				$question_error = "Must be at least 8 characters.";
				$error = "data";
			}
		}
		else{
			$question_error = "You must set a question.";
			$error = "data";
		}

		if (isset($_POST["answer"]) && $_POST["answer"] !== ""){
			$answer = $_POST["answer"];
			if (strlen($answer) < 8){
				$answer_error = "Must be at least 8 characters.";
				$error = "data";
			}
		}
		else{
			$answer_error = "You must set an answer.";
			$error = "data";
		}
	}
	if ($action == "register" || $action == "edit"){
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
	}
}
