<?php
session_start();

// Include your database connection file (e.g., dbconnect.php)
include "connect.php";

$name = $_SESSION["user"];

// Check if the user is authenticated
if (!isset($_SESSION["user"])) {
    // Redirect to the login page with a message
    header("location: login.php");
    exit();
}

// Check if the post form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve post data from the form

    // Specify the directory where you want to store uploaded images
    $uploadDir = "images/"; // Create this directory in your project folder

    // Check if the image file was uploaded without errors
    if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        // Generate a unique filename for the image to avoid overwriting existing files
        $imageName = uniqid() . "_" . $_FILES["image"]["name"];

        // Move the uploaded image to the designated directory
        $uploadPath = $uploadDir . $imageName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
            // Image upload successful, include the image path in the post data
            $imagePath = $uploadPath;
        } else {
            // Handle the case where the image upload fails (e.g., display an error message)
            echo "Error uploading image.";
            exit();
        }
    } else {
        // Handle the case where no image was uploaded
        $imagePath = null;
    }



    // Insert the post data (including image path) into the database
    $insertPostQuery = "update users  set image_path = '$imagePath' where username = '$name'";

    if ($conn->query($insertPostQuery) === TRUE) {
        // Redirect back to the home page after adding the post
        header("location: profile.php");
        exit();
    } else {
        // Handle the case where the post insertion fails (e.g., display an error message)
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
