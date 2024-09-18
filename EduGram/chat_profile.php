<?php
    session_start();
    include "connect.php"; 
    include "external_links.php";
    if(! isset($_SESSION['user']))
        header("Location: login.php");

        $p = $_GET["d_id"];

        $q = "select * from users where username = '$p'"; 
               $result = $conn->query($q);
               if (!$result) {
                   die("Query failed: " . $conn->error);
               }
               $val = ""; 
               while($row = $result -> fetch_assoc()){
                     $val =$row['image_path'];
                     $name = $row['name']; 
                     $email = $row['email']; 
                     $date = $row ['join_date']; 
                
               }
            
    if(!$val) $val = "profile.png"; 
    
    $q = "SELECT * from answer where author_name='$p'";
    $result = mysqli_query($conn, $q);
    $row1 = mysqli_num_rows($result);
    $sum=0 ; $sum1=0;
    while ($row2 = $result -> fetch_assoc()){
        $sum += $row2['like_count'];
        $sum1 += $row2['dislike_count'];
    }
            


?>
<!DOCTYPE html>
<html>

<head>
    <title> Edugram - Profile </title>

    <style>
    #pic {

        background-size: 100%;
        float: left;
        width: 400px;
        height: 400px;
        border-right: solid 5px #333;
        margin: 10px 10px 10px 0px;
        margin-top: 70px;
    }

    .em {
        background-color: #3498db;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
        font-size: 25px;
        font-style: italic;
        color: #FFFFFF;
    }

    .em::before {
        content: "\201C";
        /* Left double quotation mark */
        font-size: 30px;
        margin-right: 5px;
    }

    .em::after {
        content: "\201D";
        /* Right double quotation mark */
        font-size: 30px;
        margin-left: 5px;
    }

    #hea-det {
        margin-top: -50px;
        float: right;

        font-size: 20px;
        width: 400px;
        padding: 148.1px 10px;
        text-align: left;
    }
    </style>
</head>

<body id="pro">
    <!-- navigation bar -->
    <a href="index.php">
        <div id="log"><br>
            <div id="ntro">Edugram</div>
            <!--<div id="E">E</div><div id="cir">E</div><div id="ntro">dugram</div>-->
        </div>
    </a>
    <ul id="nav-bar">
        <a href="index.php">
            <li>Home</li>
        </a>
        
        <a href="categories.php">
            <li>Categories</li>
        </a>
        <a href="contacts.php">
            <li>Contact</li>
        </a>
        <a href="ask.php">
            <li>Ask Question</li>
        </a>
        <a href="profile.php">
            <li id="home">Hi, <?php echo $_SESSION["user"]; ?></li>
        </a>
        <a href="logout.php">
            <li>Log Out</li>
        </a>
    </ul>

    <!-- content -->
    <div id="content">
        <center>
            <div class="em">
                <?php echo "Hey there, ". $_SESSION["user"]."!   You've arrived at my profile"; ?>
            </div>

            <div class="clearfix">
                <div id="hea-det">
                    <p id="first">N</p>
                    <p class="tit">ame: </p>
                    <p class="det"><?php echo $name; ?></p><br>
                    <p id="first">E</p>
                    <p class="tit">mail: </p>
                    <p class="det"><?php echo $email; ?></p><br>
                    <p id="first">J</p>
                    <p class="tit">oin Date: </p>
                    <p class="det"><?php echo $date; ?></p><br>
                    <p id="first">C</p>
                    <p class="tit">ontribution: <?php echo $row1 ?> </p></br>
                    <p class="tit">Like: <?php echo $sum ?> </p>
                    <p class="tit" style="margin-left:20px;" >DisLike: <?php echo $sum1 ?> </p>
                </div>


                <div id="pic">

                    <img src="<?php echo $val; ?>" alt="Upload Image"
                        style="width: 370px;  height: 370px; border-radius: 200px;">



                </div>


            </div>
        </center>
    </div>

    <!-- Footer -->
    <?php include('footer.php') ?>
</body>

</html>