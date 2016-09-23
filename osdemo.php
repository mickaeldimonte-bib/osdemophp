<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

$dbhost = getenv("DB_SERVICE_HOST");
$dbport = getenv("DB_SERVICE_PORT");
$dbname = getenv("MYSQL_DATABASE");
$dbuser = getenv("MYSQL_USER");
$dbpassword = getenv("MYSQL_PASSWORD");

$connection = mysql_connect($dbhost . ":" . $dbport, $dbuser, $dbpassword);

if (!$connection) {
	echo "Failed to connect to the database using these info:<br>";
	echo "dbhost = " . $dbhost . "<br>";
	echo "dbport = " . $dbport . "<br>";
	echo "dbname = " . $dbname . "<br>";
	echo "dbuser = " . $dbuser . "<br>";
	echo "dbpassword = " . $dbpassword . "<br>";
} else {
	echo "Successfully connected to the database '" . $dbname . "'.<br><br>";

	$dbconnection = mysql_select_db($dbname);

	$rs = mysql_query("SELECT * FROM users");
	while ($row = mysql_fetch_assoc($rs)) {
		echo "id.: " . $row['user_id'] . " / name: " . $row['username'] . "<br>";
	}

	mysql_close();
}

?>
