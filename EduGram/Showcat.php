    <?php
    session_start();
    include('connect.php');
    include "external_links.php"; 

    if (!$_SESSION['user']) {
        header('location:login.php');
    } elseif ($_SESSION['role'] == 'admin') {
        header('location:Dashboard.php');
    }

    if (isset($_GET['d_id'])) {
        $id = $_GET['d_id'];
    } else {
        // Handle the case when 'd_id' is not set
        echo "d_id is not set!";
    }

  


    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Edugram</title>
       

     <style>
        * {
            margin: 0px;
            padding: 0px;
        }
        button {
            cursor: pointer;
            outline: 0;
            color: #AAA;
        }

        .btn:focus {
            outline: none;
        }

        .green {
            color: green;
        }

        .red {
            color: red;
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
            margin: 151.5px auto;
            font-size: 12px;
        }

        .show-answer-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .show-answer-button:hover {
            background-color: #2980b9;
        }

        .join-link {
            display: inline-block;
            padding: 15px 20px;
            background-color: #0077cc;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 18px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .join-link::before {
            content: 'Join';
            display: block;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 15px 20px;
            background-color: #00568c;
            color: #fff;
            border-radius: 5px;
            transition: top 0.3s;
        }

        .join-link:hover::before {
            top: 0;
        }
    @media only screen and (max-width: 600px) {
        a {
            font-size: 14px; /* Adjust font size for smaller screens */
        }
    }

    </style>
    </head>

    <body id="_1">
    <!-- navigation bar -->
    <a href="index.php">
            <div id="log"><br>
                <div id="ntro">Edugram</div>
                
            </div>
        </a>
        <ul id="nav-bar">
            <a  href="index.php"><li>Home</li></a>
            <a href="categories.php"><li id="home">Categories</li></a>
            <a href="contacts.php"><li>Contact</li></a>
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


    <div id="myDiv" style="padding-top:40px;padding-bottom:20px; background-color: #f0f0f0; text-align: center;">

    <a href="chat.php?d_id=<?php echo $id; ?>" class="join-link">ChatRoom</a>

</div>

<main>
    <?php
    $q = "select * from question where cat = '$id'";
    $result = $conn->query($q);
    $n=1;
    while ($row = mysqli_fetch_array($result)) {
        $q_id = $row['id'];
        $qs = $row['qus'];
        $author_name = $row['author_name'];
        $author_pic = $row['author_pic'];
        $time = $row['time'];
     
        ?>

        <section>
            <div class="container mt-3">
                <div class="media border p-3">

                
                 <?php 
                    if($_SESSION['user']==$author_name){
                        ?>
                           <a href="profile.php"> <img src="<?php echo $author_pic; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

                      <?php
                    }
                      else{
                          ?>
                           <a href="chat_profile.php?d_id=<?php echo $row['author_name'] ?>"> <img src="<?php echo $author_pic; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

                           <?php
                         }
                          ?>
                
                <div class="media-body">
                    <p style="font-size: 25px;"><?php echo $qs; ?></p>
                    <h6><?php echo "@" . $author_name; ?> <small><i style="font-size: 13px;"><?php echo $time; ?> </i></small></h6>
                
                    <br>
                    <?php

                     include "one_answer.php"; 
                     ?>



                    
                    <button class="btn " data-toggle="collapse" data-target="#demo<?php echo $q_id ?>">See More <i class="fa-solid fa-square-caret-up" style="color: #36511f;"></i></button>


                    <?php $q2 = "select * from answer where q_id = '$q_id'";
                             $result2 = $conn->query($q2);
                             $row2 = mysqli_fetch_array($result2); 
                             ?>
                    <div id="demo<?php echo $q_id ?>" class="collapse">
                    <?php

                        while ($row2 = mysqli_fetch_array($result2)) {
                            $ans_id = $row2['id'];
                            $ans = $row2['ans'];
                            $author_name = $row2['author_name'];
                            $author_pic = $row2['author_pic'];
                            $time = $row2['date'];
                            $like_count = $row2['like_count'];
                            $dislike_count = $row2['dislike_count'];
                            $video = $row2['video']; 

                            ?>
                        
                        <div class="media p-3">
                        <?php 
                    if($_SESSION['user']==$author_name){
                        ?>
                           <a href="profile.php"> <img src="<?php echo $author_pic; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

                      <?php
                    }
                      else{
                          ?>
                           <a href="chat_profile.php?d_id=<?php echo $row2['author_name'] ?>"> <img src="<?php echo $author_pic; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

                           <?php
                         }
                          ?>
                                <div class="media-body">
                                    <h6><?php echo "@" . $author_name; ?> <small><i style="font-size: 13px;"><?php echo $time; ?>
                                        </i></small></h6>

                                    <?php  if(!$ans) ?><p style="font-size: 18px;"><?php echo $ans; ?></p>
                                   

                                <?php
                                if($video != NULL)
                                { ?>
                                            <div class="media-body">
                                            <video controls width="200px" height="100px" style="padding: 0px 15px;">
                                            <source src="<?php echo 'upload/' . $video; ?>" onerror="this.style.display='none';">
                                            </video>
                            </div>

                                <?php 
                                    
                                }
                                ?>

                                    <!-- Like and Dislike buttons and counts -->
                                    <div class="like-dislike">
                                        <?php
                                        echo $like_count . "  ";
                                        echo "<a href='update_likes.php?del_id=$ans_id'><button class='btn green like-button'><i class='fa fa-thumbs-up fa-lg' aria-hidden='true'></i></button></a>";
                                        echo "    ";
                                        echo $dislike_count . " ";
                                        echo "<a href='update_dislikes.php?del_id=$ans_id'><button class='btn red dislike-button'><i class='fa fa-thumbs-down fa-lg' aria-hidden='true'></i></button></a>";
                                        ?>
                                    </div>

                                </div>
                            </div>
                                <?php 
                                    
                                }
                                ?>


                               <div class="comment mt-3">
                            <!-- Video Upload Form -->
                                <form action="video_answer.php?d_id=<?php echo $q_id ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <input type="file" class="form-control-file" value ="file" name="file"  accept="video/*" required>
                                             </div>
                                             <input type="submit" class="btn btn-primary" value="upload" name = "upload" >
                                             </form>
                                        </div>

                        </div> 
                        
                            <div class="comment mt-3">
                             <!-- add answer form  -->
                             <form action="answer.php?d_id=<?php echo $q_id ?>" method="POST">
                                 <input type="textarea" class="form-control" placeholder="Leave an answer..." name="comment" required>
                                 <input type="submit" class="btn btn-primary mt-2" value="Add Answer">
                             </form>
                       </div>    
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
    ?>
   

</main>


   <!-- Footer -->
   <?php include("footer.php"); ?>


    </body>
    </html>
