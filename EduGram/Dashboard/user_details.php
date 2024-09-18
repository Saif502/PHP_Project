<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";
$pic = "Edugram/profile.png"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, image_path,username, name, email, join_date FROM users";
$result = $conn->query($sql);
$index = 0; 
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/icon1.png">
    <meta charset="UTF-8">
    <title>View - User</title>
    
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Internal CSS for styling */
        body {
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #343a40;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
  
<body>
    <section>
        <h1>User Details</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Picture</th> 
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Join Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($rows = $result->fetch_assoc()) { 
                     if($rows['image_path'])$pic = $rows['image_path']; 
                     $index++; 
  ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                         <td><img src="<?php echo $pic; ?>" alt="User Image" width="50"></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['join_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>
