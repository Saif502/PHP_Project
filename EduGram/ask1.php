<?php
    
    include('connect.php');
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Edugram </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon.png" >
    </head>
    <body id="ask">
       
        
        <!-- content -->
        <div id="content">
            <div id="sf">
                <center>
                    <div class="heading ask">
                        <h1 class="logo">
                            <div id="ntro">Edugram</div>
                            </h1>
                        <p id="tag-line"><br>where questions are themselves the answers</p>
                    </div>

                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">

                        <input name="question" type="text" title="Your Question..." placeholder="Ask Your question on our Community for greate user expereince..." id="question">

                        <select name="cat">
                            <option valus="Category">Category</option>
                            <option value="programming">programming</option>
                            <option value="Architecture">Architecture</option>
                            <option value="Devlopment">Devlopment</option>
                            <option value="Soft skill">Soft skill</option>
                            <option value="Software-Engineering">Software-Engineering</option>
                            <option value="Others">Others</option>
                        </select>
                        <input name="submit" type="submit" class="up-in" id="ask_submit">
                    </form>
                </center>
            </div>
        </div>
        <div id="ask-ta">
            <h1>Thank You.<br>Stay tunned for updates.</h1>
        </div>


        
        
        <?php

        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                $question = valid( $_POST["question"] );
                $no = valid( $_POST["cat"]);
                
                $question = addslashes($question);
                $q = "SELECT * FROM question WHERE qus = '$question'";
                $result = mysqli_query($conn,$q);
                if(mysqli_error($conn))
                    echo "<script>window.alert('Someeeee Error Occured. Try Again or Contact Us.');</script>";
                else if( $no == "Category"){
                    echo "<script>window.alert('Choose a Category.');</script>";
                }
                else if( mysqli_num_rows($result) == 0 ){
                    $query1 = "INSERT INTO question(id,qus,author_name,author_pic,cat) VALUES(NULL, '$question','".$_SESSION['user']."','".$_SESSION['pic']."','$no')";
                  
                   
                    if(mysqli_query( $conn, $query1)){

                    }
                    else{
                        echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                    }
                }
                else{
                    echo "<script>window.alert('Question was already Asked. Search it on Home Page.');</script>";
                }
                
                mysqli_close($conn);
            }
        
        ?>
        
        <!-- Footer -->
        
        
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        

       
    </body>
    
</html>