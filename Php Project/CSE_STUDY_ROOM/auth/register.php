<?php
session_start();
require '../db.php';

// Initialize message variable to store error or success messages
$message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // Check if confirm_password exists in the POST array
    $confirm_password = isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : '';

    $username = htmlspecialchars($_POST['username']);
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    // Proceed only if email is not already registered
    if ($stmt->rowCount() > 0) {
        // If email already exists, show an error message
        $message = "This email is already registered. Please choose another one.";
    } elseif ($password !== $confirm_password) {
        // If passwords don't match, show an error message
        $message = "Passwords do not match. Please try again.";
    } else {
        // If email does not exist and passwords match, proceed with the registration
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (email, password, username, created_at) VALUES (?, ?, ?, NOW())");
        if ($stmt->execute([$email, $hashedPassword, $username])) {
            // If registration is successful
            $message = "Registration successful. You can now log in.";
        } else {
            // Error during registration
            $message = "Error: Could not complete registration.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - CSE Study Room</title>
    <style>
        /* Inline CSS for styling the registration form */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            color: red;
            text-align: center;
            margin: 10px 0;
        }
        .success {
            color: green;
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <?php if (!empty($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="text" name="username" placeholder="Enter your username" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="password" name="confirm_password" placeholder="Confirm your password" required>
        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

</body>
</html>
