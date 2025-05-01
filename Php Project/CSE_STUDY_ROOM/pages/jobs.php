<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php"); // Adjust if login.php is not in the same folder
    exit();
}

include('../db.php'); // Corrected path

// Fetch jobs from the database (if any)
$sql = "SELECT * FROM jobs ORDER BY created_at DESC";
$stmt = $conn->query($sql);
$jobs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internships & Jobs - CSE Study Room</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Fix path to CSS -->
</head>
<body>
<div class="container">
    <h2>Internship & Job Opportunities</h2>

    <div class="jobs">
        <?php if ($jobs): ?>
            <?php foreach ($jobs as $job): ?>
                <div class="job-item">
                    <h3><?php echo htmlspecialchars($job['position']); ?> at <?php echo htmlspecialchars($job['company']); ?></h3>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($job['description']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
                    <a href="<?php echo htmlspecialchars($job['apply_link']); ?>" target="_blank" class="btn">Apply Now</a>
                    <p><small>Posted on: <?php echo date('F j, Y', strtotime($job['created_at'])); ?></small></p>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No job opportunities available at the moment. Check back later or submit a job listing if you're an employer!</p>
        <?php endif; ?>
    </div>

    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
