<?php
$dbhost = getenv("DB_SERVICE_HOST");
$dbport = getenv("DB_SERVICE_PORT");
$dbname = getenv("MYSQL_DATABASE");
$dbuser = getenv("MYSQL_USER");
$dbpassword = getenv("MYSQL_PASSWORD");

$connection mysql_connect($dbhost . ":" . $dbport, $dbuser, $dbpassword);

if (!$connection) {
	echo "Failed to connect to the database";
	echo "dbhost = ".$dbhost;
	echo "dbport = ".$dbport;
	echo "dbname = ".$dbname;
	echo "dbuser = ".$dbuser;
	echo "dbpassword = ".$dbpassword;
} else {
	echo "Successfully connected to the database '" . $dbname . "'.<br>"
}

$dbconnection = mysql_select_db($dbname);

$rs = mysql_query("SELECT * FROM users");
while ($row = mysql_fetch_assoc($rs)) {
	echo "id.: " . $row['user_id'] . " / name: " . $row['username'] . "<br>";
}

mysql_close();

?>
