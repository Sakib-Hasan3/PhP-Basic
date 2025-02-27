/* Progress Tracking (User Side) */
<?php
// update_progress.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $user_id = $_POST['user_id'];
    $roadmap_id = $_POST['roadmap_id'];
    $status = $_POST['status'];
    
    $query = "UPDATE user_progress SET status='$status' WHERE user_id='$user_id' AND roadmap_id='$roadmap_id'";
    if (mysqli_query($conn, $query)) {
        echo "Progress updated!";
    } else {
        echo "Error occurred.";
    }
}
?>
