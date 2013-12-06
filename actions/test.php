<?php
//include mysqli connection
include "mysqli_connection.php";

//include data
include "datas.php";

//set timezone
date_default_timezone_set('UTC');

$sql = "SELECT * FROM users where username = '" . addslashes("abc@stevens.edu") . "';";
echo $sql."<br>";
$result = $mysqli->query($sql);
if ($result){
	if ($row = $result->fetch_row()){
		echo "This email is already used.";
	}
}
else{
	echo "error";
}