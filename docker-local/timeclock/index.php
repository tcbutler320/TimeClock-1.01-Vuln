<?php include('checksession.php');?>
<!DOCTYPE html>
<html>
<head>
<title>TimeClock Software</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="timeapp.css" type="text/css">
</head>

<body>

<h1>Time Clock</h1>

<p>You are logged in as: <strong><?php echo $timeapp_username;?></strong></p>
<?php if($timeapp_level == "Administrator"){ ?>
<h2>Administrator Options</h2>
<ul>
	<li><a href="time_types.php">Manage Time Types</a></li>
	<li><a href="time_periods.php">Manage Date Periods</a></li>
	<li><a href="users.php">Manage Users</a></li>
	<li><a href="change_password.php">Change Password</a></li>
<!-- 	<li><a href="backup.php">Backup</a></li> -->
</ul>
<?php }else{ ?>
<h2>Options</h2>
	<li><a href="time_entry.php">Time Entry</a>
	<li><a href="change_password.php">Change Password</a>
</ul>
<?php } ?>

<p><a href="login.php?logout=1">Log Out</a></p>

<?php include("footer.php");?>
</body>
</html>