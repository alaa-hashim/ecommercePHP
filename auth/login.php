<?php

include "../connect.php";
 

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? sha1($_POST['password']) : null;
// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND  users_password = ? AND users_approve = 1 ");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
// result($count) ; 

getData("user" , "email = ? AND  password = ?" , array($email , $password)) ; 