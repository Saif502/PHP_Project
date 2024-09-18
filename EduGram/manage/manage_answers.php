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

$sql = "SELECT id, answer, answeredby FROM quans";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/icon1.png">
    <meta charset="UTF-8">
    <title>Manage - Answers</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Internal CSS -->
    <style>
      
        section {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 30px;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <section>
        <h1>Manage Answers</h1>
        <p>
            <a href="add_ans.php" class="btn btn-primary">Add new Answer</a>
            <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
        </p>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Answers</th>
                <th>Answered By</th>
                <th>Action</th>
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['answer']; ?></td>
                    <td><?php echo $rows['answeredby']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="showUserCreateBox()">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="document.location='delete.php'">Delete</button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </section>

    <!-- Add Bootstrap JS at the end of the body for better performance -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
