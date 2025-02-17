<?php
session_start();

// Redirect to login page if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include the database configuration file
include('db_connect.php');

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    
    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradient background */
            margin: 0;
            font-family: Arial, sans-serif;
            flex-direction: column; /* Stack children vertically */
            overflow: hidden; /* Prevent horizontal scrolling */
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
            z-index: 1; /* Ensure the form is above the blurred text */
        }

        h2 {
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #28a745;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .account-text {
            margin-top: 15px;
            font-size: 14px;
        }

        .account-text a {
            color: #007bff;
            text-decoration: none;
        }

        .account-text a:hover {
            text-decoration: underline;
        }

        .welcome-text {
            font-size: 24px;
            color: #fff;
            font-weight: bold;
            margin-bottom: 10px; /* Reduced margin for better alignment */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }


        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>
    <div class="welcome-text">
        Welcome to Our Website!
    </div>
    <div class="container">
        <h2 class="text-center">Signup</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
        <p class="account-text">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>