<?php
include('auth.php');
include('admin.php');
$results = mysqli_query($db,"select * from time_periods order by period_id desc;");
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
<h1>Time Periods</h1>
<p><a href="add_period.php">Add Period</a></p>
<table id="box-table-a">
<tr>
	<th>Period Id</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th colspan="3">Action</th>
</tr>
<?php
if($row = mysqli_fetch_array($results)){
	do{
		$start_date = $row['start_date'];
		$end_date = $row['end_date'];
?>
<tbody>
<tr>
	<td><?php echo $row['period_id']?></td>
	<td><?php echo date('m/d/Y', strtotime($start_date))?></td>
	<td><?php echo date('m/d/Y', strtotime($end_date))?></td>
	<td><a href="view_data.php?period_id=<?php echo $row['period_id']?>">View</a>
	&nbsp;<a href="edit_period.php?period_id=<?php echo $row['period_id']?>">Edit</a>
	&nbsp;<a href="delete_period.php?period_id=<?php echo $row['period_id']?>">Delete</a>
	</td>
</tr>
<?php
	}while($row = mysqli_fetch_array($results));
}else{
?>
<tr>
	<td colspan="100%">Currently no time periods on file.</td>
</tr>
<?php
}
?>
</tbody>
</table>

<?php include("footer.php");?>

</body>
</html>
