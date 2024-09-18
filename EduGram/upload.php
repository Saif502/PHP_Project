<?php
include "connect.php";
     session_start(); 
     $name = $_FILES['file']; 
     $file_name = $_FILES['file']['name'];
     $file_type = $_FILES['file']['type'];
     $temp_name = $_FILES['file']['tmp_name'];
     $file_size = $_FILES['file']['size'];
     $file_destination = "upload/" . $file_name;
     $user = $_SESSION["user"];
     $img = $_SESSION["pic"];
     $id = $_GET["d_id"]; 

     $q1 = "insert into video_answer(id,q_id) 
                     values(NULL'$id')   
               "; 
               $conn->query($q1); 


      if (move_uploaded_file($temp_name, $file_destination)) {
               echo $file_name; 
        } else {
            echo "Error uploading the file.";
        }

$conn->close();
?>

