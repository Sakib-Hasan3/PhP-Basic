/* Career Guidance Chatbot - User Input Handling */
<?php
// user_input.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $skills = $_POST['skills'];
    $interests = $_POST['interests'];
    $experience = $_POST['experience_level'];
    
    $query = "INSERT INTO users (name, email, skills, interests, experience_level) VALUES ('$name', '$email', '$skills', '$interests', '$experience')";
    if (mysqli_query($conn, $query)) {
        echo "User data saved successfully!";
    } else {
        echo "Error occurred.";
    }
}
?>
