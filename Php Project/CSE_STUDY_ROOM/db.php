<?php
$host = 'localhost';
$dbname = 'cse_study_room';
$user = 'root';
$pass = ''; // Keep blank if you're using XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
