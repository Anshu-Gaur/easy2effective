<?php
$host = "localhost";
$user = "websiteFrom";
$password = "UBUibWMXwHMS";
$dbname = "websiteFrom";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>