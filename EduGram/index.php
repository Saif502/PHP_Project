<?php
    session_start();
    include('connect.php');

    if (!$_SESSION['user']) {
        header('location:login.php');
    } elseif ($_SESSION['role'] == 'admin') {
        header('location:Dashboard.php');
    }


?>





<!DOCTYPE html>
<html>

<head>

    <style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        width: 70%;
        text-align: center;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #saveAndChanges {
        color: blue;
        /* Set the default text color */
        text-decoration: none;
        /* Remove the default underline */
        transition: color 0.3s;
        /* Add a smooth transition effect for the color change */
    }

    #saveAndChanges:hover {
        color: red;
        /* Change the text color on hover */
    }

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


    .ss {

        background: url('images/a1.jpg');
        margin-top: -20px;
        margin-bottom: 100px;
        display: block;
        text-align: center;
        height: 550px;
        width: 100%;

    }

    #search_box {
        position: absolute;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 50px;
        opacity: 1;
        transition: opacity 0.7s;
        width: 100%;
        height: 78%;


    }


    #search_input {
        width: 45%;
        height: 80px;
        border: 5px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        margin-top: 300px;
        margin-left: -560px;
    }

    #search_button {
        background-color: #3498db;
        color: #fff;
        border: none;
        height: 80px;
        width: 80px;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 255px;



    }

    #search_input:hover {
        border-color: #3498db;
        /* Border color change on hover */
    }

    #search_button:hover {
        background-color: #2962a1;
        /* Background color change on hover */
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


    <title>Edugram</title>
    <?php   
            include "external_links.php"; 
        ?>

</head>

<body id="_1">
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
            <li id="home">Home</li>
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
            <li>Hi, <?php echo $_SESSION["user"]; ?></li>
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
      

    if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["search"]) {

        ?>
        <div style="margin-left: 140px; margin-bottom:30px">
            <p style="color:black; font-size:30px; font-weight: 750; ">See Related Results:</p>
        </div>

        <?php
    
        $searchTerm = $_POST["search"];
        
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else
        {
            $page = 1;
        }

        $start_from = ($page-1)*03;
        $sql = "SELECT * FROM question  where qus like '%$searchTerm%' LIMIT $start_from,$number_per_page";
        $result = $conn->query($sql);
        $sq = "SELECT COUNT(*) AS cnt FROM question where qus like '%$searchTerm%' ";
        $ress = mysqli_query($conn,$sq);
        $row = mysqli_fetch_assoc($ress);
        $total_records = $row['cnt'];
        $total_page = ceil($total_records/$number_per_page);
        
    }
    else{
       

        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else
        {
            $page = 1;
        }

        $start_from = ($page-1)*03;
        $q = "select * from question ORDER BY time DESC LIMIT $start_from,$number_per_page";
        $result = $conn->query($q);

        $sq = "SELECT COUNT(*) AS cnt FROM question ";
        $ress = mysqli_query($conn,$sq);
        $row = mysqli_fetch_assoc($ress);
        $total_records = $row['cnt'];
        $total_page = ceil($total_records/$number_per_page);


        ?>

        <div class="ss">
            <div id="container">
                <form action="index.php" method="post">
                    <div id="search_box">
                        <p style="font-size: 50px; color: #fff; margin-left: 100px"><strong>Search
                                Anything</strong><br>What do you want?</p><br><br><br><br><br>
                        <input id="search_input" type="text" name="search" placeholder="Search...">
                        <button id="search_button" type="submit"><i class="fa fa-search"
                                aria-hidden="true"></i></button>

                    </div>
                </form>
            </div>
        </div>
        
        

        <div style="margin-left: 140px; margin-bottom:30px">
            <p style="color:black; font-size:30px; font-weight: 750; ">Most Recent:</p>
        </div>

        <?php



    }



    $row = mysqli_num_rows($result);

    if($row<=0){
        ?>

        <div class="p"
            style="background-color:#b9c499; border: 1px solid #ccc; padding: 10px; text-align: center; font-family: Arial, sans-serif; font-size: 18px; color: #333; border-radius: 5px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);">
            <p style="margin: 0;">Not relevant to this search term......</p>

            <?php
    }
      


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
                            <p style="font-size: 25px;"><?php echo $qs; ?></p>
                            <h6><?php echo "@" . $author_name; ?> <small><i
                                        style="font-size: 13px;"><?php echo $time; ?> </i></small></h6>

                            <br>
                            <?php

                     include "one_answer.php"; 
                     ?>

                            <?php $q2 = "select * from answer where q_id = '$q_id'";
                             $result2 = $conn->query($q2);
                             $row2 = mysqli_fetch_array($result2); 
                             $n_rows = mysqli_num_rows($result2);
                             ?>

                            <?php if($n_rows>1) { ?> <button class="btn " data-toggle="collapse"
                                data-target="#demo<?php echo $q_id ?>">See More <i class="fa-solid fa-square-caret-up"
                                    style="color: #36511f;"></i></button>
                            <?php } ?>
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
                                            src="<?php echo $author_pic; ?>" alt="John Doe"
                                            class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;"></a>

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

                                        
                                        <div class="like-dislike" style="margin-top: 20px;">
                                            <?php
                                        echo $like_count . "  ";
                                        echo "<a href='update_likes.php?del_id=$ans_id'><button class='btn green like-button'><i class='fa fa-thumbs-up fa-lg' aria-hidden='true'></i></button></a>";
                                        echo "    ";
                                        echo $dislike_count . " ";
                                        echo "<a href='update_dislikes.php?del_id=$ans_id'><button class='btn red dislike-button'><i class='fa fa-thumbs-down fa-lg' aria-hidden='true'></i></button></a>";
                                    
                
                                        ?>


                                            <?php if($_SESSION['user']==$author_name) { ?>
                                            <span class="openPopupButton" data-answer-id="<?php echo $ans_id; ?>">
                                                <i class="fas fa-edit"></i> &nbsp; </span>

                                            <!-- The modal -->
                                            <div class="modal" id="popupModal<?php echo $ans_id; ?>">
                                                <div class="modal-content">
                                                    <span class="close"
                                                        data-answer-id="<?php echo $ans_id; ?>">&times;</span>
                                                    <h2>Your Answer</h2>
                                                    <form method="POST" action="edit.php?d_ID=<?php echo  $ans_id ?>">
                                                        <input type="text" class="form-control" id="postTitle"
                                                            name="f_name" value="<?php echo $ans ?>" required
                                                            style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 5px; height:150px; width: 80%;">
                                                        <button type="submit" class="btn btn-primary">Sava &
                                                            changes</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <script src="pop.js"></script>
                                            <a href='del.php?ans_id= <?php echo $ans_id;  ?>  '> <i
                                                    class="fas fa-trash-alt"></i> </a>
                                            <?php  } ?>


                                        </div>

                                    </div>
                                </div>
                                <?php 
                                    
                                }
                                ?>




                            </div>


                            <div class="comment mt-3">
                                <!-- Combined Video and Text Answer Form -->
                                <form action="combined_form_handler.php?d_id=<?php echo $q_id ?>" method="POST"
                                    enctype="multipart/form-data">

                                    <!-- Text Answer Section -->
                                    <div class="form-group">
                                        <label for="comment">Leave an answer:</label>
                                        <textarea class="form-control" placeholder="Leave an answer..."
                                            name="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="media">Attachment</label>
                                        <input type="file" class="form-control-file" name="media[]" accept="video/*,image/*,.pdf" multiple>
                                    </div>


                                    <!-- Submit Button -->
                                    <input type="submit" class="btn btn-primary" value="Submit Answer"
                                        name="upload_and_answer">
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

    
    <div class="pagination">
    <?php
     for ($i=1; $i<=$total_page ; $i++) { 
         echo "<a href='index.php?page=".$i."'>".$i."</a>";
     } ?>
     </div>


    <!-- Footer -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var openButtons = document.querySelectorAll('.openPopupButton');

        openButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var answerId = this.getAttribute('data-answer-id');
                var modal = document.getElementById('popupModal' + answerId);

                modal.style.display = 'block';

                // Handle close button click
                var closeButtons = document.querySelectorAll('[data-answer-id="' +
                    answerId + '"]');
                closeButtons.forEach(function(closeButton) {
                    closeButton.addEventListener('click', function() {
                        modal.style.display = 'none';
                    });
                });
            });
        });
    });
    </script>


    <?php include('footer.php') ?>

    

</body>

</html>