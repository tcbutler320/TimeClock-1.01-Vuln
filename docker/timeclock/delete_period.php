<?php
include('auth.php');
include('admin.php');
if(isset($_POST['submit'])){
	$period_id = dclean($_POST['period_id']);
	mysqli_query($db,"DELETE from time_periods where period_id = $period_id;");
	header('Location: time_periods.php');
	exit();
}elseif(isset($_POST['cancel'])){
	header('Location: time_periods.php');
	exit();
}else{
	$period_id = dclean($_GET['period_id']);
	$result = mysqli_query($db,"select * from time_periods where period_id = $period_id;");
	$row = mysqli_fetch_array($result);
	$start_date = $row['start_date'];
	$end_date = $row['end_date'];
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
<h1>Deleting Time Period</h1>
<h2>Are you sure you want to delete this time period?</h2>
<form method="post" action="delete_period.php">
<table id="box-table-a">
	<tr>
		<td align="center">
		<?php echo date('m/d/Y', strtotime($start_date))?> to <?php echo date('m/d/Y', strtotime($end_date))?></td>
	</tr>
	<tr>
		<td align="center"><input type="hidden" name="period_id" value="<?php echo $period_id?>">
		<input type="submit" name="submit" value="Delete" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</table>
</form>
<?php include('footer.php')?>
</body>
</html>
