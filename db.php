<?php
include('config.php');
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'health_system';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
