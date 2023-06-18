<?php

include "../connect.php";

$username = $_POST['username'];
$password = sha1($_POST['password']);
$email = $_POST['email'];
$phone = $_POST['phone'];


$stmt = $con->prepare("SELECT * FROM user WHERE email = ? OR phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL");
} 
 
else {

    $data = array(
        "username" => $username,
        "password" =>  $password,
        "email" => $email,
        "phone" => $phone,
        
    );
    insertData("user" , $data) ; 

}
