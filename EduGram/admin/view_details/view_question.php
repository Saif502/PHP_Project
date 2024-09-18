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
$sql = "SELECT id, question, askedby FROM quans";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/icon1.png" >
    <meta charset="UTF-8">
    <title>View - Quetion</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
    body
        {
          background-color: #E4E2E1;
          color: black;
        }
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            background-color: #E4E2E1;
        }
  
        h1 {
            text-align: center;
            color: black;
            font-size: xx-large;
            
        }
  
        td {
            background-color: #E4E2E1;
            border: 1px solid black;
        }
  
        th{
            background-color: #E4E2E1;
            border: 1px solid black;
        }
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <section>
        <h1>Questions Details</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Questions</th>
                <th>Asked By</th>
            </tr>
            <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['question'];?></td>
                <td><?php echo $rows['askedby'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
</html>