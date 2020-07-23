<?php
include('auth.php');

if(isset($_POST['submit'])){
	$time_id = dclean($_POST['time_id']);
	mysqli_query($db,"DELETE from time_data where time_id = $time_id AND user_id = $timeapp_id;");
	header('Location: time_entry.php');
	exit();
}elseif(isset($_POST['cancel'])){
	header('Location: time_entry.php');
	exit();
}else{
	$time_id = dclean($_GET['time_id']);
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
<h1>Deleting Time Entry</h1>
<form method="post" action="delete_entry.php">
<table id="box-table-a">
	<tr>
		<td align="center">Are you sure you want to delete this time entry?</td>
	</tr>
	<tr>
		<td align="center"><input type="hidden" name="time_id" value="<?php echo $time_id?>">
		<input type="submit" name="submit" value="Delete" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</table>
</form>
<?php include('footer.php')?>
</body>
</html>
