<?php
$host = 'localhost';
$user = 'root';
$password = 'YOUR_PASSWORD_HERE';
$dbname = 'YOUR_DATABASE_NAME_HERE';

// Connect to MySQL
$conn = mysqli_connect($host, $user, $password, $dbname);

// Test Connection
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>