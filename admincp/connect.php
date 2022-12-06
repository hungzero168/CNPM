<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "12345678";
	$DB = "shop";
	$ERROR1 = "Loi mysql chua ket noi tk mySql";
	$ERROR2 = "Loi DB chua ket noi bang";
	
$conn = mysqli_connect($HOST, $USER, $PASS) or die($ERROR1);
mysqli_select_db($conn, $DB) or die($ERROR2);
mysqli_query($conn, "SET NAMES 'utf8'");
?>
