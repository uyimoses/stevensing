<?php
//include mysqli connection
include "mysqli_connection.php";

//include data
include "datas.php";

//set timezone
date_default_timezone_set('UTC');


if (!in_array("Master", $degrees)){
	echo "Your degree is invalid.";
}
else{
	echo "pass";
}