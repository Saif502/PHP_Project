<?php 

$server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'project';

    $conn = mysqli_connect($server,$user,$password,$db);
    if(!$conn){
        die("Connection Failed ". mysqli_connect_error());
    } 

if (isset($_GET['id'])) {

    $inuser = $_GET['id'];

    $sql = "DELETE FROM `quans` WHERE `id`='$inuser'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('location:page7.php'); 

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>