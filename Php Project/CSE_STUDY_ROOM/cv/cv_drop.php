
<?php
// Check if session is already started before calling session_start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db.php'); // Database connection

$message = "";

// Handle the file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['cv_file'])) {
    $file = $_FILES['cv_file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Define allowed file types and size limit
    $allowed_types = ['pdf', 'doc', 'docx'];
    $max_size = 10 * 1024 * 1024; // 10MB

    // Extract file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // MIME type validation for added security
    $file_mime = mime_content_type($file_tmp);
    $allowed_mimes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    if (!in_array($file_mime, $allowed_mimes)) {
        $message = "Error: Invalid file type.";
    }

    // Check if the file extension is allowed and size is within the limit
    if (in_array($file_ext, $allowed_types) && $file_size <= $max_size) {
        // Generate a unique file name
        $file_new_name = uniqid('', true) . '.' . $file_ext;
        $file_destination = 'uploads/cvs/' . $file_new_name;

        // Move the file to the uploads directory
        if (move_uploaded_file($file_tmp, $file_destination)) {
            // Insert the file information into the database
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO cvs (user_id, file_name, file_path) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute([$user_id, $file_name, $file_destination])) {
                $message = "CV uploaded successfully!";
            } else {
                $message = "Error: Could not save the file in the database.";
            }
        } else {
            $message = "Error: Failed to upload the file.";
        }
    } else {
        $message = "Error: Invalid file type or file size exceeds the limit.";
    }

    // Handle file upload error
    if ($file_error !== UPLOAD_ERR_OK) {
        switch ($file_error) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $message = "Error: File is too large.";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "Error: File was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "Error: No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Error: Missing a temporary folder.";
                break;
            default:
                $message = "Error: Unknown file upload error.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drop Your CV - CSE Study Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Upload Your CV</h2>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="file" name="cv_file" required><br><br>
        <button type="submit" class="btn">Upload CV</button>
    </form>

    <!-- Display upload message -->
    <p><?php echo $message; ?></p>

    <!-- Go Back to Dashboard -->
    <div class="section">
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</div>
</body>
</html>
