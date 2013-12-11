<?php
//include action header
include "header_action.php";

$error = "none";
$picture_error = "";
$url = "";
$picture_name = "";

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
	$user_id = $_SESSION["user_id"];
}
else{
	$error = "server";
}

if ($error = "none") {
	if (isset($_FILES["file"])){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
	    $filetmp = $_FILES['file']['tmp_name'];
	    $filesize = $_FILES['file']['size'];
	    $filetype = $_FILES['file']['type'];
	    $picture_name = basename($_FILES["file"]["name"]);
	    if($filesize / 1024 < 200){
	    	if (in_array($extension, $allowedExts)
			&& (($filetype == "image/gif")
			|| ($filetype == "image/jpeg")
			|| ($filetype == "image/jpg")
			|| ($filetype == "image/pjpeg")
			|| ($filetype == "image/png")
			|| ($filetype == "image/x-png"))){
				$url = '../upload/picture/' . $picture_name;
	    		move_uploaded_file($filetmp,  $url);
	    		$url = str_replace("..", ".", $url);
	    	}
			else{
				$error = "data";
				$picture_error = "Invalid file type.";
			}
		}
		else{
			$error = "data";
			$picture_error = "Too large. Must within 200KB.";
		}
	}
	else{
		$error = "data";
		$picture_error = "File doesn't exist.";
	}
}

//output json text
echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'picture_error': '" . $picture_error . "',\n";
echo "'url': '" . addslashes($url) . "',\n";
echo "'picture_name': '" . addslashes($picture_name) . "',\n";
echo "}";
