<?php
    session_start();
    include('connect.php');

    if (!$_SESSION['user']) {
        header('location:login.php');
    } elseif ($_SESSION['role'] == 'admin') {
        header('location:Dashboard.php');
    }

  $at = $_SESSION['user']; 

  


    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Edugram</title>
    <?php   
            include "external_links.php"; 
        ?>

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

    footer {
        background-color: #3498db;
        border-top: 3px solid #2980b9;
    }

    .pagination {
        display: flex;
        justify-content: revert-layer;
        list-style: none;
        margin-top: 25px;
        margin-bottom: -180px;
        margin-left: 620px;
    }

    .pagination a {
        text-decoration: none;
        color: #007BFF;
        padding: 8px 12px;

        border: 1px solid #007BFF;
        margin: 2px;
        border-radius: 5px;
        background-color: #fff;
    }

    .pagination a:hover {
        background-color: black;
        color: #B4C424;
    }

    .pagination .current {
        background-color: #007BFF;
        color: #fff;
        font-weight: bold;
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
        <a href="index.php">
            <li >Home</li>
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
        <?php
        }
        ?>
    </ul>

    <main>
        <?php


    $number_per_page=03;

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $start_from = ($page-1)*03;
    $q = "select * from question where author_name = '$at' LIMIT $start_from,$number_per_page";
    $result = $conn->query($q);

    $sq = "SELECT COUNT(*) AS cnt FROM question  where author_name = '$at' ";
    $ress = mysqli_query($conn,$sq);
    $row = mysqli_fetch_assoc($ress);
    $total_records = $row['cnt'];
    $total_page = ceil($total_records/$number_per_page);

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
                    <a href="profile.php"> <img src="<?php echo $author_pic; ?>" alt="John Doe"
                            class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

                    <?php
                    }
                      else{
                          ?>
                    <a href="chat_profile.php?d_id=<?php echo $row['author_name'] ?>"> <img
                            src="<?php echo $author_pic; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                            style="width:45px; height: 45px;"></a>

                    <?php
                         }
                          ?>

                    <div class="media-body">
                        <p style="font-size: 25px;"><?php echo $qs; ?>
                        <a href='delete.php?qus_id= <?php echo $q_id;  ?>'> <i class="fas fa-trash-alt"></i> </a> </p>
                        <h6><?php echo "@" . $author_name; ?> <small><i style="font-size: 13px;"><?php echo $time; ?>
                                </i></small></h6>

                        <br>
                        <?php

                     include "one_answer.php"; 
                     ?>




                        <button class="btn " data-toggle="collapse" data-target="#demo<?php echo $q_id ?>">See More <i
                                class="fa-solid fa-square-caret-up" style="color: #36511f;"></i></button>


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
                            $media = $row2['media']; 

                            ?>

                            <div class="media p-3">
                                <?php 
                    if($_SESSION['user']==$author_name){
                        ?>
                                <a href="profile.php"> <img src="<?php echo $author_pic; ?>" alt="John Doe"
                                        class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

                                <?php
                    }
                      else{
                          ?>
                                <a href="chat_profile.php?d_id=<?php echo $row2['author_name'] ?>"> <img
                                        src="<?php echo $author_pic; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                                        style="width:45px; height: 45px;"></a>

                                <?php
                         }
                          ?>
                                <div class="media-body">

                                    <h6><?php echo "@" . $author_name; ?> <small><i
                                                style="font-size: 13px;"><?php echo $time; ?>
                                            </i></small></h6>

                                    <?php  if(!$ans) ?><p style="font-size: 18px;"><?php echo $ans; ?></p>


                                    <?php
                                if($media != NULL)
                                { ?>
                                      <?php if (pathinfo($media, PATHINFO_EXTENSION) === 'mp4'): ?>
                                        <!--video -->
                                        <video width="320" height="240" controls>
                                            <source src="upload/<?php echo $media; ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <?php elseif (pathinfo($media, PATHINFO_EXTENSION) === 'pdf'): ?>
                                        <!-- PDF -->
                                        <a href="upload/<?php echo $media; ?>" target="_blank" style="color: #3498db; text-decoration: none; font-weight: bold; padding: 5px 10px; border: 2px solid #3498db; border-radius: 5px; background-color: #fff; transition: background-color 0.3s, color 0.3s;">
                                                Open PDF
                                            </a>

                                        <?php else: ?>
                                        <!-- image -->
                                        <img src="upload/<?php echo $media; ?>" alt="Image" width="320" height="240">
                                        <?php endif; ?>

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




                        </div>



                    </div>
                </div>
            </div>
        </section>

        <?php
    }
    ?>


    </main>
    <div class="pagination">
        <?php
     for ($i=1; $i<=$total_page ; $i++) { 
         echo "<a href='my_all.php?page=".$i."'>".$i."</a>";
     } ?>
    </div>

    <?php include('footer.php') ?>

</body>

</html>