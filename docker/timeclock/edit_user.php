<?php
include('auth.php');
include('admin.php');
$err = '';

if(isset($_POST['submit'])){

	$fname = cclean($_POST['fname']);
	$lname = cclean($_POST['lname']);
	$access_level = cclean($_POST['access_level']);
	$u_name = cclean($_POST['u_name']);
	$user_id = dclean($_POST['user_id']);
	
	$query = "UPDATE user_info set fname = '$fname', lname = '$lname', level = '$access_level', username = '$u_name'";
		
	//check if password is filled out
	if ($_POST['user_password'] <> '') {
		$hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
		$query .= " ,passcode = '$hash'";
	}
		
	$query .= " WHERE user_id = $user_id LIMIT 1;";
	
	mysqli_query($db,$query);
	header('Location: users.php');
	exit;

}else{

	$user_id = dclean($_GET['user_id']);
	$result = mysqli_query($db,"select * from user_info where user_id = $user_id;");
	$row = mysqli_fetch_array($result);

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
<h1>Editing User</h1>

<form method="post" action="edit_user.php">
<table id="box-table-a">

<?php if(strlen($err) > 0){ ?>
<tr>
	<td align="center" colspan="100%"><?php echo $err?></td>
</tr>
<?php } ?>
<tr>
	<td>First Name:&nbsp;</td><td><input type="text" name="fname" size="30" value="<?php echo $row['fname']?>"></td>
</tr>
<tr>
	<td>Last Name:&nbsp;</td><td><input type="text" name="lname" size="30" value="<?php echo $row['lname']?>"></td>
</tr>
<tr>
	<td>Access Level:&nbsp;</td>
	<td>
		<select name="access_level">
			<option value="<?php echo $row['level']?>" selected><?php echo $row['level']?></option>
			<option value="Administrator">Administrator</option>
			<option value="User">User</option>
		</select>
	</td>
</tr>
<tr>
	<td>Username:&nbsp;</td><td><input type="text" name="u_name" size="30" value="<?php echo $row['username']?>"></td>
</tr>
<tr>
	<td>Password:&nbsp;</td><td><input type="password" name="user_password" size="30" value=""></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" value="Update" class="button"></td>
</tr>
</table>
<input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">
</form>
<?php include('footer.php')?>
</body>
</html>
