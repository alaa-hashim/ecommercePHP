<?php

include "../connect.php";
 
$password = sha1($_POST['password']);
$email = filterRequest("email"); 

getData("user" , "email = ? AND  password = ?" , array($email , $password)) ; 