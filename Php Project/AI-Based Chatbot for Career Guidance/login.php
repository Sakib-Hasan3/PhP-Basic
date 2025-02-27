<?php
// login.php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
}
?>