<?php
session_start();
include('../db.php'); // fixed path to db.php

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Fetch all online courses
$stmt = $conn->query("SELECT * FROM courses ORDER BY created_at DESC");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Courses - CSE Study Room</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- update if your CSS is in assets -->
</head>
<body>
<div class="container">
    <h2>Online Courses</h2>

    <?php if ($courses): ?>
        <div class="courses-list">
            <?php foreach ($courses as $course): ?>
                <div class="course-item">
                    <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                    <p><strong>Provider:</strong> <?php echo htmlspecialchars($course['provider']); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>
                    <a href="<?php echo htmlspecialchars($course['link']); ?>" target="_blank" class="btn">Go to Course</a>
                    <p><small>Added on: <?php echo date('F j, Y', strtotime($course['created_at'])); ?></small></p>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No courses available at the moment. Check back soon!</p>
    <?php endif; ?>

    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
