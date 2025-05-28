
<?php
session_start();
include('db.php');

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get challenge ID from query string
$challenge_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the challenge details
$stmt = $conn->prepare("SELECT * FROM challenges WHERE id = ?");
$stmt->execute([$challenge_id]);
$challenge = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$challenge) {
    die("Challenge not found.");
}

$message = "";

// Handle code submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = htmlspecialchars($_POST['code']);
    $user_id = $_SESSION['user_id'];

    $insert = $conn->prepare(
        "INSERT INTO challenge_submissions (challenge_id, user_id, code) VALUES (?, ?, ?)"
    );

    if ($insert->execute([$challenge_id, $user_id, $code])) {
        $message = "Your code has been submitted successfully!";
    } else {
        $message = "Failed to submit your code. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attempt Challenge - <?php echo htmlspecialchars($challenge['title']); ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2><?php echo htmlspecialchars($challenge['title']); ?> <small>(<?php echo $challenge['difficulty']; ?>)</small></h2>
    <p><?php echo nl2br(htmlspecialchars($challenge['description'])); ?></p>

    <h3>Submit Your Solution:</h3>
    <form method="POST" action="">
        <textarea name="code" rows="15" cols="70" placeholder="Write your code here..." required><?php echo isset($_POST['code']) ? htmlspecialchars($_POST['code']) : ''; ?></textarea><br><br>
        <button type="submit" class="btn">Submit Code</button>
    </form>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <div class="section">
        <a href="coding_challenges.php" class="btn">Back to Challenges</a>
    </div>
</div>
</body>
</html>
