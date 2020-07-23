<?php
include('auth.php');
$query = "select * from time_data where user_id = $timeapp_id order by data_date desc limit $time_entry_display_rows;";
$results = mysqli_query($db,$query);
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
<h1>Time Entry: <?php echo $timeapp_username;?></h1>
<h2><a href="add_entry.php">Add Entry</a></h2>

<table id="box-table-a">
	<tr>
		<th>Date</th>
		<th>Type</th>
		<th>Hours</th>
		<th>Notes</th>
		<th>Action</th>
	</tr>
<?php
	if($row = mysqli_fetch_array($results)){
		do{
			
			$data_date = $row['data_date'];
			$type_id = $row['type_id'];
			$tresult = mysqli_query($db,"select description from time_types where type_id = $type_id;");
			$trow = mysqli_fetch_array($tresult);
			
?>
	<tr>
		<td><?php echo date('m/d/Y', strtotime($data_date))?></td>
		<td><?php echo $trow['description']?></td>
		<td><?php echo $row['hours']?></td>
		<td><?php echo $row['notes']?></td>
		<td><a href="edit_entry.php?time_id=<?php echo $row['time_id']?>">Edit</a>
		&nbsp;<a href="delete_entry.php?time_id=<?php echo $row['time_id']?>">Delete</a>
		</td>
	</tr>
<?php
		}while($row = mysqli_fetch_array($results));
	}else{
?>
	<tr>
		<td align="center" colspan="100%">Currently no time entry on file.</td>
	</tr>
<?php
	}
?>
</table>
<?php include('footer.php')?>
</body>
</html>
