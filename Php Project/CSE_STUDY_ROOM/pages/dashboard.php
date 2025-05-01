<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Set default if username is not set
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "User";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - CSE Study Room</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>This is your personalized dashboard where you can access all study room features at a glance.</p>

    <div class="dashboard-sections">
        <h3>Explore Your Opportunities:</h3>

        <div class="section">
            <a href="career.php" class="btn">Career Roadmap</a>
            <p class="desc">Plan your career path with milestones and skills guidance.</p>
        </div>

        <div class="section">
            <a href="courses.php" class="btn">Online Courses</a>
            <p class="desc">Browse recommended online courses for CSE topics.</p>
        </div>

        <div class="section">
            <a href="jobs.php" class="btn">Internship & Job Opportunities</a>
            <p class="desc">Find and apply for CSE internships and jobs.</p>
        </div>

        <div class="section">
            <a href="tips.php" class="btn">Study Tips & Quotes</a>
            <p class="desc">Read tips and quotes to stay motivated.</p>
        </div>

        <div class="section">
            <a href="news.php" class="btn">CSE News & Updates</a>
            <p class="desc">Stay informed with the latest CSE news.</p>
        </div>

        <div class="section">
            <a href="resources.php" class="btn">Resources & Study Material</a>
            <p class="desc">Access tutorials, notes, and study guides.</p>
        </div>

        <div class="section">
            <a href="mentorship.php" class="btn">Mentorship</a>
            <p class="desc">Connect with mentors for guidance and advice.</p>
        </div>

        <div class="section">
            <a href="projects.php" class="btn">Projects & Portfolios</a>
            <p class="desc">Showcase your projects and explore others'.</p>
        </div>

        <div class="section">
            <a href="study_groups.php" class="btn">Study Groups</a>
            <p class="desc">Join groups to collaborate on subjects and projects.</p>
        </div>

        <!-- New Section for Ask Questions -->
        <div class="section">
            <a href="ask_questions.php" class="btn">Ask Questions</a>
            <p class="desc">Post your questions and get answers from the community.</p>
        </div>

        <!-- New Section for Forum -->
        <div class="section">
            <a href="forum.php" class="btn">Forum</a>
            <p class="desc">Participate in discussions on various topics with peers.</p>
        </div>

        <!-- Logout Section -->
        <div class="section">
            <a href="../auth/logout.php" class="btn logout">Logout</a>
            <p class="desc">End your session securely.</p>
        </div>
    </div>
</div>
</body>
</html>
