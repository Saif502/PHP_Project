<?php
	include "connect.php";
	$ID1=$_GET['qus_id'];
	
	
	$sql="DELETE FROM user_interaction WHERE answer_id ='$ID1'";
	$conn->query($sql); 
    $sql="DELETE FROM question WHERE id ='$ID1'";
	if($conn->query($sql)){
        header('location:index.php'); 
       
     }
     else echo "Failed"; 

$conn->close();
?>