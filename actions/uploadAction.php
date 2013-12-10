<?php
$error = "none";

if (isset($_FILES["file"])){
	$filename = $_FILES['file']['name'];
    $filetmp = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    if($filesize / 1024 < 1000){
		move_uploaded_file($filetmp,  '../upload/' . $filename);
		$error = "ok";
	}
	else{
		$error = "too large";
	}
}
else{
	echo $_FILES["file"]["error"];
	$error = "no file";
}

echo $error;
