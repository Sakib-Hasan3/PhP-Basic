<?php
session_start();
require 'db.php';

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$message = "";

// Fetch all study groups
$stmt = $conn->query("SELECT * FROM study_groups");
$study_groups = $stmt->fetchAll();

// Handle "Join" action
if (isset($_GET['join'])) {
    $group_id = intval($_GET['join']);
    $user_id = $_SESSION['user_id'];
    
    // You might need to create a relationship table between users and groups
    $stmt = $conn->prepare("INSERT INTO user_groups (user_id, group_id) VALUES (?, ?)");
    if ($stmt->execute([$user_id, $group_id])) {
        $message = "You have successfully joined the study group!";
    } else {
        $message = "Failed to join the study group. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Study Groups - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Available Study Groups</h2>

    <!-- Display Success/Failure Message -->
    <p><?php echo $message; ?></p>

    <ul>
        <?php foreach ($study_groups as $group): ?>
            <li>
                <strong><?php echo htmlspecialchars($group['group_name']); ?></strong><br>
                <?php echo htmlspecialchars($group['description']); ?><br>
                <a href="study_groups.php?join=<?php echo $group['id']; ?>" class="btn">Join this Group</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
