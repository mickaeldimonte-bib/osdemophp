<?php

$dbhost = getenv("MYSQL_ADDON_HOST");
$dbport = getenv("MYSQL_ADDON_PORT");
$dbname = getenv("MYSQL_ADDON_DB");
$dbuser = getenv("MYSQL_ADDON_USER");
$dbpassword = getenv("MYSQL_ADDON_PASSWORD");

$host= gethostname();
$ip = gethostbyname($host);
echo "Just hit container '" . $host . "' (" . $ip . ")<br><br>";

$connection = mysqli_connect($dbhost . ":" . $dbport, $dbuser, $dbpassword, $dbname);

if (!$connection) {
	echo "Failed to connect to the database using these info:<br>";
	echo "dbhost = " . $dbhost . "<br>";
	echo "dbport = " . $dbport . "<br>";
	echo "dbname = " . $dbname . "<br>";
	echo "dbuser = " . $dbuser . "<br>";
	echo "dbpassword = " . $dbpassword . "<br>";
} else {
	echo "Successfully connected to the database '" . $dbname . "'.<br>";
	echo "Funny, how things can sometimes go as planned :)<br><br>";
	echo "<h3>Here is version 5</h3><br>";

	$rs = $connection->query("SELECT * FROM users");
	while ($row = mysqli_fetch_assoc($rs)) {
		echo "user id.: " . $row['user_id'] . " / user name: " . $row['name'] . "<br>";
	}

	mysqli_close($connection);
}

?>
