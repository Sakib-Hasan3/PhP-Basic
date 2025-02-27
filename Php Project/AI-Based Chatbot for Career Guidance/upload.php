/* File Sharing */
<?php
// upload.php
require 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file_name = basename($_FILES['file']['name']);
    $file_path = 'uploads/' . $file_name;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO files (user_id, file_name, file_path) VALUES ('$user_id', '$file_name', '$file_path')";
        mysqli_query($conn, $query);
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
}
?>