<?php 
session_start();
include 'connect.php';

if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
	$pp =   $_SESSION['user'];   
	$q = "select * from users where username = '$pp'"; 
		   $result = $conn->query($q);
		   if (!$result) {
			   die("Query failed: " . $conn->error);
		   }
		   $val = ""; 
		   while($row = $result -> fetch_assoc())$val =$row['image_path'];
		   if(!$val) $val = "profile.png"; 
		   $_SESSION['pic']=$val;


}else{
	header("location:login.php");
}
if (isset($_GET['d_id'])) {
	$idd = $_GET['d_id'];
	$_SESSION["id"]=$idd; 
} 




if (isset($_POST['send'])) {
	$name=$_SESSION['user'];
	$email= $_SESSION['email'];
	$image=  $_SESSION['pic'];
	$message=$_POST['message'];
    $id = $_SESSION['id'];
	$sql="INSERT INTO message(name, email, image, message,cat) values('$name','$email','$image','$message', '$id')";
	$query=mysqli_query($conn,$sql);

	 header("Location: chat.php");
    exit(); 
}

?>

<!DOCTYPE html>
<html>
<head>
     <title>Edugram</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat App</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		*{
			margin:0px; 
			padding:0px; 
		}
		body{
			background-color:#E1E5F6 ;
		}
		#container{
			border: 1px solid white;
			height: 680px; 
			width: 670px;
			margin-left: 400px;
			background-color: white;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.6);
		}
		#chat{
			border: 1px solid white;
			width: 600px;
			height: 350px;
			margin-left: 0px;
			max-height: 350px;
			overflow: auto; 
			padding: 10px;
		}
		#message{
			margin-left: 20px;
			margin-top: 100px;
		}
		#message_box{
			width: 450px;
			height: 60px;
			background-color: #E4E6EB;
			border-radius: 20px;
			border: 1px solid #E4E6EB;
			padding-left: 20px;
			float: left;
		}
		#send{
			width: 100px;
			height: 60px;
			border-radius: 20px;
			margin-left: 10px;
			border: 1px solid #E4E6EB;
			background-color: #E4E6EB;
			
		}
		#send:hover{
			background-color: blue;
			cursor: pointer;
		}
		#chat_box_message1{
			border: 1px solid #0099FF;
			background-color: #0099FF;
			max-width: 30%;
			margin-left: 400px;
            overflow-y: auto;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 10px;
            height: auto;
            color: white;
            margin-top: 20px;

		}
		#chat_box_message2{
			border: 1px solid #E4E6EB;
			background-color: #E4E6EB;
			max-width: 30%;
            overflow-y: auto;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 10px;
            margin-left: 25px;
            height: auto;
            
            margin-top: 20px;

		}
		img{
			width: 80px;
            height: 70px;
            border-radius: 80%;
            overflow: hidden;
            float: left;
            margin-left: 10px;
            margin-top: 9px;
		}
		#logout{
			float: left;
			font-weight: bold;
			text-decoration: none;
			float: right;
			margin-right: 30px;
			margin-top: 24px;

		}
		#logout:hover{
			color: red;
		}
		#send_icon:hover{
			cursor: pointer;
		}
		.wel {
			background-color: #30336b; /* Background color */
			color: white; /* Text color */
			font-size: 24px; /* Font size */
			padding: 22px; /* Padding around the text */
			text-align: center; /* Center the text horizontally */
			font-weight: bold; /* Bold text */
}
.hd {
  background-color: #cfe8df;
  height:77px; 
}

.hd img {
  width: 70px;
  height: 65px;
  border-radius: 50%;
}

.hd label {
  float: left;
  margin-left: 10px;
  margin-top: 0px;
  font-weight: bold;
}

.logout {
  text-decoration: none;
  color: #333;
  margin-top: 10px;
  float: right;
  margin-right: 10px;
  transition: color 0.3s; 
  margin-top: 25px;
  padding-right:35px; 
  font-size:20px; 
  /* Adding a transition for smoother color change */
}

.logout:hover {
  color: #d35400; /* Change the text color on hover */
}



	</style>
</head>
<body>

	<div id="_1" class="wel">
	Talk & Connect Hub
	</div>
	<div id="container">
		<div class ="hd"> 

		     <a href="profile.php"> <img src="<?php echo  $_SESSION['pic']  ?>"></a>
			 
			 <label> <a  id="logout"   href="profile.php"> <?php echo $_SESSION['name']; ?> </label> 
			 <a id="gobackButton"  class = "logout" href = "#">Go Back</a><br><br><br>
			 <script>
        // Go back to the previous page when a button is clicked
        document.getElementById("gobackButton").addEventListener("click", function() {
            window.history.back();
        });
    </script>
			
		 </div>
		 <div id="chat">
		 	
		 		<?php 
				    $id = $_SESSION['id'];
		 			$sql1="SELECT name, email, message, DATE_FORMAT(time, '%M %e at %l:%i %p') AS time2,image from message  where cat = '$id' ";
		 			$query1=mysqli_query($conn,$sql1);

		 			if (mysqli_num_rows($query1) > 0){
		 				while ($row=mysqli_fetch_array($query1)) {
		 				if ($row['email'] == $email) {
		 					?>
		 				<div id="chat_box_main1">

		 					<div id="chat_box_message1">
		 					 <?php 
		 						echo $row['message'];
		 					 ?>
		 					</div>
		 					<div style="margin-left: 420px;margin-top:-5px; font-size: 12px;">
		 						<?php
		 						 echo $row['time2'];
		 						  
		 						?>
		 					</div>
		 			   </div>
 
		 				<?php 
		 				}else{

			
		 					?>
		 					<div id="chat_box_main2">
							 <div style="margin-left: 110px; margin-bottom:-17px; font-weight:700">
		 						<?php
		 						 echo "@".$row['name'];
		 						?>
		 					</div>
							 <a href="chat_profile.php ?d_id=<?php echo $row['name'] ?>"> <img  style="margin-right: 10px;" src="<?php echo $row['image'] ?>"></a>
		 				
		 					<div id="chat_box_message2" style="margin-left: 0px; ">
		 					 <?php 
		 						echo $row['message'];
		 					  ?>
		 					</div>
		 					  <div style="margin-left: 115px;  margin-top:-5px; font-size: 12px; ">
		 						<?php
		 						 echo $row['time2'];
		 						?>
		 					</div>
		 			       </div>

		 					<?php 
		 				}
		 			}
		 		}
		 		?>
		 	
		 </div>
		 <div id="message">
		 	<form action="chat.php" method="POST">
					<input id="message_box" type="text" name="message" placeholder="Write message" required>
					<input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" hidden>
					<input type="text" name="email" value="<?php echo $_SESSION['email'];  ?>" hidden>
					<button  id="send_icon" type="submit" name="send" style="background: none;border: none;">
		 	    	<img style="width: 70px;height: 57px; float: left; margin-top: 0px;" src="send.png">
		 	    </button>	
		 	</form>
		 	
		 </div>
	</div>

	

</body>
</html>
