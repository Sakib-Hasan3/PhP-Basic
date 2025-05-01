<?php
session_start();
include('../db.php');

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// If viewing a specific topic
if (isset($_GET['topic_id'])) {
    $topic_id = intval($_GET['topic_id']);
    
    // Handle new post submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content']) && !empty($_POST['content'])) {
        $content = htmlspecialchars($_POST['content']);
        $stmt = $conn->prepare("INSERT INTO forum_posts (topic_id, user_id, content) VALUES (?, ?, ?)");
        if ($stmt->execute([$topic_id, $user_id, $content])) {
            $message = "Reply posted successfully.";
        } else {
            $message = "Failed to post reply.";
        }
    }

    // Fetch topic
    $stmt = $conn->prepare("SELECT * FROM forum_topics WHERE id = ?");
    $stmt->execute([$topic_id]);
    $topic = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$topic) {
        die("Topic not found.");
    }

    // Fetch posts
    $stmt = $conn->prepare("SELECT p.*, u.username FROM forum_posts p JOIN users u ON p.user_id = u.id WHERE p.topic_id = ? ORDER BY p.created_at ASC");
    $stmt->execute([$topic_id]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Forum Topic - <?php echo htmlspecialchars($topic['title']); ?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <h2><?php echo htmlspecialchars($topic['title']); ?></h2>
        <p><small>Started by <?php echo htmlspecialchars($topic['username'] ?? $_SESSION['username']); ?> on <?php echo date('F j, Y, g:i a', strtotime($topic['created_at'])); ?></small></p>
        <hr>
        <?php foreach ($posts as $post): ?>
            <div class="post-item">
                <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <p><em>— <?php echo htmlspecialchars($post['username']); ?> at <?php echo date('F j, Y, g:i a', strtotime($post['created_at'])); ?></em></p>
                <hr>
            </div>
        <?php endforeach; ?>

        <h3>Reply to this topic</h3>
        <form method="POST" action="">
            <textarea name="content" rows="5" cols="60" required></textarea><br><br>
            <button type="submit" class="btn">Post Reply</button>
        </form>
        <p><?php echo $message; ?></p>
        <div class="section">
            <a href="forum.php" class="btn">Back to Topics</a>
        </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}

// Handle new topic creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    if (empty($title)) {
        $message = "Topic title cannot be empty.";
    } else {
        $stmt = $conn->prepare("INSERT INTO forum_topics (user_id, title) VALUES (?, ?)");
        if ($stmt->execute([$user_id, $title])) {
            $message = "Topic created successfully.";
        } else {
            $message = "Failed to create topic.";
        }
    }
}

// Fetch all topics
$stmt = $conn->query("SELECT t.id, t.title, t.created_at, u.username FROM forum_topics t JOIN users u ON t.user_id = u.id ORDER BY t.created_at DESC");
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Forum Topics</h2>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="New topic title..." required>
        <button type="submit" class="btn">Create Topic</button>
    </form>
    <p><?php echo $message; ?></p>

    <ul class="topics-list">
        <?php foreach ($topics as $topic): ?>
            <li>
                <a href="forum.php?topic_id=<?php echo $topic['id']; ?>"><?php echo htmlspecialchars($topic['title']); ?></a>
                <br><small>Started by <?php echo htmlspecialchars($topic['username']); ?> on <?php echo date('F j, Y, g:i a', strtotime($topic['created_at'])); ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
