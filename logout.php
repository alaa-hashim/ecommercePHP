 <?php session_start(); ?>
<?php

    $_SESSION['username'] = null ;
    $_SESSION['phone'] = null ;
    $_SESSION['firstname'] = null ;
    $_SESSION['email'] = null ;


    header("Location:login.php");

  

    ?>