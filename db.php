<?php
$servername = "localhost";
$username = "root"; // Default username for local MySQL
$password = "";     // Default password is empty for local setup
$dbname = "hashtag_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
