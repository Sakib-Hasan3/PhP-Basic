<?php
$servername = "localhost";  // or your database server
$username = "root";         // your database username (default in XAMPP is 'root')
$password = "";             // your database password (leave empty if using XAMPP default)
$database = "user_auth";    // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
