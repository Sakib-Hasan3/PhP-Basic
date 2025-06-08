
<?php
session_start();
include('db.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch all challenges
$stmt = $conn->query("SELECT * FROM challenges ORDER BY created_at DESC");
$challenges = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coding Challenges - CSE Study Room</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Coding Challenges</h2>
    <?php if ($challenges): ?>
      <ul class="challenges-list">
        <?php foreach ($challenges as $ch): ?>
          <li class="challenge-item">
            <h3><?php echo htmlspecialchars($ch['title']); ?> <small>(<?php echo $ch['difficulty']; ?>)</small></h3>
            <p><?php echo nl2br(htmlspecialchars($ch['description'])); ?></p>
            <a href="attempt_challenge.php?id=<?php echo $ch['id']; ?>" class="btn">Attempt This Challenge</a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p>No challenges available yet. Check back soon!</p>
    <?php endif; ?>

    <div class="section">
      <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
