<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db.php'); // Database connection

// Fetch projects from the database (if any)
$sql = "SELECT * FROM projects ORDER BY created_at DESC";
$stmt = $conn->query($sql);
$projects = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>CSE Projects</h2>

    <!-- Display projects -->
    <div class="projects">
        <?php if ($projects): ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-item">
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($project['description']); ?></p>
                    <p><strong>Technologies Used:</strong> <?php echo htmlspecialchars($project['technologies']); ?></p>
                    <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank" class="btn">View Project</a>
                    <p><small>Added on: <?php echo date('F j, Y', strtotime($project['created_at'])); ?></small></p>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No projects available at the moment.</p>
        <?php endif; ?>
    </div>

    <!-- Go Back to Dashboard -->
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
