<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost = 'localhost:3306';
$databaseName = 'travelbetnam';
$databaseUsername = 'root';
$databasePassword = 'tiger';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
mysqli_set_charset($mysqli,"utf8");

?>
