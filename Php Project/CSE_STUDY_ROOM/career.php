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
    <title>Career Roadmap - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Career Roadmap</h2>
    <p>Explore various career paths in Computer Science and Engineering (CSE).</p>

    <!-- Career Roadmap Content -->
    <div class="career-roadmap">
        <h3>Steps to Build a Successful Career in CSE</h3>
        <ul>
            <li><strong>Step 1:</strong> Choose Your Specialization (e.g., Software Development, Data Science, AI, etc.)</li>
            <li><strong>Step 2:</strong> Master Programming Languages (e.g., Python, Java, C++)</li>
            <li><strong>Step 3:</strong> Gain Practical Experience (through internships or projects)</li>
            <li><strong>Step 4:</strong> Learn Industry Tools (e.g., Git, Docker, Cloud Platforms)</li>
            <li><strong>Step 5:</strong> Build Your Portfolio (GitHub, personal website, etc.)</li>
            <li><strong>Step 6:</strong> Network and Attend Industry Events (Hackathons, Meetups, etc.)</li>
            <li><strong>Step 7:</strong> Apply for Jobs/Internships and Continue Learning</li>
        </ul>

        <h3>Useful Resources</h3>
        <ul>
            <li><a href="https://www.coursera.org">Coursera - Online Courses</a></li>
            <li><a href="https://www.udemy.com">Udemy - Programming Tutorials</a></li>
            <li><a href="https://www.github.com">GitHub - Code Repositories</a></li>
            <li><a href="https://www.linkedin.com">LinkedIn - Networking</a></li>
        </ul>

        <h3>Job Roles in CSE</h3>
        <ul>
            <li>Software Developer</li>
            <li>Data Scientist</li>
            <li>AI Engineer</li>
            <li>Web Developer</li>
            <li>Cybersecurity Expert</li>
            <li>System Architect</li>
            <li>Cloud Engineer</li>
            <li>Game Developer</li>
        </ul>
    </div>

    <!-- Go Back to Dashboard -->
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
