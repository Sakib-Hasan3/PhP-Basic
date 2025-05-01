<?php
session_start();
include('../db.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$message = "";

// If a specific mentor is selected, show their profile and request form
if (isset($_GET['mentor_id'])) {
    $mentor_id = intval($_GET['mentor_id']);
    $stmt = $conn->prepare("SELECT * FROM mentors WHERE id = ?");
    $stmt->execute([$mentor_id]);
    $mentor = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$mentor) {
        die("Mentor not found.");
    }

    // Handle request submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $note = htmlspecialchars($_POST['message']);
        
        // Prepared statement to avoid SQL injection
        $insert = $conn->prepare(
            "INSERT INTO mentorship_requests (mentor_id, user_id, message) VALUES (?, ?, ?)"
        );
        
        if ($insert->execute([$mentor_id, $user_id, $note])) {
            $message = "Your mentorship request has been sent!";
        } else {
            $message = "Failed to send request. Please try again.";
        }
    }

    // Display mentor details and request form
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Mentor Profile - <?php echo htmlspecialchars($mentor['full_name']); ?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <h2><?php echo htmlspecialchars($mentor['full_name']); ?></h2>
        <p><strong>Expertise:</strong> <?php echo htmlspecialchars($mentor['expertise']); ?></p>
        <p><a href="<?php echo htmlspecialchars($mentor['profile_link']); ?>" target="_blank">View Full Profile</a></p>

        <h3>Request Mentorship</h3>
        <form method="POST" action="">
            <textarea name="message" rows="5" cols="60" placeholder="Your message to the mentor..." required></textarea><br><br>
            <button type="submit" class="btn">Send Request</button>
        </form>
        
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <div class="section">
            <a href="mentorship.php" class="btn">Back to Mentors List</a>
        </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}

// Otherwise, list all mentors
$stmt = $conn->query("SELECT * FROM mentors ORDER BY created_at DESC");
$mentors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mentorship - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Available Mentors</h2>
    <?php if ($mentors): ?>
        <ul>
            <?php foreach ($mentors as $m): ?>
                <li>
                    <strong><?php echo htmlspecialchars($m['full_name']); ?></strong> — <?php echo htmlspecialchars($m['expertise']); ?>
                    <a href="mentorship.php?mentor_id=<?php echo $m['id']; ?>" class="btn">Request</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No mentors available at the moment.</p>
    <?php endif; ?>

    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </di
