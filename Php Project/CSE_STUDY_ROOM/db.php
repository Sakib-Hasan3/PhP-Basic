<?php
// Database connection configuration
$host = 'localhost';  // Database host (typically localhost)
$dbname = 'cse_study_room';  // Your database name
$username = 'root';  // Your database username (default is usually root for local servers)
$password = '';  // Your database password (default is empty for local servers)

try {
    // Create a new PDO instance and set the connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception to handle errors gracefully
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set the charset for the connection to UTF-8
    $conn->exec("SET NAMES 'utf8'");

} catch (PDOException $e) {
    // If there is an error, print the error message
    die("Database connection failed: " . $e->getMessage());
}
?>
