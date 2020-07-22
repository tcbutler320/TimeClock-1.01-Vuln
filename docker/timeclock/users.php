<?php
include('auth.php');
include('admin.php');
$results = mysqli_query($db,"select * from user_info order by lname;");
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
<h1>Users</h1>

<p><a href="add_user.php">Add User</a> | <a href="index.php">Exit</a></p>

<table id="box-table-a">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Level</th>
	<th>Username</th>
	<th>Password</th>
	<th colspan="2" align="center">Action</th>
</tr>
<?php
if($row = mysqli_fetch_array($results)){
	do{
		
?>
<tr>
	<td><?php echo $row['user_id']?></td>
	<td><?php echo $row['lname']?>, <?php echo $row['fname']?></td>
	<td><?php echo $row['level']?></td>
	<td><?php echo $row['username']?>&nbsp;</td>
	<td><a href="edit_user.php?user_id=<?php echo $row['user_id']?>">Edit</a></td>
	<td><a href="delete_user.php?user_id=<?php echo $row['user_id']?>">Delete</a></td>
	</td>
</tr>
<?php
	}while($row = mysqli_fetch_array($results));
}else{
?>
<tr>
	<td align="center" colspan="100%">No Users Found.</td>
</tr>
<?php
}
?>
</table>
<?php include('footer.php')?>
</body>
</html>
