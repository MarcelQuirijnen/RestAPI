<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$hostname = 'localhost';
$username = 'root';
$password = 'urashuto';
$db = 'css';

$conn = new mysqli($hostname, $username, $password, $db);
if ($conn->connect_errno) {
   throw new RuntimeException('mysqli connection error: ' . $mysqli->connect_error);
}
?>
