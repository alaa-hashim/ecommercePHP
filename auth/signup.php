<?php

include "../connect.php";

/*$username = $_POST['username'];
$password = sha1($_POST['password']);
$email = $_POST['email'];
$phone = $_POST['phone']; */
$username = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;

$stmt = $con->prepare("SELECT * FROM user WHERE email = ? OR phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL");
} 
 
else {

    $data = array(
        "user" => $username,
        "password" =>  $password,
        "email" => $email,
        "phone" => $phone,
        
    );
    insertData("user" , $data) ; 

}
