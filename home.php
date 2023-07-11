<?php
include "connect.php" ;
$st=$_REQUEST['st'];

$response = array();
if($st==1){
$response['success'] = true ; 
 $categories = getAllData("categories" , " hide = 0 " , null ,false);
 $response = $categories;    
}else if($st==2){

//subcategory data
    $response['success'] = true ; 
 $subcategory = getAllData("subcategory" , " hide_ = 0 " , null ,false);
 $response['data'] = $subcategory;

}
else if($st==3){

//subcategory data
    $response['success'] = true ; 
 $products = getAllData("itemview" , " hide = 0 " , null ,false ,     );
 $response = $products;

}
// authentication 
else if($st==4){
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

    
}
else if($st==5){
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$username = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $con->prepare("SELECT * FROM user WHERE email = ? AND password = ?");

$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->bindParam(2, $password, PDO::PARAM_STR);
$stmt->execute();

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

    
}

else if($st==5){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

// Assuming filterRequest() is a function that sanitizes input

$data = getAllData("cartview", "cart_userid = $userid", null, false);

$stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
WHERE  cart_userid = :userid
GROUP BY cart_userid");

$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
$stmt->execute();

$datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);

$response = array(
    "status" => "success",
    "countprice" =>  $datacountprice,
    "datacart" => $data,
);
    
}
else if($st==6){
    $userid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

$stmt = $con->prepare("SELECT * FROM `product` WHERE `product_id` != :id ORDER BY RAND()  LIMIT 6");
$stmt->bindParam(':id', $userid, PDO::PARAM_INT);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = array(
    "status" => "success",
    "recommend" => $data,
);

    
    
}

 echo json_encode($response);






?>    