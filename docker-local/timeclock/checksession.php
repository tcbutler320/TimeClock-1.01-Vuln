<?php
session_start();
include 'db.php';
//check to make sure the session variable is registered
if(isset($_SESSION['timeapp_id'])){

	$timeapp_id = $_SESSION["timeapp_id"];
	$timeapp_level = $_SESSION["timeapp_level"];
	$timeapp_username = $_SESSION["timeapp_username"];

}else{

	echo "<script>document.location.href='login.php?e=1'</script>";
	exit;

}