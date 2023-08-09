<?php
include "connect.php" ;
$st=$_REQUEST['st'];

$response = array();
if($st==40){
    
    
$search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : null;
   
$data =  getAllData("product", "product_name LIKE '%$search%' OR proudct_namear  LIKE '%$search%'  ", null, false);

$response = $data;
}
if($st==1){
$response['success'] = true ; 
 $categories = getAllData("categories" , " hide = 0 " , null ,false);
 $response = $categories;    
}else if($st==2){

//subcategory data
    $response['success'] = true ; 
 $subcategory = getAllData("subcategory" , " hide_ = 0 " , null ,false);
 $response = $subcategory;

}
else if($st==21){

    //subcategory data
        $response['success'] = true ; 
     $discount = getAllData("itemviews" , " hide = 0 AND product_discount > 0 " , null ,false);
     $response = $discount;
    
    }
    else if($st==22){

        //subcategory data
            $response['success'] = true ; 
         $discount = getAllData("silder" , " hide = 0  " , null ,false);
         $response = $discount;
        
        }
else if($st==3){

//subcategory data
   $response['success'] = true ; 
 $products = getAllData("itemviews" , " hide = 0 " , null ,false ,     );
 $response = $products;
/*
 $categoryid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

// Assuming $con is your PDO database connection object
$stmt = $con->prepare("
    SELECT itemview.*, 1 as wishlist FROM itemview
    INNER JOIN wishlist ON wishlist.wishlist_productid = itemview.product_id AND wishlist.wishlist_userid = :userid
    WHERE subcat_id = :categoryid
    UNION ALL 
    SELECT *, 0 as wishlist FROM itemview
    WHERE subcat_id = :categoryid AND product_id NOT IN (
        SELECT itemview.product_id FROM itemview
        INNER JOIN wishlist ON wishlist.wishlist_productid = itemview.product_id AND wishlist.wishlist_userid = :userid
    )"
);

// Assuming $userid is the user ID you want to use in the query
$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);

// Bind $categoryid parameter to the prepared statement
$stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
} 
*/

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
// authentication end 


// cart 
// 6 == cart view 
else if($st==6){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

    // Assuming filterRequest() is a function that sanitizes input
    
    $data = getAllData("cartview", "cart_userid = $userid", null, false);
    
  /*  $stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
    WHERE  cart_userid = :userid
    GROUP BY cart_userid");
    
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    
    $datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);  */
    
    $response = $data ;
  //  array(
      //  "status" => "success",
     //   "countprice" =>  $datacountprice,
 //       "datacart" => $data,
  //  );
   
    
} // 7 == add to cart
else if($st ==7){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $data = array(
        "cart_userid" => $userid,
        "cart_itemid" => $itemid
    );
    
    insertData("cart", $data);
} else {
    echo "User ID and item ID are required.";
}

}
// 8 == delete from cart
else if ($st== 8){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $where = "cart_userid = $userid AND cart_itemid = $itemid";
    
    deleteData("cart", $where);
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}
}
// 9 == get count from cart 
else if($st== 9){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $stmt = $con->prepare("SELECT COUNT(cart_id) AS countitems FROM cart WHERE cart_userid = :userid AND cart_itemid = :itemid");
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':itemid', $itemid);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {
        $data = $stmt->fetchColumn();
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "success", "data" => "0"));
    }
} else {
    echo json_encode(array("status" => "failure", "data" => "Missing userid or itemid"));
}
}
// wishlist starts
// wishlist view
else if($st==10){
    $categoryid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

// Assuming $con is your PDO database connection object
$stmt = $con->prepare("
    SELECT itemviews.*, 1 as wishlist FROM itemviews
    INNER JOIN wishlist ON wishlist.wishlist_productid = itemviews.product_id AND wishlist.wishlist_userid = :userid
    WHERE subcat_id = :categoryid
    UNION ALL 
    SELECT *, 0 as wishlist FROM itemviews
    WHERE subcat_id = :categoryid AND product_id NOT IN (
        SELECT itemviews.product_id FROM itemviews
        INNER JOIN wishlist ON wishlist.wishlist_productid = itemviews.product_id AND wishlist.wishlist_userid = :userid
    )"
);

// Assuming $userid is the user ID you want to use in the query
$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);

// Bind $categoryid parameter to the prepared statement
$stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    $response = array("status" => "success", "data" => $data);
} else {
    $response =array("status" => "failure");
}
}
// wishlist add
else if($st== 11){

    $itemid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
   $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$data = array("wishlist_userid" => $userid,
 "wishlist_productid" => $itemid);
  insertData("wishlist", $data , );
}
// wishlist remove
else if($st ==12){
    $itemid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$response = deleteData("wishlist", "wishlist_userid = $userid AND wishlist_productid = $itemid");

}
// wishlit ends 
else if($st==30){
    $productid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
    $subid = isset($_REQUEST["subid"]) ? $_REQUEST["subid"] : null;
    
    $stmt = $con->prepare("SELECT * FROM `product` WHERE `product_id` != :id AND `subcat_id` = :subid ORDER BY RAND() LIMIT 6");
    $stmt->bindParam(':id', $productid, PDO::PARAM_INT);
    $stmt->bindParam(':subid', $subid, PDO::PARAM_INT);
    $stmt->execute();
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $response = array(
        "status" => "success",
        "recommend" => $data,
    );
    


    
    
}
// Addresses start
// Add addresses
else if($st== 65){
    $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : null;
    $user_address = isset($_REQUEST["user_address"]) ? $_REQUEST["user_address"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $street = isset($_REQUEST["street"]) ? $_REQUEST["street"] : null;
    $building = isset($_REQUEST["building"]) ? $_REQUEST["building"] : null;
    $apartment = isset($_REQUEST["apartment"]) ? $_REQUEST["apartment"] : null;
    $adress_phone = isset($_REQUEST["adress_phone"]) ? $_REQUEST["adress_phone"] : null;
    $address_lag = isset($_REQUEST["address_lag"]) ? $_REQUEST["address_lag"] : null;
    $address_lat = isset($_REQUEST["address_lat"]) ? $_REQUEST["address_lat"] : null;
  


$data = array(
    "address_name" => $name,
  "user_address" => $user_address,
  "city" => $city,
 "street" => $street ,
 "building" => $building ,
 "apartment" => $apartment ,
 "adress_phone" => $adress_phone ,
 "address_lag" => $address_lag ,
 "address_lat" => $address_lat ,
);
  insertData("address", $data);
} 
// Edit address
else if($st== 66){
    $table = "address";
    $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $street = isset($_REQUEST["street"]) ? $_REQUEST["street"] : null;
    $building = isset($_REQUEST["building"]) ? $_REQUEST["building"] : null;
    $apartment = isset($_REQUEST["apartment"]) ? $_REQUEST["apartment"] : null;
    $adress_phone = isset($_REQUEST["adress_phone"]) ? $_REQUEST["adress_phone"] : null;
    $address_lag = isset($_REQUEST["address_lag"]) ? $_REQUEST["address_lag"] : null;
    $address_lat = isset($_REQUEST["address_lat"]) ? $_REQUEST["address_lat"] : null;
    $addressid = isset($_REQUEST["addressid"]) ? $_REQUEST["addressid"] : null;
    
    $data = array(
        "address_name" => $name,
      
      "city" => $city,
     "street" => $street ,
     "building" => $building ,
     "apartment" => $apartment ,
     "adress_phone" => $adress_phone ,
     "address_lag" => $address_lag ,
     "address_lat" => $address_lat ,
    );
    updateData($table , $data , "address_id = $addressid");
}

// delete address
else if($st== 67){
    $addressid = isset($_REQUEST["addressid"]) ? $_REQUEST["addressid"] : null;
    deleteData("address" , "address_id  = $addressid");   
}
elseif($st== 68){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    getAllData("address" , "user_address = $userid ") ;    
}
 echo json_encode($response);






?>    