
<?php

                            $q2 = "select * from answer where q_id = '$q_id'";
                             $result2 = $conn->query($q2);
                             $i = 0; 
                             while ($row2 = mysqli_fetch_array($result2)){ 
                             if($i==1)break; 
                             $ans_id = $row2['id'];
                            $ans = $row2['ans'];
                            $author_name = $row2['author_name'];
                            $author_pic = $row2['author_pic'];
                            $time = $row2['date'];
                            $like_count = $row2['like_count'];
                            $dislike_count = $row2['dislike_count'];
                            $media = $row2['media'];
                            $i++; 
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
                                if($media != NULL)
                                { ?>
                                           <?php if (pathinfo($media, PATHINFO_EXTENSION) === 'mp4'): ?>
                                            <!-- Display video -->
                                            <video width="320" height="240" controls>
                                                <source src="upload/<?php echo $media; ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <?php elseif (pathinfo($media, PATHINFO_EXTENSION) === 'pdf'): ?>
                                            <!-- Display PDF -->
                                            <a href="upload/<?php echo $media; ?>" target="_blank" style="color: #3498db; text-decoration: none; font-weight: bold; padding: 5px 10px; border: 2px solid #3498db; border-radius: 5px; background-color: #fff; transition: background-color 0.3s, color 0.3s;">
                                                Open PDF
                                            </a>

                                            <?php else: ?>
                                            <!-- Display image -->
                                            <img src="upload/<?php echo $media; ?>" alt="Image" width="320" height="240"  >
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
                                         <?php if($_SESSION['user']==$author_name) { ?>
                                        <span class="openPopupButton" data-answer-id="<?php echo $ans_id; ?>"> <i class="fas fa-edit"></i> &nbsp; </span>

                                        <!-- The modal -->
                                        <div class="modal" id="popupModal<?php echo $ans_id; ?>">
                                            <div class="modal-content">
                                                <span class="close" data-answer-id="<?php echo $ans_id; ?>">&times;</span>
                                                <h2>Your Answer</h2>
                                                <form method="POST" action="edit.php?d_ID=<?php echo  $ans_id ?>">
                                                    <input type="text" class="form-control" id="postTitle" name="f_name" value="<?php echo $ans ?>" required style="padding: 10px; margin: 5px; border: 1px solid #ccc; border-radius: 5px; height:90px; width: 100%;">
                                                    <button type="submit" class="btn btn-primary">Sava & changes</button>
                                                </form>
                                            </div>
                                        </div>

                                       <script src="pop.js"></script>
                                       <a href='del.php?ans_id= <?php echo $ans_id;  ?>  '> <i
                                                        class="fas fa-trash-alt"></i>   </a>                        
                                        <?php  } ?>
                                    </div>

                                </div>
                            </div>
<?php
                             }
if($i==0){
?>
   <div class="p" style="background-color:#b9c499; border: 1px solid #ccc; padding: 10px; text-align: center; font-family: Arial, sans-serif; font-size: 18px; color: #333; border-radius: 5px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);">
    <p style="margin: 0;">No Answer......</p>
</div>
<br>

<?php
}
?>

