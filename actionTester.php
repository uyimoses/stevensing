<?php
//create a mysqli connection
include "mysqli_connection.php";
//some datas
include "datas.php";
//

//set timezone
date_default_timezone_set('UTC');

//start session
session_start();

//////////////////////////////////for testing
$_SESSION["user_id"] = 1;
/////////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
	<script src="./js/common.js"></script>
	<script>
		function successFunction(obj){
			console.log(obj);
		}
		function errorFunction(obj){
			console.log(obj);
		}
		$("#display").ready(function(){
			action(
				"getCourseListAction", 
				successFunction, 
				errorFunction, 
				"POST", 
				{
					"user_id": 15,
					// "friend_id": 11
					// "status": 2
				}
			);
				
		});
	</script>
</head>
<body>
	<div id="display"></div>
</body>
</html>