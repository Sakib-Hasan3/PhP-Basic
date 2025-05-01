<?php
session_start();
include('../db.php'); // path updated

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php'); // path updated
    exit();
}

// Fetch study tips and motivational quotes
$stmt = $conn->query("SELECT * FROM tips ORDER BY created_at DESC");
$tips = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Tips & Motivational Quotes - CSE Study Room</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- path updated -->
</head>
<body>
<div class="container">
    <h2>Study Tips & Motivational Quotes</h2>

    <?php if ($tips): ?>
        <div class="tips-list">
            <?php foreach ($tips as $tip): ?>
                <div class="tip-item">
                    <p><?php echo nl2br(htmlspecialchars($tip['tip_text'])); ?></p>
                    <?php if (!empty($tip['author'])): ?>
                        <p><em>&mdash; <?php echo htmlspecialchars($tip['author']); ?></em></p>
                    <?php endif; ?>
                    <small>Added on: <?php echo date('F j, Y', strtotime($tip['created_at'])); ?></small>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No tips available at the moment. Check back soon!</p>
    <?php endif; ?>

    <div class="section">
        <a href="../pages/dashboard.php" class="btn">Back to Dashboard</a> <!-- path updated -->
    </div>
</div>
</body>
</html>
