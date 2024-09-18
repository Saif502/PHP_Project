<?php
session_start();
include "connect.php";
if(! isset($_SESSION['user']))
    header("Location: login.php");   

    $id = $_GET["del_id"]; 
    $k= $_SESSION['user']; 
    $q = "select * from users where username = '$k'"; 
    $result = mysqli_query($conn,$q); 
    $row = mysqli_fetch_array($result); 
    $pp = $row["id"]; 

    $q = "select * from answer where id = '$id'"; 
    $result = mysqli_query($conn,$q); 
    $row = mysqli_fetch_array($result); 
    $cnt = $row["dislike_count"]; 

    $q1 = "select * from user_interaction where answer_id = '$id' and user_id = '$pp' "; 
    $result = mysqli_query($conn,$q1); 
    $rowcount=mysqli_num_rows($result);
    echo $rowcount; 
    if($rowcount == 0){
        $cnt = $cnt + 1; 
        $q = "insert into user_interaction(user_id, answer_id) 
        values('$pp','$id')
        "; 
        $result = mysqli_query($conn,$q); 

    }
    echo $cnt; 



    $updateQuery = "UPDATE answer SET dislike_count = $cnt WHERE id = $id";
    mysqli_query($conn, $updateQuery);
    header('location:index.php');

    // Close the database connection
    mysqli_close($conn);
?>

