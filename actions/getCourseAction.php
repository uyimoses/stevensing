<?php

//include action header
include "header_action.php";

//include data
include "datas.php";

//validation
$course_id = -1;
$error = "none";
$department = "";
$number = 0;
$name = "";
$description = "";
$professor = "";
$score = 0;

if (isset($_POST["course_id"]) && $_POST["course_id"] != ""){
	$course_id = strip_tags($_POST["course_id"]);
}
else{
	$error = "data";
}

if ($error == "none"){
	$sql = "SELECT * FROM courses WHERE course_id = " . addslashes($course_id) . ";";
	$result = $mysqli->query($sql);
	if($result){
		if ($row = $result->fetch_array()){
			$department = $row['department'];
			$number = $row['number'];
			$name = $row['name'];
			$description = $row['description'];
			$professor = $row['professor'];
			$_SESSION["department"] = $row['department'];
			$_SESSION["number"] = $row['number'];
			$_SESSION["name"] = $row['name'];

			$sql = "SELECT AVG(score) FROM reviews WHERE course_id = " . addslashes($course_id) . ";";
			$result = $mysqli->query($sql);
			if($result){
				if ($row = $result->fetch_array()){
					$score = round($row[0], 2);
					if ($score >= 4.75)
						$score = 10;
					else if ($score >= 4.25 && $score < 4.75)
						$score = 9;
					else if ($score >= 3.75 && $score < 4.25)
						$score = 8;
					else if ($score >= 3.25 && $score < 3.75)
						$score = 7;
					else if ($score >= 2.75 && $score < 3.25)
						$score = 6;
					else if ($score >= 2.25 && $score < 2.75)
						$score = 5;
					else if ($score >= 1.75 && $score < 2.25)
						$score = 4;
					else if ($score >= 1.25 && $score < 1.75)
						$score = 3;
					else if ($score >= 0.75 && $score < 1.25)
						$score = 2;
					else if ($score >= 0.25 && $score < 0.75)
						$score = 1;
					else
						$score = 0;
				}
			}
			else{
				$error = "server";
			}
		}
		else{
			$error = "data";
		}
	}	
	else{
		$error = "server";
	}
}

echo "{\n";
echo "'error': '" . $error . "',\n";
echo "'course_id': '" . addslashes($course_id) . "',\n";
echo "'department': '" . addslashes($department) . "',\n";
echo "'number': '" . addslashes($number) . "',\n";
echo "'name': '" . addslashes($name) . "',\n";
echo "'description': '" . addslashes($description) . "',\n";
echo "'professor': '" . addslashes($professor) . "',\n";
echo "'score': '" . addslashes($score) . "',\n"; 
echo "}";
