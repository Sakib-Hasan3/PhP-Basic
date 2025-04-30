<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - CSE Study Room</title>
    <!-- Link to dashboard styles -->
    <link rel="stylesheet" href="style/dashboard.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is your personalized dashboard where you can access all study room features at a glance.</p>

    <!-- Dashboard Sections -->
    <div class="dashboard-sections">
        <h3>Explore Your Opportunities:</h3>

        <div class="section">
            <a href="career.php" class="btn">Career Roadmap</a>
            <p class="desc">Plan your career path with milestones and skills guidance.</p>
        </div>

        <div class="section">
            <a href="cv_drop.php" class="btn">Drop Your CV</a>
            <p class="desc">Upload your resume for feedback and exposure.</p>
        </div>

        <div class="section">
            <a href="ask_question.php" class="btn">Ask a Question</a>
            <p class="desc">Get answers to your technical and academic queries.</p>
        </div>

        <div class="section">
            <a href="community.php" class="btn">Community Answers</a>
            <p class="desc">Browse and upvote community-provided solutions.</p>
        </div>

        <div class="section">
            <a href="resources.php" class="btn">Resources & Study Material</a>
            <p class="desc">Access tutorials, notes, and study guides.</p>
        </div>

        <div class="section">
            <a href="projects.php" class="btn">Projects & Portfolios</a>
            <p class="desc">Showcase your projects and explore others'.</p>
        </div>

        <div class="section">
            <a href="jobs.php" class="btn">Internship & Job Opportunities</a>
            <p class="desc">Find and apply for CSE internships and jobs.</p>
        </div>

        <div class="section">
            <a href="study_groups.php" class="btn">Study Groups</a>
            <p class="desc">Join groups to collaborate on subjects and projects.</p>
        </div>

        <div class="section">
            <a href="coding_challenges.php" class="btn">Coding Challenges</a>
            <p class="desc">Practice coding problems to hone your skills.</p>
        </div>

        <div class="section">
            <a href="courses.php" class="btn">Online Courses</a>
            <p class="desc">Browse recommended online courses for CSE topics.</p>
        </div>

        <div class="section">
            <a href="mentorship.php" class="btn">Mentorship</a>
            <p class="desc">Connect with mentors for guidance and advice.</p>
        </div>

        <div class="section">
            <a href="news.php" class="btn">CSE News & Updates</a>
            <p class="desc">Stay informed with the latest CSE news.</p>
        </div>

        <div class="section">
            <a href="tips.php" class="btn">Study Tips & Quotes</a>
            <p class="desc">Read tips and quotes to stay motivated.</p>
        </div>

        <div class="section">
            <a href="forum.php" class="btn">Forum Discussions</a>
            <p class="desc">Engage in CSE discussions and share knowledge.</p>
        </div>

        <div class="section">
            <a href="logout.php" class="btn logout">Logout</a>
            <p class="desc">End your session securely.</p>
        </div>
    </div>
</div>
</body>
</html>
