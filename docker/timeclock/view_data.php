<?php
include('auth.php');
include('admin.php');
$period_id = dclean($_GET['period_id']);

$result = mysqli_query($db,"select * from time_periods where period_id = $period_id;");
$row = mysqli_fetch_array($result);

$start_date = $row['start_date'];
$end_date = $row['end_date'];
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
<h1>Time Data</h1>
<h2><a href="time_periods.php?period_id=<?php echo $period_id; ?>">Back</a></h2>

<table id="box-table-a">
<thead>
	<tr>
		<th>Name</th>
		<th>Action</th>
	</tr>
</thead>	
<?php
$uresults = mysqli_query($db,"select distinct user_id from time_data where data_date >= '$start_date' and data_date <= '$end_date';");
if($urow = mysqli_fetch_array($uresults)){
	do{
		$user_id = $urow['user_id'];
		$dresult = mysqli_query($db,"select * from user_info where user_id = $user_id;");
		$drow = mysqli_fetch_array($dresult);	
?>
<tbody>
	<tr>
		<td><?php echo $drow['lname']?>, <?php echo $drow['fname']?></td>
		<td><a href="view_entry.php?period_id=<?php echo $period_id?>&user_id=<?php echo $drow['user_id']?>">View</a></td>
	</tr>
<?php
		}while($urow = mysqli_fetch_array($uresults));
	}else{
?>
	<tr>
		<td colspan="100%">Currently no time entry on file.</td>
	</tr>
<?php
	}
?>
</tbody>
</table>
<?php include('footer.php');?>
</body>
</html>
