<?php

/**
 *	Example script for using PDO and MySQL		
 *	Requires PHP >= 5.1
 *
 *	@author 	Niko Heikkilä
 *	@version 	1.0
 */

/* Set debug mode to silent, warning or exception */
$ERRMODE = "warning";

/* Replace these with your own */
$host   = "mysql";
$dbname = "project";
$user   = "project";
$pass   = "secret";

try {
	
	/* Establish connection to database */
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

	/* Set debugging level */
	switch ($ERRMODE) {

		case "warning":
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			break;
		
		case "exception":
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			break;

		case "silent":
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			break;

		default:
			break;
	}

}
catch (PDOException $e) {
	/* Store errors in error_log */
	error_log($e->getMessage(), 0);
	die($e->getMessage());
}
finally {
	echo "Connected to database $dbname at $host"."<br />";
}

$sql = "SELECT * FROM user";
foreach ($pdo->query($sql) as $row) {
   echo "Email: ".$row['email']."<br />";
   echo "Vorname: ".$row['vorname']."<br />";
   echo "Nachname: ".$row['nachname']."<br /><br />";
}

/* Close the connection if open */
if ($pdo) {	
	$pdo = NULL;
}

?>