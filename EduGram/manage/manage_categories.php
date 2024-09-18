<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, description FROM category";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/icon1.png">
    <meta charset="UTF-8">
    <title>Manage - Categories</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Internal CSS */
        body {
            background-color: #f0f0f0;
            color: black;
        }
        h1 {
            text-align: center;
            font-size: 28px;
        }
        .btn {
            font-size: 16px;
        }
        .table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            background-color: #f0f0f0;
        }
        .table th, .table td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Category Details</h1>
        <a href="create.php" class="btn btn-primary">Add new Category</a>
        <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    while($rows = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['description'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $rows['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="manage/delete.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
