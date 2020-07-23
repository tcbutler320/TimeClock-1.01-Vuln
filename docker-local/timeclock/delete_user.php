<?php
include('auth.php');
include('admin.php');
if(isset($_POST['submit'])){
	$user_id = dclean($_POST['user_id']);
	mysqli_query($db,"DELETE from user_info where user_id = $user_id;");
	header('Location: users.php');
	exit();
}elseif(isset($_POST['cancel'])){
	header('Location: users.php');
	exit();
}else{
	$user_id = dclean($_POST['user_id']);
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
<h1>Deleting User</h1>
<h2>Are you sure you want to delete this user?</h2>
<form method="post" action="delete_user.php">
<input type="hidden" name="user_id" value="<?php echo $user_id?>">
<table id="box-table-a">
	<tr>
		<td align="center"><?php echo $row['fname']?> <?php echo $row['lname']?></td>
	</tr>
	<tr>
		<td align="center">
		<input type="submit" name="submit" value="Delete" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</table>
</form>
<?php include('footer.php')?>
</body>
</html>
