<?php

include "../connect.php";
 
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $con->prepare("SELECT * FROM user WHERE email = ? AND password = ?");

$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->bindParam(2, $password, PDO::PARAM_STR);
$stmt->execute();

$datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);

$response = array(
    "status" => "success",
    "data" => $datacountprice,
);