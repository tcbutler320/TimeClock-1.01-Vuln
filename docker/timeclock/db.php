<?php
// You need to change these to your settings.

/** the name of the database */
$db_name = "timeclock";

/** mysql database username */
$db_user = "devuser";

/** mysql database password */
$db_password = "devpass";

/** mysql hostname */
$db_host = "db";

$db = mysqli_connect($db_host, $db_user, $db_password,$db_name);

//set how many rows are shown on the user time entry screen 
$time_entry_display_rows = "50";

function dclean($data) {
	if ( !is_numeric ($data) ) {
		echo "Invalid Data";
		exit;
	}
	$data = htmlspecialchars($data, ENT_QUOTES);
return $data;
}

function cclean($data) {
	$data = htmlspecialchars($data, ENT_QUOTES);
return $data;
}
