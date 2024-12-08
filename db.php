<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update this to your database password
$dbname = "ticket_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
