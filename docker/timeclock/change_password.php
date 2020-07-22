<?php
include('auth.php');
$err = '';

if(isset($_POST['submit'])){
	$new_password = $_POST['new_password'];
	$confirm_new_password = $_POST['confirm_new_password'];
	
	if ($new_password == $confirm_new_password) {
		
		$hash = password_hash($confirm_new_password, PASSWORD_DEFAULT);
		$query = "UPDATE user_info set passcode = '$hash' where user_id = $timeapp_id LIMIT 1;";
		mysqli_query($db,$query);
		header('Location: login.php');
		exit();
		
	}else{
		
		$err = 'Invalid Input';
		
	}
	
}elseif(isset($_POST['cancel'])){
	
	header('Location: index.php');
	exit();

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Time Application</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="timeapp.css" type="text/css">
</head>

<body>
<?php include "nav.php";?>
<h1>Change Password</h1>
<form method="post" action="change_password.php">
<table id="box-table-a">
<?php if(strlen($err) > 1){ ?>
	<tr>
		<td colspan="100%" align="center"><?php echo $err?></td>
	</tr>
<?php } ?>
	<tr>
		<td>New Password:&nbsp;</td>
		<td><input type="password" name="new_password" size="30"></td>
	</tr>
	<tr>
		<td>Confirm New Password:&nbsp;</td>
		<td><input type="password" name="confirm_new_password" size="30"></td>
	</tr>
	<tr>
		<td><input type="submit" name="submit" value="Update" class="button">&nbsp;
		<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</table>
</form>
<?php include('footer.php')?>			
</body>
</html>
