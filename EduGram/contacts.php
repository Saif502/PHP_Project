<?php
    session_start();
    include "external_links.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Edugram - Contact </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
       
    </head>
    <body id="_4">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log"><br>
                <div id="ntro">Edugram</div>
                <!--<div id="E">E</div><div id="cir">E</div><div id="ntro">dugram</div>-->
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="categories.php"><li>Categories</li></a>
            <a href="contacts.php"><li id="home">Contact</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        <!-- content -->
        <div id="content" class="clearfix">
            
            <div id="box-1">
                <!--<div class="heading">
                    <center>
                    <h1 class="logo">
                        <div id="ntro">Edugram</div>
                        <div id="E">E</div><div id="cir">E</div><div id="ntro">dugram</div></h1>
                    <p id="tag-line">where questions are themselves the answers</p>
                    </center>
                </div>-->
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeN8GIArFXF8PcvOPyNLNTNR849NokjuvCQis59DAa0Inp_0A/viewform?usp=sf_link/viewform?embedded=true" width="640" height="812" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            </div>
            <div id="box-2">
                <div id="text">
                    <h1>Edugram</h1>
                    <p style="line-height: 20px;">
                        <a href="mailto:abhi.cse7.bu@gmail.com">abhi.cse7.bu@gmail.com</a><br>
                        <a href="mailto:naeem.cse7.bu@gmail.com">naeem.cse7.bu@gmail.com</a><br>
                        <a href="mailto:hafsa.cse7.bu@gmail.com">hafsa.cse7.bu@gmail.com</a><br>
                        Contact: +880132636787<br>
                        Contact: +8801623094662<br>
                        Site By: <a href=#>Our Team</a><br>
        
                    </p>
                </div>
            </div>
            
        </div>
    
  <!-- Footer -->
   <?php include("footer.php"); ?>
        
    </body>
    
</html>