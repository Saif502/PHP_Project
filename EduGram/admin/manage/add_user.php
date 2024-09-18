<HTML>
<HEAD>
<TITLE>Add User</TITLE>
</HEAD>
<BODY>
<form action="<?php $_PHP_SELF ?>" method="POST">
<p>ID :<input type="text" name="id"></p>
<p>Username: <input type="text" name="username"></p>
<p>Name: <input type="text" name="name"></p>
<p>Email:<input type="email" name="email"></p>
<p>Join date:<input type="date" id="start" name="date"></p>
<p><input type="Submit" name="insert" value="Add User" ></p>
</form>
</BODY>
</HTML>
<?php
if(isset($_POST['insert']))
{
       $con = mysqli_connect("localhost","root","");
       if ($con)
       {
              echo "MySQL connection Ok<br>";
              mysqli_select_db($con , "project");
              $id=intval($_POST['id']);
              $username=intval($_POST['username']);
              $name=strval($_POST['name']);
              $email=intval($_POST['email']);
              $join_date=intval($_POST['date']);
              $insert="INSERT INTO users values ('$id','$username','$name','$email','$join_date')";
              if(mysqli_query($con , $insert))
              {
                     echo "Record Inserted Successfully <br>";
              }
              mysqli_close($con);
       }

}
?>
