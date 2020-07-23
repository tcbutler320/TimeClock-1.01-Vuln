<?php
# create a session cookie
session_start();
include 'db.php';

if ( isset($_POST['username'])  ){
	$timeapp_username = cclean($_POST['username']);
}

if ( isset($_POST['password']) ) {
	$timeapp_password = $_POST['password'];
}

$sql = "SELECT * FROM user_info WHERE username = '$timeapp_username';"; 
$result = mysqli_query($db,$sql);
$row = $result->fetch_assoc();
$password = $row["passcode"];
//echo "<p>hash: $timeapp_password</p>";
//echo "<p>pass: $password</p>";

if (password_verify($timeapp_password, $password)) {

	//echo "<p>Success!</p>";
	$_SESSION['timeapp_id'] 		= $row["user_id"];
	$_SESSION['timeapp_level']		= $row["level"];
	$_SESSION["timeapp_username"]	= $row["username"];
	header ("Location: index.php?success");
	
}else {
 
	//echo "<p>Failure</p>";
	unset($_SESSION['timeapp_username']);
	unset($_SESSION['timeapp_password']);
	unset($_SESSION['timeapp_level']);
	$_SESSION = array();
	session_destroy();
	header ("Location: login.php?error2");
	exit;

}