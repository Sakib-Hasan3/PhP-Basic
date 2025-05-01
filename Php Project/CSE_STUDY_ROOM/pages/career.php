<?php
session_start();
include('../db.php'); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch career roadmap data from the database
$query = "SELECT * FROM career_roadmap";
$stmt = $conn->query($query);
$roadmaps = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Career Roadmap - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Career Roadmap</h2>
    <p>Explore various career paths in Computer Science and Engineering (CSE).</p>

    <!-- Career Roadmap Content -->
    <div class="career-roadmap">
        <?php foreach ($roadmaps as $roadmap): ?>
            <h3><?php echo htmlspecialchars($roadmap['career_name']); ?></h3>
            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($roadmap['description'])); ?></p>

            <h4>Steps to Build a Successful Career:</h4>
            <ul>
                <?php
                // Split the steps from the stored text into an array
                $steps = explode("\n", $roadmap['steps']);
                foreach ($steps as $step) {
                    if (!empty($step)) {
                        echo "<li>" . htmlspecialchars($step) . "</li>";
                    }
                }
                ?>
            </ul>

            <h4>Useful Resources:</h4>
            <ul>
                <?php
                // Split the resources from the stored text into an array
                $resources = explode("\n", $roadmap['resources']);
                foreach ($resources as $resource) {
                    if (!empty($resource)) {
                        echo "<li><a href='" . htmlspecialchars($resource) . "' target='_blank'>" . htmlspecialchars($resource) . "</a></li>";
                    }
                }
                ?>
            </ul>
        <?php endforeach; ?>

    </div>

    <!-- Go Back to Dashboard -->
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
