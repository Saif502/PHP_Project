<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchTerm = $_POST["search"];
    $sql = "SELECT * FROM question where qus like '%$searchTerm%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0 and $searchTerm != "?") {
        while ($row = $result->fetch_assoc()) {
             echo $row["qus"]; 
        }
    } else {
        echo "No records found.";
    }

    // Close the database connection
    $conn->close();
}
?>
