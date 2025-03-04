
/* Career Guidance Chatbot - Fetch Job Listings */
<?php
// fetch_jobs.php
require 'db.php';
$query = "SELECT * FROM job_listings ORDER BY posted_at DESC LIMIT 10";
$result = mysqli_query($conn, $query);
$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($jobs);
?>
