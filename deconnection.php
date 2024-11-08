<?php
    // Start the session
    session_start();
    $_SESSION['id_pers']=0;
    session_destroy();
    header('location:login.php');exit();
    ?>
