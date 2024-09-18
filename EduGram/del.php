<?php
	include "connect.php";
	$ID=$_GET['ans_id'];
	
	echo $ID;
	$sql="DELETE FROM user_interaction WHERE answer_id ='$ID'";
	$conn->query($sql); 
    $sql="DELETE FROM answer WHERE id ='$ID'";
	if($conn->query($sql)){
        header('location:index.php'); 
       
     }
     else echo "Failed"; 

	
	

$conn->close();
?>