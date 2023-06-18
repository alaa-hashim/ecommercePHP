<?php

include "../connect.php";


$username = filterRequest("username");
$password = '';
if (isset($_POST['password'])) {
    $password = sha1($_POST['password']);
}
$email = filterRequest("email");
$phone = filterRequest("phone");
$verfiycode     = rand(10000 , 99999);

$stmt = $con->prepare("SELECT * FROM user WHERE email = ? OR phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL");
} else {

    $data = array(
        "username" => $username,
        "password" =>  $password,
        "email" => $email,
        "phone" => $phone,
        "verfiycode" => $verfiycode ,
    );
     
    insertData("user" , $data) ; 

}