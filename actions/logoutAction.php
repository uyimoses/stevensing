<?php
//include action header
include "header_action.php";


if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
	$_SESSION["user_id"] = "";
	unset($_SESSION["user_id"]);
}

echo "<script>window.location.href='welcome';</script>";

