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

if (isset($_GET["keyword"]) && $_GET["keyword"] != ""){
	$keyword = $_GET["keyword"];
}
else{
	$keyword_error = "You should set a keyword";
	$error = "data";
}

if (isset($_GET["type"]) && $_GET["type"] != ""){
	$type = $_GET["type"];
}
else{
	$type_error = "You should set a type";
	$error = "data";
}



