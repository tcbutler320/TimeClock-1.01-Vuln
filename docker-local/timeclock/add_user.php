<?php
include('auth.php');
include('admin.php');
$err = '';
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$access_level = $_POST['access_level'];
	$u_name = $_POST['u_name'];
	$user_password = $_POST['user_password'];
	
	if(strlen($u_name) > 0 && strlen($user_password) > 0){
		mysqli_query($db,"INSERT into user_info (fname, lname, level, username, password) values ('$fname', '$lname', '$access_level', '$u_name', '$user_password');");
		header('Location: users.php');
		exit();
	}else{
		$err = "Username and Password are Required";
	}
}elseif(isset($_POST['cancel'])){
	header('Location: users.php');
	exit();
}else{
	// do nothing but load the page
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
<h1>Adding User</h1>
<form method="post" action="add_user.php">
<table id="box-table-a">
<?php if(strlen($err) > 0){ ?>
	<tr>
		<td align="center" colspan="100%"><?php echo $err?></td>
	</tr>
<?php } ?>
	<tr>
		<td>First Name:&nbsp;</td><td align="left"><input type="text" name="fname" size="30"></td>
	</tr>
	<tr>
		<td>Last Name:&nbsp;</td><td align="left"><input type="text" name="lname" size="30"></td>
	</tr>
	<tr>
		<td>Access Level:&nbsp;</td>
		<td>
			<select name="access_level">
				<option value="Administrator">Administrator</option>
				<option value="User">User</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Username:&nbsp;</td><td align="left"><input type="text" name="u_name" size="30"></td>
	</tr>
	<tr>
		<td>Password:&nbsp;</td><td align="left"><input type="text" name="user_password" size="30"></td>
	</tr>
	<tr>
		<td>&nbsp;</td><td><input type="submit" name="submit" value="Add" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</table>
</form>
<?php include('footer.php');?>			
</body>
</html>
