<?php
session_start();
require 'db.php';

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$message = "";

// Get question ID from URL
$question_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the question
$stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
$stmt->execute([$question_id]);
$question = $stmt->fetch();

if (!$question) {
    die("Question not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = htmlspecialchars($_POST['answer']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO answers (question_id, user_id, answer) VALUES (?, ?, ?)");
    if ($stmt->execute([$question_id, $user_id, $answer])) {
        $message = "Answer submitted successfully.";
    } else {
        $message = "Failed to submit answer.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Answer Question</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Answer the Question</h2>
    <p><strong>Question:</strong> <?php echo htmlspecialchars($question['question']); ?></p>

    <form method="POST">
        <textarea name="answer" rows="5" cols="50" placeholder="Write your answer here..." required></textarea><br><br>
        <button type="submit" class="btn">Submit Answer</button>
    </form>

    <p><?php echo $message; ?></p>
</div>
</body>
</html>
