<?php
include('auth.php');
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
	<title>Backup</title>
</head>

<body>
<?php
// Create the mysql backup file
$backupfile = $db_name . date("Y-m-d-i-s") . '.sql';
echo "<p>Backup file name: $backupfile</p>";
$backupcmd = "mysqldump -h".$db_host." -u".$db_user." -p".$db_password." ". $db_name." time_data time_periods time_types user_info > $backupfile;";
system($backupcmd) or die(mysql_error());

echo "<p>$backupcmd</p>";

echo "<p>backup file created</p>";
?>

</body>
</html>
