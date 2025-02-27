/* User Authentication (Signup/Login) */
<?php
// signup.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "Signup successful!";
    } else {
        echo "Error occurred.";
    }
}
?>