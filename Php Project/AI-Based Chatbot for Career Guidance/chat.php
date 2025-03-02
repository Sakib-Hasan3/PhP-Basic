
/* Chat System */
<?php
// chat.php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];
    $query = "INSERT INTO chat (user_id, message) VALUES ('$user_id', '$message')";
    mysqli_query($conn, $query);
}
$query = "SELECT chat.message, users.name FROM chat JOIN users ON chat.user_id = users.id ORDER BY chat.timestamp DESC";
$result = mysqli_query($conn, $query);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($messages);
?>
