<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db.php'); // Database connection

$message = "";

// Handle the form submission for asking a question
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = htmlspecialchars($_POST['question']);
    $user_id = $_SESSION['user_id'];

    if (!empty($question)) {
        // Insert the question into the database
        $sql = "INSERT INTO questions (user_id, question, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([$user_id, $question])) {
            $message = "Your question has been submitted successfully!";
        } else {
            $message = "Error: Could not submit the question.";
        }
    } else {
        $message = "Please enter a question.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ask a Question - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Ask a Question</h2>
    <form method="POST" action="">
        <textarea name="question" placeholder="Type your question here..." required></textarea><br><br>
        <button type="submit" class="btn">Submit Question</button>
    </form>

    <!-- Display submission message -->
    <p><?php echo $message; ?></p>

    <!-- Go Back to Dashboard -->
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
