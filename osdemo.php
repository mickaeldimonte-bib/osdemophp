<?php

$dbhost = getenv("MTDEVDB_SERVICE_HOST");
$dbport = getenv("MTDEVDB_SERVICE_PORT");
$dbname = getenv("DATABASE_NAME");
$dbuser = getenv("DATABASE_USER");
$dbpassword = getenv("DATABASE_PASSWORD");

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
	echo "Funny, how things can sometimes go as planned :)<br> Here is version 3<br><br>";

	$rs = $connection->query("SELECT * FROM users");
	while ($row = mysqli_fetch_assoc($rs)) {
		echo "id.: " . $row['user_id'] . " / name: " . $row['username'] . "<br>";
	}

	mysqli_close($connection);
}

?>