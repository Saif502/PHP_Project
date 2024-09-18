<?php
	include "connect.php";
	session_start(); 

	$ID=$_GET['d_ID'];
	$name=$_POST['f_name'];

	$sql = "UPDATE answer
            SET ans= '$name'
           WHERE id = '$ID'";


	if($conn->query($sql)){
		
		header('location:index.php');
	 }
		
	else 
	echo "update failed";

	
?>