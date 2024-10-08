
<?php

    session_start();

    $pp=""; 
    if(isset( $_POST["submit"] ) )
    {   
        function valid($data){
            $data=trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }

        $inuser = valid( $_POST["username"] );
        $inkey = valid( $_POST["password"] );

        include("connect.php");

        $query = "SELECT username, password, name, email, role,join_date FROM users WHERE username='$inuser'";

        $result = mysqli_query( $conn, $query);
        if(mysqli_error($conn)){
            echo "<script>window.alert('Something Goes Wrong. Try Again');</script>";
        }
        else if( mysqli_num_rows($result) > 0 ){
            while( $row = mysqli_fetch_assoc($result) ){
    
                $user = $row['username'];
                $pass = $row['password'];
                $name = $row['name'];
                $email = $row['email'];
                $role = $row['role'];
                $date = $row['join_date'];
                
                
            }

            if( password_verify( $inkey, $pass ) ){
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                $_SESSION['date'] = $date;
                $pp = $_SESSION['user'];
                
                
                if($_SESSION['role'] == 'user'){
                    header('Location: index.php'); 
                }
                else if ($_SESSION['role'] == 'admin'){
                    header('Location:Dashboard.php');
                }
                
                else{
                    echo"<script>window.alert('Something Goes Wrong. Try Again');</script>";
                }
                

            }
            
            else{
                echo "<script>window.alert('Wrong Username or Password Combination. Try Again');</script>";
            }
        }
        else{
            echo "<script>window.alert('No Such User exist in database');</script>";
        }


        $q = "select * from users where username = '$pp'"; 
        $result = $conn->query($q);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        $val = ""; 
        while($row = $result -> fetch_assoc())$val =$row['image_path'];
        if(!$val) $val = "profile.png"; 
        $_SESSION['pic']=$val;

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Edugram - Login </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon.png" >
    </head>
    <body id="_5">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log"><br>
                <div id="ntro">Edugram</div>
                <!--div id="E">E</div><div id="cir">E</div><div id="ntro">dugram</div>-->
            </div>
        </a>
        <ul id="nav-bar">
           
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
             <a href="index.php"><li id="home">Home</li></a>
            <a href="categories.php"><li>Categories</li></a>
            <a href="contacts.php"><li>Contact</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        
        <!-- content -->
        <div id="content">
            <center>
                <div class="heading">
                    <h1 class="logo">
                        <div id="ntro">Edugram</div>
                        <!--<div id="E">E</div><div id="cir">E</div><div id="ntro">dugram</div>--></h1>
                    <p id="tag-line"><br>where questions are themselves the answers</p>
                </div>
                <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">
                    <input name="username" id="user" type="text" title="Username" placeholder="Username" required>
                    <input name="password" id="key" type="password" title="Password" placeholder="Password" required>
                    <!--i class="material-icons" id="lock">lock</i>
                    <i class="material-icons" id="person">person</i-->
                    <div id="button-block">
                        <center><br><br>
                            <div class="buttons"><input name="submit" type="submit" value="Log In" class="up-in"></div>
                            <div class="buttons" id="new"><input type="button" value="Create a new account" class="up-in" id="tosign"></div>
                        </center>
                    </div>
                    <a href="contacts.php" id="trouble"><span>Having Trouble in login ? Contact Us</span></a>
                </form>
            </center>
        </div>
        
        
        <!-- Footer -->
       
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>