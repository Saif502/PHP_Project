<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, question, askedby FROM quans";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/icon1.png">
    <meta charset="UTF-8">
    <title>View - Question</title>

    <!-- Include Bootstrap CSS from a reliable source -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Additional internal CSS for custom styling */
        body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <section class="container">
        <h1 class="mt-4">Questions Details</h1>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Questions</th>
                    <th>Asked By</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['question']; ?></td>
                        <td><?php echo $rows['askedby']; ?></td>
                    </tr>
                <?php
                }
                $conn->close(); // Close the database connection
                ?>
            </tbody>
        </table>
    </section>

    <!-- Include Bootstrap JS and jQuery scripts (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
