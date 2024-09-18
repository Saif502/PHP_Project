<HTML>
<HEAD>
<TITLE>Add Question</TITLE>
</HEAD>
<BODY>
<form action="<?php $_PHP_SELF ?>" method="POST">
<p>ID:<input type="text" name="id"></p>
<p>Question: <input type="text" name="que" ></p>
<p>Categories: <input type="text" name="cat"></p>
<p>Ask By:<input type="text" value="admin"name="ask" readonly></p>
<p><input type="Submit" name="insert" value="Add Question" ></p>
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
              $quetion=intval($_POST['que']);
              $categories=strval($_POST['cat']);
              $ask=intval($_POST['ask']);
              $insert="INSERT INTO StudentEntry values ('$id',$question,'$categories','$ask')";
              if(mysqli_query($con , $insert))
              {
                     echo "Record Inserted Successfully <br>";
              }
              mysqli_close($con);
       }

}
?>
