<?php
	include('auth.php');
	
	if(isset($_POST['submit'])){
		$period_id = $_POST['period_id'];
		
		$start_month = $_POST['start_month'];
		$start_day = $_POST['start_day'];
		$start_year = $_POST['start_year'];
		
		$end_month = $_POST['end_month'];
		$end_day = $_POST['end_day'];
		$end_year = $_POST['end_year'];
		
		$start_date = $start_year . "-" . $start_month . "-" . $start_day;
		$end_date = $end_year . "-" . $end_month . "-" . $end_day;
		
		mysqli_query($db,"update time_periods set start_date = '$start_date', end_date = '$end_date' where period_id = $period_id;");
		header('Location: time_periods.php');
		exit();
	}elseif(isset($_POST['cancel'])){
		header('Location: time_periods.php');
		exit();
	}else{
		$period_id = $_GET['period_id'];
		
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
<h1>Editing Time Period</h1>
<form method="post" action="edit_period.php">
<table id="box-table-a">
	<tr>
		<td align="right">Start Date:&nbsp;</td>
		<td align="left">Month:&nbsp;<input type="text" name="start_month" size="2" value="<?php echo date('m', strtotime($start_date))?>">&nbsp;
			Day:&nbsp;<input type="text" name="start_day" size="2" value="<?php echo date('d', strtotime($start_date))?>">&nbsp;
			Year:&nbsp;<input type="text" name="start_year" size="4" value="<?php echo date('Y', strtotime($start_date))?>">
		</td>
	</tr>
	<tr>
		<td align="right">End Date:&nbsp;</td>
		<td align="left">Month:&nbsp;<input type="text" name="end_month" size="2" value="<?php echo date('m', strtotime($end_date))?>">&nbsp;
			Day:&nbsp;<input type="text" name="end_day" size="2" value="<?php echo date('d', strtotime($end_date))?>">&nbsp;
			Year:&nbsp;<input type="text" name="end_year" size="4" value="<?php echo date('Y', strtotime($end_date))?>">
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="period_id" value="<?php echo $period_id?>"></td>
		<td><input type="submit" name="submit" value="Update" class="button">&nbsp;<input type="submit" name="cancel" value="Cancel" class="button"></td>
	</tr>
</table>
</form>
<?php include('footer.php');?>
</body>
</html>
