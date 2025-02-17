<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include the database configuration file
include('db_connect.php');

// Debugging: Check if the database connection is established
if (!isset($conn)) {
    die("Database connection not established. Check db_connect.php.");
}

// Handle query execution
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])) {
    $query = $_POST['query'];

    // Insert the query into the `queries` table
    $stmt = $conn->prepare("INSERT INTO queries (query) VALUES (?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $query);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    // Run the query
    $result = $conn->query($query);
    if ($result) {
        $output = "Query executed successfully.";
    } else {
        $output = "Error: " . $conn->error;
    }
}

// Handle re-running a saved query
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['run_query'])) {
    $query_id = $_POST['run_query'];
    $result = $conn->query("SELECT query FROM queries WHERE id = $query_id");
    if ($result && $row = $result->fetch_assoc()) {
        $query = $row['query'];
        $result = $conn->query($query);
        if ($result) {
            $output = "Query re-executed successfully.";
        } else {
            $output = "Error re-executing query: " . $conn->error;
        }
    } else {
        $output = "Error fetching query: " . $conn->error;
    }
}

// Handle deleting a saved query
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_query'])) {
    $query_id = $_POST['delete_query'];
    $result = $conn->query("DELETE FROM queries WHERE id = $query_id");
    if ($result) {
        $output = "Query deleted successfully.";
    } else {
        $output = "Error deleting query: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Query Execution</title>
    <style>
        /* Animated Background */
        @keyframes gradientBackground {
            0% { background-color: #ff9a9e; }
            25% { background-color: #fad0c4; }
            50% { background-color: #a1c4fd; }
            75% { background-color: #c2e9fb; }
            100% { background-color: #ff9a9e; }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            animation: gradientBackground 10s ease infinite;
            background-size: 200% 200%;
        }

        h2 {
            color: #333;
        }

        form {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .output {
            background: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.9);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-button {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .action-button.delete {
            background-color: #dc3545;
        }

        .action-button.delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h2>Execute SQL Query</h2>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="logout.php">Logout</a></p>
    <form method="POST">
        <textarea name="query" placeholder="Enter your SQL query here" required></textarea><br>
        <button type="submit">Save and Run Query</button>
    </form>

    <?php if (isset($output)) { echo "<div class='output'>$output</div>"; } ?>
    
    <h3>Saved Queries:</h3>
    <table>
        <thead>
            <tr>
                <th>Query</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM queries ORDER BY created_at DESC");
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['query']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "<td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='run_query' value='" . $row['id'] . "'>
                                <button type='submit' class='action-button'>Run</button>
                            </form>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='delete_query' value='" . $row['id'] . "'>
                                <button type='submit' class='action-button delete'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Error fetching queries: " . $conn->error . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>