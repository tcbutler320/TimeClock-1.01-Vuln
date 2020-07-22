<?php
include('auth.php');
$err = '';
if(isset($_POST['submit'])){
	$time_id = $dclean(_POST['time_id']);
	$data_month = dclean($_POST['data_month']);
	$data_day = dclean($_POST['data_day']);
	$data_year = dclean($_POST['data_year']);
	$type_id = dclean($_POST['type_id']);
	$hours = dclean($_POST['hours']);
	$notes = cclean($_POST['notes']);
	
	$data_date = $data_year . "-" . $data_month . "-" . $data_day;
	
	if(is_numeric($hours)){
		mysqli_query($db,"update time_data set data_date = '$data_date', type_id = '$type_id', hours = '$hours', notes = '$notes' where time_id = $time_id;");
		header('Location: time_entry.php');
		exit();
	}else{
		$err = "Hours must be numeric!!";
		
		$result = mysqli_query($db,"select * from time_data where time_id = $time_id;");
		$row = mysqli_fetch_array($result);
		$data_date = $row['data_date'];
		$type_id = $row['type_id'];
		
		$iresult = mysqli_query($db,"select description from time_types where type_id = $type_id;");
		$irow = mysqli_fetch_array($iresult);
	}
}elseif(isset($_POST['cancel'])){
	header('Location: time_entry.php');
	exit();
}else{
	$time_id = dclean($_GET['time_id']);
	
	$result = mysqli_query($db,"select * from time_data where time_id = $time_id;");
	$row = mysqli_fetch_array($result);
	$data_date = $row['data_date'];
	$type_id = $row['type_id'];
	
	$iresult = mysqli_query($db,"select description from time_types where type_id = $type_id;");
	$irow = mysqli_fetch_array($iresult);
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
<h1>Edit Time Entry</h1>
<form method="post" action="edit_entry.php">
<table id="box-table-a">
<?php if(strlen($err) > 0){ ?>
<tr>
	<td align="center" colspan="100%"><?php echo $err?></td>
</tr>
<?php } ?>
<tr>
	<td align="right">Date:&nbsp;</td><td align="left">
	Month: <input type="text" name="data_month" size="2" value="<?php echo date('m', strtotime($data_date))?>">&nbsp;
	Day: <input type="text" name="data_day" size="2" value="<?php echo date('d', strtotime($data_date))?>">&nbsp;
	Year: <input type="text" name="data_year" size="4" value="<?php echo date('Y', strtotime($data_date))?>"></td>
</tr>
<tr>
	<td align="right">Type:&nbsp;</td>
	<td>
		<select name="type_id">
			<option value="<?php echo $type_id?>" selected><?php echo $irow['description']?></option>
<?php 
	$tresults = mysqli_query($db,"select * from time_types order by description;");
	if($trow = mysqli_fetch_array($tresults)){
		do{
?>			
			<option value="<?php echo $trow['type_id']?>"><?php echo $trow['description']?></option>
<?php 
		}while($trow = mysqli_fetch_array($tresults));
	}
?>
		</select>
	</td>
</tr>
<tr>
	<td align="right">Hours:&nbsp;</td><td align="left"><input type="text" name="hours" size="4"  value="<?php echo $row['hours']?>"></td>
</tr>
<tr>
	<td align="right" valign="top">Notes:&nbsp;</td><td align="left"><textarea name="notes" cols="30" rows="3"><?php echo $row['notes']?></textarea></td>
</tr>
<tr>
	<td><input type="hidden" name="time_id" value="<?php echo $time_id?>"></td>
	<td><input type="submit" name="submit" value="Update" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
</tr>
</table>
</form>
<?php include('footer.php');?>
</body>
</html>
