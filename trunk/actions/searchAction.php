<?php

$error = "none";

//user
$firstname = "";
$middlename = "";
$lastname = "";
$gender = "";
$dob = "";
$major = "";
$degree = "";
$major = "";

//course
$department = "";
$number = "";
$name = "";

if (isset($_POST["keyword"]) && $_POST["keyword"] != ""){
	$keyword = $_POST["keyword"];
}
else{
	$keyword_error = "You should set a keyword";
	$error = "data";
}


