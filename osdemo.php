<?php

$dbhost = getenv("DB_SERVICE_HOST");
$dbport = getenv("DB_SERVICE_PORT");
$dbname = getenv("MYSQL_DATABASE");
$dbuser = getenv("MYSQL_USER");
$dbpassword = getenv("MYSQL_PASSWORD");

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

	$rs = $connection->query("SELECT * FROM users");
	while ($row = mysqli_fetch_assoc($rs)) {
		echo "id.: " . $row['user_id'] . " / name: " . $row['username'] . "<br>";
	}

	mysqli_close($connection);
}

?>