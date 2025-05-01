<?php
session_start();
include('../db.php'); // updated path to db.php

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php'); // updated path to login.php
    exit();
}

// Fetch CSE news entries
$stmt = $conn->prepare("SELECT * FROM news ORDER BY created_at DESC");
$stmt->execute();
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSE News & Updates - CSE Study Room</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- updated path to style.css -->
</head>
<body>
<div class="container">
    <h2>CSE News & Updates</h2>

    <?php if ($newsItems): ?>
        <div class="news-list">
            <?php foreach ($newsItems as $news): ?>
                <div class="news-item">
                    <h3><?php echo htmlspecialchars($news['title']); ?></h3>
                    <p><small>Published on <?php echo date('F j, Y, g:i a', strtotime($news['created_at'])); ?></small></p>
                    <p><?php echo nl2br(htmlspecialchars(substr($news['content'], 0, 300))); ?><?php echo strlen($news['content']) > 300 ? '...' : ''; ?></p>
                    <?php if (!empty($news['link'])): ?>
                        <p><a href="<?php echo htmlspecialchars($news['link']); ?>" target="_blank" class="btn">Read Full Article</a></p>
                    <?php endif; ?>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No news updates available at the moment. Check back later!</p>
    <?php endif; ?>

    <div class="section">
        <!-- Corrected link to go back to dashboard -->
        <a href="dashboard.php" class="btn">Back to Dashboard</a> <!-- Correct path to dashboard.php -->
    </div>
</div>
</body>
</html>
