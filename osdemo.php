<?php

$dbhost = getenv("MTDEVDB_SERVICE_HOST");
$dbport = getenv("MTDEVDB_SERVICE_PORT");
$dbname = getenv("DATABASE_NAME");
$dbuser = getenv("DATABASE_USER");
$dbpassword = getenv("DATABASE_PASSWORD");

$host= gethostname();
$ip = gethostbyname($host);
echo "<h2>Just hit container '" . $host . "' (" . $ip . ")</h2><br><br>";

$connection = mysqli_connect($dbhost . ":" . $dbport, $dbuser, $dbpassword, $dbname);

if (!$connection) {
	echo "Failed to connect to the database using these info:<br>";
	echo "dbhost = " . $dbhost . "<br>";
	echo "dbport = " . $dbport . "<br>";
	echo "dbname = " . $dbname . "<br>";
	echo "dbuser = " . $dbuser . "<br>";
	echo "dbpassword = " . $dbpassword . "<br>";
} else {
	echo "<h2>Successfully connected to the database '" . $dbname . "'.</h2><br>";
	echo "<h2>Funny, how things can sometimes go as planned :)</h2><br><br>";

	$rs = $connection->query("SELECT * FROM users");
	while ($row = mysqli_fetch_assoc($rs)) {
		echo "<b>id.: </b>" . $row['user_id'] . " / <b>name: </b>" . $row['username'] . "<br>";
	}

	mysqli_close($connection);
}

?>