
/* Roadmap Management (Admin Side) */
<?php
// add_roadmap.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['resource_link'];
    $category = $_POST['category'];

    $query = "INSERT INTO roadmap (title, description, resource_link, category) VALUES ('$title', '$description', '$link', '$category')";
    if (mysqli_query($conn, $query)) {
        echo "Roadmap added successfully!";
    } else {
        echo "Error occurred.";
    }
}
?>
