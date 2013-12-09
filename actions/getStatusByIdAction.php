<?php

//include action header
include "header_action.php";

//include data
//include "datas.php";

//validation
$user_id = -1;
$error = "none";
$firstname = "";
$lastname = "";
$middlename = "";
$picture_id = -1;
$status_content = "";



if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
	$user_id = $_SESSION["user_id"];
	$sql1 = "SELECT * FROM statuses WHERE entity_id = $user_id AND entity_type=1;";
	$sql2 ="SELECT * FROM profiles WHERE user_id=$user_id;";
	$result1 = $mysqli->query($sql1);
	$result2 =$mysqli->query($sql2);
	if($result1&&$result2){ 
		$row1=$result1->fetch_array();
		$row2=$result2->fetch_array();
		if (row1&&row2){

			while(row1){
				$picture_id=row['picture_id'];
				$status_content=row['content'];
			}	
			while(row2){
				$firstname = row['firstname'];
				$middlename = row['middlename'];
				$lastname = row['lastname'];
			}
		}
		else{
			$error = "data";
		}
	}	
	else{
		$error = "server";
	}
	
	echo "{\n";
		echo "'error': '" . $error . "',\n";
		echo "'user_id': '" . $user_id . "',\n";
		echo "'firstname': '" . $firstname . "',\n";
		echo "'middlename': '" . $middlename . "',\n";
		echo "'lastname': '" . $lastname . "',\n";
		echo "'content': '" . $status_content . "',\n";
		echo "'picture_id': '" . $picture_id . "',\n";

		echo "}";
}
// else
// 	echo "<script>window.location.href='welcome'</script>";
