<?php
    session_start();
    
    if(! isset($_SESSION['user'])){
        header("Location: admin_index.html");
    }

    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-60, '/');
    }
    session_unset();
    session_destroy();
    header("Location: admin_index.html");
?>