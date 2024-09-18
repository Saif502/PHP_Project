
<?php

session_start();
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edugram - Categories</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/material.css">
    <link type="text/css" rel="stylesheet" href="fonts/font.css">
    <link rel="icon" href="images/icon.png">
    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <style>
        .container1 {
            margin: 120px;
            align-items: center;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col {
            width: 30%;
            margin: 10px;
            overflow: hidden;
            position: relative;
            transition: transform 0.2s;
        }

        .image-container {
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            overflow: hidden;
        }

        img {
            width: 100%;
            height: 210px;
            display: block;
            border-radius: 8px;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            opacity: 0;
            transition: opacity 0.7s;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            font-size: 25px;
            font-weight: 500;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        textarea {
            display: none;
            width: 300px;
            height: 50px;
            background: #333;
            color: #ddd;
            padding: 10px;
            margin: 5px 0 -14px;
        }

        .ans_sub {
            display: none;
            padding: 0 10px;
            height: 30px;
            line-height: 30px;
        }

        .pop {
            display: none;
            text-align: center;
            margin: 195.5px auto;
            font-size: 12px;
        }
    </style>
</head>

<body id="_3">
    <!-- Navigation bar -->
    <a href="index.php">
        <div id="log"><br>
            <div id="ntro">Edugram</div>
        </div>
    </a>
    <ul id="nav-bar">
        <a href="index.php">
            <li>Home</li>
        </a>
        
        <a href="categories.php">
            <li id="home">Categories</li>
        </a>
        <a href="contacts.php">
            <li>Contact</li>
        </a>
        <a href="ask.php">
            <li>Ask Question</li>
        </a>
        <?php
        if (!isset($_SESSION['user'])) {
        ?>
            <a href="login.php">
                <li>Log In</li>
            </a>
            <a href="signup.php">
                <li>Sign Up</li>
            </a>
        <?php
        } else {
        ?>
            <a href="profile.php">
                <li>Hi, <?php echo $_SESSION["user"]; ?></li>
            </a>
            <a href="logout.php">
                <li>Log Out</li>
            </a>
        <?php
        }
        ?>
    </ul>

    <!-- Main Content -->
    <div class="container1">
        <div class="row">
            <div class="col">
                <div class="image-container">
                    <a href="Showcat.php?d_id=<?php echo urlencode("programming"); ?>">
                        <img src="images/cat/programing.png" alt="Programming Image">
                        <div class="overlay">Programming Category</div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="image-container">
                    <a href="Showcat.php?d_id=<?php echo urlencode("Architecture"); ?>">
                        <img src="images/cat/architecture.png" alt="Architecture Image">
                        <div class="overlay">Architecture Category</div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="image-container">
                    <a href="Showcat.php?d_id=<?php echo urlencode("Devlopment"); ?>">
                        <img src="images/cat/devlopment.png" alt="Development Image">
                        <div class="overlay">Development Category</div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="image-container">
                    <a href="Showcat.php?d_id=<?php echo urlencode("Soft skill"); ?>">
                        <img src="images/cat/soft.png" alt="Soft Skill Image">
                        <div class="overlay">Soft Skill Category</div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="image-container">
                    <a href="Showcat.php?d_id=<?php echo urlencode("Software-Engineering"); ?>">
                        <img src="images/cat/se.png" alt="Software Engineering Image">
                        <div class="overlay">Software Engineering Category</div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="image-container">
                    <a href="Showcat.php?d_id=<?php echo urlencode("others"); ?>">
                        <img src="images/cat/others.jpg" alt="Others Image">
                        <div class="overlay">Others Category</div>
                    </a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
