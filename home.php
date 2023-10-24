<?php
include "connect.php" ;
$st=$_REQUEST['st'];

$response = array();
 if($st==100){

   
    $table = "address";
    $usersid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $street = isset($_REQUEST["street"]) ? $_REQUEST["street"] : null;
    $building = isset($_REQUEST["building"]) ? $_REQUEST["building"] : null;
    $apartment = isset($_REQUEST["apartment"]) ? $_REQUEST["apartment"] : null;
    $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
    $lag = isset($_REQUEST["lag"]) ? $_REQUEST["lag"] : null;
    $lat = isset($_REQUEST["lat"]) ? $_REQUEST["lat"] : null;
    $type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : null;
    $image = isset($_REQUEST["image"]) ? $_REQUEST["image"] : null;
    
    
    
    $data = array(  
    
    "user_address" => $usersid,
    "address_name"   => $name,
    "city" => $city,
    "street" => $street,
    "building" => $building,
    "apartment" => $apartment,
    "address_phone"   => $phone,
    "address_long" => $lag,
    "address_lat" => $lat,
    "address_type" => $type,
    "address_image" => $image,
    
    );
    
    insertData($table , $data);
    
}  
if($st==40){
    
    
$search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : null;
   
$data =  getAllData("product", "product_name LIKE '%$search%' OR proudct_namear  LIKE '%$search%'  ", null, false);

$response = $data;
}
if($st==1){
$response['success'] = true ; 
 $categories = getAllData("categories" , " hide = 0 " , null ,false);
 $response = $categories;    
}elseif ($st == 2) {
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 1;

    // Get subcategory data
    $subcategory = getAllData("subcategory", "hide_ = 0 AND $id = cat_id", null, false);
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
        else if($st== 23){

            //subcategory data
            $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
            $address = getAllData("addresses" , " user_address = $userid " , null ,false);
            $response = $address ;
            
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
else if($st = 120){
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

}
elseif($st=140){
    $categoryid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    
    // Assuming $con is your PDO database connection object
    $stmt = $con->prepare("
    (SELECT itemview.*, 1 as wishlist FROM itemview
    INNER JOIN wishlist ON wishlist.wishlist_productid = itemview.product_id AND wishlist.wishlist_userid = :userid
    WHERE subcat_id = :categoryid)
    UNION ALL 
    (SELECT *, 0 as wishlist FROM itemview
    WHERE subcat_id = :categoryid AND product_id NOT IN (
        SELECT itemview.product_id FROM itemview
        INNER JOIN wishlist ON wishlist.wishlist_productid = itemview.product_id AND wishlist.wishlist_userid = :userid
    ))
    ORDER BY itemview.price DESC ;
");

    
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

$data = $stmt->fetch(PDO::FETCH_ASSOC);

$response = array(
    "status" => "success",
    "data" => $data,
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
    
    $data = getAllData("cartview", "cart_userid = $userid ", null, false);
    
  $stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
    WHERE  cart_userid = :userid
    GROUP BY cart_userid");
    
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    
    $datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);  
    
    $response = 
    array(
        "status" => "success",
       "countprice" =>  $datacountprice,
      "datacart" => $data,
   );
   
    
}
else if ($st==99){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

    // Assuming filterRequest() is a function that sanitizes input
    
    
    
  $stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
    WHERE  cart_userid = :userid
    GROUP BY cart_userid");
    
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    
    $datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);  
    
    $response = 
    array(
        "status" => "success",
       "countprice" =>  $datacountprice,
      
   );
}
elseif($st ==7){
 
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

    // Assuming filterRequest() is a function that sanitizes input
    
    
    
   $stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
    WHERE  cart_userid = :userid
    GROUP BY cart_userid");
    
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    
    $datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);  
    
    $response = 
   array(
       "status" => "success",
       "countprice" =>  $datacountprice,
      
   );
 
    
}// 7 == add to cart
else if($st ==8){
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
else if ($st== 9){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $where = "cart_userid = $userid AND cart_itemid = $itemid LIMIT 1 ";
    
    deleteData("cart", $where);
   
}
}
// 9 == get count from cart 
else if($st== 10){
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
else if($st==11){
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
else if($st== 12){

    $itemid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
   $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$data = array("wishlist_userid" => $userid,
 "wishlist_productid" => $itemid);
  insertData("wishlist", $data , );
}

// wishlist remove
else if($st ==13){
    $itemid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$response = deleteData("wishlist", "wishlist_userid = $userid AND wishlist_productid = $itemid");

}
else if($st =14){
    $couponName = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

$now = date("Y-m-d H:i:s");

getData("coupon"  , "coupon_name = '$couponName' AND coupon_exprid > '$now' AND coupon_use > 0  ")  ;
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
else if ($st == 68){
    $couponName = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

$now = date("Y-m-d H:i:s");

 $response =  getData("coupon"  , "coupon_name = '$couponName' AND coupon_exprid > '$now' AND coupon_use > 0  ")  ;

}
else if($st==18){
       

        $usersid = isset($_REQUEST["usersid"]) ? $_REQUEST["usersid"] : null;
        $addressid = isset($_REQUEST["addressid"]) ? $_REQUEST["addressid"] : null;
        $orderstype = isset($_REQUEST["orderstype"]) ? $_REQUEST["orderstype"] : null;
        $pricedelivery = isset($_REQUEST["pricedelivery"]) ? $_REQUEST["pricedelivery"] : null;
        $ordersprice = isset($_REQUEST["ordersprice"]) ? $_REQUEST["ordersprice"] : null;
        $couponid = isset($_REQUEST["couponid"]) ? $_REQUEST["couponid"] : null;
        $paymentmethod = isset($_REQUEST["paymentmethod"]) ? $_REQUEST["paymentmethod"] : null;
        $coupondiscount = isset($_REQUEST["coupondiscount"]) ? $_REQUEST["coupondiscount"] : null;
        
        
        //if ($orderstype == "1") {
        
          //  $pricedelivery = 0;
        //}
        
        //$totalprice = $ordersprice  + $pricedelivery;
        
        
        // Check Coupon 
        
        $now = date("Y-m-d H:i:s");
        
        $checkcoupon = getData("coupon", "coupon_id = '$couponid' AND coupon_exprid > '$now' AND coupon_use > 0  ", null,  false);
        
        
        if ($checkcoupon  > 0) {
            $totalprice =  $totalprice - $ordersprice * $coupondiscount / 100;
            $stmt = $con->prepare("UPDATE `coupon` SET  `coupon_use`= `coupon_use` - 1  WHERE coupon_id = '$couponid' ");
            $stmt->execute();
        }
        
        
        $data = array(
            "order_userid"  =>  $usersid,
            "order_address"  =>  $addressid,
            "order_type"  =>  $orderstype,
            "order_delivery_price"  =>  $pricedelivery,
            "order_price"  =>  $ordersprice,
            "order_coupon"  =>  $couponid,
           // "orders_totalprice"  =>  $totalprice,
            "order_payment"  =>  $paymentmethod
        );
        
        $count = insertData("orders", $data, false);
        
        if ($count > 0) {
        
            $stmt = $con->prepare("SELECT MAX(order_id) from orders ");
            $stmt->execute();
            $maxid = $stmt->fetchColumn();
        
            $data = array("cart_order" => $maxid);
        
            updateData("cart", $data, "cart_userid = $usersid  AND cart_order = 0 ");
        }
    }

 echo json_encode($response);






?>    