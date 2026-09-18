<?php
session_start();
mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$user = "root";
$password = "";
$database = "lab_app";

$connection = new mysqli($host, $user, $password, $database);

if($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
