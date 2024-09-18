<HTML>
<HEAD>
<TITLE>Add Answer</TITLE>
</HEAD>
<BODY>
<form action="<?php $_PHP_SELF ?>" method="POST">
<p>ID :<input type="text" name="id"></p>
<p>Answer: <input type="textarea" name="ans" placeholder="Enter Category here..."></p>
<textarea rows="5" cols="50" name="comment" form="usrform">
       Enter Answer here...</textarea>
<p>Answer By:<input type="text" value="admin"name="ask" readonly></p>
<p><input type="Submit" name="insert" value="Add Answer" ></p>
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
              $answer=intval($_POST['ans']);
              $categories=strval($_POST['cat']);
              $answer=intval($_POST['ans']);
              
              $insert="INSERT INTO StudentEntry values ('$id',$answer,'$categories','$ask')";
              if(mysqli_query($con , $insert))
              {
                     echo "Record Inserted Successfully <br>";
              }
              mysqli_close($con);
       }

}
?>
