<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db.php'); // Database connection

// Fetch resources from the database (if any)
$sql = "SELECT * FROM resources ORDER BY created_at DESC";
$stmt = $conn->query($sql);
$resources = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resources - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>CSE Study Resources</h2>

    <!-- Display resources -->
    <div class="resources">
        <?php if ($resources): ?>
            <?php foreach ($resources as $resource): ?>
                <div class="resource-item">
                    <h3><?php echo htmlspecialchars($resource['title']); ?></h3>
                    <p><strong>Resource Type:</strong> <?php echo htmlspecialchars($resource['type']); ?></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($resource['description']); ?></p>
                    <a href="<?php echo htmlspecialchars($resource['link']); ?>" target="_blank" class="btn">Access Resource</a>
                    <p><small>Added on: <?php echo date('F j, Y', strtotime($resource['created_at'])); ?></small></p>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No resources available at the moment.</p>
        <?php endif; ?>
    </div>

    <!-- Go Back to Dashboard -->
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
