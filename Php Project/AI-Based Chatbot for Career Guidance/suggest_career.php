/* Career Guidance Chatbot - Suggest Career Paths */
<?php
// suggest_career.php
require 'db.php';
$email = $_GET['email'];
$query = "SELECT skills, interests FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
if ($user) {
    $skills = $user['skills'];
    $interests = $user['interests'];
    $query = "SELECT * FROM career_paths WHERE required_skills LIKE '%$skills%' OR industry LIKE '%$interests%'";
    $result = mysqli_query($conn, $query);
    $careers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($careers);
} else {
    echo json_encode(["error" => "User not found"]);
}
?>
