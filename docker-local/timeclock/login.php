<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="timeapp.css" type="text/css">
<title>Log In</title>
</head>
<body>
<?php
if (isset($_GET['logout'])) {
	$logout = $_GET['logout'];
	if ($logout ==1) {
	  session_start();
	  unset($_SESSION['timeapp_username']);
	  unset($_SESSION['timeapp_password']);
	  unset($_SESSION['timeapp_level']);
	  session_destroy();
	  header ("Location: login.php?status=logged_out");
  	  exit();
	}
}

include "nav.php";?>
<h1>User Log In</h1>
<form method="post" action="login_action.php">
<table id="box-table-a">
<tr>
	<td>User Name:&nbsp;</td>
	<td><input type="text" name="username" size="25"></td>
</tr>
<tr>
	<td>Password:&nbsp;</td>
	<td><input type="password" name="password" size="25"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type="submit" name="submit" value="Log In" class="button"></td>
</tr>
</table>
</form>
<?php include('footer.php')?>
</body>
</html>
