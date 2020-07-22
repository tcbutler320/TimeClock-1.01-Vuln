<?php
include('auth.php');
include('admin.php');
if(isset($_POST['submit'])){
	$type_id = dclean($_POST['type_id']);
	$description = cclean($_POST['description']);
	mysqli_query($db,"update time_types set description = '$description' where type_id = $type_id;");
	header('Location: time_types.php');
	exit();
}elseif(isset($_POST['cancel'])){
	header('Location: time_types.php');
	exit();
}else{
	$type_id = dclean($_GET['type_id']);
	$result = mysqli_query($db,"select description from time_types where type_id = $type_id;");
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
<h1>Editing Time Type</h1>
<form method="post" action="edit_type.php">
<input type="hidden" name="type_id" value="<?php echo $type_id?>">
<table id="box-table-a">
<thead>
	<tr>
		<th>Description:&nbsp;</th>
		<th><input type="text" name="description" size="50" value="<?php echo $row['description']?>"></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Update" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</tbody>
</table>
</form>
<?php include('footer.php')?>
</body>
</html>
