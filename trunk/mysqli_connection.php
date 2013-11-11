<?php
$dbhost = 'localhost'; 
$dbuser = 'common';
$dbpass = 'cr@2ym@n';
$dbname = 'stevensing';
$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die("Program died. Cannot link to the Database.".mysqli_connect_error());