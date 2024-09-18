<?php
include "connect.php";
session_start();

$user = $_SESSION["user"];
$img = $_SESSION["pic"];
$id = $_GET["d_id"];

// Handle Combined Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msg = $_POST["comment"];

    // Check if files were uploaded
    if (!empty($_FILES['media']['name'][0])) {
        $uploadedFiles = $_FILES['media'];
        $uploadedCount = count($uploadedFiles['name']);

        for ($i = 0; $i < $uploadedCount; $i++) {
            $file_name = $uploadedFiles['name'][$i];
            $file_destination = "upload/" . $file_name;
            move_uploaded_file($uploadedFiles['tmp_name'][$i], $file_destination);

            // Insert data into the database for each file
            $q = "INSERT INTO answer (id, q_id, ans, media, author_name, author_pic)
                  VALUES (NULL, '$id', '$msg', '$file_name', '$user', '$img')";
            $conn->query($q);
        }
    } else {
        // Insert data into the database without media if no files were uploaded
        $q = "INSERT INTO answer (id, q_id, ans, author_name, author_pic)
              VALUES (NULL, '$id', '$msg', '$user', '$img')";
        $conn->query($q);
    }

    header('location:index.php');
}
?>
