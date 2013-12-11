<?php
//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$error = "none";
$user_id = -1;

$action = "register";
require "checkProfile.php";

if ($error == "none"){
	$sql = "INSERT INTO users (username, password, security_question, security_answer) VALUES ('" 
		. addslashes($email) . "', '" 
		. sha1($password) . "', '" 
		. sha1($question) . "', '" 
		. sha1($answer) . "');";
	//echo $sql;
	$result = $mysqli->query($sql);
	if ($result){
		$user_id = $mysqli->insert_id;
		$sql = "INSERT INTO profiles (user_id, firstname, middlename, lastname, gender, dob, major, degree, entry_year, entry_semester) VALUES (" 
			. $user_id . ", '"
			. addslashes($firstname) . "', '" 
			. addslashes((isset($middlename))?$middlename:"") . "', '"
			. addslashes($lastname) . "', '"
			. addslashes($gender) . "', '"
			. addslashes($dob) . "', '"
			. addslashes($major) . "', '"
			. addslashes($degree) . "', '"
			. addslashes($year) . "', '"
			. addslashes($semester)
			. "');";
		//echo $sql;
		$result = $mysqli->query($sql);
		if ($result ==  false){
			$error = "server";
		}
		else{
			$_SESSION["user_id"] = $user_id;
		}
	}
	else{
		$error = "server";
	}
}


//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'user_id': '" . addslashes($user_id) . "',\n";
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